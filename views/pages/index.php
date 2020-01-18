<br>
<a href="index.php?c=products&a=products&sale=all">
    <img src="/Git/BeHop/assets/images/sales/SALES.png" alt="Sales">

<div><h2>Campaigns/Sales</h2></div>
<? if(!empty($sales)) : ?>
<div>
    <? foreach($sales as $sale) : ?>
        <div class="sales">
        <a href="index.php?c=products&a=products&sale=<?=$sale['name']?>">
        <img src="<?=$sale['image']['imageUrl'] ?? ''?>" alt="<?= $sale['image']['altText'] ?? ''?>">
        </a></div>
    <? endforeach; ?>
</div><br>
<? endif; ?>
<div><h2>Highlights</h2></div>
    <div class="hightlights">
    <a href="index.php?c=products&a=products&cat=Shoes">
    <img src="/Git/BeHop/assets/images/index/sneakersAndMore.png" alt="Sneakers and More">
    </a></div>
    <br>
<div><h2>New Products</h2></div>

<?//var_dump($_SESSION);?>