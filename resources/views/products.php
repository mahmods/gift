<?php echo $header?>
<!-- Page Content -->
<div id="main" data-category="<?=$category->id?>" class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1 class="page-title"><?=(isset($category->name) ? translate($category->name) : translate('Products'));?></h1>
		<div class="breadcrumb">
			<a href="<?=url('')?>">الرئيسية</a>
			<a class="page-title" href="#"><?=(isset($category->name) ? translate($category->name) : translate('Products'));?></a>
		</div>
	</div>
	<!-- // Page Head -->

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
			
	<div class="row row-reverse">
		<div class="col-s-12 col-l-9">
			<a href="#" class="adspro"><img src="<?=$tp?>/assets/img/adscx2.png" alt=""></a>
			
			<div id="product-list" class="row">
				<?php foreach($products as $product) : ?>
				<!-- Product Block -->
				<div id="'.$product->id.'" class="product-block col-s-12 col-m-6 col-l-4">
					<div class="content-box">
						<a href="#" class="image" data-src="<?=url('/assets/products/'.image_order($product->images))?>"></a>
						<span class="discount-badge">خصم 25%</span>
						<div class="hvr">
							<a href="#" class="btn primary add-cart-fast" data-id="<?=$product->id?>" data-modal="item-added">اضافه الى السله</a>
							<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
						</div>
						<a href="product/<?=path($product->title,$product->id)?>"><h3><?=$product->title?></h3></a>
						<h4 class="price"><?=currency($product->price)?> <span>200egp</span></h4>
					</div>
				</div>
				<!-- // Product Block -->
				<?php endforeach; ?>
			</div>
			
			<div class="pagination">
				<ul>
					<li><a href="#">الصفحة السابقه</a></li>
					<li class="active"><a href="#">01</a></li>
					<li><a href="#">02</a></li>
					<li><a href="#">03</a></li>
					<li><a href="#">04</a></li>
					<li><a href="#">05</a></li>
					<li><a href="#">06</a></li>
					<li><a href="#">الصفحة التاليه</a></li>
				</ul>
			</div>
		</div>
		
		<div class="col-s-12 col-l-3">
			<a href="#" class="adspro"><img src="<?=$tp?>/assets/img/adsc.png" alt=""></a>
			
			<div class="side-wideget">
				<div class="section-head"><h2>الفئات والتصنيفات</h2></div>
				<?php $subCategories = App\Category::where("parent", $category->id)->orWhere("id", $category->id)->get(); ?>
				<ul>
					<?php foreach ($subCategories as $cat) : ?>
					<?php $count = App\Product::where("category", $cat->id)->count(); ?>
					<li><a data-id="<?=$cat->id?>" data-title="<?=$cat->name?>" class="change-category" href="javascript:void(0);"><?=$cat->name?><span class="badge"><?=$count?></span></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			
			<!--<div class="side-wideget">
				<div class="section-head"><h2>الالوان</h2></div>
				<div class="colors">
					<a href="#" data-color="#ff6e87" title="Color Name" class="tooltip" data-placement="bottom"></a>
					<a href="#" data-color="#d43e43" title="Color Name" class="tooltip" data-placement="bottom"></a>
					<a href="#" data-color="#e47da2" title="Color Name" class="tooltip" data-placement="bottom"></a>
					<a href="#" data-color="#b27de4" title="Color Name" class="tooltip" data-placement="bottom"></a>
					<a href="#" data-color="#f83536" title="Color Name" class="tooltip" data-placement="bottom"></a>
					<a href="#" data-color="#f5af1a" title="Color Name" class="tooltip" data-placement="bottom"></a>
				</div>
			</div>-->
			
			<div class="side-wideget">
				<div class="section-head"><h2>تصنيف حسب السعر</h2></div>
				<b class="pull-left price"><?=$price['min'] ?></b>
				<b class="pull-right price"><?=$price['max']; ?></b>
				<input name="min" id="min" type="hidden">
				<input name="max" id="max" type="hidden">
				<div id="price"></div>
				<div class="form-ui" style="display:none;">
					<div class="range-wraper">
						<input type="hidden" class="range-slider" data-min='0' data-max='200' value='10,100'>
					</div>
				</div>
			</div>
			
			<!--<div class="side-wideget">
				<div class="section-head"><h2>الطعم - النوع</h2></div>
				<ul class="form-ui">
					<li><label class="checkbox"><input type="checkbox"> <span>جميع أنواع الكيك والجورميه</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>الكعك والكب كيك</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>شوكولاتة</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>الكيك الموفر</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>سلال الهدايا الفاخرة</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>ماغنوليا بيكري</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>الحلوى اللذيذة</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>ايديبل ارينجمينتس</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>جوديفا</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>جونز ذا جروسر</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>ذا لايم تري كافيه</span></label></li>
					<li><label class="checkbox"><input type="checkbox"> <span>شوكولاتة ميرزام</span></label></li>
				</ul>
			</div>-->
		</div>
	</div>
</div>
<!-- // Page Content -->
<script>
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

handlesSlider.noUiSlider.on('end', function(values, handle) {
	$.ajax({ 
		url: 'api/products',
		type: 'get',
		data: {
			min: parseInt(values[0]),
			max: parseInt(values[1]),
			cat: $("#main").data("category")
		},
		crossDomain: true,
	}).done(function(response) {
		data = JSON.parse(response);
		var listing = '';
		$.each(data.products, function(index,elem){
			listing += `
			<div id="${elem.id}" class="product-block col-s-12 col-m-6 col-l-4">
					<div class="content-box">
						<a href="#" class="image" data-src="${elem.images}"></a>
						<span class="discount-badge">خصم 25%</span>
						<div class="hvr">
							<a href="#" class="btn primary add-cart-fast" data-id="${elem.id}" data-modal="item-added">اضافه الى السله</a>
							<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
						</div>
						<a href="${elem.path}"><h3>${elem.title}</h3></a>
						<h4 class="price">${elem.price}<span>200egp</span></h4>
					</div>
				</div>
				<!-- // Product Block -->
			`
		});
		$("#product-list").html(listing);
		$("[data-src]").each(function (){
			var backgroundImage = $(this).attr("data-src");
			$(this).css( "background-image","url(" + backgroundImage + ")" );
		});
	});
});
// Search products
$(".change-category").on('click', function(e) {
	e.preventDefault();
	self = this;
	$.ajax({ 
		url: 'api/products',
		type: 'get',
		data: {
			cat: $(this).data("id")
		},
		crossDomain: true,
	}).done(function(response) {
		data = JSON.parse(response);
		var listing = '';
		$.each(data.products, function(index,elem){
			listing += `
			<div id="${elem.id}" class="product-block col-s-12 col-m-6 col-l-4">
					<div class="content-box">
						<a href="#" class="image" data-src="${elem.images}"></a>
						<span class="discount-badge">خصم 25%</span>
						<div class="hvr">
							<a href="#" class="btn primary add-cart-fast" data-id="${elem.id}" data-modal="item-added">اضافه الى السله</a>
							<a href="#" class="btn secondary" data-modal="item-added">اضف الى الامنيات</a>
						</div>
						<a href="${elem.path}"><h3>${elem.title}</h3></a>
						<h4 class="price">${elem.price}<span>200egp</span></h4>
					</div>
				</div>
				<!-- // Product Block -->
			`
		});
		$("#product-list").html(listing);
		$("#main").data("category", $(self).data("id"));
		$(".page-title").each(function() {
			$(this).text($(self).data("title"));
		})
		handlesSlider.noUiSlider.updateOptions({
			range: {
				min: data.price.min - 1,
				max: data.price.max + 1
			},
			start: [data.price.min - 1,data.price.max + 1],
		}, true);
		$("[data-src]").each(function (){
			var backgroundImage = $(this).attr("data-src");
			$(this).css( "background-image","url(" + backgroundImage + ")" );
		});
	}).fail(function() {
		console.log('Failed');
	});
})
</script>
<?php echo $footer?>