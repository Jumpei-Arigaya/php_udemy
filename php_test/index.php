<?php
// echo ('こちらはphpです！');
// echo (123);
// echo ('こんにちは');
// コメント
// あ
// ああ
// あああ

/*
aaa
aaaa
*/

// int 数字
// string 文字列

// 変数
$test = 123;
$test = 'test';
// echo $test;
// var_dump(($test));
$test = 456;


// 先頭は英文字かアンダースコア
// $123 = 123　NG
// 結合は .
// 変数を結合したら文字列に変換される
$test_1 = 123;
$test_2 = 456;
$test_3 =  $test_1 . $test_2;
// var_dump($test_3);

// 定数
// constant

const MAX = 'テスト';
// echo MAX;
// var_dump(MAX);


// 配列
$array = ['あああ', 2, 3,];
$array_2 = [
    ["赤", "青", "黄", "黒"],
    ["赤", "青", "黄", "黒"],
    ["紫", "青", "黄", "黒"],
    ["紫", "青", "黄", "黒"],
    ["紫", "青", "黄", "黒"],
];
// echo $array[0];
echo '<pre>';
// var_dump(($array));
// var_dump($array_2);
echo '</pre>';
// echo $array_2[2][0];


// 連想配列
$array_member = [
    'name' => 'ホンダ',
    'height' => 170,
    "body" => 'サッカー'
];

// echo $array_member['name'];
echo '<pre>';
// var_dump($array_member);
echo '</pre>';

$array_member_2 = [
    '本田' => [
        'height' => 165,
        'hobby' => 'サッカー'
    ],
    '香川' => [
        'height' => 165,
        'hobby' => 'サッカー'
    ],
    '乾' => [
        'height' => 165,
        'hobby' => 'サッカー'
    ],

];
echo '<pre>';
// var_dump($array_member_2);
echo '</pre>';

$array_member_3 = [
    'class_1' => [
        '本田' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '香川' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '乾' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
    ],
    'class_2' => [
        '本田' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '香川' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '乾' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
    ],
    'class_3' => [
        '本田' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '香川' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
        '乾' => [
            'height' => 165,
            'hobby' => 'サッカー'
        ],
    ]

];
// echo '<pre>';
// var_dump($array_member_3);
// echo '</pre>';
// echo $array_member_3["class_1"]["香川"]["hobby"];

// 演算子

$test_10 = 10;
$test_11 = 11;

$test_12 = $test_10 % $test_11;
// echo $test_12;

// 条件分岐
// === で型チェック

$height = 90;

if ($height <= 90) {
    echo '身長は' . $height . 'cmです';
} else {
    echo '身長は' . $height . 'cmではありません';
}

echo '<br>';

if ($height !== 90) {
    echo '身長は90cmではありません';
}

echo '<br>';

$signal = 'red';

if ($signal === 'red') {
    echo '止まれ';
} else if ($signal === 'yellow') {
    echo '一旦停止';
} else {
    echo '進め';
}

echo '<br>';

$test13 = 'あああ';
if (empty($test13)) {
    echo '変数は空です';
} else {
    echo '変数は空ではありません';
}

echo '<br>';

if (!empty($test13)) {
    echo '変数は空ではありません';
}

// ANDとOR
$signal_1 = 'red';
$signal_2 = 'blue';

echo '<br>';

if ($signal_1 === 'red' && $signal_2 === 'blue') {
    echo '赤と青です';
}

echo '<br>';

if ($signal_1 === 'red' || $signal_2 === 'blue') {
    echo '赤か青です';
}

echo '<br>';

// 三項演算子

$math = 81;

$comment = $math > 80 ? 'good' : 'not good';

echo $comment;

echo '<br>';

// forEach

$members_2 = [
    '本田' =>
    [
        'height' => '170',
        'hobby' => 'サッカー',
    ],
    '香川' =>
    [
        'height' => '10',
        'hobby' => 'カー',
    ]
];

// foreach ($members as $key => $value) {
//     echo $key . ':';
//     echo $value;
// }

echo '<br>';

foreach ($members_2 as $member => $val) {
    echo '名前は' . $member . '!!';
    foreach ($val as $key => $value) {
        echo $key . 'は' . $value . 'です';
    }
    echo '<br>';
}

// 繰り返し
for ($i = 0; $i < 10; $i++) {
    if ($i === 5) {
        // break;
        continue;
    }
    echo '<pre>';
    echo $i;
    echo '</pre>';
}

$j = 0;

while ($j < 5) {
    echo $j;
    $j++;
}

do {
    echo $j;
} while ($j < 5);

echo '<br>';

// switch
// 型チェックする場合は正確に記述必要

$data = 2;
switch ($data) {
    case $data === 1:
        echo 1;
        break;
    case $data === 2:
        echo 1;
        break;
    case $data === 3:
        echo 1;
        break;
}

echo '<br>';

// カスタム関数

function test()
{
    echo 'test';
}

test();

echo '<br>';

$comment = 'コメント2';
function getComment($string)
{
    echo $string;
}

getComment($comment);

echo '<br>';

function getNumberOfComment()
{
    return 5;
}

$commentNumber = getNumberOfComment();

var_dump($commentNumber);

echo '<br>';

function sumPrice($int1, $int2)
{
    $int3 = $int1 + $int2;
    return $int3;
}

var_dump(sumPrice(4, 3));

echo '<br>';

// 文字列の長さ
// マルチバイト 日本語UTF-8 3-6バイト
$text = 'あいうえお';
echo strlen($text);
echo '<br>';
echo mb_strlen($text);

echo '<br>';

// 文字列の置換
$str = '文字列を置換します';
echo str_replace('置換', 'ちかん', $str);

echo '<br>';

// 指定文字列で分割
$str_2 = '指定文字列で、分割します';
echo '<pre>';
var_dump(explode('、', $str_2));
echo '</pre>';

echo '<br>';

// imporove

// 正規表現
$str_3 = "特定の文字列が含まれるか確認する";

echo preg_match('/文字列/', $str_3);

// 指定文字列から文字列を取得する
echo mb_substr('あいうえお', 1);

// 配列に配列を追加する
$array = ['りんご', 'みかん'];

array_push($array, 'きゅうり', 'なす');
echo '<pre>';
var_dump($array);
echo '<pre>';

// camelCase
$postalCode = '123-4567';
function checkPostalCode($str)
{
    $replacted = str_replace('-', '', $str);
    var_dump($replacted);
    $length = strlen($replacted);

    if ($length === 7) {
        return true;
    }
    return false;
}

var_dump(checkPostalCode($postalCode));

echo '<br>';

// スコープ
$globalVariable = 'グローバル変数です';

function checkScope($str)
{
    $localVariable = 'ローカル変数です';
    echo $str;
}

echo $globalVariable;

echo '<br>';

checkScope($globalVariable);

echo '<br>';

require __DIR__ . '/common/common.php';
echo $commonVariavle;

echo '<br>';

commonTest();

echo '<br>';

echo __FILE__;
