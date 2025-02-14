<?php $__env->startSection('title'); ?>
    <?php echo e($ecommerce_setting->site_title ?? ''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
    <?php echo e(''); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($sliders)): ?>
        <!--Home Banner starts -->
        <section class="banner-area v3 pt-0 mb-3">
            <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme != 'fashion'): ?>
                <div class="container-fluid">
            <?php endif; ?>

            <div class="single-banner-item">
                <div class="row">
                    <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'default'): ?>
                        <div class="col-md-9 offset-md-3">
                        <?php else: ?>
                            <div class="col-md-12">
                    <?php endif; ?>
                    <div id="hero-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="carousel-item <?php if($key == 0): ?> active <?php endif; ?>"
                                    href="<?php echo e($slider->link); ?>">
                                    <div class="single-carousel-item">
                                        <img data-src-m="<?php echo e(url('frontend/images/slider/mobile/')); ?>/<?php echo e($slider->image1); ?>"
                                            src="<?php echo e(url('frontend/images/slider/desktop/')); ?>/<?php echo e($slider->image1); ?>"
                                            alt="" />
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php if(count($sliders) > 1): ?>
                            <button class="carousel-control-prev" type="button" data-target="#hero-slider"
                                data-slide="prev">
                                <span aria-hidden="true"><i class="material-symbols-outlined">chevron_left</i></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#hero-slider"
                                data-slide="next">
                                <span aria-hidden="true"><i class="material-symbols-outlined">chevron_right</i></span>
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            </div>
            <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme != 'fashion'): ?>
                </div>
            <?php endif; ?>
        </section>
        <!--Home Banner Area ends-->
    <?php endif; ?>

        <?php if(isset($widgets)): ?>
            <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($widget->name == 'category-slider-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.category-slider-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'brand-slider-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.brand-slider-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'product-category-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.product-category-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'product-collection-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.product-collection-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'text-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.text-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'three-c-banner-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.three-c-banner-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'two-c-banner-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.two-c-banner-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'one-c-banner-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.one-c-banner-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'tab-product-category-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.tab-product-category-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'tab-product-collection-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.tab-product-collection-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php if($widget->name == 'image-slider-widget'): ?>
                    <?php echo $__env->make('ecommerce::frontend.includes.image-slider-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    

    <?php if(isset($recently_viewed) && count($recently_viewed) > 0): ?>
        <?php echo $__env->make('ecommerce::frontend.includes.recently-viewed-products', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        <?php echo file_get_contents(Module::find('Ecommerce')->getPath() . '/assets/js/swiper.min.js'); ?>

    </script>
    <script type="text/javascript">
        "use strict";

        //category carousel
        if (('.category-slider-wrapper').length > 0) {
            var swiper = new Swiper('.category-slider-wrapper', {
                <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                    slidesPerView: 3,
                    centeredSlides: true,
                <?php else: ?>
                    slidesPerView: 6,
                <?php endif; ?>
                spaceBetween: 30,
                lazy: true,
                loop: true,
                navigation: {
                    nextEl: '.category-button-next',
                    prevEl: '.category-button-prev',
                },
                autoplay: {
                    delay: 4000,
                },
                // Responsive breakpoints
                breakpoints: {
                    // when window width is <= 675
                    <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                        675: {
                            slidesPerView: 1,
                        },
                    <?php else: ?>
                        675: {
                            slidesPerView: 2,
                            spaceBetween: 30
                        },
                    <?php endif; ?>

                    // when window width is <= 991
                    991: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    // when window width is <= 1024px
                    1024: {
                        <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                            slidesPerView: 4,
                        <?php else: ?>
                            slidesPerView: 6,
                        <?php endif; ?>
                        spaceBetween: 15
                    }
                }
            });
        }

        $(document).ready(function() {
            $('.category-img').each(function() {
                var img = $(this).data('src');
                $(this).attr('src', img);
            })

            $('.banner-img').each(function() {
                var img = $(this).data('src');
                $(this).attr('src', img);
            })
        })

        //product carousel
        if (('.product-slider-wrapper').length > 0) {
            var swiper = new Swiper('.product-slider-wrapper', {
                <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                    slidesPerView: 4,
                <?php else: ?>
                    slidesPerView: 5,
                <?php endif; ?>
                spaceBetween: 0,
                lazy: true,
                observer: true,
                observeParents: true,
                loop: false,
                navigation: {
                    nextEl: '.product-button-next',
                    prevEl: '.product-button-prev',
                },
                autoplay: {
                    delay: 4000,
                },
                // Responsive breakpoints
                breakpoints: {
                    // when window width is <= 675
                    <?php if(isset($ecommerce_setting->theme) && $ecommerce_setting->theme == 'fashion'): ?>
                        675: {
                            slidesPerView: 1,
                        },
                    <?php else: ?>
                        675: {
                            slidesPerView: 2,
                            spaceBetween: 30
                        },
                    <?php endif; ?>

                    // when window width is <= 991
                    991: {
                        slidesPerView: 4,
                        spaceBetween: 30
                    },
                    // when window width is <= 1024px
                    1024: {
                        slidesPerView: 6,
                        spaceBetween: 15
                    }
                }
            });
        }

        $(document).on('click', '.add-to-cart', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var parent = '#add_to_cart_' + id;

            var qty = $(parent + " input[name=qty]").val();

            var route = "<?php echo e(route('addToCart')); ?>";

            var btn = $(this);

            var btn_text = $(this).html();

            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status"><span class="sr-only">...</span></span>'
            );

            $.ajax({
                url: route,
                type: "POST",
                data: {
                    product_id: id,
                    qty: qty,
                },
                success: function(response) {
                    if (response) {
                        $('.alert').addClass('alert-custom show');
                        $('.alert-custom .message').html(response.success);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('.cart__menu .total').html('<?php echo e($currency->symbol ?? $currency->code); ?>' +
                            response.subTotal.toFixed(2));
                        $(btn).html(btn_text);
                        setTimeout(function() {
                            $('.alert').removeClass('show');
                        }, 4000);
                    }
                },
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ecommerce::frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/home.blade.php ENDPATH**/ ?>