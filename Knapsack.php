<?php 
function knapsack_DP($m, $m_item, $p_item, $n) 
{ 
    $V = [[]]; 
    for ($i = 0; $i <= $n; $i++) 
    { 
        for ($w = 0; $w <= $m; $w++) 
        { 
            if ($i == 0 || $w == 0){

                $V[$i][$w] = 0; 

            } else if ($m_item[$i - 1] <= $w) {

                $V[$i][$w] = max($V[$i - 1][$w], $V[$i - 1][$w - $m_item[$i - 1]] +  $p_item[$i - 1]); 

            } else {

                $V[$i][$w] = $V[$i - 1][$w]; 

            }
        } 
    } 
    return $V[$n][$m]; 
} 
$p_item = array(2, 3, 4, 1); 
$m_item = array(3, 4, 5, 6); 
$m = 8; 
$n = count($p_item); 
echo knapsack_DP($m, $m_item, $p_item, $n); 

