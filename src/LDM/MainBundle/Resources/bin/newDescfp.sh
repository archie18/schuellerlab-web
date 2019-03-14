
echo ""
echo "creating binary FP2 file"
for a in $(ls *.smi)
do /home/rminho/openbabel-2.4.1/build/bin/babel ${a} ${a}.fpt -xh
done

echo ""
echo "transforming FP2 hexadeximal to binary" 
for o in $(ls *.fpt)
do 
time cat $o |grep -v 'Possible superstructure of' |grep -v '>' |paste -d '' - - - - - - |sed s/' '//g |tr "[a-z]" "[A-Z]" |sed s/0/0000/g |sed s/1/0001/g |sed s/2/0010/g |sed s/3/0011/g |sed s/4/0100/g |sed s/5/0101/g |sed s/6/0110/g |sed s/7/0111/g |sed s/8/1000/g |sed s/9/1001/g |sed s/A/1010/g |sed s/B/1011/g |sed s/C/1100/g |sed s/D/1101/g |sed s/E/1110/g |sed s/F/1111/g |sed 's/./& /g' > ${o}.bin
done
