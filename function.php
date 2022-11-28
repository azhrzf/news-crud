<?php

function rgbRandom()
{
    $yakRanFirst = rand(0, 255);
    $yakRanSecond = rand(0, 255);
    $yakRanThird = rand(0, 255);
    return "$yakRanFirst, $yakRanSecond, $yakRanThird";
}

