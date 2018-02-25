<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
    <!-- Page Head -->
    <div class="page-head">
        <h1>انهاء الطلب</h1>
        <div class="breadcrumb">
            <a href="#">الرئيسيه</a>
            <a href="#">انهاء الطلب</a>
        </div>
    </div>
    <!-- // Page Head -->

    <!-- Checkout check-a refresh clock -->
    <div class="checkout steps-system">
        <!-- Steps Menu -->
        <ul class="steps-menu">
            <li class="ti-<?=$step == 1 ? "refresh " : ($step > 1 ? "check-a " : "clock ")?>">عنوانك</li>
            <li class="ti-<?=$step == 2 ? "refresh " : ($step > 2 ? "check-a " : "clock ")?>">إعداد رسالة التهنئة</li>
            <li class="ti-<?=$step == 3 ? "refresh " : ($step > 3 ? "check-a " : "clock ")?>">ملخص الطلبات</li>
            <li class="ti-<?=$step == 4 ? "refresh " : ($step > 4 ? "check-a " : "clock ")?>">الدفع</li>
        </ul>
        <!-- Step Content -->
        <div class="step-content <?=$step == 1 ? " active " : " "?> " id="step-1">
            <?php if ($errors->any()): ?>
            <div class="alert danger">
                All fields are required !
                <span class="close-alert ti-clear"></span>
            </div>
            <?php endif ?>
            <form id="address" class="form-ui row" action="" method="POST">
                <?=csrf_field() ?>
                    <div class="col-s-12 col-m-6">
                        <label class="required">الإسم الشخصي</label>
                        <input name="first_name" type="text" placeholder="الإسم الشخصي" value="<?= session("checkout.first_name") ?>">
                    </div>

                    <div class="col-s-12 col-m-6">
                        <label class="required">اسم العائلة</label>
                        <input name="last_name" type="text" placeholder="اسم العائلة" value="<?= session("checkout.last_name") ?>">
                    </div>

                    <div class="col-s-12 col-m-6">
                        <label class="required">إسم الشارع / رقم العمارة / رقم الشقة</label>
                        <textarea name="address_details" type="text" placeholder="رقم الشقة + معلومات اضافية للعنوان"><?= session("checkout.address_details") ?></textarea>
                    </div>

                    <div class="col-s-12 col-m-6">
                        <label class="required">الهاتف المحمول</label>
                        <input name="phone" type="text" placeholder="الهاتف المحمول" value="<?= session("checkout.phone") ?>">
                    </div>

                    <div class="col-s-12 col-m-6">
                        <label class="required">المنطقة</label>
                        <input name="region" type="text" placeholder="المنطقة" value="<?= session("checkout.region") ?>">
                    </div>

                    <div class="col-s-12 col-m-6">
                        <label class="required">المدينة</label>
                        <input name="city" type="text" placeholder="المدينة" value="<?= session("checkout.city") ?>">
                    </div>
                    <input name="address" type="submit" class="btn primary" value="استمرار" />
            </form>
        </div>

        <!-- Step Content -->
        <div class="step-content <?=$step == 2 ? " active " : " "?> " id="step-2">
            <?php if ($errors->any()): ?>
            <div class="alert danger">
                All fields are required !
                <span class="close-alert ti-clear"></span>
            </div>
            <?php endif ?>

            <form id="gift_cart" class="form-ui" action="" method="POST">
            <?=csrf_field() ?>
                <div class="row">
                    <div class="col-s-12 col-l-6">
                        <div id="gift-card">
                            <p></p>
                            <h3></h3>
                        </div>
                    </div>
                    <div class="col-s-12 col-l-6">
                        <label for="card-name" class="required">اسمك على كرت التهنئة</label>
                        <input name="cart_name" value="<?= session("checkout.cart_name") ?>" type="text" placeholder="اسمك كما تريدة ان يظهر على كرت التهنئه" id="card-name" name="card-name" required>
                        <label for="card-input">ادخل رسالتك <span>150 عدد الحروف المتبقية</span></label>
                        <textarea id="card-input" name="cart_message"><?= session("checkout.cart_message") ?></textarea>
                    </div>
                </div>
                <a href="./checkout/address" class="btn prev-step">الخطوة السابقه</a>
                <button type="submit" class="btn next-step">الخطوة التاليه</button>
            </form>
        </div>

        <!-- Step Content -->
        <?php if(!empty($products)) :?>
        <div class="step-content form-ui <?=$step == 3 ? " active " : " "?>" id="step-3">
            <!-- Cart Table -->
            <div class="cart-table responsive-table">
                <table>
                    <thead>
                        <tr>
                            <td class="col-s-1">صورة المنتج</td>
                            <td class="col-s-3">اسم المنتج</td>
                            <td class="col-s-2">العدد</td>
                            <td class="col-s-2">السعر</td>
                            <td class="col-s-2">الاجمالي</td>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $product) : ?>
                        <tr>
                            <td class="col-s-1">
                                <img src="<?=url('/assets/products/'.image_order($product['images']))?>" alt="" class="fluid">
                            </td>
                            <td class="col-s-3">
                                <a href="#">
                                    <h3>
                                        <?=$product['title']?>
                                    </h3>
                                </a>
                                <a href="#">قسم باقات الهدايا</a>
                            </td>
                            <td class="col-s-2">
                                <span>العدد</span>
                                <input type="number" min="1" max="9" step="1" value="<?=$product['quantity']?>" disabled>
                            </td>
                            <td class="col-s-2">
                                <span class="price">
                                    <?=$product['price']?>
                                </span>
                            </td>
                            <td class="col-s-2">
                                <span class="price">
                                    <?=$product['total']?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- // Cart Table -->
            <div>
                <div class="subtotal">
                    <label>إجمالي المبلغ:</label>
                    <span>
                        <?=$total_price?>
                    </span>
                </div>
                <div class="applied-shipping">
                    <label>مصاريف الشحن:</label>
                    <span>+0</span>
                </div>
            </div>
            <div class="amount">
                <div class="title">المبلغ الكلي:</div>
                <div class="total">
                    <span>
                        <?=$total_price?>
                    </span>
                </div>
            </div>
            <a href="./checkout/cart_gift" class="btn prev-step">الخطوة السابقه</a>
            <a href="./checkout/payment" class="btn next-step">الخطوة التاليه</a>
        </div>
        <?php endif; ?>

        <!-- Step Content -->
        <div class="step-content <?=$step == 4 ? " active " : " "?>" id="step-4">
            <?php if (isset($response)):?>
            <?php foreach ($response as $r): ?>
            <?php echo $r ?>
            <?php endforeach; ?>
            <?php endif;?>
            <a href="./checkout/summary" class="btn prev-step">الخطوة السابقه</a>
            <a href="./checkout/submit" class="btn next-step">إنهاء الطلب</a>
        </div>
    </div>
    <!-- // Checkout -->
</div>
<!-- // Page Content -->
<?php echo $footer?>