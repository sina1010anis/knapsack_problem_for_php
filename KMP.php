<?php

$p = 'abababb';

$kmp = [0, 0];

for ($i = 2 ; $i <= strlen($p) ; $i++) {

    $s = substr($p, 0, $i);
    $kmp[$i] = 0;

    $j = $i-1;
    while ($j >= 0) {

        $s_temp = substr($s, 0, $j);
        $s_rev = substr($s, -strlen($s_temp));

        if ($s_temp == $s_rev) {
            $kmp[$i] = $j;
            break;
        }
        
        $j--;

    }
    
}

print_r($kmp);
