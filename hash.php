<?php

function toReturn($value)
{
    echo json_encode($value);
    die;
}

function stringToInt($str)
{
    $sum = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $sum += ord($str[$i]);
    }
    return $sum;
}

if (!isset($_GET['name'])) {
    toReturn([
        '机智' => 0,
        '蠢' => 0,
    ]);
}

$name = strtolower($_GET['name']);

if (in_array($name, ['h', ['h', '小h']])) {
    $val = 100;
} else {
    $val = stringToInt(sha1($name)) % 101;
}

if ($val > 85) {
    $val = 100;
} else if ($val < 15) {
    $val = 0;
}

toReturn([
    '机智' => $val,
    '蠢' => 100 - $val,
]);
