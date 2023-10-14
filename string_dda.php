<?php

$t = 'abcababcabc';
$p = 'abc';

$points = ['a' => 1, 'b' => 2, 'c' => 3];

$temp_t = [];
$temp_p = [];
$sum_p = 0;

$sum_temp = 0;

$c = 0;

$sucsses = [];
for ($i = 0 ; $i <= strlen($t)-1 ; $i++) {
    foreach ($points as $key => $val) {
        if ($t[$i] == $key) {
            $temp_t[] = $val;
        }
    }
}
for ($i = 0 ; $i <= strlen($p)-1 ; $i++) {
    foreach ($points as $key => $val) {
        if ($p[$i] == $key) {
            $temp_p[] = $val;
            $sum_p += $val;
        }
    }
}

for ($i = 0 ; $i <= strlen($t) - strlen($p) ; $i++) {
    for ($j = 0 ; $j <= strlen($p)-1 ; $j++) {
        $sum_temp += $temp_t[$i+$j];
        //echo $temp_t[$i+$j].', ';
    }
    if ($sum_temp == $sum_p) {
        $temp = substr($t, $i, strlen($p));
        if ($temp == $p) {
            $sucsses[] = $i;
        }
    }
    $sum_temp = 0;
}

print_r($sucsses);