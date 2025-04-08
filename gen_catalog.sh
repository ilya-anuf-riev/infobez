N=4
for i in $(seq 1 $((N+3))); do
  mkdir -p "абонент_$i"
  cp key_${N}_${i}_*.bin "абонент_$i/"
done
