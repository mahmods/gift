<?php $items = \App\AdItem::where('ad_id', $bloc_meta)->get(); ?>
<div class="row">
    <?php foreach($items as $item) : ?>
    <div class="col-s-12 col-m-4">
        <a href="<?=$item->url?>" class="banner-block">
            <img src="<?=url('/assets/ads/'.$item->image)?>" alt="">
        </a>
    </div>
    <?php endforeach; ?>
</div>