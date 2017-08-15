<?php

$aspectRatio = function ($constraint){
    $constraint->aspectRatio();
    $constraint->upsize();
};

return [

    'products' => [
        'thumb' => [
            'fit' => [220,220]
        ],
        '250x320' => [
            'fit' => [250,320]
        ],
        'big' => [
            'resize' => [1600, 900, $aspectRatio]
        ]
    ],

];
