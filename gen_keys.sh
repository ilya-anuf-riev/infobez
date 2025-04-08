N=4
for i in $(seq 1 $((N+3))); do
    for j in $(seq 1 $((N+3))); do
        if [ $i -ne $j ]; then
            openssl rand -base64 501 > "key_${N}_${i}_${j}.bin"
        fi
    done
done