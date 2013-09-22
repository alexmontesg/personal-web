<?php
if (isset($_POST['contactName']) && isset($_POST['contactEmail']) && isset($_POST['contactMessage'])) {
	$to = "alejandro.montes@weso.es";
	$subject = "Contact";
	$msg = $_POST['contactName'] . ' wrote: <br/>' . $_POST['contactMessage'];
	$from = $_POST['contactEmail'];
	$headers = "From: $from";
	mail($to, $subject, $msg, $headers);
	translate('contactMessage');
}
?>