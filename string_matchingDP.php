<?php
function stringMatchingDP($ref, $str) 
{

    $v = [[]];
    $ref = str_pad($ref, strlen($ref)+1, "0", STR_PAD_LEFT);
    $str = str_pad($str, strlen($str)+1, "0", STR_PAD_LEFT);

    for ($i = 0 ; $i <= strlen($str)-1 ; $i++) {
        for ($j = 0 ; $j <= strlen($ref) - 1 ; $j++) {
            //echo $ref[$j] . PHP_EOL;

            if ($str[$i] == '0' and $ref[$j] == '0') {
                $v[$i][$j] = 0;
            } else if ($str[$i] == '0' and $ref[$j] != '0') {
                $v[$i][$j] = $j;
            } else if ($str[$i] != '0' and $ref[$j] == '0') {
                $v[$i][$j] = $i;
            } else {
                $TSS = ($ref[$j] == $str[$i]) ? $v[$i-1][$j-1] : $v[$i-1][$j-1]+1 ;
                $v[$i][$j] = min($v[$i-1][$j]+1, $v[$i][$j-1]+1, $TSS);
            }

        }
    }

    echo $v[strlen($str)-1][strlen($ref)-1];
}
$ref = 'abbc';
$str = 'cabac';
return stringMatchingDP($ref, $str);