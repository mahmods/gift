<?php echo $header?>

<div class="container page-content">
<?php
//$widgets_data = array();
foreach ($blocs as $bloc){
	if (mb_substr($bloc->content, 0, 7) == 'widget:') {
		$data = array();
		if (strpos($bloc->content, ':category:') !== false) {
			$category = \App\Category::where('id', mb_substr($bloc->content, 16, 255))->first();
			$data['category'] = $category;
			$bloc->content = mb_substr($bloc->content, 0, 15);
		}
		echo $__env->make('widgets/'.mb_substr($bloc->content, 7, 255))->with('data', $data)->render();
	} else {
		echo $bloc->content;
	}
}
?>
</div>
<?php echo $footer ?>