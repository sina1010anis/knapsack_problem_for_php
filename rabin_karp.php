<?php 
$text = 'در این مثال، با استفاده از تابع substr()، بخشی از رشته “Hello World” که شروع آن در جایگاه ششم قرار دارد و پنج حرف آن را شامل می‌شود، انتخاب شده است. در صورتی که مقدار طول را به عنوان پارامتر ورودی به تابع ندهید، تابع substr() تمام حروف باقی‌مانده را به عنوان خروجی برمی‌گرداند.';
$pattern = 'تابع';
function rabinKarp($t, $s) : array
{
    $i = 0;
    $h = [];
    $hs = md5($s);
    $search = [];
    $k = 0;
    while ($i <= strlen($t)-strlen($s)) {
        $hash = md5(substr($t, $i, strlen($s)));
        $h[0] = $hash;
        if ($hash == $hs) {
            $search[$k] = $i;
            $k++;
        }
        $i++;
    }
    return $search;
}
print_r(rabinKarp($text, $pattern));