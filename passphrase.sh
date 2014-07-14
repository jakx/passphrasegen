
#!/bin/sh

WORDFILE="/home/jakx/webapps/passphrasegen/words.txt"
NUMWORDS=1
RANDOMNUMBER=`perl -e "print int rand(99999)"`

#Number of lines in $WORDFILE
tL=`awk 'NF!=0 {++c} END {print c}' $WORDFILE`

for i in `seq $NUMWORDS`
do
rnum=$((RANDOMNUMBER%$tL+1))
sed -n "$rnum p" $WORDFILE
RANDOMNUMBER=`perl -e "print int rand(99999)"`
done
