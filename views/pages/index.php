<div class="banner">
    <a href="index.php?c=products&a=products&sale=all">
    <img src="assets/images/sales/sales.png" alt="Sales"></a>
</div>

<? if(!empty($sales)) : ?>
    <h2 class="center">Campaigns/Sales</h2>
    <div class="products center">
        <? foreach($sales as $sale) : ?>
            <div class="product">
                <a href="index.php?c=products&a=products&sale=<?=$sale['name']?>">
                <img src="<?=$sale['image']['imageUrl'] ?? ''?>" alt="<?= $sale['image']['altText'] ?? ''?>"></a>
            </div>
        <? endforeach; ?>
    </div><br>
<? endif; ?>
<h2 class="center">Highlights</h2>
<div class="products center">
    <div class="product">
        <a href="index.php?c=products&a=products&cat=Shoes">
        <img src="assets/images/index/sneakersAndMore.png" alt="Sneakers and More"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=Hats">
        <img src="assets/images/index/hatsAndStyles.png" alt="Hats and Styles"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=Sweaters">
        <img src="assets/images/index/hoodiesAndSweaters.png" alt="Hoodies And Sweaters"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=Jackets">
        <img src="assets/images/index/jackets.png" alt="Jackets"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=Trousers">
        <img src="assets/images/index/pants.png" alt="Pants"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=Socks">
        <img src="assets/images/index/socks.png" alt="Rock your new Socks"></a>
    </div>

    <div class="product">
        <a href="index.php?c=products&a=products&cat=T-Shirts">
        <img src="assets/images/index/t-shirts.png" alt="T-Shirts"></a>
    </div>
</div>

<h2 class="center">New Products</h2>
<div class="products">
    <div class="product">
        <div>
            <a href="index.php?c=products&a=products&sortBy=newestFirst">
            <img src="assets/images/index/newIn.png" alt="New Products"></a>
        </div>
    </div>
</div>
<? // var_dump($_SESSION);?>