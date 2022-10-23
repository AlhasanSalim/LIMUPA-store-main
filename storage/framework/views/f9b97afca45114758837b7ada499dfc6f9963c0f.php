<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-bell"></i>

        <?php if($newCount): ?>
        <span class="badge badge-warning navbar-badge"><?php echo e($newCount); ?></span>
        <?php endif; ?>
      
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
      <span class="dropdown-header"><?php echo e($newCount); ?> Notifications</span>
      <div class="dropdown-divider"></div>
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($notification->data['url']); ?>?notification_id=<?php echo e($notification->id); ?>" class="dropdown-item <?php if($notification->unread()): ?> text-bold <?php endif; ?>">
                <i class="<?php echo e($notification->data['icon']); ?>"></i> <?php echo e(substr($notification->data['body'], 31)); ?>

                <span class="float-right text-muted text-sm"> <?php echo e($notification->created_at->longAbsoluteDiffForHumans()); ?> </span>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <div class="dropdown-divider"></div>
      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
    </div>
  </li><?php /**PATH E:\xampp\htdocs\Laravel\adminLTE_backEnd - Copy\resources\views/components/dashboard/notifications-menu.blade.php ENDPATH**/ ?>