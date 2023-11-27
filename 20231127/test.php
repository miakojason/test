<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$data = [
    [
        'name' => 'amy',
        'mobile' => '0911-111-111',
        'price' => 100
    ],
    [
        'name' => 'bob',
        'mobile' => '0922-222-222',
        'price' => 200
    ]
];

$sum = 0;
foreach ($data as $key => $value) {
    // dd($key);
    // dd($value['price']);
    $sum = $sum + $value['price'];
}

dd($sum);
// dd($data);