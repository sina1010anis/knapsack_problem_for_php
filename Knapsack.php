<?php 
// Dynamic programming
function my_knapsach($w, $n, $wi, $vi)
{
    $k = [[]];
    for ($i = 0 ; $i <= $n ; $i++) {
        for ($j = 0 ; $j <= $w ; $j++) {
            if ($i == 0 || $j == 0) {
                $k[$i][$j] = 0;
            }
            else if (@$wi[$i] <= $w) { // در این بخش در واقع داره برسی میکنه ایا وزن شی کوچکتر مساوی هست با ظرفیت کل کوله
                @$k[$i][$j] = max($k[$i - 1][$j], $k[$i - 1][$w - $wi[$i]]+$vi[$i]); // در این بخش داره یک مقدار جدید برای جدول میسازه میگه بیشترین مقدار رو انتخاب کن از دو مقدار 1)مقدار قبلی یعنی فقط برو روی محصول قبلی و همون موقعیت قبلی  2)و شی قبلی و وزن کل منفی وزن شی فعلی جمع بهش با ارش شی فعلی 
            }else {
                $k[$i][$j] = $k[$i-1][$j]; // در این بخش اگر وزن شی بیشتر از ظرفیت باشه میاد مقدار قبلی شی قبلی و در همان موقیت رو قرار میده
            }
        }
    }
    return $k[$n][$w].PHP_EOL;

    // while ($w>0 || $n>0) {
    //     if ($k[$n][$w] == $k[$n-1][$w]) {
    //         echo "{$n} ==> Not Seleced".PHP_EOL;
    //         $n--;
    //     }else{
    //         echo "{$n} ==> Seleced".PHP_EOL;
    //         $w = $w-$wi[$n];
    //         $n--;
    //     }
    // }
} 


// GA

function my_knapsach_2 ($w, $n, $wi, $vi) {
    $score = [];
    $vi_new = [];
    $total = 0;
    $ws = $w;
    //$number = 0;
    // Get Score
    for ($i = 0 ; $i <= $n-1 ; $i++) {
        $vi_new[$i]['score_out'] = $vi[$i] / $wi[$i];
        // $score[$i]['w'] =$wi[$i];
        //$vi_new[$i]['id'] = $i;
        $vi_new[$i]['score'] = $vi[$i];
        $vi_new[$i]['w'] =$wi[$i];
    }
    function sortByOrder($a, $b) {
        if ($a['score_out'] < $b['score_out']) {
            return 1;
        } elseif ($a['score_out'] > $b['score_out']) {
            return -1;
        }
        return 0;
    }
    //usort($score, 'sortByOrder', 'score');
    usort($vi_new, 'sortByOrder');

    
    for ($i = 0 ; $i < $n ; $i++) {
        if ($ws == 0) {
            break;
        }
        if ($vi_new[$i]['w'] <= $ws) {

            $total += $vi_new[$i]['score'];
            $ws -= $vi_new[$i]['w'];
        } else if ($vi_new[$i]['w'] > $ws) {
            $total += ((10 - (($vi_new[$i]['score'] * $ws) / $vi_new[$i]['w'])) / 10) * $vi_new[$i]['score'];
            $ws = 0;
        }

    }
    return $total; 
}
$w = 15;
$vi = [ 10, 5, 15, 7, 6, 18, 3];
$wi = [ 2, 3, 5, 7, 1, 4, 1];
echo 'GA => '.my_knapsach_2($w, count($vi), $wi, $vi);
echo PHP_EOL;
echo 'Dynamic => '. my_knapsach($w, count($vi), $wi, $vi);

