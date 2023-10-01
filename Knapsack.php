<?php 
function my_knapsach($w, $n, $wi, $vi)
{
    $k = [[]];
    for ($i = 1 ; $i <= $n ; $i++) {
        for ($j = 1 ; $j <= $w ; $j++) {
            if ($wi[$i - 1] <= $w) {
                @$k[$i][$j] = max($k[$i - 1][$j], $k[$i - 1][$w - $wi[$i]]+$vi[$i]);
            }else {
                $k[$i][$j] = $k[$i-1][$j];
            }
        }
    }
    return $k[$n][$w];
} 

print_r(my_knapsach(50, 3, [10, 20, 30], [60, 100, 120]));
