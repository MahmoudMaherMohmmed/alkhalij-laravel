<?php


function slug($string)
{
    return strtolower(str_replace(" ", "-", $string));
}

function langSting($first_string, $second_string)
{
    return json_encode([
        'ar' => isset($first_string) && $first_string != null ? $first_string : '',
        'en' => isset($second_string) && $second_string != null ? $second_string : ''
    ]);
}

function getLangValue($string, $lang)
{
    if (isset($string) && $string != null) {
        return json_decode($string)->$lang;
    } else {
        return $string;
    }
}

function deleteImage($image)
{
    if (isset($image) && $image != null) {
        $image_path = 'files/' . $image;
        if (File::isFile($image_path)) {
            \File::delete($image_path);
        }
    }
}

function getCurrentLang()
{
    return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale();
}

function getDefaultValueKey($value)
{
    $deflan = getCurrentLang();
    return isset(json_decode($value)->$deflan) ? json_decode($value)->$deflan : null;
}

function getPrice($db_price)
{
    return '$' . $db_price;
}

function getOldPrice($db_price)
{
    $old_price = $db_price + ($db_price * (10 / 100));
    return '$' . $old_price;
}
