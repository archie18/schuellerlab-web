
echo ""
echo "creating binary FP2 file"
#for a in $(ls *.smi)
#do /home/rminho/openbabel-2.4.1/build/bin/babel ${a} ${a}.fpt -xh
#done
#/home/rminho/openbabel-2.4.1/build/bin/babel ${a} ${a}.fpt -xh 2>babel.err
/usr/local/bin/babel query.smi query.smi.fpt -xh 2>babel.err

echo ""
echo "transforming FP2 hexadeximal to binary" 
#for o in $(ls *.fpt)
#do
cat query.smi.fpt |grep -v 'Possible superstructure of' |grep -v '>' |paste -d '\0' - - - - - - |sed s/' '//g |tr "[a-z]" "[A-Z]" |sed s/0/0000/g |sed s/1/0001/g |sed s/2/0010/g |sed s/3/0011/g |sed s/4/0100/g |sed s/5/0101/g |sed s/6/0110/g |sed s/7/0111/g |sed s/8/1000/g |sed s/9/1001/g |sed s/A/1010/g |sed s/B/1011/g |sed s/C/1100/g |sed s/D/1101/g |sed s/E/1110/g |sed s/F/1111/g |sed 's/./& /g' > query.smi.fpt.bin
#done

echo "calculating the rectangular similarity matrix"
/Library/WebServer/Documents/schuellerlab-web/src/LDM/MainBundle/Resources/bin/tanmat2.macos -i /Library/WebServer/Documents/schuellerlab-web/src/LDM/MainBundle/Resources/bin/Chembl24_goldStd3_max.txt.smi.fpt.bin -j query.smi.fpt.bin -s " " -o matrix.tanmat

echo "running target prediction"
/Library/WebServer/Documents/schuellerlab-web/src/LDM/MainBundle/Resources/bin/targpredQuery.macos -x -t 4 -m matrix.tanmat -i /Library/WebServer/Documents/schuellerlab-web/src/LDM/MainBundle/Resources/bin/Chembl24_goldStd3_max.txt.co -j /Library/WebServer/Documents/schuellerlab-web/src/LDM/MainBundle/Resources/bin/query.txt.co > predictions.out 2>predictons.err

touch DONE