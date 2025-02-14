<section class="mb-3">
    <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e($widget->one_c_banner_link1); ?>">
                <?php
                    $file = public_path('frontend/images/banners/mobile/' . $widget->one_c_banner_image1);
                ?>

                <?php if(file_exists($file)): ?>
                    <img class="banner-img" loading="lazy" data-src-m="<?php echo e(url('frontend/images/banners/mobile/' . $widget->one_c_banner_image1)); ?>" src="<?php echo e(url('frontend/images/banners/desktop/' . $widget->one_c_banner_image1)); ?>" alt="" />
                <?php else: ?>
                    <img class="banner-img" loading="lazy" data-src-m="" src="<?php echo e(url('frontend/images/banners/desktop/' . $widget->one_c_banner_image1)); ?>" alt="" />
                <?php endif; ?>
            </a>
        </div>
    </div>
    <?php else: ?>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo e($widget->one_c_banner_link1); ?>">
                    <?php
                        $file = public_path('frontend/images/banners/mobile/' . $widget->one_c_banner_image1);
                    ?>

                    <?php if(file_exists($file)): ?>
                        <img class="img-fluid w-100 rounded-2xl" loading="lazy" data-src-m="<?php echo e(url('frontend/images/banners/mobile/' . $widget->one_c_banner_image1)); ?>" src="<?php echo e(url('frontend/images/banners/desktop/' . $widget->one_c_banner_image1)); ?>" alt="" />
                    <?php else: ?>
                        <img class="img-fluid w-100 rounded-2xl" loading="lazy" data-src-m="" src="<?php echo e(url('frontend/images/banners/desktop/' . $widget->one_c_banner_image1)); ?>" alt="" />
                    <?php endif; ?>         
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/includes/one-c-banner-widget.blade.php ENDPATH**/ ?>