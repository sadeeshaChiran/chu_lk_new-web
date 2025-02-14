<div class="single-product-wrapper p-1">
    <div class="bg-white p-2 rounded-2xl">
        <div class="single-product-item">
            <?php if($product->promotion == 1 && ($product->last_date > date('Y-m-d') || !isset($product->last_date))): ?>
                <div class="product-promo-text style1 bg-danger">
                    <span>-<?php echo e(round((($product->online_price - $product->promotion_price) / $product->online_price) * 100)); ?>%</span>
                </div>
            <?php endif; ?>
            <a href="<?php echo e(url('product')); ?>/<?php echo e($product->slug); ?>/<?php echo e($product->id); ?>" class="view-details">
                <?php if($product->image !== null): ?>
                    <?php
                        $images = explode(',', $product->image);
                        $product->image = $images[0];
                    ?>
                    <img loading="lazy" class="product-img"
                        data-src="<?php echo e(url('images/product/large/')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                <?php else: ?>
                    <img loading="lazy" src="https://dummyimage.com/300x300/e5e8ec/e5e8ec&text=<?php echo e($product->name); ?>"
                        alt="<?php echo e($product->name); ?>">
                <?php endif; ?>
            </a>
            <div class="product-overlay">
                <?php if(in_array($product->id, explode(',', $wishlist))): ?>
                    <a><span style="color: var(--theme-color);" class="material-symbols-outlined">favorite</span></a>
                <?php else: ?>
                    <a data-id="<?php echo e($product->id); ?>" class="add-to-wishlist"><span
                            class="material-symbols-outlined">favorite</span></a>
                <?php endif; ?>
                <a class="quick-view" data-id="<?php echo e($product->id); ?>" data-toggle="modal" data-target="#detailsModal"
                    title="quick view"><span class="material-symbols-outlined">zoom_in</span></a>
            </div>
        </div>

        <div class="product-details">
            <a class="product-name" href="<?php echo e(url('product')); ?>/<?php echo e($product->slug); ?>/<?php echo e($product->id); ?>">
                <?php echo ucwords($product->name); ?>

                <?php if(isset($product->unit)): ?>
                    <span class="product-quantity">(<?php echo e($product->unit->unit_name); ?>)</span>
                <?php endif; ?>
            </a>
            <div class="product-price">
                <?php if($product->promotion == 1 && ($product->last_date > date('Y-m-d') || !isset($product->last_date))): ?>
                    <span
                        class="price"><?php echo e($currency->symbol ?? $currency->code); ?><?php echo e($product->promotion_price); ?></span>
                    <span
                        class="old-price"><?php echo e($currency->symbol ?? $currency->code); ?><?php echo e($product->online_price); ?></span>
                <?php else: ?>
                    <span class="price"><?php echo e($currency->symbol ?? $currency->code); ?><?php echo e($product->online_price); ?></span>
                <?php endif; ?>
            </div>
            <?php if($ecommerce_setting->theme != 'fashion'): ?>
                <?php if($product->in_stock == 1): ?>
                    <?php if(is_null($product->is_variant)): ?>
                        <form class="d-flex justify-content-between" method="post"
                            id="add_to_cart_<?php echo e($product->id); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="d-flex align-items-center">
                                <div class="input-qty">
                                    <button type="button" class="quantity-left-minus">
                                        <i class="material-symbols-outlined">remove</i>
                                    </button>
                                    <input type="number" name="qty" class="input-number" value="1"
                                        min="1" max="<?php echo e($product->qty); ?>">
                                    <button type="button" class="quantity-right-plus">
                                        <i class="material-symbols-outlined">add</i>
                                    </button>
                                </div>
                            </div>
                            <button data-id="<?php echo e($product->id); ?>" type="submit"
                                class="button style1 add-to-cart w-full"><span
                                    class="material-symbols-outlined">shopping_bag</span></button>
                        </form>
                    <?php else: ?>
                        <div class="text-center">
                            <a href="<?php echo e(url('/')); ?>/product/<?php echo e($product->slug); ?>/<?php echo e($product->id); ?>"
                                class="button style1"><?php echo e(trans('file.Add to cart')); ?></a>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($product->qty > 0): ?>
                        <?php if(is_null($product->is_variant)): ?>
                            <form class="d-flex justify-content-between" method="post"
                                id="add_to_cart_<?php echo e($product->id); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="d-flex align-items-center">
                                    <div class="input-qty">
                                        <button type="button" class="quantity-left-minus">
                                            <i class="material-symbols-outlined">remove</i>
                                        </button>
                                        <input type="number" name="qty" class="input-number" value="1"
                                            min="1" max="<?php echo e($product->qty); ?>">
                                        <button type="button" class="quantity-right-plus">
                                            <i class="material-symbols-outlined">add</i>
                                        </button>
                                    </div>
                                </div>
                                <button data-id="<?php echo e($product->id); ?>" type="submit"
                                    class="button style1 add-to-cart"><span
                                        class="material-symbols-outlined">shopping_bag</span></button>
                            </form>
                        <?php else: ?>
                            <div class="text-center">
                                <a href="<?php echo e(url('/')); ?>/product/<?php echo e($product->slug); ?>/<?php echo e($product->id); ?>"
                                    class="button style1"><?php echo e(trans('file.Add to cart')); ?></a>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <span><?php echo e(trans('file.Out of stock')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/includes/product-template.blade.php ENDPATH**/ ?>