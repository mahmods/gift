<?php
	$response[] = '<button id="cash" class="payment btn primary" data-order="'.$order.'">
		<img src="'.url('/assets/cash.svg').'">
		<h5>'.translate("Cash on delivery").'</h5>
	</button>
	<script src="'.url('/themes/default/assets/cash.js').'"></script>';
?>