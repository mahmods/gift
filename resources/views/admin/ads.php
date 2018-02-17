<?php
	echo $header;
	if($action == "add")
	{
		echo notices().'<form action="" method="post" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="builder"><i class="icon-arrow-left"></i></a>Add new Ad</h5>
					<fieldset>
						  <div class="form-group">
							<label class="control-label">Name</label>
							<input name="name" type="text" class="form-control" required/>
						  </div>
						  <div class="form-group">
							<label class="control-label">Images</label>

							<input name="url_1" placeholder="Image link" type="text" class="form-control"/>
							<input name="image_1" type="file" class="form-control"/>
							<hr>
							<input name="url_2" placeholder="Image link" type="text" class="form-control"/>
							<input name="image_2" type="file" class="form-control"/>
							<hr>
							<input name="url_3" placeholder="Image link" type="text" class="form-control"/>
							<input name="image_3" type="file" class="form-control"/>
						  </div>
						  <input name="add" type="submit" value="Add" class="btn btn-primary" />
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
	<h3>Ads Manager<a href="ads/add" class="add">Add Ad</a></h3>
</div>
<?php
		echo notices()."<ul>";
		foreach ($ads as $bloc){
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