<?php
session_start();
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTPS_HOST'];
	header('Location: '.$uri.'tronpa.fr/pages/index.php');
	exit;
?>
