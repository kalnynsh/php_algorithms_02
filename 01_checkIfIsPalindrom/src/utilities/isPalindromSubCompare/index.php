<?php

$palindrom01 = 'saippuakauppias';

/** Check Palindrom using strrev and strcasecmp */
function isPalindromSubCompare($string)
{
    $reverString = strrev($string);

    if (strcasecmp($string, $reverString) === 0) {
        return true;
    } else {
        return false;
    }
}

print '<p>String: '
    . $palindrom01
    . ' is palindrom - '
    . (isPalindromSubCompare($palindrom01) ? 'true' : 'false')
    . '</p>';
