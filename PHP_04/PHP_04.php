<?php 

function getOddNumbers(int $start, int $end): array {
    $result = [];

    for ($start; $start <= $end; $start++) { 
        if ($start % 2 != 0) {
            array_push($result,$start);
        }
    }

    return $result;
}

echo "Angka Ganjil Nya : " . implode(",",getOddNumbers(1,10));