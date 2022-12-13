#!/bin/bash
#set -x
# USAGE
# sh dr_sasa.sh <dr_sasa_command_line> <zip_name> <python> <contactplot.py> <matrix_cutter.py>
# <dr_sasa_command_line> - Complete command line to run dr_sasa
# <zip_name> - Name of the zip archive without extension
# <python> - Python 2.7 interpreter to run contactplot.py
# <contactplot.py> - Python script to generate contact map plots
# <matrix_cutter.py> - Python script to remove all-zero rows&columns

# Print dr_sasa command passed as 1st argument to file (as info)
# But first we need to strip all path information, for security reasons
arr=($1) # Split into array
n='' # Empty string
for a in "${arr[@]}"; do n="$n ${a##*/}"; done # Loop over array, strip path from each element and join by space to new string
echo "$n" >command_line

# Run dr_sasa command passed as 1st argument
eval "$1" >out 2>err

# Second line of output contains the full path of the input structure. We need to strip the path
sed -i '' '2s:.*/::' out

# Generate contact maps with contactplot.py
atmasa=$(find . -name '*.atmasa')
tsvs=$(find . -name '*.tsv' -not -name '*.matrix.*')
for tsv in $tsvs; do
    if [[ "$tsv" = *"LIGAND"*".by_atom."* ]]; then
        mode=protein-ligand
    elif [[ "$tsv" = *".by_atom."* ]]; then
        continue # Skip by_atom plots. They are less useful
        mode=atom
    elif [[ "$tsv" = *".by_res."* ]]; then
        mode=residue
    fi
    "$3" "$4" $mode "$tsv" "$atmasa" --skip-non-contact >>out 2>>err
done

# Process .tsv files with matrix_cutter.py to remove all-zero rows & columns
for tsv in $tsvs; do
    "$3" "$5" "$tsv"
done

# Create zip archive, name provided as 2nd argument
list=$(ls)
mkdir "$2"
mv $list "$2"
zip -r "${2}.zip" "$2"

# Create a file to flag that we are done
touch DONE
