<?php

declare(strict_types=1);

namespace Classes;

class Sorting
{
    public function quickSort(array $initialArr): array
    {
        $startTime = microtime(true);

        $resultArr = $this->quickSortUtility($initialArr);

        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Quick sort passed time ' . $resultTime . '<br><br>';

        return $resultArr;
    }

    private function quickSortUtility(array $initialArray): array
    {
        if (count($initialArray) < 2) {
            return $initialArray;
        }

        $pivot = floor(count($initialArray) / 2);
        $lenght = count($initialArray);
        $left = [];
        $right = [];

        for ($i = 0; $i < $lenght; $i++) {
            if ($i != $pivot) {
                if ($initialArray[$i] < $initialArray[$pivot]) {
                    $left[] = $initialArray[$i];
                } else {
                    $right[] = $initialArray[$i];
                }
            }
        }

        return [...$this->quickSortUtility($left), $initialArray[$pivot], ...$this->quickSortUtility($right)];
    }
}
