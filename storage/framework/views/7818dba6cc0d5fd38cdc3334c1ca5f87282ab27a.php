<?php if (isset($component)) { $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FrontLayout::class, ['title' => 'Cart']); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('breadcrumb', null, []); ?> 
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="<?php echo e(route('product.index')); ?>">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
     <?php $__env->endSlot(); ?>
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-remove">remove</th>
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cart->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($item->id); ?>">
                                        <td class="li-product-remove" data-id="<?php echo e($item->id); ?>"><a href="#"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="<?php echo e(route('product.show', $item->product->slug)); ?>"><img src="<?php echo e($item->product->image_url); ?>" alt="Li's Product Image"></a></td>
                                        <td class="li-product-name"><a href="#"><?php echo e($item->product->name); ?></a></td>
                                        <td class="li-product-price"><span class="amount"><?php echo e(Currency::format($item->product->price)); ?></span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <input class="cart-plus-minus-box item-quantity" data-id="<?php echo e($item->id); ?>" value="<?php echo e($item->quantity); ?>" type="text">
                                            
                                        </td>
                                        <td class="product-subtotal"><span class="amount"><?php echo e(Currency::format($item->quantity * $item->product->price)); ?></span></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span><?php echo e(Currency::format( $cart->total() )); ?></span></li>
                                        <li>Total <span><?php echo e(Currency::format( $cart->total() )); ?></span></li>
                                    </ul>
                                    <a href="#">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Shopping Cart Area End-->
    <?php $__env->startPush('scripts'); ?>
        

        <script>
            const csrf_token = "<?php echo e(csrf_token()); ?>"; // return csrf token and this variable is constant becasue not change.
        </script>


        <script src="<?php echo e(asset('js/cart.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a)): ?>
<?php $component = $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a; ?>
<?php unset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a); ?>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd\resources\views\front\cart.blade.php ENDPATH**/ ?>