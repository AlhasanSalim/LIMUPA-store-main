<li class="hm-minicart">
    <div class="hm-minicart-trigger">
        <span class="item-icon"></span>
        <span class="item-text"><?php echo e(Currency::format($total)); ?>

            <span class="cart-item-count"><?php echo e($items->count()); ?></span>
        </span>
    </div>
    <span></span>
    <div class="minicart">
        <ul class="minicart-product-list">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li id="<?php echo e($item->id); ?>">
                    <a href="<?php echo e(route('product.show', $item->product->slug)); ?>" class="minicart-product-image">
                        <img src="<?php echo e($item->product->image_url); ?>" alt="cart products">
                    </a>
                    <div class="minicart-product-details">
                        <h6><a href="<?php echo e(route('product.show', $item->product->slug)); ?>"><?php echo e($item->product->name); ?></a></h6>
                        <span><?php echo e(Currency::format($item->product->price)); ?> x <?php echo e($item->quantity); ?></span>
                    </div>
                    <button class="close" title="Remove" data-id="<?php echo e($item->id); ?>">
                        <i class="fa fa-close"></i>
                    </button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <p class="minicart-total">SUBTOTAL: <span><?php echo e(Currency::format($total)); ?></span></p>
        <div class="minicart-button">
            <a href="<?php echo e(route('cart.store')); ?>" class="li-button li-button-fullwidth li-button-dark">
                <span>View Full Cart</span>
            </a>
            <a href="<?php echo e(route('checkout')); ?>" class="li-button li-button-fullwidth">
                <span>Checkout</span>
            </a>
        </div>
    </div>
</li><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views/components/cart-menu.blade.php ENDPATH**/ ?>