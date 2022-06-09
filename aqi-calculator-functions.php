<?php

function getHighLow($pollutant, $value)
{
    $highLowArray = [];

    if ($pollutant === 'tsp') {
        $highLowArray = getTSPHighLow($value);
    } else if ($pollutant === 'pm10') {
        $highLowArray = getPM10HighLow($value);
    } else if ($pollutant === 'co') {
        $highLowArray = getCOHighLow($value);
    } else if ($pollutant === 'so2') {
        $highLowArray = getSO24hrHighLow($value);
    } else if ($pollutant === 'ozone8hr') {
        $highLowArray = getOzone8hrHighLow($value);
    } else if ($pollutant === 'ozone1hr') {
        $highLowArray = getOzone1hrHighLow($value);
    } else if ($pollutant === 'no2') {
        $highLowArray = getNOHighLow($value);
    } else {
        return 0;
    }

    return $highLowArray;
}

//dito nyo ilagay yung Cautionary Statements. Oo, tagalog to, tinatamad ako mag english hahaha.

function getAQIHighLow($categoryNumber)
{
    if (empty($categoryNumber)) {
        return 0;
    }

    $arrayAQI = [
        '1' => [
            'low' => 0,
            'high' => 50,
            'health-reco' => 'Air Quality is satisfactory and poses little or no risk.',
            'cautionary' => 'Put your cautionary statement here.'
        ],
        '2' => [
            'low' => 51,
            'high' => 100,
            'health-reco' => 'Sensitive individuals should avoid outdoor activity as they may experience respiratory symptoms.',
            'cautionary' => 'Put your cautionary statement here. '
        ],
        '3' => [
            'low' => 101,
            'high' => 150,
            'health-reco' => 'General public and sensitive individuals in particular are at risk to experience irritation and respiratory problem.',
            'cautionary' => 'Put your cautionary statement here. '
        ],
        '4' => [
            'low' => 151,
            'high' => 200,
            'health-reco' => 'Increased likehood of adverse effects and aggravation to the heart and lungs among general public.',
            'cautionary' => 'Put your cautionary statement here. '
        ],
        '5' => [
            'low' => 201,
            'high' => 300,
            'health-reco' => 'General Public will be noticeably affected. Sensitive groups should restrict outdoor activities.',
            'cautionary' => 'Put your cautionary statement here. '
        ],
        '6' => [
            'low' => 301,
            'high' => 400,
            'health-reco' => 'General public at high risk of experiencing strong irritation and adverse health effects. Should avoid outdoor activities.',
            'cautionary' => 'Put your cautionary statement here.'
        ],
        '7' => [
            'low' => 401,
            'high' => 500,
            'health-reco' => 'General public at high risk of experiencing strong irritation and adverse health effects. Should avoid outdoor activities.',
            'cautionary' => 'Put your cautionary statement here. '
        ]
    ];

    $aqiArray = [];

    foreach ($arrayAQI as $key => $value) {
        if ($key == $categoryNumber) {
            $aqiArray['high'] = $value['high'];
            $aqiArray['low'] = $value['low'];
            $aqiArray['health-reco'] = $value['health-reco'];
            $aqiArray['cautionary'] = $value['cautionary'];
        }
    }

    return $aqiArray;
}

function getConcentrationHighLow($arrayCons, $concentration)
{
    $highLowArray = [];

    foreach ($arrayCons as $key => $value) {
        if ($concentration <= $value['high'] && $concentration >= $value['low']) {
            $highLowArray['cHigh'] = $value['high'];
            $highLowArray['cLow'] = $value['low'];
            $highLowArray['label'] = $value['label'];
            $highLowArray['categoryNum'] = $key;
        }
    }

    return $highLowArray;
}


function getOzone8hrHighLow($concentration)
{
        $arrayInfoOzone8hr = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' => 54
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 55,
            'high' => 70
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 71,
            'high' => 85
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 86,
            'high' => 105
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 106,
            'high' => 200
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoOzone8hr, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Ozone (8hr avg) value between 0 - 200';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getOzone1hrHighLow($concentration)
{
    $arrayInfoOzone1hr = [
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 125,
            'high' => 164
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 165,
            'high' => 204
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 205,
            'high' => 404
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 405,
            'high' => 504
        ],
        '7' => [
            'label' => 'Hazardous',
            'low' => 505,
            'high' => 604
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoOzone1hr, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Ozone (1hr avg)value between 125 - 604';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getTSPHighLow($concentration)
{
    $arrayInfoTSP = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' => 80
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 81,
            'high' => 230
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 231,
            'high' => 349
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 350,
            'high' => 599
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 600,
            'high' => 899
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 900,
            'high' => 10000000000
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoTSP, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Total Suspended Particulate value between 0 - 1000';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getPM10HighLow($concentration)
{
    $arrayInfoPM10 = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' =>54
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 55,
            'high' => 154
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 155,
            'high' => 254
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 255,
            'high' => 354
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 355,
            'high' => 424
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 425,
            'high' => 504
        ],
        '7' => [
            'label' => 'Hazardous',
            'low' => 505,
            'high' => 604
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoPM10, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Particulate 10 microns value between 0 - 604';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getCOHighLow($concentration)
{
    $arrayInfoCO = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' => 4.4
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 4.5,
            'high' => 9.4
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 9.5,
            'high' => 12.4
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 12.5,
            'high' => 15.4
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 15.5,
            'high' => 30.4
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 30.5,
            'high' => 40.4
        ],
        '7' => [
            'label' => 'Hazardous',
            'low' => 40.5,
            'high' => 50.4
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoCO, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Carbon Monoxide value between 0 - 50.4';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getSO1hrHighLow($concentration)
{
    $arrayInfoSO1hr = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' => 35
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 36,
            'high' => 75
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 76,
            'high' => 185
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 186,
            'high' => 304
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoSO1hr, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Sulfur Dioxide (1hr avg) value between 0 - 304';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function getSO24hrHighLow($concentration)
{
    $arrayInfoSO24hr = [
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 305,
            'high' => 604
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 605,
            'high' => 804
        ],
        '7' => [
            'label' => 'Hazardous',
            'low' => 805,
            'high' => 1004
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoSO24hr, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Sulfur Dioxide (24hr avg) value between 305 - 1004';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;

}

function getNOHighLow($concentration)
{
    $arrayInfoNO = [
        '1' => [
            'label' => 'Good',
            'low' => 0,
            'high' =>53
        ],
        '2' => [
            'label' => 'Moderate',
            'low' => 54,
            'high' => 100
        ],
        '3' => [
            'label' => 'Unhealthy for Sensitive Groups',
            'low' => 101,
            'high' => 306
        ],
        '4' => [
            'label' => 'Unhealthy',
            'low' => 361,
            'high' => 649
        ],
        '5' => [
            'label' => 'Very Unhealthy',
            'low' => 650,
            'high' => 1249
        ],
        '6' => [
            'label' => 'Hazardous',
            'low' => 1250,
            'high' => 1649
        ],
        '7' => [
            'label' => 'Hazardous',
            'low' => 1650,
            'high' => 2049
        ]
    ];

    $arraycHighLow = getConcentrationHighLow($arrayInfoNO, $concentration);

    if (empty($arraycHighLow)) {
        $_SESSION['error'] = 'Enter Nitrogen Dioxide (1hr avg) value between 0 - 2049';
        return 0;
    }

    $arrayIndexHighLow = getAQIHighLow($arraycHighLow['categoryNum']);

    $allValueAQIArray = [
        'chigh' => $arraycHighLow['cHigh'],
        'clow' => $arraycHighLow['cLow'],
        'ihigh' => $arrayIndexHighLow['high'],
        'ilow' => $arrayIndexHighLow['low'],
        'label' => $arraycHighLow['label'],
        'categoryNum' => $arraycHighLow['categoryNum'],
        'health-reco' => $arrayIndexHighLow['health-reco'],
        'cautionary' => $arrayIndexHighLow['cautionary']
    ];

    return $allValueAQIArray;
}

function calculateIndex($highLowValue, $concentration)
{
    $indexTemp = $highLowValue['ihigh'] - $highLowValue['ilow'];
    $cTemp = $highLowValue['chigh'] - $highLowValue['clow'];
    $cTemp2 = $concentration - $highLowValue['clow'];
    $indexTemp2 = $indexTemp / $cTemp;

    $indexFinalValue = ($indexTemp2 * $cTemp2) + $highLowValue['ilow'];

    return $indexFinalValue;
}

function getPollutantNameByCode($code)
{
    if ($code === 'tsp') {
        $pollutantName = 'TSP - Total Suspended Particulate (24hr avg';
    } else if ($code === 'pm10') {
        $pollutantName = 'PM10 - Particulate 10 microns (24hr avg) ';
    } else if ($code === 'co') {
        $pollutantName = 'CO - Carbon Monoxide (8hr avg)';
    } else if ($code === 'so2') {
        $pollutantName = 'SO2 - Sulfur Dioxide (24hr avg)';
    } else if ($code === 'ozone8hr') {
        $pollutantName = 'O3 - Ozone (8hr avg)';
    } else if ($code === 'ozone1hr') {
        $pollutantName = 'O3 - Ozone (1hr avg)';
    } else if ($code === 'no2') {
        $pollutantName = 'NO2 - Nitrogen Dioxide (1hr avg)';
    } else {
        return 0;
    }

    return $pollutantName;
}









