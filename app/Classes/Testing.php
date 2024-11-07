<?php

declare(strict_types=1);

namespace Classes;

class Testing
{
    private object $sorting;

    public function __construct()
    {
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

    private function checkArraySorting(array $arr): bool
    {
        (bool) $flag = true;
        $lenght = count($arr);

        for ($i = 1; $i < $lenght; $i++) {
            if ($arr[$i] < $arr[$i - 1]) {
                $flag = false;
                break;
            }
        }

        return $flag;
    }

    public function startTestSorting(int $elementsQty, string $testName = 'ALL', bool $printArray = false): void
    {
        $randomArray = $this->createArray($elementsQty);
        echo 'array elements quantity = ' . count($randomArray) . '<br><br>';

        try {
            $matchResult = match ($testName) {
                'ALL' => function($randomArray, $printArray):void 
                {
                    $sortNameAndSortedArray = [
                    'bubleSort' => $this->sorting->bubleSort($randomArray),
                    'bubleSortImproved' => $this->sorting->bubleSortImproved($randomArray),
                    'selectionSort' => $this->sorting->selectionSort($randomArray),
                    'selectionSortImproved' => $this->sorting->selectionSortImproved($randomArray),
                    'quickSort' => $this->sorting->quickSort($randomArray),
                    'mergeSort' => $this->sorting->mergeSort($randomArray)
                    ];
    
                    $this->testHandler($sortNameAndSortedArray);               
    
                    if ($printArray) {
                        $this->printArray($randomArray, $sortNameAndSortedArray);                   
                    }
                },

                'BUBLE' => function($randomArray, $printArray):void
                {
                    $sortNameAndSortedArray = [
                    'bubleSort' => $this->sorting->bubleSort($randomArray),
                    'bubleSortImproved' => $this->sorting->bubleSortImproved($randomArray)                    
                    ];
                
                    $this->testHandler($sortNameAndSortedArray);               
                
                    if ($printArray) {
                        $this->printArray($randomArray, $sortNameAndSortedArray);                   
                    }
                },    

                'SELECTION' => function($randomArray, $printArray):void 
                {
                    $sortNameAndSortedArray = [                    
                        'selectionSort' => $this->sorting->selectionSort($randomArray),
                        'selectionSortImproved' => $this->sorting->selectionSortImproved($randomArray)
                    ];
    
                    $this->testHandler($sortNameAndSortedArray);               
    
                    if ($printArray) {
                        $this->printArray($randomArray, $sortNameAndSortedArray);                   
                    }
                },    

                'QUICK' => function($randomArray, $printArray):void
                {
                    $sortNameAndSortedArray = ['quickSort' => $this->sorting->quickSort($randomArray)];
    
                    $this->testHandler($sortNameAndSortedArray);               
    
                    if ($printArray) {
                        $this->printArray($randomArray, $sortNameAndSortedArray);
                    }
                },    

                'MERGE' => function($randomArray, $printArray):void
                {
                    $sortNameAndSortedArray = ['mergeSort' => $this->sorting->mergeSort($randomArray)];
    
                    $this->testHandler($sortNameAndSortedArray);               
    
                    if ($printArray) {
                        $this->printArray($randomArray, $sortNameAndSortedArray);                   
                    }                
                },    

                default => function():void
                {
                    echo 'Incorrect argument $testName, it can be: ALL, BUBLE, SELECTION, QUICK, MERGE';
                },
            };

            $matchResult($randomArray, $printArray);

        } catch (\Throwable $th) {
            echo 'match error';
            var_dump($th);
        }        
    }

    private function testHandler(array $array): void
    {
        foreach ($array as $key => $value) {
            echo "Check array sorting ($key): " . ($this->checkArraySorting($value) ? 'True' : 'False') . '<br>';
        }        
    }   

    private function printArray(array $unsortedArray, array $sortNameAndSortedArray): void
    {
        echo '<pre>'; 
        echo 'Array before sorting <br>';
        print_r($unsortedArray);
        echo '<br>';
        echo '<pre>';

        foreach ($sortNameAndSortedArray as $key => $value) {
            echo '<pre>';            
            echo "<br>Array after sorting by $key<br>";
            print_r($value);
            echo '<br>';
            echo '<pre>';
        }        
    }
}
