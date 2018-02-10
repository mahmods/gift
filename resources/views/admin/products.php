<?php
	echo $header;
	if($action == "add")
	{
		echo notices().'<form action="" method="post" enctype="multipart/form-data" class="form-horizontal single">
				'.csrf_field().'
				<h5><a href="products"><i class="icon-arrow-left"></i></a>Add new product</h5>
				<fieldset>
					<ul class="nav nav-pills mb-3" id="myTab" role="tablist">';
					foreach($languages as $i => $l) {
						echo '<li class="nav-item '.($i == 0 ? 'active':'').'">
								<a class="nav-link" id="'.$l->code.'-tab" data-toggle="tab" href="#'.$l->code.'" role="tab" aria-controls="'.$l->code.'" aria-selected="true">'.
								'<i style="margin-right:5px;" class="flag-icon flag-icon-'.flag($l->code).'"></i>'.$l->name.'</a>
							</li>';
					}
					echo '</ul>
						<div class="tab-content" id="myTabContent">';
						foreach($languages as $i => $l) {
							echo '<div class="tab-pane fade '.($i == 0 ? 'active in':'').'" id="'.$l->code.'" role="tabpanel" aria-labelledby="'.$l->code.'-tab">';
							echo '<div class="form-group">
										<label class="control-label">Product name ('.$l->name.')</label>
										<input name="title_'.$l->code.'" type="text"  class="form-control" required/>
									</div>
									<div class="form-group">
										<label class="control-label">Product description ('.$l->name.')</label>
										<textarea name="text_'.$l->code.'" type="text" class="form-control" required></textarea>
									</div>';
							echo '</div>';
						}
							echo '</div>
						  <div class="form-group">
							<label class="control-label">Product category</label>
							<select name="category" class="form-control">';
							foreach ($categories as $category){
								echo '<option value="'.$category->id.'">'.$category->name.'</option>';
								$childs = \App\Category::where('parent',$category->id)->orderby('id','desc')->get();
								foreach ($childs as $child){
									echo '<option value="'.$child->id.'">- '.$child->name.'</option>';
								}
							}
							echo '</select>
						  </div>
						  <div class="form-group">
							<label class="control-label">Product price</label>
							<input name="price" type="text" class="form-control" required />
						  </div>
						  <div class="form-group">
							<label class="control-label">Available quantity</label>
							<input name="q" type="text" class="form-control" required/>
						  </div>
						  <div class="form-group">
							<label class="control-label">Product images</label>
							<input type="file" class="form-control" name="images[]" multiple="multiple" accept="image/*"  required/>
						  </div>
						  <div class="form-group">
							<label class="control-label">Download ( digital product )</label>
							<input type="file" class="form-control" name="download"/>
						  </div>
						  <div class="form-group">
							  <label class="control-label">Customer options</label>
							  <input type="hidden" id="option_count"></input>
							  <div id="options"></div>
							  <div id="add_option" class="button pull-right">Add field</div>
                          </div>
						  <input name="add" type="submit" value="Add product" class="btn btn-primary" />
					</fieldset>
				</form>';
	} elseif($action == "edit"){
		echo notices().'<form action="" method="post" enctype="multipart/form-data" class="form-horizontal single">
			'.csrf_field().'
				<h5><a href="products"><i class="icon-arrow-left"></i></a>Update product</h5>
					<fieldset>
					<ul class="nav nav-pills mb-3" id="myTab" role="tablist">';
					foreach($languages as $i => $l) {
						echo '<li class="nav-item '.($i == 0 ? 'active':'').'">
								<a class="nav-link" id="'.$l->code.'-tab" data-toggle="tab" href="#'.$l->code.'" role="tab" aria-controls="'.$l->code.'" aria-selected="true">'.
								'<i style="margin-right:5px;" class="flag-icon flag-icon-'.flag($l->code).'"></i>'.$l->name.'</a>
							</li>';
					}
					echo '</ul>
						<div class="tab-content" id="myTabContent">';
						foreach($languages as $i => $l) {
							echo '<div class="tab-pane fade '.($i == 0 ? 'active in':'').'" id="'.$l->code.'" role="tabpanel" aria-labelledby="'.$l->code.'-tab">';
							echo '<div class="form-group">
										<label class="control-label">Product name ('.$l->name.')</label>
										<input name="title_'.$l->code.'" type="text"  class="form-control" value="'.$product->translate($l->code)->title.'" required/>
									</div>
									<div class="form-group">
										<label class="control-label">Product description ('.$l->name.')</label>
										<textarea name="text_'.$l->code.'" type="text" class="form-control" required>'.$product->translate($l->code)->text.'</textarea>
									</div>';
							echo '</div>';
						}
							echo '</div>
						  <div class="form-group">
							<label class="control-label">Product name</label>
							<input name="title" type="text" value="'.$product->title.'" class="form-control"  required/>
						  </div>
						  <div class="form-group">
							<label class="control-label">Product description</label>
							<textarea name="text" type="text" class="form-control" required>'.$product->text.'</textarea>
						  </div>
						  <div class="form-group">
							<label class="control-label">Product category</label>
							<select name="category" class="form-control">';
							foreach ($categories as $category){
								echo '<option value="'.$category->id.'" '.($category->id == $product->category ? 'selected' : '').'>'.$category->name.'</option>';
								$childs = \App\Category::where('parent',$category->id)->orderby('id','desc')->get();
								foreach ($childs as $child){
									echo '<option value="'.$child->id.'" '.($child->id == $product->category ? 'selected' : '').'>- '.$child->name.'</option>';
								}
							}
							echo '</select>
						  </div>
						  <div class="form-group">
							<label class="control-label">Product price</label>
							<input name="price" type="text" value="'.$product->price.'" class="form-control"  required/>
						  </div>
						  <div class="form-group">
							<label class="control-label">Available quantity</label>
							<input name="quantity" type="text" value="'.$product->quantity.'" class="form-control"  required/>
						  </div><div class="row">';
						  if (!empty($product->images)){
							  echo '<p>Uploading new images will overwrtite current images .</p>';
							  $images = explode(',',$product->images);
							  foreach($images as $image){
									echo '<img class="col-md-2" src="'.url('/assets/products/'.$image).'" />';
							  }
							  echo '<div class="clearfix"></div>';
						  }
						  echo '</div><div class="form-group">
							<label class="control-label">Product images</label>
							<input type="file" class="form-control" name="images[]" multiple="multiple" accept="image/*"/>
						  </div>';
						  if (!empty($product->download)){
							  echo '<p>Uploading new file will overwrite current file .</p>';
						  }
						  echo '
						  <div class="form-group">
							<label class="control-label">Download</label>
							<input type="file" class="form-control" name="download"/>
						  </div>
						  <div class="form-group">
							  <label class="control-label">Customer options</label>
							  <input type="hidden" id="option_count" value="'.count(json_decode($product->options,true)).'"></input>
							  <div id="options">';
								$options = json_decode($product->options,true);
                                if(!empty($options)){
                                    foreach($options as $i=>$row){
								?>
								<div class="form-group" data-no="<?php echo $row['no']; ?>">
									<div class="col-sm-6">
										<input name="option_title[]" class="form-control" placeholder="Title" type="text" value="<?php echo $row['title']; ?>">
									</div>
									<div class="col-sm-5">
										<select class="form-control option_type" name="option_type[]">
											<option value="text" <?php if($row['type'] == 'text'){ echo 'selected'; } ?>>Text input</option>
											<option value="select" <?php if($row['type'] == 'select'){ echo 'selected'; } ?>>Dropdown - single select</option>
											<option value="multi_select" <?php if($row['type'] == 'multi_select'){ echo 'selected'; } ?>>Checkbox - multi select</option>
											<option value="radio" <?php if($row['type'] == 'radio'){ echo 'selected'; } ?>>Radio</option>
										</select>
										<div class="options">
											<?php
                                            if($row['type'] == 'text'){
                                        ?>
                                            <input type="hidden" name="option_set<?php echo $row['no']; ?>[]" value="none" >
                                        <?php
                                            } else {
                                        ?>
											<?php foreach ($row['option'] as $key => $row1) { ?>
											<div style="margin: 10px -15px;">
												<div class="col-sm-10">
													<input value="<?php echo $row1; ?>" type="text" name="option_set<?php echo $row['no']; ?>[]" class="form-control required"  placeholder="Option">
												</div>
												<div class="col-sm-1">
												  <span class="remove-option mini-button"><i class="icon-close"></i></span>
												</div>
												<div class="clearfix"></div>
											</div>
											<?php } ?>
											<div class="pull-right button add_option">Add option</div>
										<?php } ?>
										</div>
									</div>
									<input name="option_no[]" value="<?php echo $row['no']; ?>" type="hidden">
									<div class="col-sm-1"> <span class="remove mini-button"><i class="icon-close"></i></span> </div>
								</div>
								<?php
										}
									}
								?>
								</div>
								<div id="add_option" class="button pull-right">Add field</div>
							</div>
						  <input name="edit" type="submit" value="Update product" class="btn btn-primary" />
					</fieldset>
				</form>
<?php } else { ?>
	<div class="head">
	<h3>Products<a href="products/add" class="add">Add product</a></h3>
	<p>Manage your website stock & products </p>
	</div>
	<div class="bloc">
		<form id="search" style="padding:0px; max-width:none;">
			<div class="col-md-3">
				<div class="form-group">
					<input name="search" placeholder="<?=translate('Search keyword')?>" type="text" value="<?=isset(request()->search)?request()->search:''?>" class="form-control" />
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<select name="cat" class="form-control">
						<option value=""><?=translate('Category')?></option>
						<?php foreach($cats as $cat){
							$selected = '';
							if (isset($category->id)) {
								$selected = ($category->id == $cat->id) ? 'selected' : '';
							}
							echo '<option value="'.$cat->id.'" '.$selected.'>'.translate($cat->name).'</option>';
							$childs = \App\Category::where(['parent' => $cat->id])->orderby('id','desc')->get();
							foreach ($childs as $child){
								echo '<option value="'.$child->id.'" '.(isset($category->id) ? ($child->id == $category->id ? 'selected' : '') : '').'>- '.$child->name.'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-price">
					<div class="clearfix"></div>
					<b class="pull-left price"><?=$price['min'] ?></b>
					<b class="pull-right price"><?=$price['max']; ?></b>
					<input name="min" id="min" type="hidden">
					<input name="max" id="max" type="hidden">
					<div id="price"></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group text-center">
					<button type="submit" class="btn btn-primary">Search</button>
				</div>
			</div>
			<div class="clearfix"></div>
		</form>
	</div>
	<div id="listing">
<?php
	echo notices();
	foreach ($products as $product){
	echo '<div class=" col-md-3">
		<div class="product">
			<div class="pi">
				<img src="../assets/products/'.image_order($product->images).'">
			</div>
			<h5>'.$product->title.'</h5>
			<b>'.currency($product->price).'</b>
			<div class="tools">
				<a href="products/delete/'.$product->id.'"><i class="icon-trash"></i></a>
				<a href="products/edit/'.$product->id.'"><i class="icon-pencil"></i></a>
			</div>
		</div>
	</div>';}
	}
?>	
</div>
<style>
	.button {
		background: gainsboro;
		padding: 5px 20px;
		cursor: pointer;
		border-radius: 30px;
	}
	.mini-button {
		cursor: pointer;
		border-radius: 30px;
		background: transparent;
		padding: 5px 0px;
		display: block;
	}
</style>
<script>
    function option_count(type){
        var count = $('#option_count').val();
        if(type == 'add'){
            count++;
        }
        if(type == 'reduce'){
            count--;
        }
        $('#option_count').val(count);
    }
    
    $("#add_option").click(function(){
        option_count('add');
        var co = $('#option_count').val();
        $("#options").append(''
            +'<div class="form-group" data-no="'+co+'">'
            +'    <div class="col-sm-6">'
            +'        <input type="text" name="option_title[]" class="form-control"  placeholder="Title">'
            +'    </div>'
            +'    <div class="col-sm-5">'
            +'        <select class="form-control option_type" name="option_type[]" >'
            +'            <option value="text">Text input</option>'
            +'            <option value="select">Dropdown - single select</option>'
            +'            <option value="multi_select">Checkbox - multi select</option>'
            +'            <option value="radio">Radio</option>'
            +'        </select>'
            +'        <div class="options">'
            +'          <input type="hidden" name="option_set'+co+'[]" value="none" >'
            +'        </div>'
            +'    </div>'
            +'    <input type="hidden" name="option_no[]" value="'+co+'" >'
            +'    <div class="col-sm-1">'
            +'        <span class="remove mini-button"><i class="icon-close"></i></span>'
            +'    </div>'
            +'</div>'
        );
    });
    
    $("#options").on('change','.option_type',function(){
        var co = $(this).closest('.form-group').data('no');
        if($(this).val() !== 'text'){
            $(this).closest('div').find(".options").html('<div class="pull-right button add_option">Add option</div>');
        } else {
            $(this).closest('div').find(".options").html('<input type="hidden" name="option_set'+co+'[]" value="none" >');
        }
    });
    
    $("#options").on('click','.add_option',function(){
        var co = $(this).closest('.form-group').data('no');
        $(this).closest('.options').prepend(''
            +'    <div style="margin: 10px -15px;">'
            +'        <div class="col-sm-10">'
            +'          <input type="text" name="option_set'+co+'[]" class="form-control required"  placeholder="Option">'
            +'        </div>'
            +'        <div class="col-sm-1">'
            +'          <span class="remove-option mini-button"><i class="icon-close"></i></span>'
            +'        </div>'
            +'        <div class="clearfix"></div>'
            +'    </div>'
        );
    });
    
    $('body').on('click', '.remove', function(){
        $(this).parent().parent().remove();
    });

    $('body').on('click', '.remove-option', function(){
        var co = $(this).closest('.form-group').data('no');
        $(this).parent().parent().remove();
        if($(this).parent().parent().parent().html() == ''){
            $(this).parent().parent().parent().html(''
                +'   <input type="hidden" name="option_set'+co+'[]" value="none" >'
            );
        }
	});
	var handlesSlider = document.getElementById('price');
		noUiSlider.create(handlesSlider, {
			start: [<?=$price['min']?>,<?=$price['max']?>],
			step: 1,
			connect: false,
			range: {'min':<?=$price['min']?>,'max':<?=$price['max']?>},
		});
		var BudgetElement = [document.getElementById('min'),document.getElementById('max')];
		handlesSlider.noUiSlider.on('update', function(values, handle) {
			BudgetElement[0].textContent = values[0];
			BudgetElement[1].textContent = values[1];
			$("#min").val(values[0]);
			$(".pull-left.price").html(values[0]);
			$("#max").val(values[1]);
			$(".pull-right.price").html(values[1]);
		});
			// Products listing
	function listing(){
		$("#listing").html('<div class="loading"></div>');
		$.ajax({ 
				url: '<?=url('')?>/api/products',
				type: 'get',
				data: $("#search").serialize(),
				crossDomain: true,
			}).done(function(response) {
				data = JSON.parse(response);
				var listing = '';
				$.each(data.products, function(index,elem){
					listing += `
					<div id="${elem.id}" class=" col-md-3">
						<div class="product">
							<div class="pi">
								<img src="${elem.images}">
							</div>
							<h5>${elem.title}</h5>
							<b>${elem.price}</b>
							<div class="tools">
								<a href="products/delete/${elem.id}"><i class="icon-trash"></i></a>
								<a href="products/edit/${elem.id}"><i class="icon-pencil"></i></a>
							</div>
						</div>
					</div>`;
				});
				$("#listing").html(listing);
			}).fail(function() {
				console.log('Failed');
			});
	}
	// Search products
	$("body").on('submit','#search',function(e) {
		e.preventDefault();
		listing();
	});
</script>
<?php
	echo $footer;
?>