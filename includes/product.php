<div class="product product-2">
    <figure class="product-media">
        <a href="product.php?ID=<?php echo $row['id'];?>">
        <?php
        $img = $row['img'];
        $image = explode(" | ",$img);
        ?>
        <img src="assets/images/products/<?php echo $image[0];?>" alt="Product image" class="product-image">
        </a>
        <div class="product-action product-action-transparent">
            <a href="product.php?ID=<?php echo $row['id'];?>" class="btn-product btn-cart"><span>add to cart</span></a>
        </div>
    </figure>                                    

    <div class="product-body">
        <div class="product-cat">
            <a><?php echo $row['category'];?></a>
        </div>
        <h3 class="product-title"><a href="product.php?ID=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></h3>
        <div class="product-price">
            &#8358;<?php echo number_format($row['price']);?>
        </div>
    </div>
</div>