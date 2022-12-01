from Bio import Entrez
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
from threading import Thread

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
    global synonyms_smiles
    result_pubchem = synonyms_pubchem_smiles(smiles)
    result_chembl = synonyms_chembl_smiles(smiles)

    if len(result_chembl) > 0 and len(result_pubchem) > 0:
        synonyms = list(set(result_chembl) | set(result_pubchem))
    elif len(result_chembl) > 0 and len(result_pubchem) == 0:
        synonyms = result_chembl
    elif len(result_chembl) == 0 and len(result_pubchem) > 0:
        synonyms = result_pubchem
    else:
        synonyms = []

    synonyms_smiles = synonyms


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

def get_synonyms_by_name(name):
    global synonyms_name
    result_pubchem = synonyms_pubchem_name(name)
    result_chembl = synonyms_chembl_name(name)

    synonyms_name = list(set(result_chembl) | set(result_pubchem))

def get_data_compound(name_smiles):
    cid = ""
    name = name_smiles
    name_or_smiles = "name"
    smiles = ""
    try:
        ret = get_compounds(name_smiles, 'smiles')
        cid = ret[0].cid
        name = ret[0].name
        smiles = name_or_smiles
        name_or_smiles = "smiles"
    except:
        None

    try:
        if cid == "":
            ret = get_compounds(name_smiles, 'name')
            cid = ret[0].cid
            smiles = ret[0].canonical_smiles
            name_or_smiles = "smiles"
        else:
            None
    except:
        None

    return name_or_smiles, name, cid, smiles

def find_similar_compound(smiles_compound, num_similarity):
    global similar_compound
    if num_similarity == 100:
        try:
            similarity = new_client.similarity
            res = similarity.filter(smiles=smiles_compound, similarity=num_similarity).only('pref_name')
            similar_compound = [item['pref_name'].lower() for item in res if type(item['pref_name']) != type(None)]
            similar_compound = list(set(similar_compound))
        except:
            similar_compound = []

        try:
            ret = get_compounds(smiles_compound, 'smiles', searchtype='similarity')
            for item in ret:
                similar_compound += item.synonyms
            similar_compound = list(set(similar_compound))
        except:
            None
    else:
        similar_compound = []

def get_synonyms_similar_compounds(list_similar):
    synonyms_similar_compound = []
    if len(list_similar) > 0:
        try:
            for item in list_similar:
                synonyms_similar_compound += get_synonyms_by_name(item)
        except:
            None
    return synonyms_similar_compound    

def get_related_records(cid_number):
    global related_records
    try:
        href_1 = 'https://pubchem.ncbi.nlm.nih.gov/sdq/sdqagent.cgi?infmt=json&outfmt=json&query={"download":"cmpdname","collection":"compound","where":{"ands":[{"cid":"'
        href_2 = '"},{"relatedidtype":"cidneighbor"}]},"order":["cid,asc"],"start":1,"limit":10000000,"downloadfilename":"CID_'
        href_3 = '_compound"}'
        href = f'{href_1}{cid_number}{href_2}{cid_number}{href_3}'
        req = requests.get(href)

        res = str(req.content, 'UTF-8').replace("}\n\t{", "},\n\t{")
        res = res[:res.index("}\n]")+3]
        data = json.loads(res)

        related_records = [item["cmpdname"] for item in data if isinstance(item["cmpdname"], str)]
    except:
        related_records = []


def get_descendants_ncbi(name):
    global synonyms_descendants
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

    synonyms_descendants = list(get_descendants)

def find_synonym_target(name):
    global synonyms_target
    try:
        target = new_client.target
        gene_name = name
        res = target.filter(target_synonym__icontains=gene_name).only(["pref_name", "target_components"])

        synonyms_target = []
        for j in range(len(res)):
            synonyms_target += [i["component_synonym"].lower() for i in res[j]["target_components"][0]["target_component_synonyms"]]
            synonyms_target.append(res[j]["pref_name"])
    except:
        synonyms_target = []
    

def find_synonym_cell_line(name):
    global synonyms_cell_line
    cell_line = new_client.cell_line
    res = cell_line.filter(cell_name__icontains=name)
    synonyms_cell_line = [i["cell_name"].lower for i in res]

def generate_data_threading(compound, target, similarity, ident):
    name_or_smiles, name, cid, smiles = get_data_compound(compound)

    # if name_or_smiles == "smiles":
    t1a = Thread(target=get_synonyms_by_smiles, args=(smiles,))
    # synonyms_compound = synonyms_smiles
    # if name_or_smiles == "name":
    t1b = Thread(target=get_synonyms_by_name, args=(name,))
    # synonyms_compound = synonyms_name
    t2 = Thread(target=find_similar_compound, args=(smiles, similarity))
    t3 = Thread(target=find_synonym_target, args=(target,))
    t4 = Thread(target=get_related_records, args=(cid,))

    t5 = Thread(target=get_descendants_ncbi, args=(target,))
    t6 = Thread(target=find_synonym_cell_line, args=(target,))
 
    t1a.start()
    t1b.start()
    t2.start()
    t3.start()
    t4.start()
    t5.start()
    t6.start()
 
    t1a.join()
    t1b.join()
    t2.join()
    t3.join()
    t4.join()
    t5.join()
    t6.join()

    synonyms_similar_compound = get_synonyms_similar_compounds(similar_compound)

    data_dict = {
        "synonyms_compound": list(set(synonyms_name) | set(synonyms_smiles)),
        "compound_similarity": similar_compound,
        "synonyms_similar_compound": list(set(synonyms_similar_compound)),
        "synonyms_descendents": synonyms_descendants,
        "related_records": related_records,
        "synonyms_target":synonyms_target, 
        "synonyms_cell_line": synonyms_cell_line
        }

    json_string = json.dumps(data_dict)
    json_file = open(f"../src/LDM/MainBundle/mr_toto/docs/data_{ident}.json", "w")
    json_file.write(json_string)
    json_file.close()

if __name__ == "__main__":
    parser = argparse.ArgumentParser()

    parser = argparse.ArgumentParser(formatter_class=argparse.RawDescriptionHelpFormatter, 
    description=
    '''Description:
    This tool allows extracting information regarding the bioactivity of 
    chemical compounds and drugs from biomedical publications contained 
    in the PubMed bibliographic system.'''
    )

    parser.add_argument("-c", "--compound", default = "", help="Name or smiles compound")
    parser.add_argument("-t", "--target", default = "", help="Target name")
    parser.add_argument("-s", "--similarity",  default = 70, help="Similarity percent")
    parser.add_argument("-i", "--ident",  default = "", help="Id data") 

    parser.add_argument('-v', '--version', action='version', version='IPre 1.0')

    args = parser.parse_args()

    generate_data_threading(args.compound, args.target, args.similarity, args.ident)

# python3 func_threading.py -c 'afimoxifene' -t 'factor xa' -s 99 -i 'qweqweqwe'
