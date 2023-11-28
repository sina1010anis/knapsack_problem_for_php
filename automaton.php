<?php
$p_s = 'ababaca';
$a_s = 'abc';
function automaton($p, $a)
{
    $v = [[]];
    for ($i = 1 ; $i <= strlen($p) ; $i++) {
        for ($j = 1 ; $j <= strlen($a) ; $j++) {
            $s = substr($p, 0, $i).$a[$j-1];
            $f = 0;
            for ($m = 1 ;$m<= strlen($s) ; $m++) {
                if (substr($s, -$m) == substr($p, 0, $m)) {
                    $f = $m;
                }
            }
            $v[$i][$j] = [$s => $f];
        }
    }
    return $v;
}
print_r(automaton($p_s, $a_s));