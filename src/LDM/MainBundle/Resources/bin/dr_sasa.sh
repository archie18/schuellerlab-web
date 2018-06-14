#!/bin/bash
#set -x
# USAGE
# sh dr_sasa.sh <dr_sasa_command_line> <zip_name> <python> <contactplot.py>
# <dr_sasa_command_line> - Complete command line to run dr_sasa
# <zip_name> - Name of the zip archive without extension
# <python> - Python 2.7 interpreter to run contactplot.py
# <contactplot.py> - Python script to generate contact map plots

# Print dr_sasa command passed as 1st argument to file (as info)
# But first we need to strip all path information, for security reasons
arr=($1) # Split into array
n='' # Empty string
for a in "${arr[@]}"; do n="$n ${a##*/}"; done # Loop over array, strip path from each element and join by space to new string
echo "$n" >command_line

# Run dr_sasa command passed as 1st argument
eval "$1" >out 2>err

# First line of output contains the full path of the input structure. We need to strip the path
sed -i '' '1s:.*/::' out

# Generate contact maps with contactplot.py
asa=$(find . -name '*.asa*')
tsvs=$(find . -name '*.by_atom.tsv' -not -name '*.matrix.*')
for tsv in $tsvs; do
    if [[ "$tsv" = *"LIGAND"* ]]; then
        mode=ligand-protein
    else
        mode=atom
    fi
    "$3" "$4" $mode "$tsv" "$asa" --skip-none-contact
done

# Create zip archive, name provided as 2nd argument
list=$(ls)
mkdir "$2"
mv $list "$2"
zip -r "${2}.zip" "$2"

# Create a file to flag that we are done
touch DONE
