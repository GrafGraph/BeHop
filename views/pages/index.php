<h1>Welcome at BeHop!</h1><br>


<!-- <div><h2>Galery?</h2></div> -->
<div><h2>Campaigns/Sales</h2></div>
<? if(!empty($sales)) : ?>
<div>
    <? foreach($sales as $sale) : ?>
        <div class="sales">
        <a href="index.php?c=products&a=products&sale=<?=$sale['name']?>">
        <img src="<?=$sale['image']['imageUrl'] ?? ''?>" alt="<?= $sale['image']['altText'] ?? ''?>">
        </div></a>
    <? endforeach; ?>
</div><br>
<? endif; ?>
<div><h2>Highlights</h2></div>
    <div class="hightlights">
    <a href="index.php?c=products&a=products&cat=shoes">
    <img src="/Git/BeHop/assets/images/index/sneakersAndMore.jpg" alt="Sneakers and More">
    </div></a>
    <br>
<div><h2>New Products</h2></div>

<?//var_dump($_SESSION);?>