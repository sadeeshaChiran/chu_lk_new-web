    <?php
        $products = DB::table('products')->where('is_active', true)->where('is_online', true)->where('category_id',$widget->product_category_id)->offset(0)->limit($widget->product_category_limit)->get();
    ?>

    <section class="product-tab-section bg-gray rounded-2xl mt-3 mb-3">
        <div class="container-fluid">
            <div class="section-title mb-3">
                <div class="d-flex align-items-center">
                    <h3><?php echo e($widget->product_category_title); ?></h3>
                </div>
                <?php if($widget->product_category_type == 'slider'): ?>
                <div class="product-navigation">
                    <div class="product-button-next v1"><span class="material-symbols-outlined">chevron_right</span></div>
                    <div class="product-button-prev v1"><span class="material-symbols-outlined">chevron_left</span></div>
                </div>
                <?php endif; ?>
            </div> 

            <?php if($widget->product_category_type == 'slider'): ?>
            <div class="product-slider-wrapper swiper-container" data-loop="<?php echo e($widget->category_slider_loop); ?>" data-autoplay="<?php echo e($widget->category_slider_autoplay); ?>">
                <div class="swiper-wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="swiper-slide">
                    <?php echo $__env->make('ecommerce::frontend.includes.product-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php else: ?>
            <div class="product-grid">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('ecommerce::frontend.includes.product-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/includes/product-category-widget.blade.php ENDPATH**/ ?>