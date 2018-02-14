<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
	<!-- Page Head -->
	<div class="page-head">
		<h1>الملف الشخصي</h1>
		<div class="breadcrumb">
			<a href="#"><?=translate("Home")?></a>
			<a href="#">انهاء الطلب</a>
		</div>
	</div>
    <!-- // Page Head -->
    <div id="successAlert" class="alert success" style="display:none;">
        <span class="close-alert ti-clear"></span>
    </div>

    <div class="modal-box tornado-ui" id="modal-demo">
        <div class="modal-content">
            <div class="modal-head">
                إضافة عنوان جديد
                <span class="close-modal ti-clear"></span>
            </div>

            <div class="modal-body">
                <div id="errorAlert" class="alert danger" style="display:none;">
                    <span class="close-alert ti-clear"></span>
                </div>
                <form id="addAddressForm" action="" method="post" class="form-ui row billing">
                    <?=csrf_field() ?>
                    <input type="hidden" name="token" value="<?=session('customer')?>">
                    <div class="col-s-12 col-m-6 col-l-6">
                        <input name="first_name" placeholder="الإسم الشخصي" type="text" value=""/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <input name="last_name" placeholder="اسم العائلة" type="text" value=""/>
                    </div>
                    
                    <div class="col-s-12">
                        <input name="phone" placeholder="الهاتف المحمول" type="tel" value=""/>
                    </div>
                    <div class="col-s-12">
                        <input name="address_1" placeholder="إسم الشارع / رقم العمارة / رقم الشقة" type="text" value=""/>
                    </div>
                    <div class="col-s-12">
                        <input name="address_2" placeholder="رقم الشقة + معلومات اضافية للعنوان" type="text" value=""/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <input name="city" placeholder="المدينة" type="text" value=""/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-6">
                        <input name="region" placeholder="المنطقة" type="text" value=""/>
                    </div>
                    <div class="col-s-12 col-m-6 col-l-12">
                        <input id="addAddress" name="register" class="btn primary pro" value="حفظ"/>
                    </div>
                    <!-- // control input -->
                </form>
            </div>
        </div>
    </div>

	<div class="row row-reverse">
        <div class="col-s-12 col-l-9">
            <a class="btn primary" data-modal="modal-demo" href="#">إضافة عنوان جديد</a>
            <div class="row">
            <?php foreach($addresses as $address) : ?>
                <div data-id="<?=$address->id?>" class="address-block col-s-12 col-l-4">
                    <div style="padding: 25px;border: 1px solid rgba(0,0,0,.10)">
                        <p><?=$address->first_name?></p>
                        <p><?=$address->last_name?></p>
                        <p><?=$address->city?> <?=$address->region?> <?=$address->address_1?></p>
                        <p><?=$address->phone?></p>
                        <p><a href="account/address/<?=$address->id?>/edit">Edit</a></p>
                        <p><a class="deleteAddress" data-id="<?=$address->id?>" href="javascript:void(0)">Delete</a></p>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>

		<div class="col-s-12 col-l-3">
			<div class="side-wideget">
				<div class="section-head"><h2>حسابي</h2></div>
					<ul>
						<li><a href="./account">لوحة التحكم في الحساب</a></li>
						<li><a href="./account/edit">البيانات الشخصية</a></li>
						<li><a href="./address">سجل العناوين</a></li>
						<li><a href="./orders">طلباتي</a></li>
						<li><a href="./coupon">كوبونات الخصم</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- // Page Content -->
<script>
$("#addAddress").on("click", function() {
    $("#addAddressForm input").each(function() {
        $(this).removeClass("error");
    });
    $("#errorAlert").fadeOut();
    $.ajax({
        url: "./api/address/add",
        method: "POST",
        data: $("#addAddressForm").serialize(),
        success: function(html){
            $('#modal-demo').removeClass("active");
            $("#successAlert").html("The address has been added successfully.");
            $("#successAlert").fadeIn();
            $("#successAlert").delay(5000).fadeOut();
        },
        error: function(data) {
            var data = JSON.parse(data.responseText);
            var errors = $.map(data.errors, function(value, index) {
                return [index];
            });
            errors.forEach(element => {
                if($("input[name='"+element+"']").length) {
                    $("input[name='"+element+"']").addClass("error");
                }
            });
            $("#errorAlert").html(data.message);
            $("#errorAlert").fadeIn();
        }
    });
})

$(".deleteAddress").click(function(e) {
    var id = $(this).data("id");
    $.ajax({
        url: "./api/address/delete",
        method: "POST",
        data: {
            id: id,
            token: "<?=session('customer')?>"
        },
        success: function(html){
            $('.address-block[data-id="' + id + '"]').fadeOut();
            $("#successAlert").html("The address has been removed.");
            $("#successAlert").fadeIn();
            $("#successAlert").delay(5000).fadeOut();
        },
        error: function(data) {
            $("#errorAlert").html("<span>Error!</span> Please try again leter.");
            $("#errorAlert").fadeIn();
            $("#successAlert").delay(5000).fadeOut();
        }
    });
})
</script>
<?php echo $footer?>