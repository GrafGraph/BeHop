<? // var_dump($_SESSION);?>
<div class="start-wrap">
    <div class="banner img-hover-zoom-little">
        <a href="index.php?c=products&a=products&sale=all">
            <img src="assets/images/sales/sales.png" alt="Sales">
        </a>
    </div>


    <? if(!empty($sales)) : ?>
        <div class="start-container">
            <? foreach($sales as $sale) : ?>
                <div class="start-item img-hover-zoom-little">
                    <a href="index.php?c=products&a=products&sale=<?=$sale['name']?>">
                        <img src="<?=$sale['image']['imageUrl'] ?? ''?>" alt="<?= $sale['image']['altText'] ?? ''?>">
                    </a>
                </div>
            <? endforeach; ?>
        </div>
    <? endif; ?>

    <div class="start-container">
        <div class="start-item img-hover-zoom-little">
            <a href="index.php?c=products&a=products&cat=Hats">
                <img src="assets/images/index/hatsAndStyles.png" alt="Hats and Styles">
            </a>
        </div>
        <div class="start-container-vertical-half">
            <div class="start-item-vertical-half img-hover-zoom-little">
                <a href="index.php?c=products&a=products&cat=Shoes">
                    <img src="assets/images/index/Shoes.png" alt="Shoes">
                </a>
            </div>
            <div class="start-item-vertical-half img-hover-zoom-little">
                <a href="index.php?c=products&a=products&cat=Jackets">
                    <img src="assets/images/index/jackets.png" alt="Jackets">
                </a>
            </div>
        </div>
    </div>

    <div class="banner img-hover-zoom-little">
        <a href="index.php?c=products&a=products&sortBy=newestFirst">
            <img src="assets/images/index/newIn.png" alt="New Products">
        </a>
    </div>

    <div class="start-container ">
        <div class="start-container-vertical-half">
            <div class="start-item-vertical-half img-hover-zoom-little">
                <a href="index.php?c=products&a=products&cat=Socks">
                    <img src="assets/images/index/socks.png" alt="Rock your new Socks">
                </a>
            </div>
            <div class="start-item-vertical-half img-hover-zoom-little">
                <a href="index.php?c=products&a=products&cat=T-Shirts">
                    <img src="assets/images/index/t-shirts.png" alt="T-Shirts">
                </a>
            </div>
        </div>  
        <div class="start-item img-hover-zoom-little">
            <a href="index.php?c=products&a=products&cat=Hoodies">
                <img src="assets/images/index/hoodiesAndSweaters.png" alt="Hoodies And Sweaters">
            </a>
        </div>
    </div>
</div>