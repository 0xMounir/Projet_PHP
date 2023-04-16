<?php

/**
 * Redirect function
 *
 * @param string $url
 * @return void
 */

function redirect(string $url): void
{
    header("Location:$url");
    exit;
}