<header>
    <div id="header-middle" class="header-middle">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-baseline">
                <div class="d-flex align-items-center">
                    <div class="category__menu show-on-mobile"><i class="material-symbols-outlined">menu</i></div>
                    <div class="logo">
                        <a href="<?php echo e(url('/')); ?>">
                            <?php if(!config('database.connections.saleprosaas_landlord')): ?>
                                <?php if(isset($ecommerce_setting->logo)): ?>
                                    <img src="<?php echo e(url('frontend/images/')); ?>/<?php echo e($ecommerce_setting->logo); ?>"
                                        alt="<?php echo e($ecommerce_setting->site_title ?? ''); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('logo')); ?>/<?php echo e($general_setting->site_logo); ?>"
                                        alt="<?php echo e($ecommerce_setting->site_title ?? ''); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(isset($ecommerce_setting->logo)): ?>
                                    <img src="<?php echo e(asset('../../frontend/images/')); ?>/<?php echo e($ecommerce_setting->logo); ?>"
                                        alt="<?php echo e($ecommerce_setting->site_title ?? ''); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('../../logo')); ?>/<?php echo e($general_setting->site_logo); ?>"
                                        alt="<?php echo e($ecommerce_setting->site_title ?? ''); ?>">
                                <?php endif; ?>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <form action="<?php echo e(route('products.search')); ?>" method="post" class="header-search my-1"
                    style="max-width:550px">
                    <?php echo csrf_field(); ?>
                    <div class="header-search-container">
                        <input id="search" type="text" placeholder="Search products..." name="search">
                        <div class="search_result"></div>
                    </div>
                    <button class="btn btn-search" type="submit" style="margin-top:-2px"><span class="d-flex"><i
                                class="material-symbols-outlined">search</i></span></button>
                </form>
                <ul class="offset-menu-wrapper">
                    <!-- <li class="language"><a  class="active" href="">En</a> / <a href="">Bn</a></li> -->
                    <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a href="<?php echo e(url('customer/login')); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user() && auth()->user()->role_id == 5): ?>
                        <li class="user-menu">
                            <i class="material-symbols-outlined">person_add</i>
                            <ul class="user-dropdown-menu">
                                <li><a href="<?php echo e(url('customer/account-details')); ?>">My Account</a></li>
                                <li><a href="<?php echo e(url('customer/orders')); ?>">Order History</a></li>
                                <li><a href="<?php echo e(url('customer/address')); ?>">Addresses</a></li>
                                <li><a href="<?php echo e(url('customer/logout')); ?>"> <?php echo e(trans('file.logout')); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="<?php echo e(url('track-order')); ?>" title="<?php echo e(trans('file.Track Order')); ?>"><i
                                class="material-symbols-outlined">pin_drop</i></a>
                    </li>
                    <li class="wishlist__menu">
                        <a href="<?php echo e(url('customer/wishlist')); ?>" title="<?php echo e(trans('file.Wishlist')); ?>"><i
                                class="material-symbols-outlined"
                                title="<?php echo e(trans('file.My Wishlist')); ?>">favorite</i></a>
                        <span class="badge badge-light cart_qty">
                            <?php echo e($wishlist_count); ?>

                        </span>
                    </li>
                    <?php

                        $total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
                        $subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

                        if ($total_qty == 0) {
                            $subTotal = 0;
                        }

                    ?>
                    <li class="cart__menu">
                        <i class="material-symbols-outlined" title="<?php echo e(trans('file.Cart')); ?>">shopping_bag</i>
                        <span class="badge badge-light cart_qty"><?php echo e($total_qty ?? 0); ?></span>
                        <span class="total"><?php echo e($currency->symbol); ?><?php echo e($subTotal ?? 0.0); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 d-none d-lg-flex d-xl-flex">
                    <div class="category-list">
                        <ul>
                            <li class="has-dropdown">
                                <a class="category-button" href="#"><i class="material-symbols-outlined">menu</i>
                                    Categories</a>
                                <ul class="dropdown sidebar <?php echo e(request()->is('/') ? 'show' : ''); ?>">
                                    <?php $i = 0 ?>
                                    <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(in_array($category->id, $parents)): ?>
                                            <?php
                                                $categories = $all_categories
                                                    ->where('parent_id', $category->id)
                                                    ->where('is_active', 1);
                                            ?>
                                            <?php if(count($categories) > 0): ?>
                                                <li class="has-dropdown"><a
                                                        href="<?php echo e(url('shop')); ?>/<?php echo e($category->slug); ?>">
                                                        <?php if(isset($category->icon)): ?>
                                                            <img src="<?php echo e(url('images/category/icons/')); ?>/<?php echo e($category->icon); ?>"
                                                                alt="<?php echo e($category->name); ?>">
                                                        <?php endif; ?> <span><?php echo e($category->name); ?></span>
                                                    </a>
                                                    <ul class="dropdown">
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(url('shop')); ?>/<?php echo e($cat->slug); ?>">
                                                                    <?php if(isset($cat->icon)): ?>
                                                                        <img src="<?php echo e(url('images/category/icons/')); ?>/<?php echo e($cat->icon); ?>"
                                                                            alt="<?php echo e($cat->name); ?>">
                                                                    <?php endif; ?>
                                                                    <span><?php echo e($cat->name); ?></span>
                                                                </a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="<?php echo e(url('shop')); ?>/<?php echo e($category->slug); ?>">
                                                        <?php if(isset($category->icon)): ?>
                                                            <img src="<?php echo e(url('images/category/icons/')); ?>/<?php echo e($category->icon); ?>"
                                                                alt="<?php echo e($category->name); ?>">
                                                        <?php endif; ?> <span><?php echo e($category->name); ?></span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php $i++ ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="button style3 text-center" href="<?php echo e(url('shop')); ?>/"> All
                                            Categories</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="main-header-inner">
                        <div id="main-menu" class="main-menu">
                            <nav id="mobile-nav" class="d-flex justify-content-between">
                                <ul>
                                    <?php if(!empty($topNavItems)): ?>
                                        <?php $__currentLoopData = $topNavItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($nav->children[0])): ?>
                                                <li class="user-menu">
                                                    <a href="#">
                                                        <?php if($nav->name == null): ?>
                                                            <?php echo e($nav->title); ?>

                                                        <?php else: ?>
                                                            <?php echo e($nav->name); ?>

                                                        <?php endif; ?>
                                                        <i class="caret"></i>
                                                        <ul class="user-dropdown-menu">
                                                            <?php $__currentLoopData = $nav->children[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childNav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($childNav->type == 'custom'): ?>
                                                                    <li><a href="<?php echo e($childNav->slug); ?>"
                                                                            target="_blank">
                                                                            <?php if($childNav->name == null): ?>
                                                                                <?php echo e($childNav->title); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e($childNav->name); ?>

                                                                            <?php endif; ?>
                                                                        </a></li>
                                                                <?php elseif($childNav->type == 'category'): ?>
                                                                    <li><a
                                                                            href="<?php echo e(url('shop')); ?>/<?php echo e($childNav->slug); ?>">
                                                                            <?php if($childNav->name == null): ?>
                                                                                <?php echo e($childNav->title); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e($childNav->name); ?>

                                                                            <?php endif; ?>
                                                                        </a></li>
                                                                <?php else: ?>
                                                                    <li><a
                                                                            href="<?php echo e(url('')); ?>/<?php echo e($childNav->slug); ?>">
                                                                            <?php if($childNav->name == null): ?>
                                                                                <?php echo e($childNav->title); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e($childNav->name); ?>

                                                                            <?php endif; ?>
                                                                        </a></li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <?php if($nav->type == 'custom'): ?>
                                                    <li><a href="<?php echo e($nav->slug); ?>" target="_blank">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php elseif($nav->type == 'category'): ?>
                                                    <li><a href="<?php echo e(url('shop')); ?>/<?php echo e($nav->slug); ?>">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php elseif($nav->type == 'page' && $nav->slug == 'home'): ?>
                                                    <li><a href="<?php echo e(url('/')); ?>">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php elseif($nav->type == 'collection'): ?>
                                                    <li><a href="<?php echo e(url('products')); ?>/<?php echo e($nav->slug); ?>">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php elseif($nav->type == 'brand'): ?>
                                                    <li><a href="<?php echo e(url('brand')); ?>/<?php echo e($nav->slug); ?>">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php else: ?>
                                                    <li><a href="<?php echo e(url('')); ?>/<?php echo e($nav->slug); ?>">
                                                            <?php if($nav->name == null): ?>
                                                                <?php echo e($nav->title); ?>

                                                            <?php else: ?>
                                                                <?php echo e($nav->name); ?>

                                                            <?php endif; ?>
                                                        </a></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                                <?php if(isset($social_links)): ?>
                                    <ul class="social-links">
                                        <?php $__currentLoopData = $social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e($link->link); ?>"><?php echo $link->icon; ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/layout/header/header.blade.php ENDPATH**/ ?>