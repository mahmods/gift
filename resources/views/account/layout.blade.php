<?php echo $header?>
<!-- Page Content -->
<div class="container page-content">
    <!-- Page Head -->
    <div class="page-head">
        <h1>الملف الشخصي</h1>
        <div class="breadcrumb">
            <a href="#">
                <?=translate("Home")?>
            </a>
            <a href="#">انهاء الطلب</a>
        </div>
    </div>
    <!-- // Page Head -->

    <div class="row row-reverse">
        <div class="col-s-12 col-l-9">
            @yield("content")
        </div>
        <div class="col-s-12 col-l-3">
            <div class="side-wideget">
                <div class="section-head">
                    <h2>حسابي</h2>
                </div>
                <ul>
                    <li>
                        <a href="./account">لوحة التحكم في الحساب</a>
                    </li>
                    <li>
                        <a href="./account/edit">البيانات الشخصية</a>
                    </li>
                    <li>
                        <a href="./account/address">عنواني</a>
                    </li>
                    <li>
                        <a href="./orders">طلباتي</a>
                    </li>
                    <li>
                        <a href="./coupon">كوبونات الخصم</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- // Page Content -->
<?php echo $footer?>