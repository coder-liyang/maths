<?php
/**
 * Created by PhpStorm.
 * User: liyang
 * Date: 2016/12/20
 * Time: 下午9:43
 */
include '../vendor/autoload.php';
$array = [1,2,3];

echo '<pre>';

$value = \Kaopur\Machs::c(3,2);
var_dump($value);

$value = \Kaopur\Machs::combination($array, 2);
var_dump($value);

$value = \Kaopur\Machs::p(3,2);
var_dump($value);

$value = \Kaopur\Machs::permutation($array, 2);
var_dump($value);
