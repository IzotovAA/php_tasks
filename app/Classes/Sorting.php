<?php

declare(strict_types=1);

namespace Classes;

class Sorting
{
    public function bubleSort(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {
            for ($j = 1; $j < $length - $i; $j++) {
                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }

            $count++;
        }

        echo 'Buble sort count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Buble sort passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function bubleSortImproved(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {
            $replaceFlag = false;

            for ($j = 1; $j < $length - $i; $j++) {
                if ($arr[$j - 1] > $arr[$j]) {
                    $temp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $temp;
                    $replaceFlag = true;
                }
            }

            $count++;

            if ($replaceFlag === false) {
                break;
            }
        }

        echo 'Buble sort improved count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Buble sort improved passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function selectionSort(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $count = 0;

        for ($i = 0; $i < $length - 1; $i++) {
            $minElementIndex = $i;

            for ($j = $i + 1; $j < $length; $j++) {
                if ($arr[$j] < $arr[$minElementIndex]) {
                    $minElementIndex = $j;
                }
            }           

            if ($minElementIndex !== $i) {            
                $temp = $arr[$minElementIndex];
                $arr[$minElementIndex] = $arr[$i];
                $arr[$i] = $temp;
            }

            $count++;
        }

        echo 'Selection sort count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Selection sort passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

    public function selectionSortImproved(array $arr): array
    {
        $startTime = microtime(true);
        $length = count($arr);
        $limit = $length / 2;
        $count = 0;
        $last = $length - 1;

        for ($i = 0; $i < $limit; $i++) {
            $minElementIndex = $i;
            $maxElementIndex = $last - $i;
            $lastMaxElementPosition = $last - $i;

            for ($j = $i; $j < $last; $j++) {                
                if ($arr[$j + 1] < $arr[$minElementIndex]) {
                    $minElementIndex = $j + 1;
                }

                if ($i < $limit && $arr[$last - $j] > $arr[$maxElementIndex]) {
                    $maxElementIndex = $last - $j;
                }
            }

            $tempMin = $arr[$minElementIndex];
            $tempMax = $arr[$maxElementIndex];
            $arr[$minElementIndex] = $arr[$i];
            $arr[$maxElementIndex] = $arr[$lastMaxElementPosition];
            $arr[$i] = $tempMin;
            $arr[$lastMaxElementPosition] = $tempMax;
            $count++;
        }

        echo 'Selection sort improved count = ' . $count . '<br>';
        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Selection sort improved passed time ' . $resultTime . '<br><br>';

        return $arr;
    }

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

    public function mergeSort(array $initialArray): array
    {
        $startTime = microtime(true);

        $resultArr = $this->mergeSortDivisionUtility($initialArray);

        $endTime = microtime(true);
        $resultTime = $endTime - $startTime;
        $resultTime >= 0.001
        ? $resultTime = round($resultTime * 1000, 2) . ' ms'
        : $resultTime = round($resultTime * 1000000, 2) . ' us';
        echo 'Merge sort passed time ' . $resultTime . '<br><br>';

        return $resultArr;
    }

    private function mergeSortDivisionUtility(array $initialArray): array
    {
        if (count($initialArray) < 2) {
            return $initialArray;
        }

        $divider = (int) round(count($initialArray) / 2);
        $left = array_slice($initialArray, 0, $divider);
        $right = array_slice($initialArray, $divider);
        $left = $this->mergeSortDivisionUtility($left);
        $right = $this->mergeSortDivisionUtility($right);

        return $this->mergeSortJoinUtility($left, $right);
    }


    private function mergeSortJoinUtility(array $left, array $right): array
    {
        $result = [];

        while (count($left) > 0 || count($right) > 0) {
            if (count($left) > 0 && count($right) > 0) {
                if ($left[0] <= $right[0]) {
                    $result[] = array_shift($left);
                } else {
                    $result[] = array_shift($right);
                }
            }

            if (count($left) > 0 && count($right) == 0) {
                array_push($result, ...$left);
                break;
            }

            if (count($left) == 0 && count($right) > 0) {
                array_push($result, ...$right);
                break;
            }
        }

        return $result;
    }
}
