<?php
namespace app\helpers;

class FormatHelper
{
    public static function secondsToHMS($seconds)
    {
        $h = floor($seconds / 3600);
        $m = floor(($seconds - ($h*3600)) / 60);
        $s = floor($seconds % 60);
        return [
            'h' => $h,
            'm' => $m,
            's' => $s
        ];
    }
}
