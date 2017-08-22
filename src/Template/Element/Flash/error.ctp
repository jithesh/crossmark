<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= $message ?></div> -->

<div class="alert alert-danger alert-fill alert-close alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<i class="font-icon font-icon-inline font-icon-warning"></i>
	<strong>BagTrace</strong><br>
	<?= $message ?>
</div>
