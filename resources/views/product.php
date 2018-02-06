<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1>اقسام المناسبات</h1>
		<div class="breadcrumb">
			<a href="#">الرئيسيه</a>
			<a href="<?=url('/products/'.$cat->path)?>"><?=$cat->name?></a>
			<a href="#">قسم باقات الهدايا</a>
		</div>
	</div>
	<!-- // Page Head -->
	<!-- Product Details -->
	<div class="row">
		<div class="col-s-12 col-m-6">
			<div class="photo-slider">
				<?php foreach($images as $image) :?>
					<div class="item"><a href="<?=url('/assets/products/'.$image)?>" class="zooming"><img src="<?=url('/assets/products/'.$image)?>" alt=""></a></div>
				<?php endforeach;?>
			</div>
			<div class="photo-thumbnails">
			<?php foreach($images as $image) :?>
				<div class="item"><img src="<?=url('/assets/products/'.$image)?>" alt=""></div>
			<?php endforeach;?>
			</div>
		</div>
		<div class="col-s-12 col-m-6">
			<div class="product-info">
				<h2><?=$product->title?></h2>
				<h4 class="price"><?=currency($product->price)?>   <span>320RS</span></h4>
				<p><?=$product->text?></p>
				<div class="options row form-ui">
					<div class="col-s-12 col-m-4">
						<label>العدد</label>
						<input class="quantity" type="number" value="1" min="1" max="10">
					</div>
					<div class="col-s-12 col-m-4">
						<label>اللون</label>
						<select>
							<option value="1" style="background:red">Red</option>
							<option value="2" style="background:yellow">Yellow</option>
							<option value="3" style="background:purple">Purple</option>
						</select>
					</div>
					<div class="col-s-12 col-m-4">
						<label>أضافي</label>
						<select>
							<option>كعكه مع البيض</option>
							<option>اختيار اضافي جديد</option>
							<option>اختيار اضافي على الطلب</option>
						</select>
					</div>
					<div class="col-s-12">
						<label>تاريخ الاستلام</label>
						<input type="text" class="datepicker" name="date" placeholder="اختيار التاريخ">
					</div>
				</div>
				<a href="#" data-id="<?=$product->id?>" class="btn primary add-cart" data-modal="item-added">اضافه الى السله</a>
				<a href="javascript:void(0);" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
			</div>
		</div>
	</div>
	<!-- // Product Details -->
		<!-- Product Features -->
		<div class="product-features">
			<div class="row cols-gutter-20">
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp?>/assets/img/truck-fast.png" alt=""></i>
						<h3 class="info">شحن مجاني <span>شحن مجاني للمنتجات اكثر من 500$</span></h3>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp?>/assets/img/money.png" alt=""></i>
						<h3 class="info">ضمان رجوع المال <span>يمكنك استرجاع مالك لمدة 30 يوم من الشراء</span></h3>
					</div>
				</div>
				
				<!-- Feature Block -->
				<div class="feature-block col-s-12 col-m-6 col-l-4">
					<div class="table-style">
						<i><img src="<?=$tp?>/assets/img/telemarketer.png" alt=""></i>
						<h3 class="info">الدعم الاونلاين <span>ان واجهتك مشكله يمكنك استخدام الدعم المباشر</span></h3>
					</div>
				</div>
			</div>
		</div>
		<!-- // Product Features -->

		<!-- Cart Added Modal -->
		<div class="modal-box tornado-ui success" id="item-added">
			<div class="modal-content pro">
				<span class="close-modal ti-clear"></span>
				<i class="ti-done-all"></i>
				<h3>تم اضافه المنتج الى سله الشراء بنجاح</h3>
				<p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</p>
			</div>
		</div>
		<!-- // Cart Added Modal -->
		<!-- Extra Details -->
		<div class="section-head">
			<h2>معلومات المنتج</h2>
		</div>
		
		<ul class="row extra-details">
			<li class="col-s-12 col-m-6">العلامة التجارية       <span>بلاك فيو</span></li>
		</ul>
		
		<!-- Reviews -->
		<div class="section-head">
			<h2>تقييمات المستخدمين</h2>
			<a href="#" class="more-btn">تقييم المنتج</a>
		</div>
		
		<?php foreach($reviews as $review) : ?>
		<!-- Review Block -->
		<div class="review-block">
			<h3>بواسطة <?=$review->name?></h3>
			<div class="stars">
			<?php
			$rr = $review->rating;
			$i = 0;
			while($i<5){
				$i++;
				echo '<span class="ti-star ' . (($i<=$review->rating) ? 'active' : '') . '"></span>';
				$rr--;
			}
			?>
				<span class="taged">تم شراؤه</span>
			</div>
			<p><?=nl2br($review->review)?></p>
		</div>
		<!-- // Review Block -->
		<?php endforeach; ?>
		
		<!-- Similar Products -->
		<div class="section-head">
			<h2>منتجات مشابهه</h2>
		</div>
		
		<div class="carousel-slider row">
			<!-- Product Block -->
			<div class="product-block col-s-12 col-m-6 col-l-4">
				<div class="content-box">
					<a href="#" class="image" data-src="img/product-13.png"></a>
					<span class="discount-badge">خصم 25%</span>
					<div class="hvr">
						<a href="#" class="btn primary" data-modal="item-added">اضافه الى السله</a>
						<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
					</div>
					<a href="#"><h3>مجموعه العشق الابدي</h3></a>
					<h4 class="price">150egp <span>200egp</span></h4>
				</div>
			</div>
			<!-- // Product Block -->
			
			<!-- Product Block -->
			<div class="product-block col-s-12 col-m-6 col-l-4">
				<div class="content-box">
					<a href="#" class="image" data-src="img/product-14.png"></a>
					<div class="hvr">
						<a href="#" class="btn primary" data-modal="item-added">اضافه الى السله</a>
						<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
					</div>
					<a href="#"><h3>مجموعه العشق الابدي</h3></a>
					<h4 class="price">150egp <span>200egp</span></h4>
				</div>
			</div>
			<!-- // Product Block -->
			
			<!-- Product Block -->
			<div class="product-block col-s-12 col-m-6 col-l-4">
				<div class="content-box">
					<a href="#" class="image" data-src="img/product-15.png"></a>
					<div class="hvr">
						<a href="#" class="btn primary" data-modal="item-added">اضافه الى السله</a>
						<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
					</div>
					<a href="#"><h3>مجموعه العشق الابدي</h3></a>
					<h4 class="price">150egp <span>200egp</span></h4>
				</div>
			</div>
			<!-- // Product Block -->
			
			<!-- Product Block -->
			<div class="product-block col-s-12 col-m-6 col-l-4">
				<div class="content-box">
					<a href="#" class="image" data-src="img/product-16.png"></a>
					<div class="hvr">
						<a href="#" class="btn primary" data-modal="item-added">اضافه الى السله</a>
						<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
					</div>
					<a href="#"><h3>مجموعه العشق الابدي</h3></a>
					<h4 class="price">150egp <span>200egp</span></h4>
				</div>
			</div>
			<!-- // Product Block -->
			
			<!-- Product Block -->
			<div class="product-block col-s-12 col-m-6 col-l-4">
				<div class="content-box">
					<a href="#" class="image" data-src="img/product-14.png"></a>
					<div class="hvr">
						<a href="#" class="btn primary" data-modal="item-added">اضافه الى السله</a>
						<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
					</div>
					<a href="#"><h3>مجموعه العشق الابدي</h3></a>
					<h4 class="price">150egp <span>200egp</span></h4>
				</div>
			</div>
			<!-- // Product Block -->
		</div>
</div>
<div class="container">
	<div class="content product-page">
		<div class="col-md-6">
			<div class="rating">
				<?php $tr = $rating; $i = 0; while($i<5){ $i++;?>
					<i class="star<?=($i<=$rating) ? '-selected' : '';?>"></i>
				<?php $tr--; }?>
				<b> <?=$total_ratings.' '.translate('Reviews')?> </b>
			</div>
			<?=string_cut(translate($product->text),600,' ...')?>
			<div class="order">
				<?php if ($product->quantity > 0) { ?>
				
					<?php
						$all_options = json_decode($product->options,true);
						if(!empty($all_options)){
						?>
						<form class="options" style="background:rgb(249, 250, 252)">
						<?php
							foreach($all_options as $i=>$row){
								$type = $row['type'];
								$name = $row['name'];
								$title = $row['title'];
								$option = $row['option'];
							?>
							<div class="option">
								<h6><?php echo $title.' :';?></h6>
								<?php
									if($type == 'radio'){
									?>
									<div class="custom_radio">
										<?php
											$i=1;
											foreach ($option as $op) {
											?>
											<label for="<?php echo 'radio_'.$i; ?>" style="display: block;"><input type="radio" name="<?php echo $name;?>" value="<?php echo $op;?>" id="<?php echo 'radio_'.$i; ?>"><?php echo $op;?></label>
											<?php
												$i++;
											}
										?>
									</div>
									<?php
										} else if($type == 'text'){
									?>
									<textarea class="form-control" rows="2" style="width:100%" name="<?php echo $name;?>"></textarea>
									<?php
										} else if($type == 'select'){
									?>
									<select name="<?php echo $name; ?>" class="form-control" type="text">
										<option value=""><?php echo translate('Choose one'); ?></option>
										<?php
											foreach ($option as $op) {
											?>
											<option value="<?php echo $op; ?>" ><?php echo $op; ?></option>
											<?php
											}
										?>
									</select>
									<?php
										} else if($type == 'multi_select') {
										$j=1;
										foreach ($option as $op){
										?>
										<label for="<?php echo 'check_'.$j; ?>" style="display: block;">
											<input type="checkbox" id="<?php echo 'check_'.$j; ?>" name="<?php echo $name;?>[]" value="<?php echo $op;?>">
											<?php echo $op;?>
										</label>
										<?php
											$j++;
										}
									}
								?>
							</div>
						<?php 
							}
						?>
						</form>
					<?php
						}
					?> 
					<button class="add-cart bg" data-id="<?=$product->id?>"><?=translate('Add to cart')?></button>
				<?php } else { ?>
					<p>Quantity unavailable</p>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="tab-content">
			<div class="tab-pane" id="reviews">

				<form action="" method="post" id="review" class="form-horizontal single">
					<div id="response"></div>
					<h5><?=translate('Add a review')?> :</h5>
					<fieldset>
						<div class="row">
							<div class="form-group col-md-4">
								<label class="control-label"><?=translate('Name')?></label>
								<input name="name" value="" class="form-control" type="text">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label"><?=translate('E-mail')?></label>
								<input name="email" value="" class="form-control" type="text">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label"><?=translate('Rating')?></label>
								<div id="star-rating">
									<input type="radio" name="rating" class="rating" value="1" />
									<input type="radio" name="rating" class="rating" value="2" />
									<input type="radio" name="rating" class="rating" value="3" />
									<input type="radio" name="rating" class="rating" value="4" />
									<input type="radio" name="rating" class="rating" value="5" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?=translate('Review')?></label>
							<textarea name="review" type="text" rows="5" class="form-control"></textarea>
						</div>
						<button data-product="<?=$product->id?>" name="submit" id="submit-review" class="btn btn-primary" ><?=translate('submit')?></button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<style>
	.zoomImg {
	background: white;
	}
</style>
<script>
/* 	
	$('#star-rating').rating();
	$(document).ready(function(){

		var maxQuantity = <?=$product->quantity?>;
		$("body").off('click',".rease").on('click',".rease", function() {
			
			var $button = $(this);
			var oldValue = $button.parent().find("input").val();
			if ($button.text() == "+") {
				if (oldValue < maxQuantity) {
					var newVal = parseFloat(oldValue) + 1;
				} else {
					newVal = maxQuantity;
				}
			} else {
				if (oldValue > 1) {
					var newVal = parseFloat(oldValue) - 1;
				} else {
					newVal = 1;
				}
			}
			
			$button.parent().find("input").val(newVal);
			
		});
		$("body").off('change').on('change',".quantity", function() {
			var $button = $(this);
			var oldValue = $button.val();
			if (oldValue > maxQuantity) {
				var newVal = maxQuantity;
			} else if (oldValue < 1) {
				var newVal = 1;
			}
			$button.parent().find("input").val(newVal);
		});
	}); */
</script>
<?php echo $footer?>