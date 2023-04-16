<?php

/**
 * True False function
 *
 * @param string $bool
 * @return void
 */

function isTrueFalse(string $bool): void
{
    if($bool == 0){
        echo "Non";
    } else if($bool == 1){
        echo "Oui";
    }
    exit;
}