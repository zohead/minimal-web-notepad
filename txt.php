<?php
// Disable caching.
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

//  configuration settings, edit settings in config.php as appropriate
// settings include the base url, the notes path and the menu items displayed
include('config.php');

$path = $data_directory . $_GET['note'];

include 'modules/header.php';

$content = '';
if (is_file($path)) {
	$content = getFileContents($path);
}

header('Content-Type: text/plain');

echo $content;
?>
