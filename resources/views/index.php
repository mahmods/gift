<?php echo $header?>

<div class="container page-content">
	<!-- Show Board -->
	<div class="row">
		<?php $slider = \App\Ads::where("name", "Home slider")->first(); ?>
		<!-- Slider -->
		<div class="col-s-12 col-m-7 col-l-8">
			<div class="main-slider">
				<?php foreach($slider->items as $item): ?>
				<!-- item -->
				<div class="item">
					<a href="<?=$item->url?>"><img src="<?=url('/assets/ads/'.$item->image)?>" alt=""></a>
				</div>
				<!-- // item -->
				<?php endforeach; ?>
			</div>
		</div>
		<!-- // Slider -->
		
		<!-- Banners -->
		<div class="col-s-12 col-m-5 col-l-4">
			<?php $top_ads = \App\Ads::where("name", "top ads")->first(); ?>
			<?php foreach($top_ads->items as $item): ?>
				<a href="<?=$item->url?>" class="banner-block"><img src="<?=url('/assets/ads/'.$item->image)?>" alt=""></a>
			<?php endforeach; ?>
		</div>
		<!-- // Banners -->
	</div>
	<!-- // Show Board -->
<?php
foreach ($blocs as $bloc){
	$bloc_meta = \App\BlocMeta::where(["bloc_id" => $bloc->id])->first()['meta_value'];
	echo $__env->make('widgets/'.$bloc->type)->with('bloc_meta', $bloc_meta)->render();
}
?>
</div>
<?php echo $footer ?>