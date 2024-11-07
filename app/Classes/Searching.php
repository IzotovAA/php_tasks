<?php

declare(strict_types=1);

namespace Classes;

class Searching
{
    public function linearSearch(array $arr, int $item): int
    {
        $startTime = microtime(true);
        $result = -1;
        $count = 0;

        for ($i = 0; $i < count($arr); $i++) {
            $count++;

            if ($arr[$i] === $item) {
                $result = $i;
                break;
            }
        }

        echo 'Linear search count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Linear search passed time ' . $resultTime . '<br>';
        echo 'Linear search result: ' . ($result === -1 ? "search item $item not found<br><br>" : "search item $item was found on position $result<br><br>");

        return $result;
    }

    public function binarySearch(array $arr, int $item): int
    {
        $startTime = microtime(true);
        $result = -1;
        $count = 0;
        $lenght = count($arr);
        $left = 0;
        $right = $lenght - 1;
        $midle = (int) floor($right / 2);

        while ($left < $right) {
            $count++;

            if ($arr[$midle] === $item) {
                $result = $midle;
                break;
            } elseif (($right - $left) == 1) {
                break;
            } elseif ($arr[$midle] < $item) {
                $left = $midle;
                $midle = (int) floor(($right + $left) / 2);
            } elseif ($arr[$midle] > $item) {
                $arr = array_slice($arr, 0, $midle);
                $right = $midle;
                $midle = (int) floor(($right + $left) / 2);
            }
        }

        echo 'Binary search count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Binary search passed time ' . $resultTime . '<br>';
        echo 'Binary search result: ' . ($result === -1 ? "search item $item not found<br><br>" : "search item $item was found on position $result<br><br>");

        return $result;
    }
}
