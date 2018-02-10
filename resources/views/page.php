<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1><?=$page->title?></h1>
		<div class="breadcrumb">
			<a href="#"><?=translate("Home") ?></a>
			<a href="#"><?=$page->title?></a>
		</div>
	</div>
	<!-- // Page Head -->
	<?=nl2br(translate($page->content))?>
</div>
<?php echo $footer?>