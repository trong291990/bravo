<?php
function slug_string($input) {
	$value = $input;
	str_replace(" ", "-", $value);
	return $value;
}