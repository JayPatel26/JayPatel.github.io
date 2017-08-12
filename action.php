<?php
if($_GET['q'] == 'feed'){
	$myfile = fopen("feedback.txt", "a") or die("Unable to open file!");
	$txt = $_POST['feedb'];
	fwrite($myfile, "\n\n\n". $txt);
	fclose($myfile);
	echo "Thank you for your feedback!";
}
if($_GET['q'] == 'viewdesign' || $_GET['q'] == 'dwnlddesign'){
	$filename = 'Test.pdf';
}
if($_GET['q'] == 'viewtech' || $_GET['q'] == 'dwnldtech'){
	$filename = 'Test1.pdf';	
}
if($_GET['q'] == 'viewdesign' || $_GET['q'] == 'viewtech'){
	header("Content-type: application/pdf");
	header('Content-Disposition: inline; filename="'. basename($filename) . '";');
	@readfile($filename);
}
if($_GET['q'] == 'dwnlddesign' || $_GET['q'] == 'dwnldtech'){
	header('Pragma: public');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Cache-Control: private', false); // required for certain browsers 
	header('Content-Type: application/pdf');

	header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: ' . filesize($filename));

	readfile($filename);

	exit;
}
?>