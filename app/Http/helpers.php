<?php
function guid(){

	$characters = '0123456789ABCDEF';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < 32; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	$newstr = substr_replace($randomString, '-', 8, 0);
	$newstr = substr_replace($newstr, '-', 13, 0);
	$newstr = substr_replace($newstr, '-', 18, 0);
	$newstr = substr_replace($newstr, '-', 23, 0);

	return strtoupper($newstr);
}
?>