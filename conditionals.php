<?php
declare(strict_types=1);

function example($a, $b)
{
    if ($a > $b) {
        if ($a > 0) {
            return $a;
        }
        return $b;
    } else {
        return $b;
    }
}
