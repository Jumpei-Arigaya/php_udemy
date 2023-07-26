<?php
function varidation($request) // $_POSTの連想配列を受け取る
{
    $erros = [];

    if (empty($request['your_name'])) {
        $erros[] = '氏名は必須です';
    }

    return $erros;
}
