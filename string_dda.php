<?php
$time_start = microtime(true); 

$t = 'در این مثال، با استفاده از تابع substr()، بخشی از رشته “Hello World” که شروع آن در جایگاه ششم قرار دارد و پنج حرف آن را شامل می‌شود، انتخاب شده است. در صورتی که مقدار طول را به عنوان پارامتر ورودی به تابع ندهید، تابع substr() تمام حروف باقی‌مانده را به عنوان خروجی برمی‌گرداند.';
$p = 'تابع';

function DDA($t, $p)
{
    $points = ['a' => 1, 'b' => 2, 'c' => 3];

    $temp_t = [];
    $temp_p = [];
    $sum_p = 0;

    $sum_temp = 0;

    $c = 0;

    $sucsses = [];
    for ($i = 0 ; $i <= strlen($t) - 1 ; $i++) {
        foreach ($points as $key => $val) {
            if ($t[$i] == $key) {
                $temp_t[] = $val;
            }
        }
    }
    for ($i = 0 ; $i <= strlen($p) - 1 ; $i++) {
        foreach ($points as $key => $val) {
            if ($p[$i] == $key) {
                $temp_p[] = $val;
                $sum_p += $val;
            }
        }
    }

    for ($i = 0 ; $i <= strlen($t) - strlen($p) ; $i++) {
        for ($j = 0 ; $j <= strlen($p) - 1 ; $j++) {
            @$sum_temp += $temp_t[$i + $j];
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
}
print_r(DDA($t, $p));

echo "\n------------------------------------------";
echo "\n Total execution time in seconds: " . (microtime(true) - $time_start).PHP_EOL;
echo "------------------------------------------\n\n";