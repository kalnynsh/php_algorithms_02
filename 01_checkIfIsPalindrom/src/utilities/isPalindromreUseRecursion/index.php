<?php

/** Check Palindrom using recursion */
function isPalindromreUseRecursion($string)
{
    $stringLength = strlen($string);
    echo 'We have : ' . $stringLength . ' chars<br>';
    echo 'Compare first: '
        . $string[0]
        . ' >< '
        . 'last: '
        . $string[$stringLength - 1] . ' chars<br><br>';

    // Check Base case
    if (3 > $stringLength) {
        return true;
    }

    if ($string[0] === $string[$stringLength - 1]) {
        $stringTrimmed = substr($string, 1, -1);

        isPalindromreUseRecursion($stringTrimmed);
    }

    return false;
}

print 'String: '
    . $palindrom01
    . ' is palindrom - '
    . (isPalindromreUseRecursion($palindrom01) ? 'true' : 'false')
    . '<br>';
