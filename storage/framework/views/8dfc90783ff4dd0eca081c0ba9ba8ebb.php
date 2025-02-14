
<?php if($widget->name == 'text-widget'): ?>
<li><a class="toggle-collapse"> <?php echo e(trans('file.Text')); ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
    <div class="collapse">
        <hr>
        <form action="" class="">
            <?php echo e(csrf_field()); ?>

            <label><?php echo e(trans('file.Title')); ?></label>
            <input type="text" name="text_title" class="form-control" value="<?php echo e($widget->text_title); ?>">
            <label><?php echo e(trans('file.Text')); ?></label>
            <textarea name="text_content" class="form-control"><?php echo e($widget->text_content); ?></textarea>
            <div class="form-group mt-2">
                <button class="btn btn-sm btn-primary btn-save"><i class="dripicons-checkmark"></i></button>
                <a href="" class="btn btn-sm btn-danger btn-delete"><i class="dripicons-trash"></i></a>
                <input type="hidden" name="location" value="<?php echo e($widget->location); ?>">
                <input type="hidden" name="order" value="<?php echo e($widget->order); ?>">
                <input type="hidden" name="id" value="<?php echo e($widget->id); ?>">
                <input type="hidden" name="name" value="text-widget">
            </div>
        </form>
    </div>
</li>
<?php elseif($widget->name == 'custom-menu-widget'): ?>
<li><a class="toggle-collapse"> <?php echo e(trans('file.Custom Menu')); ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
    <div class="collapse">
        <hr>
        <form action="" class="">
            <?php echo e(csrf_field()); ?>

            <label><?php echo e(trans('file.Title')); ?></label>
            <input type="text" name="quick_links_title" class="form-control" value="<?php echo e($widget->quick_links_title); ?>">
            <label><?php echo e(trans('file.Select menu')); ?></label>
            <select name="quick_links_menu" class="selectpicker form-control">
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($widget->quick_links_menu == $menu->id): ?> selected <?php endif; ?> value="<?php echo e($menu->id); ?>"><?php echo e($menu->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="form-group mt-2">
                <button class="btn btn-sm btn-primary btn-save"><i class="dripicons-checkmark"></i></button>
                <a href="" class="btn btn-sm btn-danger btn-delete"><i class="dripicons-trash"></i></a>
                <input type="hidden" name="location" value="<?php echo e($widget->location); ?>">
                <input type="hidden" name="order" value="<?php echo e($widget->order); ?>">
                <input type="hidden" name="id" value="<?php echo e($widget->id); ?>">
                <input type="hidden" name="name" value="custom-menu-widget">
            </div>
        </form>
    </div>
</li>
<?php elseif($widget->name == 'site-features-widget'): ?>
<li><a class="toggle-collapse"> <?php echo e(trans('file.Site Features')); ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
    <div class="collapse">
        <hr>
        <form action="" class="" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <label><?php echo e(trans('file.Title')); ?></label>
            <input type="text" name="feature_title" class="form-control" value="<?php echo e($widget->feature_title); ?>">
            <label><?php echo e(trans('file.Text')); ?></label>
            <textarea name="feature_secondary_title" class="form-control"><?php echo e($widget->feature_secondary_title); ?></textarea>
            <label><?php echo e(trans('file.Icon')); ?></label>
            <input type="file" name="feature_icon" class="form-control">
            <div class="form-group mt-2">
                <button class="btn btn-sm btn-primary btn-save"><i class="dripicons-checkmark"></i></button>
                <a href="" class="btn btn-sm btn-danger btn-delete"><i class="dripicons-trash"></i></a>
                <input type="hidden" name="location" value="<?php echo e($widget->location); ?>">
                <input type="hidden" name="order" value="<?php echo e($widget->order); ?>">
                <input type="hidden" name="id" value="<?php echo e($widget->id); ?>">
                <input type="hidden" name="name" value="site-features-widget">
            </div>
        </form>
    </div>
</li>
<?php elseif($widget->name == 'site-info-widget'): ?>
<li><a class="toggle-collapse"> <?php echo e(trans('file.Site Information')); ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
    <div class="collapse">
        <hr>
        <form action="" class="">
            <?php echo e(csrf_field()); ?>

            <label><?php echo e(trans('file.Title')); ?></label>
            <input type="text" name="site_info_name" class="form-control" value="<?php echo e($widget->site_info_name); ?>">
            <label><?php echo e(trans('file.Text')); ?></label>
            <textarea name="site_info_description" class="form-control"><?php echo e($widget->site_info_description); ?></textarea>
            <label><?php echo e(trans('file.Address')); ?></label>
            <input type="text" name="site_info_address" class="form-control" value="<?php echo e($widget->site_info_address); ?>">
            <label><?php echo e(trans('file.Phone')); ?></label>
            <input type="text" name="site_info_phone" class="form-control" value="<?php echo e($widget->site_info_phone); ?>">
            <label><?php echo e(trans('file.Email')); ?></label>
            <input type="text" name="site_info_email" class="form-control" value="<?php echo e($widget->site_info_email); ?>">
            <label><?php echo e(trans('file.Hours')); ?></label>
            <input type="text" name="site_info_hours" class="form-control" value="<?php echo e($widget->site_info_hours); ?>">
            <div class="form-group mt-2">
                <button class="btn btn-sm btn-primary btn-save"><i class="dripicons-checkmark"></i></button>
                <a href="" class="btn btn-sm btn-danger btn-delete"><i class="dripicons-trash"></i></a>
                <input type="hidden" name="location" value="<?php echo e($widget->location); ?>">
                <input type="hidden" name="order" value="<?php echo e($widget->order); ?>">
                <input type="hidden" name="id" value="<?php echo e($widget->id); ?>">
                <input type="hidden" name="name" value="site-info-widget">
            </div>
        </form>
    </div>
</li>
<?php elseif($widget->name == 'newsletter-widget'): ?>
<li><a class="toggle-collapse"> <?php echo e(trans('file.Newsletter form')); ?> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
    <div class="collapse">
        <hr>
        <form action="" class="">
            <?php echo e(csrf_field()); ?>

            <label><?php echo e(trans('file.Title')); ?></label>
            <input type="text" name="newsletter_title" class="form-control" value="<?php echo e($widget->newsletter_title); ?>">
            <label><?php echo e(trans('file.Text')); ?></label>
            <textarea name="newsletter_text" class="form-control"><?php echo e($widget->newsletter_text); ?></textarea>
            <div class="form-group mt-2">
                <button class="btn btn-sm btn-primary btn-save"><i class="dripicons-checkmark"></i></button>
                <a href="" class="btn btn-sm btn-danger btn-delete"><i class="dripicons-trash"></i></a>
                <input type="hidden" name="location" value="<?php echo e($widget->location); ?>">
                <input type="hidden" name="order" value="<?php echo e($widget->order); ?>">
                <input type="hidden" name="id" value="<?php echo e($widget->id); ?>">
                <input type="hidden" name="name" value="newsletter-widget">
            </div>
        </form>
    </div>
</li>
<?php endif; ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/backend/widgets/widget-loop.blade.php ENDPATH**/ ?>