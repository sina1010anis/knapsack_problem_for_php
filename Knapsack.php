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
$p_item = array(2, 3, 5, 4, 1); 
$m_item = array(3, 4, 8, 5, 6); 
$m = 8; 
$n = count($p_item); 
echo 'DP: '.knapsack_DP($m, $m_item, $p_item, $n).PHP_EOL;

//////////////////////////////////

function sortItems($items)
{
    usort($items, function($a, $b) {
        if ($b[0] < $a[0]) {
            return 1;
        }
        return 0;
    });
    return $items;
}

function knapsack($m, $items) 
{ 
    $tools = sortItems($items);
    $i = count($tools)-1;
    $m_temp = $m;
    $sum_p = 0;
    for ($i ; $i >= 0 ; $i--) {
        if ($tools[$i][1] <= $m_temp) {
            $sum_p += $tools[$i][0];
            $m_temp -= $tools[$i][1];
        }
    }
    return $sum_p;
} 
// 0 => p
// 1 => m
$items = [[2, 3], [3, 4], [5,8], [4, 5], [1, 6]]; 
$m = 8; 
echo 'Normal: '.knapsack($m, $items);
