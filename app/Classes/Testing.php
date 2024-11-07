<?php

declare(strict_types=1);

namespace Classes;

class Testing
{
    private Searching $searching;
    private Sorting $sorting;

    public function __construct()
    {
        $this->searching = new \Classes\Searching();
        $this->sorting = new \Classes\Sorting();
    }

    private function createArray(int $elemenysQty): array
    {
        $newArray = [];

        for ($i = 0; $i < $elemenysQty; $i++) {
            $newArray[] = mt_rand(-20, 20);
        }

        return $newArray;
    }

    public function startTestSearching(
        int | array $qtyOrArr,
        int $searchItem,
        string $testName = 'ALL',
        bool $printResult = false
    ): void {
        $array = [];

        if (gettype($qtyOrArr) == 'integer') {
            $array = $this->createArray($qtyOrArr);
        } else {
            $array = $qtyOrArr;
        }

        try {
            $matchResult = match ($testName) {
                'ALL' => function ($array, $searchItem, $printResult): void {
                    if ($printResult === true) {
                        $this->printArray($array);
                    }

                    $this->searching->linearSearch($array, $searchItem);

                    $array = $this->sorting->quickSort($array);
                    $this->printArray($array);
                    $this->searching->binarySearch($array, $searchItem);
                },

                'LINEAR' => function ($array, $searchItem, $printResult): void {
                    if ($printResult === true) {
                        $this->printArray($array);
                    }

                    $this->searching->linearSearch($array, $searchItem);
                },

                'BINARY' => function ($array, $searchItem, $printResult): void {
                    if ($printResult === true) {
                        $this->printArray($array);
                    }

                    $array = $this->sorting->quickSort($array);
                    $this->printArray($array);
                    $this->searching->binarySearch($array, $searchItem);
                },

                default => function (): void {
                    echo 'Incorrect argument $testName, it can be: ALL, LINEAR, BINARY';
                },
            };

            $matchResult($array, $searchItem, $printResult);

        } catch (\Throwable $th) {
            echo 'match error';
            var_dump($th);
        }
    }

    private function printArray(array $array): void
    {
        echo 'Search in array:<br>';
        echo '<pre>';
        print_r($array);
        echo '<pre>';
    }
}
