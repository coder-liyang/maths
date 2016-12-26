<?php
/**
 * Created by PhpStorm.
 * User: liyang
 * Date: 2016/12/20
 * Time: 下午9:49
 */

namespace Kaopur;


class Maths
{

    /**
     * @var array 内部临时保存结果的属性
     */
    private static $_result;

    /**
     * @var string|int|array 内部使用的临时变量
     */
    private static $_tmp;

    /**
     * 排列数
     *      n
     *    P
     *      m
     * @param $n
     * @param $m
     * @return bool|int
     */
    public static function p($n, $m)
    {
        if($n < $m) {
            return false;
        }
        $num = 1;
        for($i=0; $i<$m; $i++){
            $num = $num * ($n-$i);
        }
        return $num;
    }

    /**
     * 排列枚举算法
     * 示例:
     * $array = [1,2,3,4,5];
     *  $permutation = \Kaopur\Maths::permutation($array, 2);
     *  print_r($permutation);
     * @param array $arr 待排列值的组合
     * @param int $len 排列的长度
     * @return array
     */
    public static function permutation($arr, $len)
    {
        self::$_result = array();
        return self::_permutation($arr, $len);
    }

    /**
     * 排列permutation的辅助方法
     * @param $arr
     * @param $len
     * @return array
     */
    private static function _permutation($arr, $len)
    {
        $arr_len = count($arr);
        if ($len == 0) {
            self::$_result[] = self::$_tmp;
        } else {
            for ($i=0; $i<$arr_len; $i++) {
                $tmp = array_shift($arr);
                self::$_tmp[] = $tmp;
                self::_permutation($arr, $len-1);
                self::$_tmp = array();
                array_push($arr, $tmp);
            }
        }
        return self::$_result;
    }

    /**
     * 组合数
     *      n
     *    C
     *      m
     * @param $n
     * @param $m
     * @return bool|float|int
     */
    public static function c($n, $m)
    {
        if($n < $m) {
            return false;
        }
        return self::p($n,$m)/self::p($m,$m);
    }


    /**
     * 组合枚举算法
     * 示例:
     * $array = [1,2,3,4,5];
     *  $permutation = \Kaopur\Maths::combination($array, 2);
     *  print_r($permutation);
     * @param array $arr 待排列值的组合
     * @param int $len 排列的长度
     * @return array
     */
    public static function combination($arr, $len)
    {
        self::$_result = array();
        return self::_combination($arr, $len);
    }

    /**
     * 组合combination的辅助方法
     * @param $arr
     * @param $len
     * @param array $item
     * @return array
     */
    private static function _combination($arr, $len, $item = array())
    {
        $arr_len = count($arr);
        if($len == 0){
            self::$_result[] = $item;
        }else{
            for($i=0; $i<$arr_len-$len+1; $i++){
                $tmp = array_shift($arr);
                self::_combination($arr, $len-1, array_merge($item, array($tmp)));
            }
        }
        return self::$_result;
    }

    /**
     * 找到一定范围内的质数/素数
     * @param int $max 质数范围
     * @return array
     */
    public static function primeNumber($max)
    {
        $max = (int)$max;
        $result = array();
        $i = 1;
        do{
            $k = 0;
            $i++;
            $j = 1;
            do {
                $j++;
                if ($i%$j == 0) {
                    $k++;
                }
            } while ($j < $i);
            if ($k == 1) {
                $result[] = $i;
            }
        } while ($i < $max);
        return $result;
    }

    /**
     * 检查一个数是否是质数
     * @param $number
     * @return bool
     */
    public static function isPrimeNumber($number)
    {
        for ($i=2; $i<$number; $i++) {
            if ($number%$i == 0) {
                return false;
            }
        }
        return true;
    }
}