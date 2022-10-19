<!-- single-product-wrap start -->
<div class="single-product-wrap">
    <div class="product-image">
        <a href="<?php echo e(route('product.show', $product->slug ?? '')); ?>">
            <img src="<?php echo e($product->image_url); ?>" alt="Li's Product Image">
        </a>
        <span class="sticker">New</span>
    </div>
    <div class="product_desc">
        <div class="product_desc_info">
            <div class="product-review">
                <h5 class="manufacturer">
                    <a href="shop-left-sidebar.html"><?php echo e($product->category->name); ?></a>
                </h5>
                <div class="rating-box">
                    <ul class="rating">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                    </ul>
                </div>
            </div>
            <h4><a class="product_name" href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a></h4>
            <div class="price-box">
                <span class="new-price"><?php echo e(Currency::format($product->price)); ?></span>
                <?php if($product->compare_price): ?>
                    <span class="old-price"><?php echo e(Currency::format($product->compare_price)); ?></span>
                <?php endif; ?>   

                <?php if($product->sale_percent): ?> 
                    <span class="discount-percentage">-<?php echo e($product->sale_percent); ?>%</span>
                <?php endif; ?>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active"><a href="#">Add to cart</a></li>
                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- single-product-wrap end --><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\components\product-card.blade.php ENDPATH**/ ?>