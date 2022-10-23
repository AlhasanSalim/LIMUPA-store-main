<?php if (isset($component)) { $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FrontLayout::class, ['title' => 'Login']); ?>
<?php $component->withName('front-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('breadcrumb', null, []); ?> 
        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
     <?php $__env->endSlot(); ?>
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                    <!-- Login Form s-->
                    <form action="<?php echo e(route('login')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <?php if($errors->has(config('fortify.username'))): ?>
                            <div class="alert alert-danger">
                                <?php echo e($errors->first(config('fortify.username'))); ?>

                            </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>Email</label>
                                    <input class="mb-0" type="text"  name= "<?php echo e(config('fortify.username')); ?>" placeholder="Email Address" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Password</label>
                                    <input class="mb-0" type="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" name="remember" value="1" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    <?php if(Route::has('password.request')): ?>
                                        <a href="<?php echo e(route('password.request')); ?>"> Forgotten pasward?</a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-12">
                                    <button class="register-button mt-0" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a)): ?>
<?php $component = $__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a; ?>
<?php unset($__componentOriginal427056743380f0127f5c6367fdb385e78ff8dc7a); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd - Copy\resources\views/front/auth/login.blade.php ENDPATH**/ ?>