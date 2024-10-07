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
include 'Parsedown.php';

$content = '';
if (is_file($path)) {
	$content = Parsedown::instance()->text(getFileContents($path));
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note - <?php print $_GET['note']; ?></title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="css/github-markdown.css">
<style>
.markdown-body {
	box-sizing: border-box;
	min-width: 200px;
	max-width: 980px;
	margin: 0 auto;
	padding: 45px;
}

@media (max-width: 767px) {
	.markdown-body {
		padding: 15px;
	}
}
</style>
</head>
<body style="background-color:white !important; border:none !important;">
<article class="markdown-body">
<?php echo $content; ?>
</article>
</body>
</html>
