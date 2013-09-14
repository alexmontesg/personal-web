<?php
	if(!empty($error)) {
?>
<div data-alert class="alert-box alert">
	<?php echo $error; ?>
	<a href="#" class="close">&times;</a>
</div>
<?php
} else if(!empty($success)) {
?>
<div data-alert class="alert-box success">
	<?php echo $success; ?>
	<a href="#" class="close">&times;</a>
</div>
<?php
}
?>