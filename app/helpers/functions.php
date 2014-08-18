<?php
function slug_string($input) {
	$value = $input;
	str_replace(" ", "-", $value);
	return $value;
}
function prepare_fileName($filename) {
    $filename = preg_replace('/[^a-zA-Z0-9_\'%\[\]\.\(\)%&-]/s', '', $filename);
    $filename = str_replace(' ', '_', $filename);
    return strtolower($filename);
}