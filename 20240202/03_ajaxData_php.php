<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "<pre>";
}

$mobileArr = [
    [
        'id' => 1,
        'name' => 'iphone10',
        'price' => 10000,
        'location' => ['台北', '台中']
    ],
    [
        'id' => 2,
        'name' => 'iphone11',
        'price' => 20000,
        'location' => ['台北', '台中']
    ],
    [
        'id' => 3,
        'name' => 'iphone12',
        'price' => 30000,
        'location' => ['台北',]
    ],
    [
        'id' => 4,
        'name' => 'iphone13',
        'price' => 40000,
        'location' => ['台北', '台中', '高雄']
    ],

];

// $mobileArr = [
//     's1' => 'amy',
//     's2' => 'bob',
//     's3' => 'cat',
// ];

// print_r($mobileArr);
// dd($mobileArr);

echo json_encode($mobileArr);