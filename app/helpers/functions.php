<?php

function slug_string($input) {
    $value = $input;
    $value = str_replace(" ", "-", $value);
    $value = strtolower($value);
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

function reservation_statuses_for_select() {
    return [
        'any' => 'Any',
        'pending' => 'Pending',
        'confirmed' => 'Confirmed'
    ];
}

function review_statuses_for_select() {
    return [
        'any' => 'Any',
        'pending' => 'Pending',
        'approved' => 'Approved'
    ];
}

function inquiry_statuses_for_select() {
    return [
        'any' => 'Any',
        'pending' => 'Pending',
        'resolved' => 'Resolved'
    ];
}

function area_cities_options_for_select($areas) {
    $options = [];
    foreach ($areas as $area) {
        $options[$area->name] = [];
        foreach ($area->places as $place) {
            $options[$area->name][$place->name] = $place->name;
        }
    }
    return $options;
}

/**
 * 
 * @param string $text      -> the string wants to truncate
 * @param integer $limit    -> the length limited of given string
 * @param string $pad       -> replace truncated string by
 * @return string
 */
function truncate_words($text, $limit, $pad = "...", $stripTag = true) {
    if ($stripTag) {
        $text = strip_tags($text);
    }
    $words = explode(' ', $text, ($limit + 1));
    if (count($words) > $limit) {
        array_pop($words);
        array_push($words, $pad);
    }
    return implode(' ', $words);
}

function create_file_if_not_exists($file_path) {
    if (!file_exists($file_path)) {
        $file = fopen($file_path, 'w');
        fclose($file);
    }
}

function gravatar_url($email, $size = 100) {
    $default = asset('/images/default_avatar.png');
    return "http://www.gravatar.com/avatar/" .
            md5(strtolower(trim($email))) .
            "?d=" . urlencode($default) .
            "&s=" . $size;
}

?>