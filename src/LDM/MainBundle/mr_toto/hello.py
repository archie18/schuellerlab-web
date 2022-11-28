from types import NoneType
from Bio import Entrez
from pubchempy import Compound, get_compounds
from chembl_webresource_client.new_client import new_client
from ete3 import NCBITaxa
import pubchempy as pcp
import string
import argparse
import requests
import json
from metapub import PubMedFetcher
import re
from datetime import datetime
import sys

def get_info_pmc_text(pmc_id, file):
    if len(pmc_id) >= 1:
        for identifier in pmc_id:

            try:
                fetch = PubMedFetcher()
                article_metadata = fetch.article_by_pmcid(identifier)
                content = article_metadata.text
                abstract = article_metadata.abstract
                abstract = abstract.replace("\n", "")
                title = article_metadata.title
                file.write(f'<h2>Id: {identifier} - Title: {title} - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/">[Link]</a></h2>')
                file.write(f'Abstract: {abstract}')
                file.write(f'Content: {content}')
                file.write("<br>")

            except:
                file.write(f'<h2>Id: {identifier} - <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/{identifier}/">[Link]</a></h2>')

    else:
        file.write("Sin resultados")

if __name__ == "__main__":
    file = open(f"test.txt", 'a')

    get_info_pmc_text(['PMC3349292'], file)

    file.close
