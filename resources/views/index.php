<?php echo $header?>

<div class="container page-content">
<?php
foreach ($blocs as $bloc){
	$bloc_meta = \App\BlocMeta::where(["bloc_id" => $bloc->id])->first()['meta_value'];
	echo $__env->make('widgets/'.$bloc->type)->with('bloc_meta', $bloc_meta)->render();
}
?>
</div>
<?php echo $footer ?>