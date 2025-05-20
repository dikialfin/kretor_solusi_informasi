<?php 

$array = [790,483,281,224,483,60,698,483,790,168];

function getDuplicateNumber(array $data) : array {
    $result = []; 
    
    for ($selectedNumber=0; $selectedNumber < count($data); $selectedNumber++) { 
        for ($nearbyNumber=0; $nearbyNumber < count($data); $nearbyNumber++) { 
            if (
                $selectedNumber !== $nearbyNumber && 
                $data[$selectedNumber] == $data[$nearbyNumber] &&
                !in_array($data[$nearbyNumber],$result)
            ) {
                array_push($result,$data[$nearbyNumber]);
            }
        }
    }

    return $result;
} 

echo "Angka Duplikat Nya : " . implode(",",getDuplicateNumber($dataTest));