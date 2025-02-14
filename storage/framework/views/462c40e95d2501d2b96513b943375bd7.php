<?php
        if(Cache::has('category_list')){
            $parent_categories = Cache::get('category_list')->whereIn('id',explode(',',$widget->category_slider_ids));  
        }else{
            $parent_categories = DB::table('categories')->where('is_active', true)->whereIn('id',explode(',',$widget->category_slider_ids))->get();
        }
    ?>
    <section class="category-tab-section mb-3 bg-gray rounded-2xl">
        <div class="container-fluid">
            <div class="section-title mb-3">
                <div class="d-flex align-items-center">
                    <h3><?php echo e($widget->category_slider_title); ?></h3>
                </div>
                <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme != 'fashion'): ?>
                <div class="category-navigation">
                    <div class="category-button-prev"><span class="material-symbols-outlined">chevron_left</span></div>
                    <div class="category-button-next"><span class="material-symbols-outlined">chevron_right</span></div>
                </div>
                <?php endif; ?>
            </div>

            <div class="category-slider-wrapper swiper-container" data-loop="<?php echo e($widget->category_slider_loop); ?>" data-autoplay="<?php echo e($widget->category_slider_autoplay); ?>">
                <div class="swiper-wrapper">
                    <?php $__empty_1 = true; $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="swiper-slide">
                            <a href="<?php echo e(url('shop')); ?>/<?php echo e($category->slug); ?>">
                                <div class="category-container">
                                    <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                                        <?php if($category->image!==null): ?>
                                            <img loading="lazy" class="category-img" data-src="<?php echo e(url('images/category/large')); ?>/<?php echo e($category->image); ?>" alt="<?php echo e($category->name); ?>">
                                        <?php else: ?>
                                            <img loading="lazy" src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=<?php echo e($category->name); ?>" alt="<?php echo e($category->name); ?>">
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($category->icon!==null): ?>
                                            <img loading="lazy" class="category-img" data-src="<?php echo e(url('images/category/icons/')); ?>/<?php echo e($category->icon); ?>" alt="<?php echo e($category->name); ?>">
                                        <?php else: ?>
                                            <img loading="lazy" src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=<?php echo e($category->name); ?>" alt="<?php echo e($category->name); ?>">
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="category-name">
                                    <?php echo e(ucwords($category->name)); ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
                <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                <div class="category-navigation">
                    <div class="category-button-prev"><span class="material-symbols-outlined">chevron_left</span></div>
                    <div class="category-button-next"><span class="material-symbols-outlined">chevron_right</span></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/includes/category-slider-widget.blade.php ENDPATH**/ ?>