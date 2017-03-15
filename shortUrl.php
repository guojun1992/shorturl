<?php

/**
test
* 十进制数转换成62进制
*
* @param integer $num
* @return string
*/
function from10_to62($num) {
    $to = 62; 
    $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ret = ''; 
    do {
        $ret = $dict[bcmod($num, $to)] . $ret;
        $num = bcdiv($num, $to);
    } while ($num > 0); 
    return $ret;
}
/**
* 62进制数转换成十进制数
*
* @param string $num
* @return string
*/
function from62_to10($num) {
    $from = 62; 
    $num = strval($num);
    $dict = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $len = strlen($num);
    $dec = 0;
    for($i = 0; $i < $len; $i++) {
        $pos = strpos($dict, $num[$i]);
        $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
    }   
    return $dec;
}
/**
	替换bcmath
**/

function cry62($n){
	$base = 62;  
	$index = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';  
	$ret = '';  
	for($t = floor(log10($n) / log10($base)); $t >= 0; $t --) {  
		$a = floor($n / pow($base, $t));  
		$ret .= substr($index, $a, 1);  
		$n -= $a * pow($base, $t);  
	}  
	return $ret;  
}
