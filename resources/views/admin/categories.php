<?php
	echo $header;
	if($action == "add") {	
		echo notices().'<form action="" method="post" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="categories"><i class="icon-arrow-left"></i></a>Add new category</h5>
					<fieldset>
						  <div class="form-group">
							<label class="control-label">Category name</label>
							<input name="name" type="text"  class="form-control" />
						  </div>
						  <div class="form-group">
							<label class="control-label">Category path</label>
							<input name="path" type="text" class="form-control"  />
						  </div>
						  <div class="form-group">
								<label class="control-label">Parent category</label>
								<select name="parent" class="form-control">
								<option value="0"></option>';
								foreach ($parents as $parent){
									echo '<option value="'.$parent->id.'">'.$parent->name.'</option>';
								}
								echo '</select>
							</div>
							<div class="form-group">
							<label class="control-label">Category images</label>
							<input type="file" class="form-control" name="images[]" multiple="multiple" accept="image/*"  required/>
						  </div>
						  <input name="add" type="submit" value="Add category" class="btn btn-primary" />
					</fieldset>
				</form>';
	} elseif($action == "edit") {
		echo notices().'<form action="" method="post" enctype="multipart/form-data" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="categories"><i class="icon-arrow-left"></i></a>Edit category</h5>
					<fieldset>
						  <div class="form-group">
							<label class="control-label">Category name</label>
							<input name="name" type="text"  value="'.$category->name.'" class="form-control" />
						  </div>
						  <div class="form-group">
							<label class="control-label">Category path</label>
							<input name="path" type="text" value="'.$category->path.'" class="form-control"  />
						  </div>
						  <div class="form-group">
								<label class="control-label">Parent category</label>
								<select name="parent" class="form-control">
								<option value="0"></option>';
								foreach ($parents as $parent){
									echo '<option value="'.$parent->id.'" '.($parent->id == $category->parent ? 'selected' : '').'>'.$parent->name.'</option>';
								}
								echo '</select>
							</div><div class="row">';
						  if (!empty($category->images)){
							  echo '<p>Uploading new images will overwrtite current images .</p>';
							  $images = explode(',',$category->images);
							  foreach($images as $image){
									echo '<img class="col-md-2" src="'.url('/assets/categories/'.$image).'" />';
							  }
							  echo '<div class="clearfix"></div>';
						  }
						  echo '</div><div class="form-group">
							<label class="control-label">Category images</label>
							<input type="file" class="form-control" name="images[]" multiple="multiple" accept="image/*"/>
							</div>';
						  echo '<input name="edit" type="submit" value="Edit category" class="btn btn-primary" />
					</fieldset>
				</form>';
	} else {
?>
<div class="head">
<h3>Categories<a href="categories/add" class="add">Add category</a></h3>
<p>Manage your products categories</p>
</div>
<?php
		echo notices();
		foreach ($categories as $category){
			echo'<div class="mini bloc">
				<h5>
					<a href="../'.$category->path.'">'.$category->name.'</a>
					<div class="tools">
						<a href="categories/delete/'.$category->id.'"><i class="icon-trash"></i></a>
						<a href="categories/edit/'.$category->id.'"><i class="icon-pencil"></i></a>
					</div>
				</h5>
			</div>';
		}
	}
	echo $footer;
?>