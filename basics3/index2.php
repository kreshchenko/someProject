<?php

function getImgUrlTag ($url, $alt = null, $width = null, $height = null)
{
    $tagStr = '<img';
    if (isset($url) && strlen($url)>5){
        $tagStr .= ' src="'.$url.'"';
    }
    else {
        $tagStr = 'Создать тег невозможно, поскольку нет пути к файлу';
        return $tagStr;
    }
    if (isset($alt) && strlen($alt) > 2){
        $tagStr .= ' alt="'.$alt.'"'; 
    }
    if (isset($width) && strlen($width) >= 3){//3 - минимальное количество символов, чтоб задать ширину (например 1px)
        $tagStr .= ' width="'.$width.'"';
    }
    if (isset($height) && strlen($height) >=3){
        $tagStr .= ' height="'.$height.'"';//3 - минимальное количество символов, чтоб задать высоту (например 1px)
    }
    $tagStr .= '>';
    echo $tagStr;
}

include_once 'getImgUrlTagVsGlobal.php';

$url = 'https://some.vn.ua/image.png';
$alt = 'Описание картинки';
$width = '200px';
$height = "100px";
$variable = '/images/';

getImgUrlTag($url,'sssa', $width, $height);

$url ='photo.png';
getImgUrlTagVsGlobal($url,'sssa', $width, $height);