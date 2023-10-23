<?php
function brSamoglasnika($w)
{
    $samoglasnici = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    $br = 0;
    if (is_numeric($w)) {
        return 0;
    }
    for ($i = 0; $i < strlen($w); $i++) {
        //echo $word[$i];
        if (in_array($w[$i], $samoglasnici)) {
            $br += 1;
        }
    }
    return $br;
}

function brSuglasnika($w)
{
    $samoglasnici = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    $br = 0;
    if (is_numeric($w)) {
        return 0;
    }
    for ($i = 0; $i < strlen($w); $i++) {
        if (!in_array($w[$i], $samoglasnici)) {
            $br += 1;
        }
    }
    return $br;
}
