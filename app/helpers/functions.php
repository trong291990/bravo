<?php

function slug_string($input) {
    $value = $input;
    str_replace(" ", "-", $value);
    return $value;
}

function sanitize_file_name($filename) {
    $filename = preg_replace('/[^a-zA-Z0-9_\'%\[\]\.\(\)%&-]/s', '', $filename);
    $filename = str_replace(' ', '_', $filename);
    return strtolower($filename);
}

function pr($data) {
    print_r($data);
}

function prd($data) {
    print_r($data);
    die();
}

/**
 * Add zero padding before the given number with limited length
 *
 * @param   integer  $number
 * @param   integer  $length
 * @return  string
 */
function zero_padding_number($number, $length) {
    $prefix = '';
    while (strlen($prefix . $number) < $length) {
        $prefix .= '0';
    }
    return $prefix . $number;
}