<?php
	echo $header;
	if($action == "add")
	{
		echo notices().'<form action="" method="post" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="builder"><i class="icon-arrow-left"></i></a>Add new bloc</h5>
					<fieldset>
						  <div class="form-group">
							<label class="control-label">Area</label>
							<select name="area" class="form-control">
								<option value="home">Homepage</option>
								<option value="page">Page</option>
								<option value="post">Post</option>
							</select>
						  </div>
						  <div class="form-group">
							<label class="control-label">Content</label>
							<textarea name="content" type="text"  class="form-control" required></textarea>
						  </div>
						  <div class="form-group">
							<label class="control-label">Title</label>
							<input name="title" type="text" class="form-control" required/>
						  </div>
						  <input name="add" type="submit" value="Add bloc" class="btn btn-primary" />
					</fieldset>
				</form>';
	}
	elseif($action == "edit")
	{
		echo notices().'<form action="" method="post" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="builder"><i class="icon-arrow-left"></i></a>Edit bloc</h5>
					<fieldset>
							<div class="form-group">
							<label class="control-label">Type</label>
							<select id="type" name="type">';
							foreach ($types as $type) {
								echo '<option value="'.$type.'" '. ($bloc->type == $type ? 'selected':'') .'>'.$type.'</option>';
							}
							echo'</select>
							</div>
							<div id="BuilderTypeForm"></div>';
							echo '
						  <input name="edit" type="submit" value="Edit bloc" class="btn btn-primary" />
					</fieldset>
				</form>';
	} else {
		$bold = "style='font-weight:bold;'";
?>
<div class="head">
	<h3>Page builder<a href="builder/add" class="add">Add bloc</a></h3>
	<a <?= $area == "home" ? $bold :"" ?> href="builder">Homepage</a> - 
	<a <?= $area == "page" ? $bold :"" ?> href="builder/page">Pages</a> - 
	<a <?= $area == "post" ? $bold :"" ?> href="builder/post">Blog post</a>
</div>
<?php
		echo notices()."<ul>";
		foreach ($blocs as $bloc){
			echo '<li id="'.$bloc->id.'" class="m"><h4>'.$bloc->type.'</h4>
			<div class="tools">
			<a href="builder/delete/'.$bloc->id.'"><i class="icon-trash"></i></a>
			<a href="builder/edit/'.$bloc->id.'"><i class="icon-pencil"></i></a>
			</div>
			<p>'.mb_substr(htmlspecialchars($bloc->content),0,50).'</p></li>';
		}
		echo "</ul><button class='btn save'>Save</button>";
	}
?>
	</div>
	<script src="<?=$tp;?>/assets/jquery-ui.min.js"></script>
	<script>
	$(function(){
		function serializeList(container)
		{
		  var str = ''
		  var n = 0
		  var els = container.find('li.m')
		  for (var i = 0; i < els.length; ++i) {
			var el = els[i]
			var p = el.id
			if (p != -1) {
			  if (str != '') str = str + '&'
			  str = str + 'item[]=' + p
			  ++n
			}
		  }
		  return str
		}
		$('ul').sortable({connectWith:"ul"});
		$('.save').click(function(){
			var data= serializeList($('ul'));
			$.post('builder/save',{"data":data,_token: '<?=csrf_token()?>'},function(d){
				alert('Saved');
			});
		});
	});

	var categories = '<?=json_encode($categories)?>';
	categories = JSON.parse(categories);
	function generateForm() {
		var form = '';
		var type = $('#type').val();
		console.log(type);
		switch (type) {
			case 'category':
				form += `
				<div class="form-group">
				<label class="control-label">Category</label>
				<select id="type" name="type">`;
				categories.forEach(category => {
					form += `<option value="${category.id}">${category.name}</option>`
				});
				form += `</select></div>`
				break;
		
			default:
				break;
		}

		return form;
	}

	$("#type").on("change", function() {
		console.log(generateForm());
		$("#BuilderTypeForm").html(generateForm());
	});
	</script>
<?php echo $footer?>