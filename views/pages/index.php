<a href="index.php?c=products&a=products&sale=all">
<img src="assets/images/sales/sales.png" alt="Sales" style="margin:15px;"> </a>

<h2>Campaigns/Sales</h2>
<? if(!empty($sales)) : ?>
<div class="sales">
    <? foreach($sales as $sale) : ?>
        <div class="sales">
        <a href="index.php?c=products&a=products&sale=<?=$sale['name']?>">
        <img src="<?=$sale['image']['imageUrl'] ?? ''?>" alt="<?= $sale['image']['altText'] ?? ''?>"></a>
        </div>
        <br>
    <? endforeach; ?>
</div><br>
<? endif; ?>
<h2>Highlights</h2>
<div class="hightlights">
    <div>
    <a href="index.php?c=products&a=products&cat=Shoes">
    <img src="assets/images/index/sneakersAndMore.png" alt="Sneakers and More"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=Hats">
    <img src="assets/images/index/hatsAndStyles.png" alt="Hats and Styles"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=Sweaters">
    <img src="assets/images/index/hoodiesAndSweaters.png" alt="Hoodies And Sweaters"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=Jackets">
    <img src="assets/images/index/jackets.png" alt="Jackets"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=Trousers">
    <img src="assets/images/index/pants.png" alt="Pants"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=Socks">
    <img src="assets/images/index/socks.png" alt="Rock your new Socks"></a>
    </div>
    <br>

    <div>
    <a href="index.php?c=products&a=products&cat=T-Shirts">
    <img src="assets/images/index/t-shirts.png" alt="T-Shirts"></a>
    </div>
    <br>
</div><br>
<div><h2>New Products</h2></div>
<div class="newProducts">
    <div>
    <a href="index.php?c=products&a=products&sortBy=newestFirst">
    <img src="assets/images/index/newIn.png" alt="New Products"></a>
    </div>
    <br>
</div><br>
<? // var_dump($_SESSION);?>