from __future__ import annotations
from dataclasses import field
from types import NoneType
from unittest import result
from Bio import Entrez
from bson import encode
from pubchempy import Compound, get_compounds
from chembl_webresource_client.new_client import new_client
from ete3 import NCBITaxa
import pubchempy as pcp
import string
import sys
import argparse
import requests
import json
import metapub

def union_list(lst1, lst2):
    final_list = list(set(lst1) | set(lst2))
    return final_list

def intersection_list(lst1, lst2):
    final_list = list(set(lst1) & set(lst2))
    return final_list

def find_similar_compound(smiles_compound, num_similarity):
    similarity = new_client.similarity
    res = similarity.filter(smiles=smiles_compound, similarity=num_similarity).only('pref_name')
    similar_compound = [item['pref_name'].lower() for item in res if type(item['pref_name']) != NoneType]

    try:
        ret = get_compounds(smiles_compound, 'smiles', searchtype='similarity')
        for item in ret:
            similar_compound += item.synonyms
    except:
        None

    return similar_compound

def get_synonyms_similarity(lista):
    list_synonyms = []
    for item in lista:
        list_synonyms += get_synonyms_by_name(item)

    synonyms = set(list_synonyms)

    return synonyms

def get_related_records(name_smiles):

    try:
        cid_number = ""
        try:
            ret = get_compounds(name_smiles, 'smiles')
            cid_number = ret[0].cid
        except:
            ret = get_compounds(name_smiles, 'name')
            cid_number = ret[0].cid

        href_1 = 'https://pubchem.ncbi.nlm.nih.gov/sdq/sdqagent.cgi?infmt=json&outfmt=json&query={"download":"cmpdname","collection":"compound","where":{"ands":[{"cid":"'
        href_2 = '"},{"relatedidtype":"cidneighbor"}]},"order":["cid,asc"],"start":1,"limit":10000000,"downloadfilename":"CID_'
        href_3 = '_compound"}'
        href = f'{href_1}{cid_number}{href_2}{cid_number}{href_3}'
        # print(href)
        wena = requests.get(href)

        hola = str(wena.content, 'UTF-8').replace("}\n\t{", "},\n\t{")
        hola = hola[:hola.index("}\n]")+3]
        # print(hola)
        data = json.loads(hola)

        list_cmpdname = [item["cmpdname"] for item in data]

        return list_cmpdname
        # print(list_cmpdname)
    except:
        return []


        
def get_descendants_ncbi(name):
    try:
        ncbi = NCBITaxa()
        descendants = ncbi.get_descendant_taxa(name)
        get_descendants = {x.lower().replace("uncultured ", "") for x in ncbi.translate_to_names(descendants)}

        get_descendants.add(name.lower())

        try:
            ncbi = NCBITaxa()
            dict_id = ncbi.get_name_translator(['candida'])
            # print(dict_id['candida'])
            lineage = ncbi.get_lineage(dict_id['candida'][0])
            for item in lineage:
                get_descendants.add(item.lower())
        except:
            None

    except:
        get_descendants = {name}

    return get_descendants

# def mark_tag_text(text, list_compound, list_target):
#     for item in list_compound:
#         text = text.replace(item, f'<mark style="background: green">{item}</mark>')

#     for item in list_target:
#         text = text.replace(item, f'<mark style="background: red">{item}</mark>')

#     return text


def get_info_pubmed(synonyms, synonyms_target, querysearch):
    Entrez.email = "dummy@gmail.com"

    # print(querysearch)

    handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    # handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    record = Entrez.read(handle)
    handle.close()

    pubmed_id = record["IdList"]

    # pubmed_id = ["PMC"+item for item in pubmed_id_list]

    if len(pubmed_id) >= 1:
        # print(pubmed_id)
        pubmed_entry = Entrez.efetch(db="pubmed", id=",".join(pubmed_id), retmode="xml")
        result = Entrez.read(pubmed_entry)
        len_result = len(result["PubmedArticle"])

        print('<button onclick="myFunction()">Querysearch</button>')
        print(f"<div id='myDIV'><p>{querysearch}</p></div>")
        print(f"<h1>Results: {len_result}</h1>")

      
        for publication in result["PubmedArticle"]:
            try:

                article = publication['MedlineCitation']['Article']

                identifier = publication['MedlineCitation']['PMID']

                if 'ArticleTitle' in article:
                    title = article['ArticleTitle']
                    title = title.replace("<i>", "").replace("</i>", "")
                    # title = mark_tag_text(title, synonyms, synonyms_target)
                    
                else: 
                    title = ""
                
                if 'Abstract' in article:
                    abstract = article['Abstract']['AbstractText'][0]
                    abstract = abstract.replace("<i>", "").replace("</i>", "")
                    # abstract = mark_tag_text(abstract, synonyms, synonyms_target)
                else:
                    abstract = ""

                print(f'<h2>Id: {identifier} - Title: {title} - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/">[Link]</a></h2>')
                print(f'Abstract: {abstract}')
                print("<br>")
                
                try:
                    text_keywords = ', '.join(publication['MedlineCitation']['KeywordList'][0])
                    # text_keywords = mark_tag_text(text_keywords, synonyms, synonyms_target)
                    keywords = "Keywords: "+text_keywords
                    print(keywords)
                except:
                    None
            
            except:
                print(f'Id: {identifier} - Title: No disponible\n')
                print(f'Abstract: No disponible\n')
                print("<br>")

                try:
                    keywords = "Keywords: "+", ".join(publication['MedlineCitation']['KeywordList'][0])
                    print(keywords)
                except:
                    None

    else:
        print("Sin resultados")


def get_info_pmc(synonyms, synonyms_target, querysearch):
    Entrez.email = "dummy@gmail.com"

    # print(querysearch)

    handle = Entrez.esearch(db="pmc", retmax=1000, term=querysearch)
    # handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    record = Entrez.read(handle)
    handle.close()

    pubmed_id_list = record["IdList"]

    pubmed_id = ["PMC"+item for item in pubmed_id_list]

    if len(pubmed_id) >= 1:
        # print(pubmed_id)

        for identifier in pubmed_id:

            fetch = metapub.PubMedFetcher()
            try:
                article_metadata = fetch.article_by_pmcid(identifier)
                abstract = article_metadata.abstract
                title = article_metadata.title
                print(f'<h2>Id: {identifier} - Title: {title} - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/">[Link]</a></h2>')
                print(f'Abstract: {abstract}')
                print("<br>")

            except:
                print(f'<h2>Id: {identifier} - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/">[Link]</a></h2>')

        # pubmed_entry = Entrez.efetch(db="pubmed", id=",".join(pubmed_id), retmode="xml")
        # result = Entrez.read(pubmed_entry)
        # len_result = len(result["PubmedArticle"])

        # print(f"<p>{querysearch}<\p>")
        # print(f"<h1>Results: {len_result}</h1>")

      
        # for publication in result["PubmedArticle"]:
        #     try:

        #         article = publication['MedlineCitation']['Article']

        #         identifier = publication['MedlineCitation']['PMID']

        #         if 'ArticleTitle' in article:
        #             title = article['ArticleTitle']
        #             title = title.replace("<i>", "").replace("</i>", "")
        #         else: 
        #             title = ""
                
        #         if 'Abstract' in article:
        #             abstract = article['Abstract']['AbstractText'][0]
        #             abstract = abstract.replace("<i>", "").replace("</i>", "")
        #         else:
        #             abstract = ""

        #         print(f'<h2>Id: {identifier} - Title: {title} - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/">[Link]</a></h2>')
        #         print(f'Abstract: {abstract}')
        #         print("<br>")
                
        #         try:
        #             keywords = "Keywords: "+", ".join(publication['MedlineCitation']['KeywordList'][0])
        #             print(keywords)
        #         except:
        #             None
            
        #     except:
        #         print(f'Id: {identifier} - Title: No disponible\n')
        #         print(f'Abstract: No disponible\n')
        #         print("<br>")

        #         try:
        #             keywords = "Keywords: "+", ".join(publication['MedlineCitation']['KeywordList'][0])
        #             print(keywords)
        #         except:
        #             None

    else:
        print("Sin resultados")

def synonyms_pubchem_name(name):
    try:
        results_pubchem = pcp.get_synonyms(name, 'name')
        synonyms_pubchem = set(results_pubchem[0]['Synonym'])
        synonyms_pubchem.add(name)
    except:
        synonyms_pubchem = set()
        synonyms_pubchem.add(name)

    return synonyms_pubchem

def synonyms_chembl_name(name):
    molecule = new_client.molecule
    results_chembl = molecule.filter(molecule_synonyms__molecule_synonym__iexact=name).only('molecule_synonyms')
    if len(results_chembl) == 0:
        synonyms_chembl = set()
        synonyms_chembl.add(name)
    else:
        synonyms_chembl = {i['molecule_synonym'].lower() for i in results_chembl[0]['molecule_synonyms']}
        synonyms_chembl.add(name)

    return synonyms_chembl


def synonyms_chembl_target_cell_lines(name):
    cell_line = new_client.molecule
    results_chembl = cell_line.filter(pref_name__iexact=name).only('cell_name')
    if len(results_chembl) == 0:
        synonyms_chembl = set()
        synonyms_chembl.add(name)
    else:
        synonyms_chembl = [i['cell_name'].lower() for i in results_chembl]
        synonyms_chembl.add(name)

    return synonyms_chembl

def get_synonyms_by_name(name):
    result_pubchem = synonyms_pubchem_name(name)
    result_chembl = synonyms_chembl_name(name)

    synonyms = union_list(result_chembl, result_pubchem)

    return synonyms

def synonyms_pubchem_smiles(smiles):
    try:
        results_pubchem = pcp.get_synonyms(smiles, 'smiles')
        # name_compound = pcp.get_compounds(smiles, 'smiles')
        synonyms_pubchem = [i.lower() for i in results_pubchem[0]['Synonym']]
    except:
        synonyms_pubchem = []

    return synonyms_pubchem

def synonyms_chembl_smiles(smiles):
    molecule = new_client.molecule

    results_chembl = molecule.filter(molecule_structures__canonical_smiles__iexact=smiles)
    results_chembl = molecule.filter(molecule_structures__canonical_smiles__iexact=smiles).only(['molecule_synonyms'])

    if len(results_chembl) == 0:
        synonyms_chembl = []
    else:
        synonyms_chembl = [i['molecule_synonym'].lower() for i in results_chembl[0]['molecule_synonyms']]

    return synonyms_chembl

def get_synonyms_by_smiles(smiles):
    result_pubchem = synonyms_pubchem_smiles(smiles)
    result_chembl = synonyms_chembl_smiles(smiles)

    if len(result_chembl) > 0 and len(result_pubchem) > 0:
        synonyms = union_list(result_chembl, result_pubchem)
    elif len(result_chembl) > 0 and len(result_pubchem) == 0:
        synonyms = result_chembl
    elif len(result_chembl) == 0 and len(result_pubchem) > 0:
        synonyms = result_pubchem
    else:
        synonyms = []

    return synonyms
    
def find_synonym_target(name):
    target = new_client.target
    gene_name = name
    res = target.filter(target_synonym__icontains=gene_name).only(["pref_name", "target_components"])

    synonyms = []
    for j in range(len(res)):
        synonyms += [i["component_synonym"].lower() for i in res[j]["target_components"][0]["target_component_synonyms"]]
        synonyms.append(res[j]["pref_name"])

    return synonyms

def find_synonym_cell_line(name):
    cell_line = new_client.cell_line
    res = cell_line.filter(cell_name__icontains=name)
    synonyms = [i["cell_name"].lower for i in res]
    return synonyms

def get_synonyms_target(name):
    descendants = get_descendants_ncbi(name)
    target_synonyms = find_synonym_target(name)
    cell_line_synonyms = find_synonym_cell_line(name)

    final_list = list(set(descendants) | set(target_synonyms) | set(cell_line_synonyms))
    return final_list

def create_querysearch(synonyms, descendants):
    l1 = ['("'+item.replace('[','').replace(']','')+'"[Title/Abstract]) OR ("'+item.replace('[','').replace(']','')+'"[Text Word])' for item in synonyms]
    str_synonyms = " OR ".join(l1)

    l2 = ['("'+item.replace('[','').replace(']','')+'"[Title/Abstract]) OR ("'+item.replace('[','').replace(']','')+'"[Text Word])' for item in descendants]
    str_descendants = " OR ".join(l2)

    querysearch = "(("+str_synonyms+") AND ("+ str_descendants + "))"
    querysearch = querysearch.replace("%", "")

    return querysearch

def create_querysearch_fulltext(synonyms, descendants):
    l1 = ['("'+item.replace('[','').replace(']','')+'"[article])' for item in synonyms]
    str_synonyms = " OR ".join(l1)

    l2 = ['("'+item.replace('[','').replace(']','')+'"[article])' for item in descendants]
    str_descendants = " OR ".join(l2)

    querysearch = "(("+str_synonyms+") AND ("+ str_descendants + "))"
    querysearch = querysearch.replace("%", "")

    return querysearch

def match(**kwargs):
    compound = kwargs['compound']
    target = kwargs['target']
    mode = kwargs['mode']
    db = str(kwargs['db'])
    if mode == 'smiles':
        synonyms = get_synonyms_by_smiles(compound)
    elif mode == "name":
        synonyms = get_synonyms_by_name(compound)
    elif mode == "similarity":
        similarity = kwargs['similarity']
        similar_compounds = find_similar_compound(compound, similarity)
        if len(similar_compounds) == 0:
            return None
        synonyms = get_synonyms_similarity(similar_compounds)

    related_records = get_related_records(compound)
    synonyms = union_list(related_records, synonyms)

    synonyms_target = get_synonyms_target(target)
    related_records_target = get_related_records(target)

    synonyms_target = union_list(related_records_target, synonyms_target)

    # querysearch = create_querysearch(synonyms, synonyms_target)

    if db[0] == '1':
        querysearch = create_querysearch(synonyms, synonyms_target)
        get_info_pubmed(synonyms, synonyms_target, querysearch)
    else:
        None
        
    if db[1] == '1':
        querysearch = create_querysearch_fulltext(synonyms, synonyms_target)
        get_info_pmc(synonyms, synonyms_target, querysearch)
    else:
        None

    if db == "00":
        print("No se seleccionaron bases de datos")


if __name__ == "__main__":

    parser = argparse.ArgumentParser()

    parser = argparse.ArgumentParser(formatter_class=argparse.RawDescriptionHelpFormatter, 
    description=
    '''Description:
    This tool allows extracting information regarding the bioactivity of 
    chemical compounds and drugs from biomedical publications contained 
    in the PubMed bibliographic system.'''
    )

    parser.add_argument("-m", "--mode", default = "", help="Mode")
    parser.add_argument("-c", "--compound", default = "", help="Name or smiles compound")
    parser.add_argument("-t", "--target", default = "", help="Target name")
    parser.add_argument("-s", "--similarity",  default = 70, help="Similarity percent")
    parser.add_argument("-d", "--db",  default = 70, help="Database")     

    parser.add_argument('-v', '--version', action='version', version='IPre 1.0')

    args = parser.parse_args()

    # cmpdname

    # print(args.mode)
    # print(args.compound)
    # print(args.target)
    # print(args.similarity)
    # print(args.db)

    match(mode = args.mode, compound = args.compound, target = args.target, similarity = args.similarity, \
        db = args.db)

    # list_compound = ["prochlorperazine"]
    # list_target = ["candida"]
    # query = create_querysearch_fulltext(list_compound, list_target)
    # get_info(query, "hola.txt")


    #################
    # href='https://pubchem.ncbi.nlm.nih.gov/sdq/sdqagent.cgi?infmt=json&outfmt=json&query={"download":"*","collection":"compound","where":{"ands":[{"cid":"4747"},{"relatedidtype":"cidneighbor"}]},"order":["cid,asc"],"start":1,"limit":10000000,"downloadfilename":"CID_4747_compound"}'
    # wena = requests.get(href)

    # hola = str(wena.content, 'UTF-8').replace("}\n\t{", "},\n\t{")
    # data = json.loads(hola)

    # list_cmpdname = [item["cmpdname"] for item in data]

    # print(list_cmpdname)
    ############
    # print(data)

    # ret = get_compounds('aspirin', 'name')
    # print(ret[0].record)

    # hola = pcp.get_properties( 'periciazine')

    # hola = get_synonyms_by_name(args.compound)
    # print(hola)

    # get_compounds('CC', 'smiles', searchtype='similarity')
    # print("hola")
    # ncbi = NCBITaxa()
    # dict_id = ncbi.get_name_translator(['candida'])
    # # print(dict_id['candida'])
    # lineage = ncbi.get_lineage(dict_id['candida'][0])

# related records
# related compounds with annotations

# phenothiazine, antifungal, related records pubchem 1 paper
# vortioxetina 1 paper
# COMMANDS
# python main.py -m 'name' -c 'Caryophyllic acid' -t 'Candida' -s 100
# python main.py -m 'name' -c 'prochlorperazine' -t 'Candida' -s 100
# python main.py -m 'smiles' -c 'Oc1ccc(cc1OC)CC=C' -t 'Candida' -s 100
# python main.py -m 'similarity' -c 'Oc1ccc(cc1OC)CC=C' -t 'Candida' -s 70

# "python3 web/main.py -m 'similarity' -c 'N#Cc1ccc2c(c1)N(CCCN1CCC(O)CC1)c1ccccc1S2' -t 'antifungal' -s 70"

    # Entrez.email = "dummy@gmail.com"
    # pubmed_entry = Entrez.efetch(db="pmc", id="PMC6956685", rettype="full", retmode="xml")
    # # pubmed_entry = Entrez.efetch(db="pubmed", id=",".join(pubmed_id), retmode="xml")
    # # print(pubmed_entry.url)
    # result = Entrez.read(pubmed_entry)
    # print(result)

    # fetch = metapub.PubMedFetcher()
    # article_metadata = fetch.article_by_pmcid("PMC6598948")

    # abstract = article_metadata.abstract

    # print(abstract)

    # fetch = metapub.PubMedFetcher()
    # article_metadata = fetch.article_by_pmcid("PMC7123601")

    # abstract = article_metadata.abstract

    # print(abstract)
