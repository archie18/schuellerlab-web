from Bio import Entrez
from pubchempy import Compound, get_compounds
from chembl_webresource_client.new_client import new_client
from ete3 import NCBITaxa
import pubchempy as pcp
import string
import argparse
import requests
import json
import re
from datetime import datetime
import sys
import time



def mark_tag_text(text, list_compound, list_target):
    for item in list_compound:
        insensitive_hippo = re.compile(re.escape(item), re.IGNORECASE)
        text = insensitive_hippo.sub(f'<mark class="p-3 mb-2 bg-primary text-white">{item}</mark>', text)

    for item in list_target:
        insensitive_hippo = re.compile(re.escape(item), re.IGNORECASE)
        text = insensitive_hippo.sub(f'<mark class="p-3 mb-2 bg-warning text-white">{item}</mark>', text)

    return text

def get_info_pmc_text(synonyms, synonyms_target, querysearch, mode, pmc_id, file):
    if len(pmc_id) >= 1:
        count = 1
        for identifier in pmc_id:
            try:
                response_fulltext = requests.get(f'https://www.ncbi.nlm.nih.gov/research/bionlp/RESTful/pmcoa.cgi/BioC_json/{identifier}/ascii')
                response_fulltext_json = response_fulltext.json()
                article_text = response_fulltext_json["documents"][0]["passages"]
                fulltext = ""
                title = article_text[0]["text"]
                if 'kwd' in article_text[0]["infons"]:
                    keywords = article_text[0]["infons"]["kwd"]
                else:
                    keywords = ""
                abstract = ""
                for item in article_text:
                    if item["infons"]["section_type"] == "ABSTRACT":
                        abstract += item["text"]
                    else:
                        fulltext += item["text"].replace('\n',"").replace("\r\n", "") + " "
            
                title = mark_tag_text(title, synonyms, synonyms_target)
                abstract = mark_tag_text(abstract, synonyms, synonyms_target)
                keywords = mark_tag_text(keywords, synonyms, synonyms_target)
                fulltext = mark_tag_text(fulltext, synonyms, synonyms_target)
                file.write(f'<h2>#{count} Id: {identifier} - Title: {title} - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/"><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                file.write(f'Abstract: {abstract}<br>')
                file.write(f'Fulltext: <button class="fulltext">Display Fulltext</button><div style="display:none;"><p>{fulltext}</p></div><br>')
                file.write(f'Keywords: {keywords}<br>')
            except:
                file.write(f'<h2>#{count} Id: {identifier} - Title: No disponible - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/"><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                file.write(f'Abstract: No disponible<br>')
                file.write(f'Fulltext: No disponible<br>')
                file.write(f'Keywords: No disponible<br>')

            count += 1


    else:
        file.write("Sin resultados")

def get_info_pubmed_text(synonyms, synonyms_target, querysearch, mode, pubmed_id, file):
    Entrez.email = "dummy@gmail.com"
    # pubmed_id = ["PMC"+item for item in pubmed_id_list]

    count = 1
    if len(pubmed_id) >= 1:
        # print(pubmed_id)
        pubmed_entry = Entrez.efetch(db="pubmed", id=",".join(pubmed_id), retmode="xml")
        result = Entrez.read(pubmed_entry)
        len_result = len(result["PubmedArticle"]) + len(result["PubmedBookArticle"])

        json_string = json.dumps(result)
        json_file = open(f"publication.json", "w")
        json_file.write(json_string)
        json_file.close()

        if len(result["PubmedBookArticle"]) > 0:
            for publication in result["PubmedBookArticle"]:
                try:
                    article = publication['BookDocument']

                    identifier = publication['BookDocument']['PMID']

                    if 'ArticleTitle' in article:
                        title = article['ArticleTitle']
                        title = title.replace("<i>", "").replace("</i>", "")
                        title = mark_tag_text(title, synonyms, synonyms_target)
                        
                    else: 
                        title = ""
                    
                    if 'Abstract' in article:
                        abstract = article['Abstract']['AbstractText'][0]
                        abstract = abstract.replace("<i>", "").replace("</i>", "").replace("\n","")
                        abstract = mark_tag_text(abstract, synonyms, synonyms_target)
                    else:
                        abstract = ""

                    file.write(f'<h2>#{count} Id: {identifier} - Title: {title} - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                    file.write(f'Abstract: {abstract}')
                    file.write("<br>")
                    
                    if 'KeywordList' in publication['MedlineCitation']:
                        text_keywords = ', '.join(publication['MedlineCitation']['KeywordList'][0])
                        text_keywords = mark_tag_text(text_keywords, synonyms, synonyms_target)
                        keywords = "Keywords: "+text_keywords
                        file.write(keywords)
                        file.write("<br>")
                    else:
                        None

                except:
                    file.write(f'<h2>#{count} Id: {identifier} - Title: No disponible - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                    file.write(f'Abstract: No disponible')
                    file.write("<br>")

                count += 1

        if len(result["PubmedArticle"]) > 0:
            for publication in result["PubmedArticle"]:
                try:
                    article = publication['MedlineCitation']['Article']

                    identifier = publication['MedlineCitation']['PMID']

                    if 'ArticleTitle' in article:
                        title = article['ArticleTitle']
                        title = title.replace("<i>", "").replace("</i>", "")
                        title = mark_tag_text(title, synonyms, synonyms_target)
                        
                    else: 
                        title = ""
                    
                    if 'Abstract' in article:
                        abstract = article['Abstract']['AbstractText'][0]
                        abstract = abstract.replace("<i>", "").replace("</i>", "").replace("\n","")
                        abstract = mark_tag_text(abstract, synonyms, synonyms_target)
                    else:
                        abstract = ""

                    file.write(f'<h2>#{count} Id: {identifier} - Title: {title} - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/" target="_blank" ><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                    file.write(f'<div><b>Abstract:</b> {abstract}</div>')

                    medline_keys = list(publication['MedlineCitation'].keys())
                    
                    if 'KeywordList' in medline_keys:
                        if len(publication['MedlineCitation']['KeywordList']) > 0:
                            text_keywords = ', '.join(publication['MedlineCitation']['KeywordList'][0])
                            text_keywords = mark_tag_text(text_keywords, synonyms, synonyms_target)
                            text_keywords = text_keywords.replace("\n","")
                            keywords = "<div><b>Keywords:</b> "+text_keywords+"</div>"
                            file.write(keywords)
                    else:
                        None

                    if 'ChemicalList' in medline_keys:
                        if len(publication['MedlineCitation']['ChemicalList']) > 0:
                            registry_numbers_text = ', '.join([item['NameOfSubstance'] for item in publication['MedlineCitation']['ChemicalList']])
                            registry_numbers_text = mark_tag_text(registry_numbers_text, synonyms, synonyms_target)
                            registry_numbers_text = registry_numbers_text.replace("\n","")
                            registry_numbers = "<div><b>Registry numbers:</b> "+registry_numbers_text+"</div>"
                            file.write(registry_numbers)
                    else:
                        None
                    
                    if 'MeshHeadingList' in medline_keys:
                        if len(publication['MedlineCitation']['MeshHeadingList']) > 0:
                            meshterms_text = ', '.join([item['DescriptorName'] for item in publication['MedlineCitation']['MeshHeadingList']])
                            meshterms_text = mark_tag_text(meshterms_text, synonyms, synonyms_target)
                            meshterms_text = meshterms_text.replace("\n","")
                            meshterms = "<div><b>Mesh Terms:</b> "+meshterms_text+"</div>"
                            file.write(meshterms)
                    else:
                        None

                    file.write("<br>")
                
                except:
                    file.write(f'<h2>#{count} Id: {identifier} - Title: No disponible - <a href="https://pubmed.ncbi.nlm.nih.gov/{identifier}/" target="_blank"><span class="glyphicon glyphicon-new-window"></span></a></h2>')
                    file.write(f'Abstract: No disponible')
                    file.write("<br>")

                count += 1

    else:
        file.write("Sin resultados")

def get_id_pmc(querysearch):
    Entrez.email = "dummy@gmail.com"

    handle = Entrez.esearch(db="pmc", retmax=1000, term=querysearch)
    # handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    record = Entrez.read(handle)
    handle.close()

    pmc_id_list = record["IdList"]

    pmc_id = ["PMC"+item for item in pmc_id_list]

    return pmc_id

def get_id_pubmed(querysearch):

    Entrez.email = "dummy@gmail.com"

    handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    # handle = Entrez.esearch(db="pubmed", retmax=1000, term=querysearch)
    record = Entrez.read(handle)
    handle.close()

    pubmed_id = record["IdList"]

    return pubmed_id

def create_querysearch(synonyms, descendants):
    l1 = ['("'+item.replace('[','').replace(']','')+'"[Title/Abstract]) OR ("'+item.replace('[','').replace(']','')+'"[MeSH Terms]) OR ("'+item.replace('[','').replace(']','')+'"[EC/RN Number])' for item in synonyms if isinstance(item, str)]
    str_synonyms = " OR ".join(l1)

    l2 = ['("'+item.replace('[','').replace(']','')+'"[Title/Abstract]) OR ("'+item.replace('[','').replace(']','')+'"[MeSH Terms]) OR ("'+item.replace('[','').replace(']','')+'"[EC/RN Number])' for item in descendants if isinstance(item, str)]
    str_descendants = " OR ".join(l2)

    querysearch = "(("+str_synonyms+") AND ("+ str_descendants + "))"
    querysearch = querysearch.replace("%", "")

    return querysearch

def create_querysearch_fulltext(synonyms, descendants):
    l1 = ['("'+item.replace('[','').replace(']','')+'"[article])' for item in synonyms if isinstance(item, str)]
    str_synonyms = " OR ".join(l1)

    l2 = ['("'+item.replace('[','').replace(']','')+'"[article])' for item in descendants if isinstance(item, str)]
    str_descendants = " OR ".join(l2)

    querysearch = "(("+str_synonyms+") AND ("+ str_descendants + "))"
    querysearch = querysearch.replace("%", "")

    return querysearch

def match(**kwargs):

    ini = datetime.now()

    mode = int(kwargs['mode'])
    compound = kwargs['compound']
    target = kwargs['target']
    similarity = kwargs['similarity']
    db = str(kwargs['db'])
    ident = str(kwargs['ident'])


    f = open(f'../src/LDM/MainBundle/mr_toto/docs/data_{ident}.json')
    data = json.load(f)
    f.close()

    file = open(f"../src/LDM/MainBundle/mr_toto/docs/res_{ident}.txt", 'a')

    list_id_article = []
    synonyms_by_name_compound = data["synonyms_compound"]
    similarity_compound = data["compound_similarity"]
    synonyms_similarity_compound = data["synonyms_similar_compound"]
    related_records_compound = data["related_records"]
    synonyms_target = data["synonyms_target"]

    descendants_ncbi_target = data["synonyms_descendents"]
    synonyms_cell_line = data["synonyms_cell_line"]


    compound_list = []
    target_list = []
    querysearch = ""

    while(True):
        if mode > 12:
            break

        if mode == 1:
            file.write("<h1>Pubmed</h1>")
        elif mode == 7:
            file.write("<h1>PMC</h1>")

        if mode % 6 == 1: # 1-1
            # file.write("<button class='accordion'>1-1</button>")
            message = "<div class='margin_accordion'><button class='accordion'>1-1</button>"
            compound_list = [compound]
            target_list = [target]

        elif mode % 6 == 2: #sinonimos compuesto, incluir el compuesto?
            # file.write("<button class='accordion'>Sinonimos</button>")
            message = "<div class='margin_accordion'><button class='accordion'>Sinonimos</button>"
            compound_list = synonyms_by_name_compound
            target_list = [target]

        elif mode % 6 == 3: #taxonomia
            # file.write("<button class='accordion'>Taxonomia de blancos</button>")
            message = "<div class='margin_accordion'><button class='accordion'>Taxonomia de blancos</button>"
            compound_list = synonyms_by_name_compound
            target_list = descendants_ncbi_target

        elif mode % 6 == 4: #similitud
            # file.write("<button class='accordion'>Similitud</button>")
            message = "<div class='margin_accordion'><button class='accordion'>Similitud</button>"
            compound_list = similarity_compound
            target_list = list(set(descendants_ncbi_target) | set(synonyms_cell_line))

        elif mode % 6 == 5: #sinonimos de moleculas similares
            # file.write("<button class='accordion'>Sinonimos de moleculas similares</button>")
            message = "<div class='margin_accordion'><button class='accordion'>Sinonimos de moleculas similares</button>"
            compound_list = synonyms_similarity_compound
            target_list = list(set(descendants_ncbi_target) | set(synonyms_cell_line))

        elif mode % 6 == 0:#sinonimos de moleculas similares
            # file.write("<button class='accordion'>Moleculas relacionadas</button>")
            message = "<div class='margin_accordion'><button class='accordion'>Moleculas relacionadas</button>"
            compound_list = related_records_compound
            target_list = list(set(descendants_ncbi_target) | set(synonyms_cell_line))
        
        if len(compound_list) > 0 and len(target_list) > 0:
            if mode <= 6:
                querysearch = create_querysearch(compound_list, target_list)
            elif mode > 6 and mode <= 12:
                querysearch = create_querysearch_fulltext(compound_list, target_list)
            else:
                None

            list_id_article = []

            # print(mode)

            if mode <= 6:
                list_id_article = get_id_pubmed(querysearch)
                # print(f'pubmed: {len(list_id_article)}')
            else:
                list_id_article = get_id_pmc(querysearch)
                # print(f'pmc: {len(list_id_article)}')

            message_final = message.replace("</", f" (Results: {len(list_id_article)})</")
            file.write(message_final)
            file.write('<div class="panel_accordion"><button class="querysearch">Search Query</button>')
            file.write(f"<div style='display:none;'><p>{querysearch}</p></div>")

            if len(list_id_article) > 0:
                break
            else:
                file.write('</div></div>')
        else:
            message_final = message.replace("</", f" (Results: 0)</")
            file.write(message_final+'<div class="panel_accordion"><div>Sin Resultados</div></div></div>')
       
        mode += 1
        
    if mode <= 12:
        if mode <= 6:
            get_info_pubmed_text(compound_list, target_list, querysearch, mode, list_id_article, file)
            mode += 1
            file.write('</div></div>')
        else:
            get_info_pmc_text(compound_list, target_list, querysearch, mode, list_id_article, file)
            mode += 1
            file.write('</div></div>')
    else:
        file.write("No se encontraron resultados")

    file.close()
    time.sleep(10)

    print(mode)

# # https://getbootstrap.com/docs/4.2/components/spinners/
# # https://getbootstrap.com/docs/5.0/components/accordion/

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
    parser.add_argument("-i", "--ident",  default = "", help="Id data") 

    parser.add_argument('-v', '--version', action='version', version='IPre 1.0')

    args = parser.parse_args()

    match(mode = args.mode, compound = args.compound, target = args.target, similarity = args.similarity, db = args.db, ident = args.ident)

# python3 ../src/LDM/MainBundle/mr_toto/main.py -m '1' -c 'afimoxifene' -t '$antifungal' -s "100" -d '11' -i '6384fae8584a8'