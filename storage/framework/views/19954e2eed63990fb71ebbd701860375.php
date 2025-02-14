    <?php
        $brands = DB::table('brands')->where('is_active', true)->whereIn('id',explode(',',$widget->brand_slider_ids))->get();
    ?>
    <section class="category-tab-section mb-3 bg-gray rounded-2xl">
        <div class="container-fluid">
            <div class="section-title mb-3">
                <div class="d-flex align-items-center">
                    <h3><?php echo e($widget->brand_slider_title); ?></h3>
                </div>
                <div class="category-navigation">
                    <div class="category-button-prev"><span class="material-symbols-outlined">chevron_left</span></div>
                    <div class="category-button-next"><span class="material-symbols-outlined">chevron_right</span></div>
                </div>
            </div>

            <div class="category-slider-wrapper swiper-container" data-loop="<?php echo e($widget->brand_slider_loop); ?>" data-autoplay="<?php echo e($widget->brand_slider_autoplay); ?>">
                <div class="swiper-wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="swiper-slide">
                            <a href="<?php echo e(url('brand')); ?>/<?php echo e($brand->slug); ?>">
                                <div class="brand-container">
                                    <div class="brand-img">
                                    <?php if($brand->image!==null): ?>
                                        <img loading="lazy" class="category-img" data-src="<?php echo e(url('images/brand/')); ?>/<?php echo e($brand->image); ?>" alt="<?php echo e($brand->title); ?>">
                                    <?php else: ?>
                                        <img loading="lazy" src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=<?php echo e($brand->title); ?>" alt="<?php echo e($brand->title); ?>">
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/includes/brand-slider-widget.blade.php ENDPATH**/ ?>