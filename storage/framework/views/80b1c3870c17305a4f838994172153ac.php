<?php $__env->startPush('css'); ?>
    <style type="text/css">
        body {
            font-family: 'Inter', sans-serif
        }

        .bootstrap-select-sm .btn {
            font-size: 13px;
            padding: 3px 25px 3px 10px;
            height: 30px !important
        }

        .minus,
        .plus {
            padding: .35rem .75rem
        }

        .numkey.qty {
            font-size: 13px;
            padding: 0 0;
            max-width: 50px;
            text-align: center
        }

        .sub-total {
            font-weight: 500;
        }

        .pos-page .container-fluid {
            padding: 0 15px
        }

        .pos-page .side-navbar {
            top: 0
        }

        section.pos-section {
            padding: 10px 0
        }

        .pos-page .table-fixed {
            margin-bottom: 0
        }

        .pos-text {
            line-height: 1.8
        }

        .pos-page section header {
            padding: 0 0 5px
        }

        .pos .bootstrap-select button {
            padding-right: 21px !important
        }

        .pos .bootstrap-select.form-control:not([class*=col-]) {
            width: 100px
        }

        .pos-page .order-list .btn {
            padding: 2px 5px
        }

        .pos-page [class=row] {
            margin-left: -10px;
            margin-right: -10px
        }

        .pos-page [class*=col-] {
            padding: 0 10px
        }

        .pos-page #myTable [class*=col-] {
            padding: .5rem
        }

        .pos-page #myTable tr th {
            background: #f5f6f7;
            color: #5e5873
        }

        .product-btns {
            margin: 5px -5px
        }

        .edit-product {
            white-space: break-spaces;
            font-size: 13px;
            font-weight: 500;
            text-align: left;
            padding: 0 0 !important
        }

        .edit-product i {
            color: #00cec9
        }

        .product-title span {
            font-size: 12px
        }

        .more-options {
            box-shadow: -5px 0px 10px 0px rgba(44, 44, 44, 0.3);
            font-size: 12px;
            margin: 10px 0;
            padding-left: 3px;
            padding-right: 3px
        }

        label {
            font-size: 13px
        }

        #tbody-id tr td {
            font-size: 13px;
            padding: 0
        }

        table,
        tr,
        td {
            border-collapse: collapse;
        }

        .top-fields {
            margin-top: 10px;
            position: relative;
        }

        .top-fields label {
            background: #FFF;
            font-size: 11px;
            margin-left: 10px;
            padding: 0 3px;
            position: absolute;
            top: -8px;
            z-index: 9;
        }

        .top-fields input,
        .top-fields .btn {
            font-size: 13px;
            height: 37px
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .product-grid>div {
            border: 1px solid #e4e6fc;
            overflow: hidden;
            padding: .5rem;
            position: relative;
            max-width: 300px;
            min-width: 100px;
            vertical-align: top;
            width: calc(100%/4);
        }

        .product-grid>div p {
            color: #5e5873;
            font-size: 12px;
            font-weight: 500;
            margin: 10px 0 0;
            min-height: 36px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical
        }

        .product-grid>div span {
            font-size: 12px
        }

        .more-payment-options.column-5 {
            margin: 0;
            padding: 0
        }

        .ui-helper-hidden-accessible {
            display: none;
        }

        #print-layout {
            padding: 0 0;
            margin: 0 0;
        }

        .category-img p,
        .brand-img p {
            color: #5e5873;
            font-size: 12px;
            font-weight: 500
        }

        .brand-img,
        .category-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .brand-img img {
            max-width: 70%
        }

        .load-more {
            margin-top: 15px
        }

        .load-more:disabled {
            opacity: 0.5
        }

        .ui-helper-hidden-accessible {
            display: none !important
        }

        @media (max-width: 500px) {
            .product-grid>div {
                width: calc(100%/3);
            }
        }

        @media (max-width: 375px) {
            .product-grid>div {
                width: calc(100%/2);
            }
        }

        @media all and (max-width:767px) {
            section.pos-section {
                padding: 0 5px
            }

            nav.navbar {
                margin: 0 -10px
            }

            .pos-form {
                padding: 0 0 !important
            }

            .payment-options {
                padding: 5px 0
            }

            .payment-options .column-5 {
                margin: 5px 0;
            }

            .payment-options .btn-sm {
                font-size: 12px;
            }

            .more-payment-options,
            .more-payment-options .btn-group {
                width: 100%
            }

            .more-payment-options.column-5 {
                padding: 0 5px;
            }

            .product-btns {
                margin: 0 -15px 10px -15px
            }

            .product-btns .btn {
                font-size: 12px;
            }

            .more-options {
                margin-top: 0;
            }

            .transaction-list {
                height: 35vh;
            }

            .filter-window {
                position: fixed;
            }
        }

        @media print {
            .hidden-print {
                display: none !important;
            }
        }

        #print-layout * {
            font-size: 10px;
            line-height: 20px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }

        #print-layout .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        #print-layout .btn-info {
            background-color: #999;
            color: #FFF;
        }

        #print-layout .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        #print-layout td,
        #print-layout th,
        #print-layout tr,
        #print-layout table {
            border-collapse: collapse;
        }

        #print-layout tr {
            border-bottom: 1px dotted #ddd;
        }

        #print-layout td,
        #print-layout th {
            padding: 7px 0;
            width: 50%;
        }

        #print-layout table {
            width: 100%;
        }

        #print-layout .centered {
            display: block;
            text-align: center;
            align-content: center;
        }

        #print-layout small {
            font-size: 10px;
        }

        @media print {
            #print-layout * {
                font-size: 10px !important;
                line-height: 20px;
            }

            #print-layout table {
                width: 100%;
                margin: 0 0;
            }

            #print-layout td,
            #print-layout th {
                padding: 5px 0;
            }

            #print-layout .hidden-print {
                display: none !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($errors->has('phone_number')): ?>
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo e($errors->first('phone_number')); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo session()->get('message'); ?></div>
    <?php endif; ?>
    <?php if(session()->has('error')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo session()->get('error'); ?></div>
    <?php endif; ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
    <?php endif; ?>
    <section id="pos-layout" class="forms pos-section hidden-print">
        <div class="container-fluid">
            <div class="row">
                <audio id="mysoundclip1" preload="auto">
                    <source src="<?php echo e(url('beep/beep-timber.mp3')); ?>">
                    </source>
                </audio>
                <audio id="mysoundclip2" preload="auto">
                    <source src="<?php echo e(url('beep/beep-07.mp3')); ?>">
                    </source>
                </audio>
                <!-- product list -->
                <div class="col-md-5 order-first order-md-2">
                    <!-- navbar-->
                    <header>
                        <nav class="navbar">
                            <a class="menu-btn" href="<?php echo e(url('/dashboard')); ?>"><i class="dripicons-home"></i></a>
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <li class="nav-item ml-4 d-md-none"><a data-toggle="collapse" href="#collapseProducts"
                                        role="button" aria-expanded="false" aria-controls="collapseProducts"><i
                                            class="fa fa-cubes"></i></a></li>
                                <li class="nav-item ml-4 d-none d-lg-block"><a id="btnFullscreen" data-toggle="tooltip"
                                        title="Full Screen"><i class="dripicons-expand"></i></a></li>
                                <?php
                                $general_setting_permission = $permission_list->where('name', 'general_setting')->first();
                                $general_setting_permission_active = DB::table('role_has_permissions')
                                    ->where([['permission_id', $general_setting_permission->id], ['role_id', Auth::user()->role_id]])
                                    ->first();
                                
                                $pos_setting_permission = $permission_list->where('name', 'pos_setting')->first();
                                
                                $pos_setting_permission_active = DB::table('role_has_permissions')
                                    ->where([['permission_id', $pos_setting_permission->id], ['role_id', Auth::user()->role_id]])
                                    ->first();
                                ?>
                                <?php if($pos_setting_permission_active): ?>
                                    <li class="nav-item"><a class="dropdown-item" data-toggle="tooltip"
                                            href="<?php echo e(route('setting.pos')); ?>" title="<?php echo e(trans('file.POS Setting')); ?>"><i
                                                class="dripicons-gear"></i></a> </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('sales.printLastReciept')); ?>" data-toggle="tooltip"
                                        title="<?php echo e(trans('file.Print Last Reciept')); ?>"><i class="dripicons-print"></i></a>
                                </li>
                                <li class="nav-item d-none d-lg-block">
                                    <a href="" id="register-details-btn" data-toggle="tooltip"
                                        title="<?php echo e(trans('file.Cash Register Details')); ?>"><i
                                            class="dripicons-briefcase"></i></a>
                                </li>
                                <?php
                                $today_sale_permission = $permission_list->where('name', 'today_sale')->first();
                                $today_sale_permission_active = DB::table('role_has_permissions')
                                    ->where([['permission_id', $today_sale_permission->id], ['role_id', Auth::user()->role_id]])
                                    ->first();
                                
                                $today_profit_permission = $permission_list->where('name', 'today_profit')->first();
                                $today_profit_permission_active = DB::table('role_has_permissions')
                                    ->where([['permission_id', $today_profit_permission->id], ['role_id', Auth::user()->role_id]])
                                    ->first();
                                ?>

                                <?php if($today_sale_permission_active): ?>
                                    <li class="nav-item d-none d-lg-block">
                                        <a href="" id="today-sale-btn" data-toggle="tooltip"
                                            title="<?php echo e(trans('file.Today Sale')); ?>"><i
                                                class="dripicons-shopping-bag"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if($today_profit_permission_active): ?>
                                    <li class="nav-item d-none d-lg-block">
                                        <a href="" id="today-profit-btn" data-toggle="tooltip"
                                            title="<?php echo e(trans('file.Today Profit')); ?>"><i
                                                class="dripicons-graph-line"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if($alert_product + count(\Auth::user()->unreadNotifications) > 0): ?>
                                    <li class="nav-item d-none d-lg-block" id="notification-icon">
                                        <a rel="nofollow" data-toggle="tooltip" title="<?php echo e(__('Notifications')); ?>"
                                            class="nav-link dropdown-item"><i class="dripicons-bell"></i><span
                                                class="badge badge-danger notification-number"><?php echo e($alert_product + count(\Auth::user()->unreadNotifications)); ?></span>
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </a>
                                        <ul class="right-sidebar" user="menu">
                                            <li class="notifications">
                                                <a href="<?php echo e(route('report.qtyAlert')); ?>"
                                                    class="btn btn-link"><?php echo e($alert_product); ?> product exceeds alert
                                                    quantity</a>
                                            </li>
                                            <?php $__currentLoopData = \Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="notifications">
                                                    <a href="#"
                                                        class="btn btn-link"><?php echo e($notification->data['message']); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                                <li class="nav-item">
                                    <a rel="nofollow" data-toggle="tooltip" class="nav-link dropdown-item"><i
                                            class="dripicons-user"></i> <span><?php echo e(ucfirst(Auth::user()->name)); ?></span> <i
                                            class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="right-sidebar">
                                        <li>
                                            <a href="<?php echo e(route('user.profile', ['id' => Auth::id()])); ?>"><i
                                                    class="dripicons-user"></i> <?php echo e(trans('file.profile')); ?></a>
                                        </li>
                                        <?php if($general_setting_permission_active): ?>
                                            <li>
                                                <a href="<?php echo e(route('setting.general')); ?>"><i class="dripicons-gear"></i>
                                                    <?php echo e(trans('file.settings')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(url('my-transactions/' . date('Y') . '/' . date('m'))); ?>"><i
                                                    class="dripicons-swap"></i> <?php echo e(trans('file.My Transaction')); ?></a>
                                        </li>
                                        <?php if(Auth::user()->role_id != 5): ?>
                                            <li>
                                                <a href="<?php echo e(url('holidays/my-holiday/' . date('Y') . '/' . date('m'))); ?>"><i
                                                        class="dripicons-vibrate"></i> <?php echo e(trans('file.My Holiday')); ?></a>
                                            </li>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><i
                                                    class="dripicons-power"></i>
                                                <?php echo e(trans('file.logout')); ?>

                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </header>
                    <div class="filter-window">
                        <div class="category mt-3">
                            <div class="row ml-2 mr-2 px-2">
                                <div class="col-7">Choose category</div>
                                <div class="col-5 text-right">
                                    <span class="btn btn-default btn-sm btn-close">
                                        <i class="dripicons-cross"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2 mt-3">
                                <?php $__currentLoopData = $lims_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 col-6 category-img text-center"
                                        data-category="<?php echo e($category->id); ?>">
                                        <?php if($category->image): ?>
                                            <img src="<?php echo e(url('images/category', $category->image)); ?>" />
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/images/product/zummXD2dvAtI.png')); ?>" />
                                        <?php endif; ?>
                                        <p class="text-center"><?php echo e($category->name); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="brand mt-3">
                            <div class="row ml-2 mr-2 px-2">
                                <div class="col-7">Choose brand</div>
                                <div class="col-5 text-right">
                                    <span class="btn btn-default btn-sm btn-close">
                                        <i class="dripicons-cross"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row ml-2 mt-3">
                                <?php $__currentLoopData = $lims_brand_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 col-6 brand-img text-center" data-brand="<?php echo e($brand->id); ?>">
                                        <?php if($brand->image): ?>
                                            <img src="<?php echo e(url('images/brand', $brand->image)); ?>" />
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/images/product/zummXD2dvAtI.png')); ?>" />
                                        <?php endif; ?>
                                        <p class="text-center"><?php echo e($brand->title); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="products-m mt-3">
                            <div class="row ml-2 mr-2 px-2">
                                <div class="col-7"></div>
                                <div class="col-5 text-right">
                                    <span class="btn btn-default btn-sm btn-close">
                                        <i class="dripicons-cross"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="product_list_mobile table-container row mt-3" data-cat="" data-brand="">

                            </div>
                        </div>
                    </div>
                    <div id="collapseProducts" class="">
                        <div class="d-flex justify-content-between product-btns">

                            <button class="btn btn-block btn-primary mt-0 ml-1 mr-1"
                                id="category-filter"><?php echo e(trans('file.category')); ?></button>

                            <button class="btn btn-block btn-info mt-0 ml-1 mr-1"
                                id="brand-filter"><?php echo e(trans('file.Brand')); ?></button>

                            <button class="btn btn-block btn-danger mt-0 ml-1 mr-1"
                                id="featured-filter"><?php echo e(trans('file.Featured')); ?></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-container main mt-2" data-cat="" data-brand="">
                            <div class="product-grid">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7 pos-form">
                    <?php echo Form::open(['route' => 'sales.store', 'method' => 'post', 'files' => true, 'class' => 'payment-form']); ?>

                    <?php
                        if ($lims_pos_setting_data) {
                            $keybord_active = $lims_pos_setting_data->keybord_active;
                        } else {
                            $keybord_active = 0;
                        }

                        $customer_active = DB::table('permissions')
                            ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                            ->where([['permissions.name', 'customers-add'], ['role_id', \Auth::user()->role_id]])
                            ->first();
                    ?>
                    <div class="row">
                        <div class="col-md-11 col-12">
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="form-group top-fields">
                                        <label><?php echo e(trans('file.Date')); ?></label>
                                        <div class="input-group">
                                            <input type="text" name="created_at" class="form-control date"
                                                value="<?php echo e(date($general_setting->date_format, strtotime('now'))); ?>"
                                                onkeyup='saveValue(this);' />
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset(auth()->user()->warehouse_id)): ?>
                                    <input type="hidden" name="warehouse_id" id="warehouse_id"
                                        value="<?php echo e(auth()->user()->warehouse_id); ?>" />
                                <?php else: ?>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group top-fields">
                                            <?php if($lims_sale_data && $lims_sale_data->warehouse_id): ?>
                                                <input type="hidden" name="warehouse_id_hidden"
                                                    value="<?php echo e($lims_sale_data->warehouse_id); ?>">
                                            <?php elseif($lims_pos_setting_data): ?>
                                                <input type="hidden" name="warehouse_id_hidden"
                                                    value="<?php echo e($lims_pos_setting_data->warehouse_id); ?>">
                                            <?php endif; ?>
                                            <label><?php echo e(trans('file.Warehouse')); ?></label>
                                            <select required id="warehouse_id" name="warehouse_id"
                                                class="selectpicker form-control" data-live-search="true"
                                                data-live-search-style="begins" title="Select warehouse...">
                                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if(isset(auth()->user()->biller_id)): ?>
                                    <input type="hidden" name="biller_id" id="biller_id"
                                        value="<?php echo e(auth()->user()->biller_id); ?>" />
                                <?php else: ?>
                                    <div class="col-md-3 col-6">
                                        <div class="form-group top-fields">
                                            <?php if($lims_sale_data && $lims_sale_data->biller_id): ?>
                                                <input type="hidden" name="biller_id_hidden"
                                                    value="<?php echo e($lims_sale_data->biller_id); ?>">
                                            <?php elseif($lims_pos_setting_data): ?>
                                                <input type="hidden" name="biller_id_hidden"
                                                    value="<?php echo e($lims_pos_setting_data->biller_id); ?>">
                                            <?php endif; ?>
                                            <label><?php echo e(trans('file.Biller')); ?></label>
                                            <select required id="biller_id" name="biller_id"
                                                class="selectpicker form-control" data-live-search="true"
                                                data-live-search-style="begins" title="Select Biller...">
                                                <?php $__currentLoopData = $lims_biller_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($biller->id); ?>">
                                                        <?php echo e($biller->name . ' (' . $biller->company_name . ')'); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-3 col-6">
                                    <div class="form-group top-fields">
                                        <?php if($lims_sale_data && $lims_sale_data->customer_id): ?>
                                            <input type="hidden" name="customer_id_hidden"
                                                value="<?php echo e($lims_sale_data->customer_id); ?>">
                                        <?php elseif($lims_pos_setting_data): ?>
                                            <input type="hidden" name="customer_id_hidden"
                                                value="<?php echo e($lims_pos_setting_data->customer_id); ?>">
                                        <?php endif; ?>
                                        <label><?php echo e(trans('file.customer')); ?></label>
                                        <div class="input-group pos">
                                            <select required name="customer_id" id="customer_id"
                                                class="selectpicker form-control" data-live-search="true"
                                                title="Select customer..." style="width: 100px">
                                                <?php
                                                $deposit = [];
                                                $points = [];
                                                ?>
                                                <?php $__currentLoopData = $lims_customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $deposit[$customer->id] =
                                                            $customer->deposit - $customer->expense;

                                                        $points[$customer->id] = $customer->points;
                                                    ?>
                                                    <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?>

                                                        <?php if($customer->phone_number): ?>
                                                            (<?php echo e($customer->phone_number); ?>)
                                                        <?php endif; ?>
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($customer_active): ?>
                                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                                    data-target="#addCustomer"><i class="dripicons-plus"></i></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <a class="btn btn-primary btn-block more-options" data-toggle="collapse" href="#moreOptions"
                                role="button" aria-expanded="false" aria-controls="moreOptions"><i
                                    class="dripicons-dots-3"></i></a>
                        </div>
                    </div>
                    <div>
                        <div class="collapse" id="moreOptions">
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><?php echo e(trans('file.Sale Reference No.')); ?></label>
                                        <div class="form-group">
                                            <input type="text" id="reference-no" name="reference_no"
                                                class="form-control" placeholder="Type reference number"
                                                onkeyup='saveValue(this);' />
                                        </div>
                                        <?php if($errors->has('reference_no')): ?>
                                            <span>
                                                <strong><?php echo e($errors->first('reference_no')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <label><?php echo e(trans('file.Currency')); ?> & <?php echo e(trans('file.Exchange Rate')); ?></label>
                                        <div class="form-group d-flex">
                                            <div class="input-group-prepend">
                                                <select name="currency_id" id="currency"
                                                    class="form-control selectpicker" data-toggle="tooltip"
                                                    title="" data-original-title="Sale currency">
                                                    <?php $__currentLoopData = $currency_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($currency_data->id); ?>"
                                                            data-rate="<?php echo e($currency_data->exchange_rate); ?>">
                                                            <?php echo e($currency_data->code); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <input class="form-control" type="text" id="exchange_rate"
                                                name="exchange_rate" value="<?php echo e($currency->exchange_rate); ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" data-toggle="tooltip" title=""
                                                    data-original-title="currency exchange rate">i</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!$field->is_admin || \Auth::user()->role_id == 1): ?>
                                            <div class="<?php echo e('col-md-' . $field->grid_value); ?>">
                                                <div class="form-group">
                                                    <label><?php echo e($field->name); ?></label>
                                                    <?php if($field->type == 'text'): ?>
                                                        <input type="text"
                                                            name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                            value="<?php echo e($field->default_value); ?>" class="form-control"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                    <?php elseif($field->type == 'number'): ?>
                                                        <input type="number"
                                                            name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                            value="<?php echo e($field->default_value); ?>" class="form-control"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                    <?php elseif($field->type == 'textarea'): ?>
                                                        <textarea rows="5" name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                            value="<?php echo e($field->default_value); ?>" class="form-control"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>></textarea>
                                                    <?php elseif($field->type == 'checkbox'): ?>
                                                        <br>
                                                        <?php $option_values = explode(',', $field->option_value); ?>
                                                        <?php $__currentLoopData = $option_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label>
                                                                <input type="checkbox"
                                                                    name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>[]"
                                                                    value="<?php echo e($value); ?>"
                                                                    <?php if($value == $field->default_value): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                    <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                                <?php echo e($value); ?>

                                                            </label>
                                                            &nbsp;
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php elseif($field->type == 'radio_button'): ?>
                                                        <br>
                                                        <?php $option_values = explode(',', $field->option_value); ?>
                                                        <?php $__currentLoopData = $option_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <label class="radio-inline">
                                                                <input type="radio"
                                                                    name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                                    value="<?php echo e($value); ?>"
                                                                    <?php if($value == $field->default_value): ?> <?php echo e('checked'); ?> <?php endif; ?>
                                                                    <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                                <?php echo e($value); ?>

                                                            </label>
                                                            &nbsp;
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php elseif($field->type == 'select'): ?>
                                                        <?php $option_values = explode(',', $field->option_value); ?>
                                                        <select class="form-control"
                                                            name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                            <?php $__currentLoopData = $option_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"
                                                                    <?php if($value == $field->default_value): ?> <?php echo e('selected'); ?> <?php endif; ?>>
                                                                    <?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    <?php elseif($field->type == 'multi_select'): ?>
                                                        <?php $option_values = explode(',', $field->option_value); ?>
                                                        <select class="form-control"
                                                            name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>[]"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>
                                                            multiple>
                                                            <?php $__currentLoopData = $option_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($value); ?>"
                                                                    <?php if($value == $field->default_value): ?> <?php echo e('selected'); ?> <?php endif; ?>>
                                                                    <?php echo e($value); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    <?php elseif($field->type == 'date_picker'): ?>
                                                        <input type="text"
                                                            name="<?php echo e(str_replace(' ', '_', strtolower($field->name))); ?>"
                                                            value="<?php echo e($field->default_value); ?>"
                                                            class="form-control date"
                                                            <?php if($field->is_required): ?> <?php echo e('required'); ?> <?php endif; ?>>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php if($lims_pos_setting_data->is_table): ?>
                            <div class="col-12 pl-0 pr-0">
                                <div class="form-group">
                                    <select required id="table_id" name="table_id" class="selectpicker form-control"
                                        data-live-search="true" data-live-search-style="begins" title="Select table...">
                                        <?php $__currentLoopData = $lims_table_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($table->id); ?>"><?php echo e($table->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-12 pl-0 pr-0">
                            <div class="search-box form-group mb-2">
                                <input style="border: 1px solid #7c5cc4;" type="text" name="product_code_name"
                                    id="lims_productcodeSearch" placeholder="Scan/Search product by name/code"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="table-responsive transaction-list">
                            <table id="myTable" class="table table-hover table-striped order-list table-fixed">
                                <thead class="d-none d-md-block">
                                    <tr>
                                        <th class="col-sm-5 col-6"><?php echo e(trans('file.product')); ?></th>
                                        <th class="col-sm-2"><?php echo e(trans('file.Price')); ?></th>
                                        <th class="col-sm-3"><?php echo e(trans('file.Quantity')); ?></th>
                                        <th class="col-sm-2"><?php echo e(trans('file.Subtotal')); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-id">
                                    <?php if(isset($lims_product_sale_data)): ?>
                                        <?php
                                        $temp_unit_name = [];
                                        $temp_unit_operator = [];
                                        $temp_unit_operation_value = [];
                                        ?>
                                        <?php $__currentLoopData = $lims_product_sale_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php
                                                $product_data = DB::table('products')->find($product_sale->product_id);
                                                if ($product_sale->variant_id) {
                                                    $product_variant_data = \App\Models\ProductVariant::select('id', 'item_code')->FindExactProduct($product_data->id, $product_sale->variant_id)->first();
                                                    $product_data->code = $product_variant_data->item_code;
                                                }
                                                
                                                if ($product_data->tax_method == 1) {
                                                    $product_price = $product_sale->net_unit_price + $product_sale->discount / $product_sale->qty;
                                                } elseif ($product_data->tax_method == 2) {
                                                    $product_price = $product_sale->total / $product_sale->qty + $product_sale->discount / $product_sale->qty;
                                                }
                                                
                                                $tax = DB::table('taxes')->where('rate', $product_sale->tax_rate)->first();
                                                $unit_name = [];
                                                $unit_operator = [];
                                                $unit_operation_value = [];
                                                if ($product_data->type == 'standard') {
                                                    $units = DB::table('units')->where('base_unit', $product_data->unit_id)->orWhere('id', $product_data->unit_id)->get();
                                                
                                                    foreach ($units as $unit) {
                                                        if ($product_sale->sale_unit_id == $unit->id) {
                                                            array_unshift($unit_name, $unit->unit_name);
                                                            array_unshift($unit_operator, $unit->operator);
                                                            array_unshift($unit_operation_value, $unit->operation_value);
                                                        } else {
                                                            $unit_name[] = $unit->unit_name;
                                                            $unit_operator[] = $unit->operator;
                                                            $unit_operation_value[] = $unit->operation_value;
                                                        }
                                                    }
                                                
                                                    if ($unit_operator[0] == '*') {
                                                        $product_price = $product_price / $unit_operation_value[0];
                                                    } elseif ($unit_operator[0] == '/') {
                                                        $product_price = $product_price * $unit_operation_value[0];
                                                    }
                                                } else {
                                                    $unit_name[] = 'n/a' . ',';
                                                    $unit_operator[] = 'n/a' . ',';
                                                    $unit_operation_value[] = 'n/a' . ',';
                                                }
                                                $temp_unit_name = $unit_name = implode(',', $unit_name) . ',';
                                                
                                                $temp_unit_operator = $unit_operator = implode(',', $unit_operator) . ',';
                                                
                                                $temp_unit_operation_value = $unit_operation_value = implode(',', $unit_operation_value) . ',';
                                                
                                                $product_batch_data = \App\Models\ProductBatch::select('batch_no', 'expired_date')->find($product_sale->product_batch_id);
                                                ?>
                                                <td class="col-sm-5 col-6 product-title">
                                                    <strong class="edit-product btn btn-link" data-toggle="modal"
                                                        data-target="#editModal"><?php echo e($product_data->name); ?> <i
                                                            class="fa fa-edit"></i></strong><br><span><?php echo e($product_data->code); ?></span>
                                                    | In Stock: <span
                                                        class="in-stock"><?php echo e($product_data->in_stock); ?></span> <strong
                                                        class="product-price d-md-none"><?php echo e(number_format((float) ($product_sale->total / $product_sale->qty), $general_setting->decimal, '.', '')); ?></strong>

                                                    <?php if($product_batch_data): ?>
                                                        <br><input
                                                            style="font-size:13px;padding:3px 25px 3px 10px;height:30px !important"
                                                            type="text" class="form-control batch-no"
                                                            value="<?php echo e($product_batch_data->batch_no); ?>" required />
                                                        <input type="hidden" class="product-batch-id"
                                                            name="product_batch_id[]"
                                                            value="<?php echo e($product_sale->product_batch_id); ?>" />
                                                    <?php else: ?>
                                                        <input type="text" class="form-control batch-no d-none"
                                                            disabled /> <input type="hidden" class="product-batch-id"
                                                            name="product_batch_id[]" />
                                                    <?php endif; ?>
                                                </td>
                                                <td class="col-sm-2 product-price d-none d-md-block">
                                                    <?php echo e(number_format((float) ($product_sale->total / $product_sale->qty), $general_setting->decimal, '.', '')); ?>

                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="input-group"><span class="input-group-btn"><button
                                                                type="button"
                                                                class="ibtnDel btn btn-danger btn-sm mr-3"><i
                                                                    class="dripicons-cross"></i></button><button
                                                                type="button" class="btn btn-default minus"><span
                                                                    class="dripicons-minus"></span></button></span><input
                                                            type="text" name="qty[]"
                                                            class="form-control qty numkey input-number"
                                                            value="<?php echo e($product_sale->qty); ?>" step="any"
                                                            required><span class="input-group-btn"><button type="button"
                                                                class="btn btn-default plus"><span
                                                                    class="dripicons-plus"></span></button></span></div>
                                                </td>
                                                <td class="col-sm-2 sub-total">
                                                    <?php echo e(number_format((float) $product_sale->total, $general_setting->decimal, '.', '')); ?>

                                                </td>
                                                <input type="hidden" class="product-code" name="product_code[]"
                                                    value="<?php echo e($product_data->code); ?>" />
                                                <input type="hidden" class="product-id" name="product_id[]"
                                                    value="<?php echo e($product_data->id); ?>" />
                                                <input type="hidden" class="product_price" name="product_price[]"
                                                    value="<?php echo e($product_price); ?>" />
                                                <input type="hidden" class="net_unit_price" name="net_unit_price[]"
                                                    value="<?php echo e($product_sale->net_unit_price); ?>" />
                                                <input type="hidden" class="discount-value" name="discount[]"
                                                    value="<?php echo e($product_sale->discount); ?>" />
                                                <input type="hidden" class="tax-rate" name="tax_rate[]"
                                                    value="<?php echo e($product_sale->tax_rate); ?>" />
                                                <?php if($tax): ?>
                                                    <input type="hidden" class="tax-name"
                                                        value="<?php echo e($tax->name); ?>" />
                                                <?php else: ?>
                                                    <input type="hidden" class="tax-name" value="No Tax" />
                                                <?php endif; ?>
                                                <input type="hidden" class="tax-method"
                                                    value="<?php echo e($product_data->tax_method); ?>" />
                                                <input type="hidden" class="tax-value" name="tax[]"
                                                    value="<?php echo e($product_sale->tax); ?>" />
                                                <input type="hidden" class="total-discount"
                                                    value="<?php echo e($product_sale->discount); ?>">
                                                <input type="hidden" class="subtotal-value" name="subtotal[]"
                                                    value="<?php echo e($product_sale->total); ?>" />
                                                <input type="hidden" class="sale-unit" name="sale_unit[]"
                                                    value="<?php echo e($unit_name); ?>" />
                                                <input type="hidden" class="sale-unit-operator"
                                                    value="<?php echo e($unit_operator); ?>" />
                                                <input type="hidden" class="sale-unit-operation-value"
                                                    value="<?php echo e($unit_operation_value); ?>" />
                                                <input type="hidden" class="imei-number" name="imei_number[]"
                                                    value="<?php echo e($product_sale->imei_number); ?>" />
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="total_qty"
                                        value="<?php echo e($lims_sale_data->total_qty ?? 0); ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="total_discount"
                                        value="<?php if(isset($lims_sale_data)): ?> <?php echo e($lims_sale_data->total_discount); ?> <?php else: ?> <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?> <?php endif; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="total_tax"
                                        value="<?php if(isset($lims_sale_data)): ?> <?php echo e($lims_sale_data->total_tax); ?> <?php else: ?> <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?> <?php endif; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="total_price"
                                        value="<?php if(isset($lims_sale_data)): ?> <?php echo e($lims_sale_data->total_discount); ?> <?php else: ?> <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?> <?php endif; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="item" value="<?php echo e($lims_sale_data->item ?? 0); ?>" />
                                    <input type="hidden" name="order_tax"
                                        value="<?php if(isset($lims_sale_data)): ?> <?php echo e($lims_sale_data->order_tax); ?> <?php else: ?> <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?> <?php endif; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="hidden" name="grand_total"
                                        value="<?php if(isset($lims_sale_data)): ?> <?php echo e(number_format((float) $lims_sale_data->grand_total, $general_setting->decimal, '.', '')); ?> <?php else: ?> <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?> <?php endif; ?>" />
                                    <input type="hidden" name="used_points" />
                                    <input type="hidden" name="sale_status" value="1" />
                                    <?php if(isset($lims_sale_data) && $lims_sale_data->coupon_id): ?>
                                        <?php
                                            $coupon = \App\Models\Coupon::find($lims_sale_data->coupon_id);
                                        ?>
                                        <input type="hidden" name="coupon_active" value="1">
                                    <?php else: ?>
                                        <input type="hidden" name="coupon_active">
                                    <?php endif; ?>
                                    <input type="hidden" name="coupon_id"
                                        value="<?php echo e($lims_sale_data->coupon_id ?? ''); ?>">
                                    <input type="hidden" name="coupon_discount"
                                        value="<?php echo e($lims_sale_data->coupon_discount ?? 0); ?>" />

                                    <input type="hidden" name="pos" value="1" />
                                    <input type="hidden" name="draft" value="0" />
                                </div>
                            </div>
                        </div>
                        <div class="col-12 totals"
                            style="background-color:#f5f6f7;border-top: 2px solid #ebe9f1;padding-bottom: 7px;padding-top: 7px;">
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Items')); ?></strong><strong
                                        id="item"><?php echo e($lims_sale_data->item ?? 0); ?>

                                        (<?php echo e($lims_sale_data->total_qty ?? 0); ?>)</strong>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Total')); ?></strong><strong
                                        id="subtotal">
                                        <?php if(isset($lims_sale_data)): ?>
                                            <?php echo e(number_format((float) $lims_sale_data->total_price, $general_setting->decimal, '.', '')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                        <?php endif; ?>
                                    </strong>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Discount')); ?> <button type="button"
                                            class="btn btn-link btn-sm" data-toggle="modal"
                                            data-target="#order-discount-modal"> <i
                                                class="dripicons-document-edit"></i></button></strong><strong
                                        id="discount">
                                        <?php if(isset($lims_sale_data)): ?>
                                            <?php echo e(number_format((float) $lims_sale_data->order_discount, $general_setting->decimal, '.', '')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                        <?php endif; ?>
                                    </strong>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Coupon')); ?> <button type="button"
                                            class="btn btn-link btn-sm" data-toggle="modal"
                                            data-target="#coupon-modal"><i
                                                class="dripicons-document-edit"></i></button></strong><strong
                                        id="coupon-text">
                                        <?php if(isset($lims_sale_data)): ?>
                                            <?php echo e(number_format((float) $lims_sale_data->coupon_discount, $general_setting->decimal, '.', '')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                        <?php endif; ?>
                                    </strong>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Tax')); ?> <button type="button"
                                            class="btn btn-link btn-sm" data-toggle="modal" data-target="#order-tax"><i
                                                class="dripicons-document-edit"></i></button></strong><strong
                                        id="tax">
                                        <?php if(isset($lims_sale_data)): ?>
                                            <?php echo e(number_format((float) $lims_sale_data->order_tax, $general_setting->decimal, '.', '')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                        <?php endif; ?>
                                    </strong>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <strong class="totals-title"><?php echo e(trans('file.Shipping')); ?> <button type="button"
                                            class="btn btn-link btn-sm" data-toggle="modal"
                                            data-target="#shipping-cost-modal"><i
                                                class="dripicons-document-edit"></i></button></strong><strong
                                        id="shipping-cost">
                                        <?php if(isset($lims_sale_data)): ?>
                                            <?php echo e(number_format((float) $lims_sale_data->shipping_cost, $general_setting->decimal, '.', '')); ?>

                                        <?php else: ?>
                                            <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                        <?php endif; ?>
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-amount d-none d-md-block">
                        <h2><?php echo e(trans('file.grand total')); ?> <span id="grand-total">
                                <?php if(isset($lims_sale_data)): ?>
                                    <?php echo e(number_format((float) $lims_sale_data->grand_total, $general_setting->decimal, '.', '')); ?>

                                <?php else: ?>
                                    <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>

                                <?php endif; ?>
                            </span></h2>
                    </div>
                    <div class="payment-options">
                        <div class="column-5 more-payment-options">
                            <div class="btn-group dropup">
                                <button type="button" class="btn btn-primary btn-custom  dropdown-toggle d-md-none"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-cube"></i> Pay <span id="grand-total-m"></span>
                                </button>
                                <div class="">
                                    <?php if(in_array('card', $options)): ?>
                                        <div class="column-5">
                                            <button style="background: #0984e3" type="button"
                                                class="btn btn-sm btn-custom payment-btn" data-toggle="modal"
                                                data-target="#add-payment" id="credit-card-btn"><i
                                                    class="fa fa-credit-card"></i> <?php echo e(trans('file.Card')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('cash', $options)): ?>
                                        <div class="column-5">
                                            <button style="background: #00cec9" type="button"
                                                class="btn btn-sm btn-custom payment-btn" data-toggle="modal"
                                                data-target="#add-payment" id="cash-btn"><i class="fa fa-money"></i>
                                                <?php echo e(trans('file.Cash')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="column-5">
                                        <button style="background: #010429" type="button"
                                            class="btn btn-sm btn-custom payment-btn" data-toggle="modal"
                                            data-target="#add-payment" id="multiple-payment-btn"><i
                                                class="fa fa-money"></i> <?php echo e(trans('file.Multiple Payment')); ?></button>
                                    </div>
                                    
                                    <?php if(in_array('cheque', $options)): ?>
                                        <div class="column-5">
                                            <button style="background-color: #fd7272" type="button"
                                                class="btn btn-sm btn-block btn-custom payment-btn" data-toggle="modal"
                                                data-target="#add-payment" id="cheque-btn"><i class="fa fa-money"></i>
                                                <?php echo e(trans('file.Cheque')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('gift_card', $options)): ?>
                                        <div class="column-5">
                                            <button style="background-color: #5f27cd" type="button"
                                                class="btn btn-sm btn-block btn-custom payment-btn" data-toggle="modal"
                                                data-target="#add-payment" id="gift-card-btn"><i
                                                    class="fa fa-credit-card-alt"></i>
                                                <?php echo e(trans('file.Gift Card')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(in_array('deposit', $options)): ?>
                                        <div class="column-5">
                                            <button style="background-color: #b33771" type="button"
                                                class="btn btn-sm btn-block btn-custom payment-btn" id="deposit-btn"><i
                                                    class="fa fa-university"></i> <?php echo e(trans('file.Deposit')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($lims_reward_point_setting_data && $lims_reward_point_setting_data->is_active): ?>
                                        <div class="column-5">
                                            <button style="background-color: #319398" type="button"
                                                class="btn btn-sm btn-block btn-custom payment-btn" data-toggle="modal"
                                                data-target="#add-payment" id="point-btn"><i
                                                    class="dripicons-rocket"></i> <?php echo e(trans('file.Points')); ?></button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="column-5">
                            <button style="background-color: #e28d02" type="button" class="btn btn-sm btn-custom"
                                id="draft-btn"><i class="dripicons-flag"></i> <?php echo e(trans('file.Draft')); ?></button>
                        </div>
                        <div class="column-5">
                            <button style="background-color: #d63031;" type="button" class="btn btn-sm btn-custom"
                                id="cancel-btn" onclick="return confirmCancel()"><i class="fa fa-close"></i>
                                <?php echo e(trans('file.Cancel')); ?></button>
                        </div>
                        <div class="column-5">
                            <button style="background-color: #ffc107;" type="button" class="btn btn-sm btn-custom"
                                data-toggle="modal" data-target="#recentTransaction"><i class="dripicons-clock"></i>
                                <?php echo e(trans('file.Recent Transaction')); ?></button>
                        </div>
                    </div>
                    <!-- payment modal -->
                    <div id="add-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Finalize Sale')); ?>

                                    </h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-10" id="payment-select-row">
                                            <div class="row">


                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mt-1">
                                                    <label><?php echo e(trans('file.Payment Receiver')); ?></label>
                                                    <input type="text" name="payment_receiver" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label><?php echo e(trans('file.Payment Note')); ?></label>
                                                    <textarea id="payment_note" rows="2" class="form-control" name="payment_note"></textarea>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label><?php echo e(trans('file.Sale Note')); ?></label>
                                                    <textarea rows="3" class="form-control" name="sale_note"></textarea>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label><?php echo e(trans('file.Staff Note')); ?></label>
                                                    <textarea rows="3" class="form-control" name="staff_note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 p-2 bg-info text-light pt-4 pb-4">
                                            <div class="mt-4">
                                                <h2>Total Payable</h2>
                                                <p class="total_payable text-light"></p>
                                            </div>
                                            <div class="mt-4">
                                                <h2>Total Paying</h2>
                                                <p class="total_paying text-light">0.00</p>
                                            </div>
                                            <div class="mt-4">
                                                <h2>Change</h2>
                                                <p class="change text-light">0.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mt-3">
                                                <button id="submit-btn" type="button"
                                                    class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- order_discount modal -->
                    <div id="order-discount-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo e(trans('file.Order Discount')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label><?php echo e(trans('file.Order Discount Type')); ?></label>
                                            <select id="order-discount-type" name="order_discount_type_select"
                                                class="form-control">
                                                <option value="Flat"><?php echo e(trans('file.Flat')); ?></option>
                                                <option value="Percentage"><?php echo e(trans('file.Percentage')); ?></option>
                                            </select>
                                            <input type="hidden" name="order_discount_type">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><?php echo e(trans('file.Value')); ?></label>
                                            <input type="text" name="order_discount_value" class="form-control numkey"
                                                id="order-discount-val" onkeyup='saveValue(this);'>
                                            <input type="hidden" name="order_discount" class="form-control"
                                                id="order-discount" onkeyup='saveValue(this);'>
                                        </div>
                                    </div>
                                    <button type="button" name="order_discount_btn" class="btn btn-primary"
                                        data-dismiss="modal"><?php echo e(trans('file.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- coupon modal -->
                    <div id="coupon-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo e(trans('file.Coupon Code')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" id="coupon-code" class="form-control"
                                            placeholder="Type Coupon Code...">
                                    </div>
                                    <button type="button" class="btn btn-primary coupon-check"
                                        data-dismiss="modal"><?php echo e(trans('file.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- order_tax modal -->
                    <div id="order-tax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo e(trans('file.Order Tax')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="order_tax_rate">
                                        <select class="form-control" name="order_tax_rate_select"
                                            id="order-tax-rate-select">
                                            <option value="0">No Tax</option>
                                            <?php $__currentLoopData = $lims_tax_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tax->rate); ?>"><?php echo e($tax->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <button type="button" name="order_tax_btn" class="btn btn-primary"
                                        data-dismiss="modal"><?php echo e(trans('file.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shipping_cost modal -->
                    <div id="shipping-cost-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo e(trans('file.Shipping Cost')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="shipping_cost" class="form-control numkey"
                                            id="shipping-cost-val" step="any" onkeyup='saveValue(this);'>
                                    </div>
                                    <button type="button" name="shipping_cost_btn" class="btn btn-primary"
                                        data-dismiss="modal"><?php echo e(trans('file.submit')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php echo Form::close(); ?>


                    
                    <div id="invoice-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div id="invoice-modal-content" class="modal-body">
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- product edit modal -->
                    <div id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="modal_header" class="modal-title"></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row modal-element">
                                            <div class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Quantity')); ?></label>
                                                <input type="text" name="edit_qty" class="form-control numkey">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Unit Discount')); ?></label>
                                                <input type="text" name="edit_discount" class="form-control numkey">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo e(trans('file.Price Option')); ?></strong> </label>
                                                    <div class="input-group">
                                                        <select class="form-control selectpicker" name="price_option"
                                                            class="price-option">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Unit Price')); ?></label>
                                                <input type="text" name="edit_unit_price" class="form-control numkey"
                                                    step="any">
                                            </div>
                                            <?php
                                            $tax_name_all[] = 'No Tax';
                                            $tax_rate_all[] = 0;
                                            foreach ($lims_tax_list as $tax) {
                                                $tax_name_all[] = $tax->name;
                                                $tax_rate_all[] = $tax->rate;
                                            }
                                            ?>
                                            <div class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Tax Rate')); ?></label>
                                                <select name="edit_tax_rate" class="form-control selectpicker">
                                                    <?php $__currentLoopData = $tax_name_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div id="edit_unit" class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Product Unit')); ?></label>
                                                <select name="edit_unit" class="form-control selectpicker">
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label><?php echo e(trans('file.Cost')); ?></label>
                                                <p id="product-cost"></p>
                                            </div>
                                        </div>
                                        <button type="button" name="update_btn"
                                            class="btn btn-primary"><?php echo e(trans('file.update')); ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add customer modal -->
                    <div id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <?php echo Form::open(['route' => 'customer.store', 'method' => 'post', 'files' => true, 'id' => 'customer-form']); ?>

                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Customer')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <p class="italic">
                                        <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small>
                                    </p>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Customer Group')); ?> *</strong> </label>
                                        <select required class="form-control selectpicker" name="customer_group_id">
                                            <?php $__currentLoopData = $lims_customer_group_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($customer_group->id); ?>"><?php echo e($customer_group->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.name')); ?> *</strong> </label>
                                        <input type="text" name="customer_name" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Email')); ?></label>
                                        <input type="text" name="email" placeholder="example@example.com"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Phone Number')); ?> *</label>
                                        <input type="text" name="phone_number" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Address')); ?></label>
                                        <input type="text" name="address" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.City')); ?></label>
                                        <input type="text" name="city" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="pos" value="1">
                                        <button type="button"
                                            class="btn btn-primary customer-submit-btn"><?php echo e(trans('file.submit')); ?></button>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <!-- recent transaction modal -->
                    <div id="recentTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title">
                                        <?php echo e(trans('file.Recent Transaction')); ?>

                                        <div class="badge badge-primary"><?php echo e(trans('file.latest')); ?> 10</div>
                                    </h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#sale-latest" role="tab"
                                                data-toggle="tab"><?php echo e(trans('file.Sale')); ?></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#draft-latest" role="tab"
                                                data-toggle="tab"><?php echo e(trans('file.Draft')); ?></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane show active" id="sale-latest">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo e(trans('file.date')); ?></th>
                                                            <th><?php echo e(trans('file.reference')); ?></th>
                                                            <th><?php echo e(trans('file.customer')); ?></th>
                                                            <th><?php echo e(trans('file.grand total')); ?></th>
                                                            <th><?php echo e(trans('file.action')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="draft-latest">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th><?php echo e(trans('file.date')); ?></th>
                                                            <th><?php echo e(trans('file.reference')); ?></th>
                                                            <th><?php echo e(trans('file.customer')); ?></th>
                                                            <th><?php echo e(trans('file.grand total')); ?></th>
                                                            <th><?php echo e(trans('file.action')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add cash register modal -->
                    <div id="cash-register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <?php echo Form::open(['route' => 'cashRegister.store', 'method' => 'post']); ?>

                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title">
                                        <?php echo e(trans('file.Add Cash Register')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                            aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <p class="italic">
                                        <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 form-group warehouse-section">
                                            <label><?php echo e(trans('file.Warehouse')); ?> *</strong> </label>
                                            <select required name="warehouse_id" class="selectpicker form-control"
                                                data-live-search="true" data-live-search-style="begins"
                                                title="Select warehouse...">
                                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label><?php echo e(trans('file.Cash in Hand')); ?> *</strong> </label>
                                            <input type="number" step="any" name="cash_in_hand" required
                                                class="form-control">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <button type="submit"
                                                class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <!-- cash register details modal -->
                    <div id="register-details-modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title">
                                        <?php echo e(trans('file.Cash Register Details')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        class="close"><span aria-hidden="true"><i
                                                class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <p><?php echo e(trans('file.Please review the transaction and payments.')); ?></p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Cash in Hand')); ?>:</td>
                                                        <td id="cash_in_hand" class="text-right">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Sale Amount')); ?>:</td>
                                                        <td id="total_sale_amount" class="text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Payment')); ?>:</td>
                                                        <td id="total_payment" class="text-right"></td>
                                                    </tr>
                                                    <?php if(in_array('cash', $options)): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Cash Payment')); ?>:</td>
                                                            <td id="cash_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(in_array('card', $options)): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Credit Card Payment')); ?>:</td>
                                                            <td id="credit_card_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(in_array('cheque', $options)): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Cheque Payment')); ?>:</td>
                                                            <td id="cheque_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(in_array('gift_card', $options)): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Gift Card Payment')); ?>:</td>
                                                            <td id="gift_card_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(in_array('deposit', $options)): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Deposit Payment')); ?>:</td>
                                                            <td id="deposit_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if(in_array('paypal', $options) &&
                                                            strlen(env('PAYPAL_LIVE_API_USERNAME')) > 0 &&
                                                            strlen(env('PAYPAL_LIVE_API_PASSWORD')) > 0 &&
                                                            strlen(env('PAYPAL_LIVE_API_SECRET')) > 0): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Paypal Payment')); ?>:</td>
                                                            <td id="paypal_payment" class="text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Sale Return')); ?>:</td>
                                                        <td id="total_sale_return" class="text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Expense')); ?>:</td>
                                                        <td id="total_expense" class="text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><?php echo e(trans('file.Total Cash')); ?>:</strong></td>
                                                        <td id="total_cash" class="text-right"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6" id="closing-section">
                                            <form action="<?php echo e(route('cashRegister.close')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="cash_register_id">
                                                <button type="submit"
                                                    class="btn btn-primary"><?php echo e(trans('file.Close Register')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- today sale modal -->
                    <div id="today-sale-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Today Sale')); ?></h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        class="close"><span aria-hidden="true"><i
                                                class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <p><?php echo e(trans('file.Please review the transaction and payments.')); ?></p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Sale Amount')); ?>:</td>
                                                        <td class="total_sale_amount text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Cash Payment')); ?>:</td>
                                                        <td class="cash_payment text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Credit Card Payment')); ?>:</td>
                                                        <td class="credit_card_payment text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Cheque Payment')); ?>:</td>
                                                        <td class="cheque_payment text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Gift Card Payment')); ?>:</td>
                                                        <td class="gift_card_payment text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Deposit Payment')); ?>:</td>
                                                        <td class="deposit_payment text-right"></td>
                                                    </tr>
                                                    <?php if(in_array('paypal', $options) &&
                                                            strlen(env('PAYPAL_LIVE_API_USERNAME')) > 0 &&
                                                            strlen(env('PAYPAL_LIVE_API_PASSWORD')) > 0 &&
                                                            strlen(env('PAYPAL_LIVE_API_SECRET')) > 0): ?>
                                                        <tr>
                                                            <td><?php echo e(trans('file.Paypal Payment')); ?>:</td>
                                                            <td class="paypal_payment text-right"></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Payment')); ?>:</td>
                                                        <td class="total_payment text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Sale Return')); ?>:</td>
                                                        <td class="total_sale_return text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Total Expense')); ?>:</td>
                                                        <td class="total_expense text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><?php echo e(trans('file.Total Cash')); ?>:</strong></td>
                                                        <td class="total_cash text-right"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- today profit modal -->
                    <div id="today-profit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Today Profit')); ?>

                                    </h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"
                                        class="close"><span aria-hidden="true"><i
                                                class="dripicons-cross"></i></span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select required name="warehouseId" class="form-control">
                                                <option value="0"><?php echo e(trans('file.All Warehouse')); ?></option>
                                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Product Revenue')); ?>:</td>
                                                        <td class="product_revenue text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Product Cost')); ?>:</td>
                                                        <td class="product_cost text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo e(trans('file.Expense')); ?>:</td>
                                                        <td class="expense_amount text-right"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><?php echo e(trans('file.Profit')); ?>:</strong></td>
                                                        <td class="profit text-right"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="print-layout" class="">
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $.get('<?php echo e(url('/sales/getfeatured')); ?>/', function(data) {
                populateProduct(data);
            });

            $.get('<?php echo e(url('/sales/recent-sale')); ?>/', function(data) {
                populateRecentSale(data);
            });

            $.get('<?php echo e(url('/sales/recent-draft')); ?>/', function(data) {
                populateRecentDraft(data);
            });
        })

        // Load more
        var quit = 0;
        var next_page_url = '<?php echo e(url('/')); ?>/sales/getfeatured?page=2';

        $(document).on('click', '.load-more', function() {
            console.log(next_page_url);
            if (quit < 1) {
                loadMoreData();
            }
        });

        function loadMoreData() {
            if (!next_page_url) {
                quit = 1; // If no more pages, stop loading
                $('.load-more').attr("disabled", true);;
                return;
            }
            $.ajax({
                url: next_page_url,
                type: "get",
            }).done(function(response) {
                if (response.data['name'].length > 0) {
                    appendProduct(response.data); // Append data to the div

                    // Update next_page_url for the next request
                    next_page_url = response.next_page_url;
                } else {
                    quit = 1; // Stop requesting if no more data
                }
            }).fail(function(jqXHR, ajaxOptions, thrownError) {
                quit = 1;
                console.log('Server not responding...');
            });
        }


        $("ul#sale").siblings('a').attr('aria-expanded', 'true');
        $("ul#sale").addClass("show");
        $("ul#sale #sale-pos-menu").addClass("active");

        var isMobile = false;
        if (($(window).width() < 767)) {
            isMobile = true;
        }

        if (isMobile == true) {
            $('.table-container').hide();
            $('.more-payment-options > div > div').addClass('dropdown-menu');
            $('#collapseProducts').addClass('collapse');
            $('#grand-total-m').html($('input[name="grand_total"]').val());
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        <?php if(config('database.connections.saleprosaas_landlord')): ?>
            numberOfInvoice = <?php echo json_encode($numberOfInvoice); ?>;
            $.ajax({
                type: 'GET',
                async: false,
                url: '<?php echo e(route('package.fetchData', $general_setting->package_id)); ?>',
                success: function(data) {
                    if (data['number_of_invoice'] > 0 && data['number_of_invoice'] <= numberOfInvoice) {
                        localStorage.setItem("message",
                            "You don't have permission to create another invoice as you already exceed the limit! Subscribe to another package if you wants more!"
                        );
                        location.href = "<?php echo e(route('sales.index')); ?>";
                    }
                }
            });
        <?php endif; ?>

        <?php if(session()->get('message') == 'Sale successfully added to draft'): ?>
            localStorage.clear();
        <?php endif; ?>

        <?php if($lims_pos_setting_data): ?>
            var public_key = <?php echo json_encode($lims_pos_setting_data->stripe_public_key); ?>;
        <?php endif; ?>
        var without_stock = <?php echo json_encode($general_setting->without_stock); ?>;
        var alert_product = <?php echo json_encode($alert_product); ?>;
        var currency = <?php echo json_encode($currency); ?>;
        var valid;

        // array data depend on warehouse
        var lims_product_array = [];
        var product_code = [];
        var product_name = [];
        var product_qty = [];
        var product_type = [];
        var product_id = [];
        var product_list = [];
        var qty_list = [];

        // array data with selection
        var product_price = [];
        var wholesale_price = [];
        var cost = [];
        var product_discount = [];
        var tax_rate = [];
        var tax_name = [];
        var tax_method = [];
        var unit_name = [];
        var unit_operator = [];
        var unit_operation_value = [];
        var is_imei = [];
        var is_variant = [];
        var gift_card_amount = [];
        var gift_card_expense = [];

        // temporary array
        var temp_unit_name = [];
        var temp_unit_operator = [];
        var temp_unit_operation_value = [];

        var deposit = <?php echo json_encode($deposit); ?>;
        var points = <?php echo json_encode($points); ?>;
        var reward_point_setting = <?php echo json_encode($lims_reward_point_setting_data); ?>;

        <?php if($lims_pos_setting_data): ?>
            var product_row_number = <?php echo json_encode($lims_pos_setting_data->product_number); ?>;
        <?php endif; ?>
        var rowindex;
        var customer_group_rate;
        var row_product_price;
        var pos;
        var keyboard_active = <?php echo json_encode($keybord_active); ?>;
        var role_id = <?php echo json_encode(\Auth::user()->role_id); ?>;
        var warehouse_id = <?php echo json_encode(\Auth::user()->warehouse_id); ?>;
        //console.log(warehouse_id);
        var biller_id = <?php echo json_encode(\Auth::user()->biller_id); ?>;
        var coupon_list = <?php echo json_encode($lims_coupon_list); ?>;
        var currency = <?php echo json_encode($currency); ?>;
        var currencyChange = false;
        $('#currency').val(currency['id']);

        $('#currency').change(function() {
            var rate = $(this).find(':selected').data('rate');
            var currency_id = $(this).val();
            $('#exchange_rate').val(rate);
            //$('input[name="currency_id"]').val(currency_id);
            currency['exchange_rate'] = rate;
            $("table.order-list tbody .qty").each(function(index) {
                rowindex = index;
                currencyChange = true;
                checkDiscount($(this).val(), true);
                couponDiscount();
            });
        });

        var localStorageQty = [];
        var localStorageProductId = [];
        var localStorageProductDiscount = [];
        var localStorageTaxRate = [];
        var localStorageNetUnitPrice = [];
        var localStorageTaxValue = [];
        var localStorageTaxName = [];
        var localStorageTaxMethod = [];
        var localStorageSubTotalUnit = [];
        var localStorageSubTotal = [];
        var localStorageProductCode = [];
        var localStorageSaleUnit = [];
        var localStorageTempUnitName = [];
        var localStorageSaleUnitOperator = [];
        var localStorageSaleUnitOperationValue = [];

        $("#reference-no").val(getSavedValue("reference-no"));
        $("#order-discount").val(getSavedValue("order-discount"));
        $("#order-discount-val").val(getSavedValue("order-discount-val"));
        $("#order-discount-type").val(getSavedValue("order-discount-type"));
        $("#order-tax-rate-select").val(getSavedValue("order-tax-rate-select"));


        $("#shipping-cost-val").val(getSavedValue("shipping-cost-val"));

        <?php if(!isset($lims_sale_data)): ?>
            if (localStorage.getItem("tbody-id")) {
                $("#tbody-id").html(localStorage.getItem("tbody-id"));
            }
        <?php endif; ?>

        function saveValue(e) {
            var id = e.id; // get the sender's id to save it.
            var val = e.value; // get the value.
            localStorage.setItem(id, val); // Every time user writing something, the localStorage's value will override.
        }
        //get the saved value function - return the value of "v" from localStorage.
        function getSavedValue(v) {
            if (!localStorage.getItem(v)) {
                return ""; // You can change this to your defualt value.
            }
            return localStorage.getItem(v);
        }

        if (getSavedValue("localStorageQty")) {
            localStorageQty = getSavedValue("localStorageQty").split(",");
            localStorageProductDiscount = getSavedValue("localStorageProductDiscount").split(",");
            localStorageTaxRate = getSavedValue("localStorageTaxRate").split(",");
            localStorageNetUnitPrice = getSavedValue("localStorageNetUnitPrice").split(",");
            localStorageTaxValue = getSavedValue("localStorageTaxValue").split(",");
            localStorageTaxName = getSavedValue("localStorageTaxName").split(",");
            localStorageTaxMethod = getSavedValue("localStorageTaxMethod").split(",");
            localStorageSubTotalUnit = getSavedValue("localStorageSubTotalUnit").split(",");
            localStorageSubTotal = getSavedValue("localStorageSubTotal").split(",");
            localStorageProductId = getSavedValue("localStorageProductId").split(",");
            localStorageProductCode = getSavedValue("localStorageProductCode").split(",");
            localStorageSaleUnit = getSavedValue("localStorageSaleUnit").split(",");
            localStorageTempUnitName = getSavedValue("localStorageTempUnitName").split(",,");
            localStorageSaleUnitOperator = getSavedValue("localStorageSaleUnitOperator").split(",,");
            localStorageSaleUnitOperationValue = getSavedValue("localStorageSaleUnitOperationValue").split(",,");
            /*localStorageQty.pop();
            localStorage.setItem("localStorageQty", localStorageQty);*/
            for (var i = 0; i < localStorageQty.length; i++) {
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ') .qty').val(localStorageQty[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.discount-value').val(
                    localStorageProductDiscount[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-rate').val(localStorageTaxRate[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.net_unit_price').val(
                    localStorageNetUnitPrice[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-value').val(localStorageTaxValue[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-name').val(localStorageTaxName[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-method').val(localStorageTaxMethod[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-price').text(
                    localStorageSubTotalUnit[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sub-total').text(localStorageSubTotal[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.subtotal-value').val(localStorageSubTotal[
                    i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-id').val(localStorageProductId[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.product-code').val(localStorageProductCode[
                    i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val(localStorageSaleUnit[i]);
                if (i == 0) {
                    localStorageTempUnitName[i] += ',';
                    localStorageSaleUnitOperator[i] += ',';
                    localStorageSaleUnitOperationValue[i] += ',';
                }
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operator').val(
                    localStorageSaleUnitOperator[i]);
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operation-value').val(
                    localStorageSaleUnitOperationValue[i]);

                product_price.push(parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find(
                    '.product_price').val()));
                var quantity = parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.qty').val());
                product_discount.push(parseFloat(localStorageProductDiscount[i] / localStorageQty[i]).toFixed(
                    <?php echo e($general_setting->decimal); ?>));
                tax_rate.push(parseFloat($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-rate')
                    .val()));
                tax_name.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-name').val());
                tax_method.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.tax-method').val());
                temp_unit_name = $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val().split(
                    ',');
                unit_name.push(localStorageTempUnitName[i]);
                unit_operator.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit-operator')
                    .val());
                unit_operation_value.push($('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find(
                    '.sale-unit-operation-value').val());
                $('table.order-list tbody tr:nth-child(' + (i + 1) + ')').find('.sale-unit').val(temp_unit_name[0]);
                calculateTotal();
                //calculateRowProductData(localStorageQty[i]);
            }
        }


        $('.selectpicker').selectpicker({
            style: 'btn-link',
        });

        if (keyboard_active == 1) {

            $("input.numkey:text").keyboard({
                usePreview: false,
                layout: 'custom',
                display: {
                    'accept': '&#10004;',
                    'cancel': '&#10006;'
                },
                customLayout: {
                    'normal': ['1 2 3', '4 5 6', '7 8 9', '0 {dec} {bksp}', '{clear} {cancel} {accept}']
                },
                restrictInput: true, // Prevent keys not in the displayed keyboard from being typed in
                preventPaste: true, // prevent ctrl-v and right click
                autoAccept: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active'
                },
            });

            $('input[type="text"]').keyboard({
                usePreview: false,
                autoAccept: true,
                autoAcceptOnEsc: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active',
                    // used when disabling the decimal button {dec}
                    // when a decimal exists in the input area
                    buttonDisabled: 'disabled'
                },
                change: function(e, keyboard) {
                    keyboard.$el.val(keyboard.$preview.val())
                    keyboard.$el.trigger('propertychange')
                }
            });

            $('textarea').keyboard({
                usePreview: false,
                autoAccept: true,
                autoAcceptOnEsc: true,
                css: {
                    // input & preview
                    // keyboard container
                    container: 'center-block dropdown-menu', // jumbotron
                    // default state
                    buttonDefault: 'btn btn-default',
                    // hovered button
                    buttonHover: 'btn-primary',
                    // Action keys (e.g. Accept, Cancel, Tab, etc);
                    // this replaces "actionClass" option
                    buttonAction: 'active',
                    // used when disabling the decimal button {dec}
                    // when a decimal exists in the input area
                    buttonDisabled: 'disabled'
                },
                change: function(e, keyboard) {
                    keyboard.$el.val(keyboard.$preview.val())
                    keyboard.$el.trigger('propertychange')
                }
            });

            $('#lims_productcodeSearch').keyboard().autocomplete().addAutocomplete({
                // add autocomplete window positioning
                // options here (using position utility)
                position: {
                    of: '#lims_productcodeSearch',
                    my: 'top+18px',
                    at: 'center',
                    collision: 'flip'
                }
            });
        }
        // Add More Button of Multiple Payment Modal
        $(document).on("click", ".add-more", function(e) {
            e.preventDefault();

            var htmlText = `<div class="col-12 full-new-row  new-row">
                            <div class="row new-adding-row">
                            <div class="col-md-4 col-5 mt-2 cash-received-container">
                                <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                            </div>
                            <div class="col-md-3 col-6 mt-2">
                                <input type="hidden" name="paid_by_id[]" value='1'>
                                <label><?php echo e(trans('file.Paid By')); ?></label>
                                <select name="paid_by_id_select[]" class="form-control selectpicker">
                                    <?php if(in_array('cash', $options)): ?>
                                    <option value="1">Cash</option>
                                    <?php endif; ?>
                                    <?php if(in_array('gift_card', $options)): ?>
                                    <option value="2">Gift Card</option>
                                    <?php endif; ?>
                                    <?php if(in_array('card', $options)): ?>
                                    <option value="3">Credit Card</option>
                                    <?php endif; ?>
                                    <?php if(in_array('cheque', $options)): ?>
                                    <option value="4">Cheque</option>
                                    <?php endif; ?>
                                    <?php if(in_array('paypal', $options) &&
                                            strlen(env('PAYPAL_LIVE_API_USERNAME')) > 0 &&
                                            strlen(env('PAYPAL_LIVE_API_PASSWORD')) > 0 &&
                                            strlen(env('PAYPAL_LIVE_API_SECRET')) > 0): ?>
                                    <option value="5">Paypal</option>
                                    <?php endif; ?>
                                    <?php if(in_array('deposit', $options)): ?>
                                    <option value="6">Deposit</option>
                                    <?php endif; ?>
                                    <?php if($lims_reward_point_setting_data && $lims_reward_point_setting_data->is_active): ?>
                                    <option value="7">Points</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-6 mt-2 paying-amount-container">
                                <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                <input type="text" name="paid_amount[]" class="form-control paid_amount numkey"  step="any">
                            </div>
                            
                            <div class="col-1 mt-2">
                                <button class="btn btn-danger remove-row mt-4">X</button>
                            </div></div>`;
            $('.add-more-row').before(htmlText);
            var total_paid_amount = 0;
            $('.paid_amount').each(function() {
                var value = parseFloat($(this).val()) || 0;
                total_paid_amount += value;

            });
            var more_to_pay = ($("#grand-total").text() - total_paid_amount).toFixed(
                <?php echo e($general_setting->decimal); ?>);
            $('.paid_amount:last').val(more_to_pay);
            $('.paying_amount:last').val(more_to_pay);
            $('.selectpicker').selectpicker('refresh');
            if ($('.qc').length) {
                $('.qc').data('initial', 1); // Update the data attribute
            }
            calculatePayingAmount();
        });
        $(document).on("click", ".remove-row", function() {
            $(this).closest('.full-new-row').remove();
            calculatePayingAmount();
            updateChange();
        });

        $('.customer-submit-btn').on("click", function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route('customer.store')); ?>',
                data: $("#customer-form").serialize(),
                success: function(response) {
                    key = response['id'];
                    value = response['name'] + ' [' + response['phone_number'] + ']';
                    $('select[name="customer_id"]').append('<option value="' + key + '">' + value +
                        '</option>');
                    $('select[name="customer_id"]').val(key);
                    $('.selectpicker').selectpicker('refresh');
                    $("#addCustomer").modal('hide');
                }
            });
        });

        $("li#notification-icon").on("click", function(argument) {
            $.get('notifications/mark-as-read', function(data) {
                $("span.notification-number").text(alert_product);
            });
        });

        $("#register-details-btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?php echo e(url('/cash-register/showDetails/')); ?>/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    $('#register-details-modal #cash_in_hand').text(data['cash_in_hand']);
                    $('#register-details-modal #total_sale_amount').text(data['total_sale_amount']);
                    $('#register-details-modal #total_payment').text(data['total_payment']);
                    $('#register-details-modal #cash_payment').text(data['cash_payment']);
                    $('#register-details-modal #credit_card_payment').text(data['credit_card_payment']);
                    $('#register-details-modal #cheque_payment').text(data['cheque_payment']);
                    $('#register-details-modal #gift_card_payment').text(data['gift_card_payment']);
                    $('#register-details-modal #deposit_payment').text(data['deposit_payment']);
                    $('#register-details-modal #paypal_payment').text(data['paypal_payment']);
                    $('#register-details-modal #total_sale_return').text(data['total_sale_return']);
                    $('#register-details-modal #total_expense').text(data['total_expense']);
                    $('#register-details-modal #total_cash').text(data['total_cash']);
                    $('#register-details-modal input[name=cash_register_id]').val(data['id']);
                }
            });
            $('#register-details-modal').modal('show');
        });

        $("#today-sale-btn").on("click", function(e) {
            e.preventDefault();
            $.ajax({
                url: 'sales/today-sale/',
                type: "GET",
                success: function(data) {
                    $('#today-sale-modal .total_sale_amount').text(data['total_sale_amount']);
                    $('#today-sale-modal .total_payment').text(data['total_payment']);
                    $('#today-sale-modal .cash_payment').text(data['cash_payment']);
                    $('#today-sale-modal .credit_card_payment').text(data['credit_card_payment']);
                    $('#today-sale-modal .cheque_payment').text(data['cheque_payment']);
                    $('#today-sale-modal .gift_card_payment').text(data['gift_card_payment']);
                    $('#today-sale-modal .deposit_payment').text(data['deposit_payment']);
                    $('#today-sale-modal .paypal_payment').text(data['paypal_payment']);
                    $('#today-sale-modal .total_sale_return').text(data['total_sale_return']);
                    $('#today-sale-modal .total_expense').text(data['total_expense']);
                    $('#today-sale-modal .total_cash').text(data['total_cash']);
                }
            });
            $('#today-sale-modal').modal('show');
        });

        $("#today-profit-btn").on("click", function(e) {
            e.preventDefault();
            calculateTodayProfit(0);
        });

        $("#today-profit-modal select[name=warehouseId]").on("change", function() {
            calculateTodayProfit($(this).val());
        });

        function calculateTodayProfit(warehouse_id) {
            $.ajax({
                url: 'sales/today-profit/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    $('#today-profit-modal .product_revenue').text(data['product_revenue']);
                    $('#today-profit-modal .product_cost').text(data['product_cost']);
                    $('#today-profit-modal .expense_amount').text(data['expense_amount']);
                    $('#today-profit-modal .profit').text(data['profit']);
                }
            });
            $('#today-profit-modal').modal('show');
        }

        if (role_id > 2) {
            //$('#biller_id').parent().parent().parent().addClass('d-none');
            //$('#warehouse_id').parent().parent().parent().addClass('d-none');
            $('select[name=warehouse_id]').val(warehouse_id);
            $('select[name=biller_id]').val(biller_id);
            $('.selectpicker').selectpicker('refresh');
            console.log(warehouse_id + '|' + biller_id);
            isCashRegisterAvailable(warehouse_id);
        } else {
            if (getSavedValue("warehouse_id")) {
                warehouse_id = getSavedValue("warehouse_id");
                biller_id = getSavedValue("biller_id");
            } else {
                warehouse_id = $("input[name='warehouse_id_hidden']").val();
                biller_id = $("input[name='biller_id_hidden']").val();
            }
            //console.log(biller_id);
            $('select[name=warehouse_id]').val(warehouse_id);
            $('select[name=biller_id]').val(biller_id);
        }

        if (getSavedValue("biller_id")) {
            $('select[name=customer_id]').val(getSavedValue("customer_id"));
        } else {
            $('select[name=customer_id]').val($("input[name='customer_id_hidden']").val());
        }

        $('.selectpicker').selectpicker('refresh');

        var id = $("#customer_id").val();
        $.get('sales/getcustomergroup/' + id, function(data) {
            customer_group_rate = (data / 100);
        });

        var id = $("#warehouse_id").val();

        getProduct(warehouse_id);

        isCashRegisterAvailable(id);

        function isCashRegisterAvailable(warehouse_id) {
            $.ajax({
                url: 'cash-register/check-availability/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    if (data == 'false') {
                        $("#register-details-btn").addClass('d-none');
                        $('#cash-register-modal select[name=warehouse_id]').val(warehouse_id);

                        if (role_id <= 2)
                            $("#cash-register-modal .warehouse-section").removeClass('d-none');
                        else
                            $("#cash-register-modal .warehouse-section").addClass('d-none');

                        $('.selectpicker').selectpicker('refresh');
                        $("#cash-register-modal").modal('show');
                    } else
                        $("#register-details-btn").removeClass('d-none');
                }
            });
        }

        if (getSavedValue("biller_id")) {
            $('select[name=customer_id]').val(getSavedValue("customer_id"));
        } else {
            $('select[name=customer_id]').val($("input[name='customer_id_hidden']").val());
        }

        $('.selectpicker').selectpicker('refresh');

        var id = $("#customer_id").val();
        $.get('<?php echo e(url('/')); ?>/sales/getcustomergroup/' + id, function(data) {
            customer_group_rate = (data / 100);
        });

        var id = $("#warehouse_id").val();
        getProduct(warehouse_id);

        isCashRegisterAvailable(id);

        function isCashRegisterAvailable(warehouse_id) {
            $.ajax({
                url: '<?php echo e(url('/cash-register/check-availability')); ?>/' + warehouse_id,
                type: "GET",
                success: function(data) {
                    if (data == 'false') {
                        $("#register-details-btn").addClass('d-none');
                        $('#cash-register-modal select[name=warehouse_id]').val(warehouse_id);

                        if (role_id <= 2)
                            $("#cash-register-modal .warehouse-section").removeClass('d-none');
                        else
                            $("#cash-register-modal .warehouse-section").addClass('d-none');

                        $('.selectpicker').selectpicker('refresh');
                        $("#cash-register-modal").modal('show');
                    } else
                        $("#register-details-btn").removeClass('d-none');
                }
            });
        }

        if (keyboard_active == 1) {
            $('#lims_productcodeSearch').bind('keyboardChange', function(e, keyboard, el) {
                var customer_id = $('#customer_id').val();
                var warehouse_id = $('#warehouse_id').val();
                temp_data = $('#lims_productcodeSearch').val();
                if (!customer_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    alert('Please select Customer!');
                } else if (!warehouse_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    alert('Please select Warehouse!');
                }
            });
        } else {
            $('#lims_productcodeSearch').on('input', function() {
                var customer_id = $('#customer_id').val();
                var warehouse_id = $('#warehouse_id').val();
                temp_data = $('#lims_productcodeSearch').val();
                if (!customer_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    alert('Please select Customer!');
                } else if (!warehouse_id) {
                    $('#lims_productcodeSearch').val(temp_data.substring(0, temp_data.length - 1));
                    alert('Please select Warehouse!');
                }

            });
        }

        $("#print-btn").on("click", function() {
            var divToPrint = document.getElementById('sale-details');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write(
                '<link rel="stylesheet" href="<?php echo asset('vendor/bootstrap/css/bootstrap.min.css'); ?>" type="text/css"><style type="text/css">@media print {.modal-dialog { max-width: 1000px;} }</style><body onload="window.print()">' +
                divToPrint.innerHTML + '</body>');
            //   newWin.document.close();
            //   setTimeout(function(){newWin.close();},10);
        });

        $(document).on('click', '.btn-close', function(e) {
            $('.filter-window').hide('slide', {
                direction: 'right'
            }, 'fast');
            if (isMobile == true) {
                $(".table-container").hide();
            }
        });

        $('#category-filter').on('click', function(e) {
            quit = 0;
            e.stopPropagation();
            $('.filter-window').show('slide', {
                direction: 'right'
            }, 'fast');
            $('.category').show();
            $('.brand').hide();
            $('.products-m').hide();
            $(".table-container").removeClass('brand').removeClass('featured').addClass('category');
        });

        $(document).on('click', '.category-img', function() {
            var category_id = $(this).data('category');
            var brand_id = 0;
            $('.filter-window').hide('slide', {
                direction: 'right'
            }, 'fast');
            $(".table-container").children().remove();
            next_page_url = '<?php echo e(url('/')); ?>/sales/getproduct/' + category_id + '/0?page=2';
            $.get('<?php echo e(url('/sales/getproduct')); ?>/' + category_id + '/' + brand_id, function(response) {
                populateProduct(response);
            });
            if (isMobile == true) {
                $('.filter-window').show('slide', {
                    direction: 'right'
                }, 'fast');
            }
        });

        $('#brand-filter').on('click', function(e) {
            quit = 0;
            e.stopPropagation();
            $('.filter-window').show('slide', {
                direction: 'right'
            }, 'fast');
            $('.brand').show();
            $('.category').hide();
            $('.products-m').hide();
            $(".table-container").removeClass('category').removeClass('featured').addClass('brand');
        });

        $(document).on('click', '.brand-img', function() {
            var brand_id = $(this).data('brand');
            var category_id = 0;
            $('.filter-window').hide('slide', {
                direction: 'right'
            }, 'fast');
            $(".table-container").children().remove();
            next_page_url = '<?php echo e(url('/')); ?>/sales/getproduct/' + brand_id + '/0?page=2';
            $.get('<?php echo e(url('/sales/getproduct')); ?>/' + category_id + '/' + brand_id, function(data) {
                populateProduct(data);
            });
            if (isMobile == true) {
                $('.filter-window').show('slide', {
                    direction: 'right'
                }, 'fast');
            }
        });

        $('#featured-filter').on('click', function(e) {
            quit = 0;

            next_page_url = '<?php echo e(url('/')); ?>/sales/getfeatured?page=2';

            $(".table-container").removeClass('category').removeClass('brand').addClass('featured');

            $.get('<?php echo e(url('/sales/getfeatured')); ?>/', function(data) {
                if (Object.keys(data).length != 0) {
                    populateProduct(data);
                }
            });

            if (isMobile == true) {
                e.stopPropagation();
                $(".product_list_mobile.table-container").show();
                $('.product_list_mobile').html('');
                var featured_products = $(".table-container .product-grid").clone();
                $('.product_list_mobile').html(featured_products);
                $('.filter-window').show('slide', {
                    direction: 'right'
                }, 'fast');
                $('.brand').hide();
                $('.category').hide();
            }
            isCashRegisterAvailable(warehouse_id);
        });

        function getProduct(warehouse_id) {
            $.get('sales/getproduct/' + warehouse_id, function(data) {
                lims_product_array = [];
                product_code = data[0];
                product_name = data[1];
                product_qty = data[2];
                product_type = data[3];
                product_id = data[4];
                product_list = data[5];
                qty_list = data[6];
                product_warehouse_price = data[7];
                batch_no = data[8];
                expired_date = data[10];
                product_batch_id = data[9];
                is_embeded = data[11];
                imei_number = data[12];

                $.each(product_code, function(index) {
                    lims_product_array.push(product_code[index] + '|' + product_name[index] + '|' +
                        imei_number[index] + '|' + is_embeded[index]);
                });

                //updating in stock
                var rownumber = $('table.order-list tbody tr:last').index();
                for (rowindex = 0; rowindex <= rownumber; rowindex++) {
                    var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-code').val();
                    pos = product_code.indexOf(row_product_code);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.in-stock').text(
                        product_qty[pos]);
                }
            });
        }



        function populateProduct(response) {
            var tableData = '<div class="product-grid">';

            $.each(response.data['name'], function(index) {
                var product_info = response.data['code'][index] + '|' + response.data['name'][index] + '|null|0';
                if (response.data['image'][index])
                    image = response.data['image'][index];
                else
                    image = 'zummXD2dvAtI.png';
                tableData += '<div class="product-img sound-btn" title="' + response.data['name'][index] +
                    '" data-product = "' + product_info + '"><img  src="<?php echo e(url('/images/product')); ?>/' + image +
                    '" width="100%" /><p>' + response.data['name'][index] + '</p><span>' + response.data['code'][
                        index
                    ] + '</span></div>';
            });
            tableData +=
                '</div><button class="btn btn-primary btn-block load-more"><i class="dripicons-arrow-thin-down"</button>';
            $(".table-container").html(tableData);

            if (isMobile) {
                $('.brand').hide();
                $('.category').hide();
                $('.products-m').show();
                $(".product_list_mobile.table-container").show();
            } else {
                $(".table-container").show();
            }
        }

        function appendProduct(data) {
            var tableData = '';
            $.each(data['name'], function(index) {
                var product_info = data['code'][index] + '|' + data['name'][index] + '|null|0';
                if (data['image'][index])
                    image = data['image'][index];
                else
                    image = 'zummXD2dvAtI.png';
                tableData += '<div class="product-img sound-btn" title="' + data['name'][index] +
                    '" data-product = "' + product_info + '"><img  src="<?php echo e(url('/images/product')); ?>/' + image +
                    '" width="100%" /><p>' + data['name'][index] + '</p><span>' + data['code'][index] +
                    '</span></div>';
            });
            $(".table-container .product-grid").append(tableData);
        }

        function convertDate(isoDate) {
            var date = new Date(isoDate);
            var day = String(date.getDate()).padStart(2, '0');
            var month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            var year = date.getFullYear();

            if ('<?php echo e($general_setting->date_format); ?>' == 'd-m-Y') {
                return day + '-' + month + '-' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'd/m/Y') {
                return day + '/' + month + '/' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'd.m.Y') {
                return day + '.' + month + '.' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'm-d-Y') {
                return month + '-' + day + '-' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'm/d/Y') {
                return month + '/' + day + '/' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'm.d.Y') {
                return month + '.' + day + '.' + year;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'Y-m-d') {
                return year + '-' + month + '-' + day;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'Y/m/d') {
                return year + '/' + month + '/' + day;
            } else if ('<?php echo e($general_setting->date_format); ?>' == 'Y.m.d') {
                return year + '.' + month + '.' + day;
            }

        }

        var all_permission = '<?php echo json_encode($all_permission); ?>';

        function populateRecentSale(data) {
            var tableData = '';

            $.each(data, function(index, sale) {
                tableData += '<tr>';
                tableData += '<td>' + convertDate(sale.created_at) + '</td>';
                tableData += '<td>' + sale.reference_no + '</td>';
                tableData += '<td>' + sale.name + '</td>';
                tableData += '<td>' + sale.grand_total + '</td>';

                tableData += '<td>'
                if (all_permission.includes("sales-edit")) {
                    tableData += '<a href="sales/' + sale.id +
                        '/edit" class="btn btn-success btn-sm" title="Edit"><i class="dripicons-document-edit"></i></a>&nbsp';
                }
                if (all_permission.includes("sales-delete")) {
                    tableData += '<form class="d-inline" action="<?php echo e(url('/sales')); ?>/' + sale.id +
                        '" method ="POST"><input name="_method" type="hidden" value="DELETE"><?php echo csrf_field(); ?>';
                    tableData +=
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()" title="Delete"><i class="dripicons-trash"></i></button>';
                    tableData += '</form>';
                }
                tableData += '</td>'

                tableData += '</tr>';
            });

            $("#sale-latest tbody").html(tableData);
        }

        function populateRecentDraft(data) {
            var tableData = '';

            $.each(data, function(index, draft) {
                tableData += '<tr>';
                tableData += '<td>' + convertDate(draft.created_at) + '</td>';
                tableData += '<td>' + draft.reference_no + '</td>';
                tableData += '<td>' + draft.name + '</td>';
                tableData += '<td>' + draft.grand_total + '</td>';

                tableData += '<td>'
                if (all_permission.includes("sales-edit")) {
                    tableData += '<a href="sales/' + draft.id +
                        '/create" class="btn btn-success btn-sm" title="Edit"><i class="dripicons-document-edit"></i></a>&nbsp';
                }
                if (all_permission.includes("sales-delete")) {
                    tableData += '<form class="d-inline" action="<?php echo e(url('/sales')); ?>/' + draft.id +
                        '" method ="POST"><input name="_method" type="hidden" value="DELETE"><?php echo csrf_field(); ?>';
                    tableData +=
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete()" title="Delete"><i class="dripicons-trash"></i></button>';
                    tableData += '</form>';
                }
                tableData += '</td>'

                tableData += '</tr>';
            });

            $("#draft-latest tbody").html(tableData);
        }

        $('select[name="customer_id"]').on('change', function() {
            saveValue(this);
            var id = $(this).val();
            $.get('<?php echo e(url('/sales/getcustomergroup')); ?>/' + id, function(data) {
                customer_group_rate = (data / 100);
            });
        });

        $('select[name="biller_id"]').on('change', function() {
            saveValue(this);
        });

        $('#warehouse_id').on('change', function() {
            saveValue(this);
            warehouse_id = $(this).val();
            getProduct(warehouse_id);

            isCashRegisterAvailable(warehouse_id);
        });

        var lims_productcodeSearch = $('#lims_productcodeSearch');

        lims_productcodeSearch.autocomplete({
            source: function(request, response) {
                var matcher = new RegExp(".?" + $.ui.autocomplete.escapeRegex(request.term), "i");
                response($.grep(lims_product_array, function(item) {
                    return matcher.test(item);
                }));
            },
            response: function(event, ui) {
                if (ui.content.length == 1) {
                    var data = ui.content[0].value;
                    $(this).autocomplete("close");
                    productSearch(data);
                } else if (ui.content.length == 0 && $('#lims_productcodeSearch').val().length == 13) {
                    productSearch($('#lims_productcodeSearch').val() + '|' + 1);
                }
            },
            select: function(event, ui) {
                var data = ui.item.value;
                ui.item.value = '';
                productSearch(data);
            },
        });

        $('#myTable').keyboard({
            accepted: function(event, keyboard, el) {
                checkQuantity(el.value, true);
            }
        });

        $("#myTable").on('click', '.plus', function() {
            rowindex = $(this).closest('tr').index();
            var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
            if (!qty)
                qty = 1;
            else
                qty = parseFloat(qty) + 1;

            if (qty == 0) {
                qty = 1
            }
            // if (is_variant[rowindex])
            checkQuantity(String(qty), true);
            // else
            //     checkDiscount(qty, true);
        });

        $("#myTable").on('click', '.minus', function() {
            rowindex = $(this).closest('tr').index();
            var qty = parseFloat($('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val()) - 1;

            if (qty == 0) {
                qty = -1
            }
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);


            // if (is_variant[rowindex])
            checkQuantity(String(qty), true);
            // else
            //     checkDiscount(qty, true);
        });

        $("select[name=price_option]").on("change", function() {
            $("#editModal input[name=edit_unit_price]").val($(this).val());
        });

        $("#myTable").on("change", ".batch-no", function() {
            rowindex = $(this).closest('tr').index();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-id')
                .val();
            var warehouse_id = $('#warehouse_id').val();
            $.get('check-batch-availability/' + product_id + '/' + $(this).val() + '/' + warehouse_id, function(
                data) {
                if (data['message'] != 'ok') {
                    alert(data['message']);
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.batch-no').val(
                        '');
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val('');
                } else {
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-batch-id').val(data['product_batch_id']);
                    code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.product-code').val();
                    pos = product_code.indexOf(code);
                    product_qty[pos] = data['qty'];
                }
            });
        });

        //Change quantity
        $("#myTable").on('input', '.qty', function() {
            rowindex = $(this).closest('tr').index();
            if ($(this).val() < 0 && $(this).val() != '') {
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(1);
                alert("Quantity can't be less than 0");
            }
            if (is_variant[rowindex])
                checkQuantity($(this).val(), true);
            else
                checkDiscount($(this).val(), true);
        });

        $("#myTable").on('click', '.qty', function() {
            rowindex = $(this).closest('tr').index();
        });

        $(document).on('click', '.sound-btn', function() {
            var audio = $("#mysoundclip1")[0];
            audio.play();
        });

        $(document).on('click', '.product-img', function() {
            var customer_id = $('#customer_id').val();
            var warehouse_id = $('#warehouse_id').val();
            if (isMobile) {
                $('.filter-window').hide('slide', {
                    direction: 'right'
                }, 'fast');
            }
            if (!customer_id)
                alert('Please select Customer!');
            else if (!warehouse_id)
                alert('Please select Warehouse!');
            else {
                var data = $(this).data('product');
                product_info = data.split("|");
                pos = product_code.indexOf(product_info[0]);
                if (pos < 0)
                    alert('Product is not avaialable in the selected warehouse');
                else {
                    productSearch(data);
                }
            }
        });
        //Delete product
        $("table.order-list tbody").on("click", ".ibtnDel", function(event) {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            rowindex = $(this).closest('tr').index();
            product_price.splice(rowindex, 1);
            wholesale_price.splice(rowindex, 1);
            product_discount.splice(rowindex, 1);
            tax_rate.splice(rowindex, 1);
            tax_name.splice(rowindex, 1);
            tax_method.splice(rowindex, 1);
            unit_name.splice(rowindex, 1);
            unit_operator.splice(rowindex, 1);
            unit_operation_value.splice(rowindex, 1);

            localStorageProductId.splice(rowindex, 1);
            localStorageQty.splice(rowindex, 1);
            localStorageSaleUnit.splice(rowindex, 1);
            localStorageProductDiscount.splice(rowindex, 1);
            localStorageTaxRate.splice(rowindex, 1);
            localStorageNetUnitPrice.splice(rowindex, 1);
            localStorageTaxValue.splice(rowindex, 1);
            localStorageSubTotalUnit.splice(rowindex, 1);
            localStorageSubTotal.splice(rowindex, 1);
            localStorageProductCode.splice(rowindex, 1);

            localStorageTaxName.splice(rowindex, 1);
            localStorageTaxMethod.splice(rowindex, 1);
            localStorageTempUnitName.splice(rowindex, 1);
            localStorageSaleUnitOperator.splice(rowindex, 1);
            localStorageSaleUnitOperationValue.splice(rowindex, 1);

            localStorage.setItem("localStorageProductId", localStorageProductId);
            localStorage.setItem("localStorageQty", localStorageQty);
            localStorage.setItem("localStorageSaleUnit", localStorageSaleUnit);
            localStorage.setItem("localStorageProductCode", localStorageProductCode);
            localStorage.setItem("localStorageProductDiscount", localStorageProductDiscount);
            localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
            localStorage.setItem("localStorageTaxName", localStorageTaxName);
            localStorage.setItem("localStorageTaxMethod", localStorageTaxMethod);
            localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
            localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
            localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            localStorage.setItem("localStorageNetUnitPrice", localStorageNetUnitPrice);
            localStorage.setItem("localStorageTaxValue", localStorageTaxValue);
            localStorage.setItem("localStorageSubTotalUnit", localStorageSubTotalUnit);
            localStorage.setItem("localStorageSubTotal", localStorageSubTotal);

            $(this).closest("tr").remove();
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
            calculateTotal();
        });

        //Edit product
        $("table.order-list").on("click", ".edit-product", function() {
            rowindex = $(this).closest('tr').index();
            edit();
        });

        //Update product
        $('button[name="update_btn"]').on("click", function() {


            if (is_imei[rowindex]) {
                var imeiNumbers = '';
                $("#editModal .imei-numbers").each(function(i) {
                    if (i)
                        imeiNumbers += ',' + $(this).val();
                    else
                        imeiNumbers = $(this).val();
                });
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.imei-number').val(
                    imeiNumbers);
            }

            var edit_discount = $('input[name="edit_discount"]').val();
            var edit_qty = $('input[name="edit_qty"]').val();
            var edit_unit_price = $('input[name="edit_unit_price"]').val();

            if (parseFloat(edit_discount) > parseFloat(edit_unit_price)) {
                alert('Invalid Discount Input!');
                return;
            }

            if (edit_qty < 0) {
                $('input[name="edit_qty"]').val(1);
                edit_qty = 1;
                alert("Quantity can't be less than 0");
            }

            var tax_rate_all = <?php echo json_encode($tax_rate_all); ?>;

            tax_rate[rowindex] = localStorageTaxRate[rowindex] = parseFloat(tax_rate_all[$(
                'select[name="edit_tax_rate"]').val()]);
            tax_name[rowindex] = localStorageTaxName[rowindex] = $('select[name="edit_tax_rate"] option:selected')
                .text();

            product_discount[rowindex] = $('input[name="edit_discount"]').val();
            if (product_type[pos] == 'standard') {
                var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
                var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[
                    rowindex].indexOf(","));
                if (row_unit_operator == '*') {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() / row_unit_operation_value;
                } else {
                    product_price[rowindex] = $('input[name="edit_unit_price"]').val() * row_unit_operation_value;
                }
                var position = $('select[name="edit_unit"]').val();
                var temp_operator = temp_unit_operator[position];
                var temp_operation_value = temp_unit_operation_value[position];
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sale-unit').val(
                    temp_unit_name[position]);
                temp_unit_name.splice(position, 1);
                temp_unit_operator.splice(position, 1);
                temp_unit_operation_value.splice(position, 1);

                temp_unit_name.unshift($('select[name="edit_unit"] option:selected').text());
                temp_unit_operator.unshift(temp_operator);
                temp_unit_operation_value.unshift(temp_operation_value);

                unit_name[rowindex] = localStorageTempUnitName[rowindex] = temp_unit_name.toString() + ',';
                unit_operator[rowindex] = localStorageSaleUnitOperator[rowindex] = temp_unit_operator.toString() +
                    ',';
                unit_operation_value[rowindex] = localStorageSaleUnitOperationValue[rowindex] =
                    temp_unit_operation_value.toString() + ',';

                localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
                localStorage.setItem("localStorageTaxName", localStorageTaxName);
                localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
                localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
                localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            } else {
                product_price[rowindex] = $('input[name="edit_unit_price"]').val();
            }
            checkDiscount(edit_qty, false);
        });

        $('button[name="order_discount_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $('button[name="shipping_cost_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $('button[name="order_tax_btn"]').on("click", function() {
            calculateGrandTotal();
        });

        $(".coupon-check").on("click", function() {
            couponDiscount();
        });

        $(".payment-btn").on("click", function() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            $('.paid_amount').val($("#grand-total").text());
            // $('.paying_amount').val($("#grand-total").text());

            $('.qc').data('initial', 1);
        });

        $("#draft-btn").on("click", function() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            $('input[name="sale_status"]').val(3);
            $('input[name="paying_amount"]').prop('required', false);
            $('input[name="paid_amount"]').prop('required', false);

            var form = $(".payment-form"); 

    // Ensure the hidden inputs exist
    if ($('input[name="paying_amount[]"]').length === 0) {
        form.append('<input type="hidden" name="paying_amount[]" >');
    }

    if ($('input[name="paid_amount[]"]').length === 0) {
        form.append('<input type="hidden" name="paid_amount[]" >');
    }


            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                alert("Please insert product to order table!")
            } else
                $('.payment-form').submit();
        });

        $("#submit-btn").on("click", function() {
            var val = $('.paying_amount').val()
            if (val > 0) {
                $('.payment-form').submit();
            } else {
                alert("Please Enter Amount")
            }

        });


        $(document).on("keypress", ".paying_amount", function(event) {
            var val = $('.paying_amount').val()
            if (val > 0) {
                if (event.which === 13) {
                    event.preventDefault();
                    $(".payment-form").submit();
                }
            } else {
                alert("Please Enter Amount")
            }
        });


        $("#gift-card-btn").on("click", function() {
            appendRemoveElement('gift-card');
        });

        $("#credit-card-btn").on("click", function() {
            appendRemoveElement('credit-card');

        });

        $("#cheque-btn").on("click", function() {
            appendRemoveElement('cheque');
        });

        $("#cash-btn").on("click", function() {
            appendRemoveElement('cash');
            $(".paying_amount").focus();
        });

        $("#multiple-payment-btn").on("click", function() {
            appendRemoveElement('multiplepay');
        });

        $("#deposit-btn").on("click", function() {
            appendRemoveElement('deposit');
        });

        $("#point-btn").on("click", function() {
            appendRemoveElement('points');
        });

        function appendRemoveElement(className) {
            ismultiplepayment = 0;
            $('.remove-element').remove();
            $('.selectpicker').selectpicker('refresh');
            $('select[name="paid_by_id_select[]"]').parent().parent().addClass('d-none');
            $('.paid_amount').parent().addClass('d-none');
            $('.paying_amount').parent().addClass('d-none');
            $('.add-more').parent().addClass('d-none');
            $('.total_payable').text($('#grand-total').text());
            $('.total_paying').text('0.00');
            $('.new-row').remove();
            $('#submit-btn').prop('disabled', false);
            updateChange();
            var appendElement = '';
            if (className == 'cash') {
                ismultiplepayment = 1;
                $('select[name="paid_by_id_select[]"]').val(1);
                $('select[name="paid_by_id_select[]"]').parent().parent().removeClass('d-none');
                $('.paid_amount').parent().removeClass('d-none');
                $('.paying_amount').parent().removeClass('col-md-12 d-none').addClass('col-md-3');
                $('.paying_amount').removeClass('cash_paying_amount')
                appendElement = `<div class="form-group col-md-12 credit-card remove-element">
                               
                                
                                <div class="row new-row">
                                    <div class="col-6 mt-2 cash-received-container">
                                        <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                        <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                    </div>
                            
                                    <input type="hidden" value='1' name="paid_by_id[]">
                               
                           
                                    <div class="col-6 mt-2 paying-amount-container">
                                        <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                        <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                    </div>
                            
                                </div>
                            </div>
                            `;
                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());
                setTimeout(function() {
                    $(".paying_amount").last().focus();
                }, 500);


            } else if (className == 'credit-card') {
                // $('select[name="paid_by_id_select[]"]').val(3);
                appendElement = `
                                <div class="form-group col-md-12 credit-card remove-element">
                                    <div class="row new-row">
                                        <div class="col-6 mt-2 cash-received-container">
                                            <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                            <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                        </div>
                                
                                        <input type="hidden" value='3' name="paid_by_id[]">
                                
                            
                                        <div class="col-6 mt-2 paying-amount-container">
                                            <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                            <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                        </div>
                                
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <label>Card Number</label>
                                            <input class="form-control" name="card_number" class="card_name">
                                        </div>
                                        <div class="col-md-5">
                                            <label>Card Holder Name</label>
                                            <input class="form-control" name="card_holder_name">
                                        </div>
                                        <div class="col-md-2">
                                            <label>Card Type</label>
                                            <select class="form-control" name="card_type">
                                                <option>Visa</option>
                                                <option>Master Card</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            `;




                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());
                $('.paying_amount').val($("#grand-total").text());

                $('.selectpicker').selectpicker('refresh');
                $('.selectpicker').selectpicker();
                setTimeout(function() {
                    $(".paying_amount").last().focus();
                }, 500);

                ismultiplepayment = 1;
                $('select[name="paid_by_id_select[]"]').val(1);
                $('select[name="paid_by_id_select[]"]').parent().parent().removeClass('d-none');
                $('.paying_amount').removeClass('cash_paying_amount')
            } else if (className == 'cheque') {
                $('select[name="paid_by_id_select[]"]').val(4);
                appendElement = `<div class="form-group col-md-12 cheque remove-element">
                            <label><?php echo e(trans('file.Cheque Number')); ?> *</label>
                            <input type="text" name="cheque_no" class="form-control" value="" required>
                        </div>
                        
                        <div class="form-group col-md-12 credit-card remove-element">
                               
                                
                               <div class="row new-row">
                                   <div class="col-6 mt-2 cash-received-container">
                                       <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                       <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                   </div>
                           
                                   <input type="hidden" value='1' name="paid_by_id[]">
                              
                          
                                   <div class="col-6 mt-2 paying-amount-container">
                                       <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                       <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                   </div>
                           
                               </div>
                           </div>`;



                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());

            } else if (className == 'gift-card') {
                $('select[name="paid_by_id_select[]"]').val(2);
                appendElement = `<div class="form-group col-md-12 gift-card remove-element">
                                <label> <?php echo e(trans('file.Gift Card')); ?> *</label>
                                <input type="hidden" name="gift_card_id">
                                <select id="gift_card_id_select" name="gift_card_id_select" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Gift Card..."></select>
                            </div>
                            <div class="form-group col-md-12 credit-card remove-element">
                               
                                
                               <div class="row new-row">
                                   <div class="col-6 mt-2 cash-received-container">
                                       <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                       <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                   </div>
                           
                                   <input type="hidden" value='1' name="paid_by_id[]">
                              
                          
                                   <div class="col-6 mt-2 paying-amount-container">
                                       <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                       <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                   </div>
                           
                               </div>
                           </div>
                            `;
                $.ajax({
                    url: '<?php echo e(url('/sales/get_gift_card')); ?>/',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#add-payment select[name="gift_card_id_select"]').empty();
                        $.each(data, function(index) {
                            gift_card_amount[data[index]['id']] = data[index]['amount'];
                            gift_card_expense[data[index]['id']] = data[index]['expense'];
                            $('#add-payment select[name="gift_card_id_select"]').append(
                                '<option value="' + data[index]['id'] + '">' + data[index][
                                    'card_no'
                                ] + '</option>');
                        });
                        $('.selectpicker').selectpicker('refresh');
                        $('.selectpicker').selectpicker();
                    }
                });
                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());

            } else if (className == 'deposit') {
                $('select[name="paid_by_id_select[]"]').val(6);
                if ($('input[name="paid_amount[]"]').val() > deposit[$('#customer_id').val()]) {
                    alert('Amount exceeds customer deposit! Customer deposit : ' + deposit[$('#customer_id')
                        .val()]);

                } else {
                    $('#add-payment').modal('show');
                }

                appendElement = `<div class="form-group col-md-12 credit-card remove-element">
                               
                                
                               <div class="row new-row">
                                   <div class="col-6 mt-2 cash-received-container">
                                       <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                       <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                   </div>
                           
                                   <input type="hidden" value='1' name="paid_by_id[]">
                              
                          
                                   <div class="col-6 mt-2 paying-amount-container">
                                       <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                       <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                   </div>
                           
                               </div>
                           </div>
                           `;
                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());

            } else if (className == 'points') {
                $('select[name="paid_by_id_select[]"]').val(7);
                pointCalculation();
                appendElement = `<div class="form-group col-md-12 credit-card remove-element">
                               
                                
                               <div class="row new-row">
                                   <div class="col-6 mt-2 cash-received-container">
                                       <label><?php echo e(trans('file.Cash Received')); ?> *</label>
                                       <input type="text" name="paying_amount[]" class="form-control paying_amount numkey" required step="any">
                                   </div>
                           
                                   <input type="hidden" value='1' name="paid_by_id[]">
                              
                          
                                   <div class="col-6 mt-2 paying-amount-container">
                                       <label><?php echo e(trans('file.Paying Amount')); ?> *</label>
                                       <input type="text" name="paid_amount[]" class="form-control paid_amount numkey" readonly step="any">
                                   </div>
                           
                               </div>
                           </div>
                           `; 
                $("#payment-select-row .row:eq(0)").append(appendElement);
                $('.paid_amount').val($("#grand-total").text());

            } else if (className == 'multiplepay') {
                ismultiplepayment = 1;
                $('select[name="paid_by_id_select[]"]').val(1);
                $('select[name="paid_by_id_select[]"]').parent().parent().removeClass('d-none');
                $('.paid_amount').parent().removeClass('d-none');
                $('.paying_amount').parent().removeClass('col-md-12 d-none').addClass('col-md-3');
                $('.paying_amount').removeClass('cash_paying_amount')
                $('.add-more').parent().removeClass('d-none');
                if ($('.add-more-row').length === 0) {
                    appendElement = `
                <div class="col-12">
                <div class="row add-more-row mt-2">
                                                <div class="col-md-12 text-center"><button type="button" class="btn btn-info add-more">+
                                                        <?php echo e(trans('file.Add More Payment')); ?></button></div>
                                            </div></div>`;

                    $("#payment-select-row .row:eq(0)").append(appendElement);
                }
                $('.paid_amount').val($("#grand-total").text());
            }

            calculatePayingAmount();
            updateChange();


        }

        function pointCalculation() {
            paid_amount = $('input[name=paid_amount]').val();
            required_point = Math.ceil(paid_amount / reward_point_setting['per_point_amount']);
            if (required_point > points[$('#customer_id').val()]) {
                alert('Customer does not have sufficient points. Available points: ' + points[$('#customer_id')
                    .val()]);
            } else {
                $("input[name=used_points]").val(required_point);
            }
        }

        $(document).on("change", 'select[name="paid_by_id_select[]"]', function() {

            updateChange();
            var id = $(this).val();
            $(this).closest('.col-md-3').find('input[name="paid_by_id[]"]').val(id);
            var appendElement = '';
            $(".payment-form").off("submit");
            // $(this).parent().parent().siblings('.cash-received-container').addClass('d-none');
            $(this).parent().parent().siblings('.gift-card').remove();
            $(this).parent().parent().siblings('.credit-card').remove();
            $(this).parent().parent().siblings('.cheque').remove();
            //cash
            if (id == 1) {
                // $(this).parent().parent().siblings('.cash-received-container').removeClass('d-none');
            }
            //gift
            else if (id == 2) {
                appendElement = `<div class="form-group col-md-10 gift-card remove-element">
                                <label> <?php echo e(trans('file.Gift Card')); ?> *</label>
                                <input type="hidden" name="gift_card_id">
                                <select id="gift_card_id_select" name="gift_card_id_select" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="Select Gift Card..."></select>
                            </div>`;
                $(this).closest('.col-md-3').after(appendElement);

                $.ajax({
                    url: '<?php echo e(url('/sales/get_gift_card')); ?>/',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#add-payment select[name="gift_card_id_select"]').empty();
                        $.each(data, function(index) {
                            gift_card_amount[data[index]['id']] = data[index]['amount'];
                            gift_card_expense[data[index]['id']] = data[index]['expense'];
                            $('#add-payment select[name="gift_card_id_select"]').append(
                                '<option value="' + data[index]['id'] + '">' + data[
                                    index][
                                    'card_no'
                                ] + '</option>');
                        });
                        $('.selectpicker').selectpicker('refresh');
                        $('.selectpicker').selectpicker();
                    }
                });
            }
            //credit
            else if (id == 3) {
                appendElement = `
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Card Number</label>
                                        <input class="form-control" name="card_number" class="card_name">
                                    </div>
                                    
                                    <div class="col-md-5">
                                        <label>Card Holder Name</label>
                                        <input class="form-control" name="card_holder_name">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Card Type</label>
                                        <select class="form-control" name="card_type">
                                            <option>Visa</option>
                                            <option>Master Card</option>
                                        </select>
                                    </div>
                               </div>
                            `;
                $(this).closest('.new-adding-row').after(appendElement);
            }
            //cheque
            else if (id == 4) {
                appendElement = `<div class="form-group col-md-10 cheque remove-element">
                            <label><?php echo e(trans('file.Cheque Number')); ?> *</label>
                            <input type="text" name="cheque_no" class="form-control" value="" required>
                        </div>`;
                $(this).closest('.col-md-3').after(appendElement);
            }
            //deposit
            else if (id == 6) {

            }
            //point
            else if (id == 7) {
                pointCalculation();
            }
            calculatePayingAmount();
        });

        $(document).on("change", '#add-payment select[name="gift_card_id_select"]', function() {
            var balance = gift_card_amount[$(this).val()] - gift_card_expense[$(this).val()];
            $('#add-payment input[name="gift_card_id"]').val($(this).val());
            if (ismultiplepayment == 0) {
                if ($('input[name="paid_amount[]"]').val() > balance) {
                    $('#submit-btn').prop('disabled', true);
                    alert('Amount exceeds card balance! Gift Card balance: ' + balance);
                } else {
                    $('#submit-btn').prop('disabled', false);
                }
            } else {
                // $(this).parent().parent().siblings('.paying-amount-container').children('.paid_amount').val(balance);
                updateChange();
            }

        });

        function change(paying_amount, paid_amount) {
            $("#change").text(parseFloat(paying_amount - paid_amount).toFixed(<?php echo e($general_setting->decimal); ?>));
        }

        // Event listener for changes to paid_amount
        $(document).on("keyup", '.paid_amount', function() {
            let paid_amount = parseFloat($(this).val()) || 0;
            if (paid_amount < 0) {
                $(this).val(0);
            }
            // Call the change function to update the change amount for this specific row
            calculatePayingAmount();
            updateChange();
        });
        // Event listener for changes to paid_amount
        $(document).on("keyup", '.paying_amount', function() {
            let paying_amount = parseFloat($(this).val()) || 0;
            if (paying_amount < 0) {
                $(this).val(0);
            }
            updateChange();
            calculatePayingAmount();

        });

        $(document).on("keyup", '.cash_paying_amount', function() {
            let paying_amount = parseFloat($(this).val()) || 0;
            let paid_amount = $('.paid_amount').val(paying_amount);

            if (paying_amount < 0) {
                $(this).val(0);
            }
            updateChange();
            calculatePayingAmount();
        });

        // Update the change text for the specific row
        function updateChange() {
            let change = 0;
            $('select[name="paid_by_id_select[]"]').each(function() {
                if ($(this).val() == '1') {
                    let $row = $(this).closest('.row');
                    let paid_amount = parseFloat($row.find('.paid_amount').val()) || 0;

                    let change = parseFloat($row.find('.paying_amount').val()) || 0;

                    console.log("paid_amount", paid_amount, 'paid_amount', paid_amount)

                    // var amount = paid_amount - change;

                }
            });
            // $('.change').text((change).toFixed(<?php echo e($general_setting->decimal); ?>));
        }


        // Function to calculate the total and update the total_payable 
        function calculatePayingAmount() {

            let total = 0;
            let pTotal = 0;
            let cardCost = 0;


            // Loop through each paying_amount field and sum their values
            $('.paid_amount').each(function() {
                let value = $(this).val();

                // Check if the value is a valid number
                if ($.isNumeric(value)) {
                    total = total + parseFloat(value);
                }

                let parentRow = $(this).closest('.new-row');

                if (parentRow.find('input[name="paid_by_id[]"]').val() == '3') {

                    cardCost = cardCost + ((parseFloat(value)) / 100) * 3;
                }
            });

            $('.paying_amount').each(function() {
                let pValue = $(this).val();


                if ($.isNumeric(pValue)) {
                    pTotal += parseFloat(pValue);
                }
            });

            console.log("cardCost", cardCost);

            let balance = pTotal - total

            $('.change').text(balance);

            if (cardCost > 0) {
                if ($('.bank-3-section').length === 0) {
                    $('.col-md-2.bg-info').append(`
                <div class="mt-4 bank-3-section">
                    <h2>Bank 3%</h2>
                    <p class="bankchagers text-light">${cardCost.toFixed(2)}</p>
                </div>
            `);
                } else {
                    $('.bankchagers').text(cardCost.toFixed(2));
                }
            } else {
                $('.bank-3-section').remove(); // Remove section if no card payments
            }
            $('.total_paying').text(total);
        }

        function confirmDelete() {
            if (confirm("Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        $('.transaction-btn-plus').on("click", function() {
            $(this).addClass('d-none');
            $('.transaction-btn-close').removeClass('d-none');
        });

        $('.transaction-btn-close').on("click", function() {
            $(this).addClass('d-none');
            $('.transaction-btn-plus').removeClass('d-none');
        });

        $('.coupon-btn-plus').on("click", function() {
            $(this).addClass('d-none');
            $('.coupon-btn-close').removeClass('d-none');
        });

        $('.coupon-btn-close').on("click", function() {
            $(this).addClass('d-none');
            $('.coupon-btn-plus').removeClass('d-none');
        });

        $(document).on('click', '.qc-btn', function(e) {
            if ($(this).data('amount')) {
                if ($('.qc').data('initial')) {
                    $('input[name="paying_amount"]').val($(this).data('amount').toFixed(
                        <?php echo e($general_setting->decimal); ?>));
                    $('.qc').data('initial', 0);
                } else {
                    $('input[name="paying_amount"]').val((parseFloat($('input[name="paying_amount"]').val()) +
                        $(
                            this).data('amount')).toFixed(<?php echo e($general_setting->decimal); ?>));
                }
            } else
                $('input[name="paying_amount"]').val(
                    '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            change($('input[name="paying_amount"]').val(), $('input[name="paid_amount"]').val());
        });

        // function change(paying_amount, paid_amount) {
        //     $("#change").text( parseFloat(paying_amount - paid_amount).toFixed(<?php echo e($general_setting->decimal); ?>));
        // }

        function confirmDelete() {
            if (confirm("Are you sure want to delete?")) {
                return true;
            }
            return false;
        }

        function productSearch(data) {
            var product_info = data.split("|");
            var item_code = product_info[0];
            var pre_qty = 0;
            $(".product-code").each(function(i) {
                if ($(this).val() == item_code) {
                    rowindex = i;
                    pre_qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val();
                }
            });
            data += '?' + $('#customer_id').val() + '?' + (parseFloat(pre_qty) + 1);
            //console.log(data);
            $.ajax({
                type: 'GET',
                async: false,
                url: '<?php echo e(url('sales/lims_product_search')); ?>',
                data: {
                    data: data
                },
                success: function(data) {
                    var flag = 1;
                    console.log(data);
                    if (pre_qty) {
                        /*if(pre_qty)
                            var qty = parseFloat(pre_qty) + data[15];
                        else*/
                        var qty = data[15];
                        if (qty == 0) {
                            qty = 1
                        }
                        $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
                        pos = product_code.indexOf(data[1]);
                        if (!data[11] && product_warehouse_price[pos]) {
                            product_price[rowindex] = parseFloat(product_warehouse_price[pos] *
                                currency[
                                    'exchange_rate']) + parseFloat(product_warehouse_price[pos] *
                                currency[
                                    'exchange_rate'] * customer_group_rate);
                        } else {
                            product_price[rowindex] = parseFloat(data[2] * currency['exchange_rate']) +
                                parseFloat(data[2] * currency['exchange_rate'] * customer_group_rate);
                        }

                        flag = 0;
                        checkQuantity(String(qty), true);
                        flag = 0;

                        localStorage.setItem("tbody-id", $("table.order-list tbody").html());
                    }
                    $("input[name='product_code_name']").val('');
                    if (flag) {
                        addNewProduct(data);
                    } else if (data[18]) {
                        var imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) +
                            ')').find(
                            '.imei-number').val();
                        if (imeiNumbers)
                            imeiNumbers += ',' + data[18];
                        else
                            imeiNumbers = data[18];
                        $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                                '.imei-number')
                            .val(imeiNumbers);
                    }
                }
            });
        }

        function addNewProduct(data) {
            var newRow = $("<tr>");
            var cols = '';
            temp_unit_name = (data[6]).split(',');
            pos = product_code.indexOf(data[1]);
            cols +=
                '<td class="col-sm-5 col-6 product-title"><strong class="edit-product btn btn-link" data-toggle="modal" data-target="#editModal">' +
                data[0] + ' <i class="fa fa-edit"></i></strong><br><span>' + data[1] +
                '</span> | In Stock: <span class="in-stock"></span> <strong class="product-price d-md-none"></strong>';
            if (data[12]) {
                cols +=
                    '<br><input style="font-size:13px;padding:3px 25px 3px 10px;height:30px !important" type="text" class="form-control batch-no" value="' +
                    batch_no[pos] +
                    '" required/> <input type="hidden" class="product-batch-id" name="product_batch_id[]" value="' +
                    product_batch_id[pos] + '"/>';
            } else {
                cols +=
                    '<input type="text" class="form-control batch-no d-none" disabled/> <input type="hidden" class="product-batch-id" name="product_batch_id[]"/>';
            }
            cols += '</td>';
            cols += '<td class="col-sm-2 product-price d-none d-md-block"></td>';
            cols +=
                '<td class="col-sm-3"><div class="input-group"><span class="input-group-btn"><button type="button" class="ibtnDel btn btn-danger btn-sm mr-3"><i class="dripicons-cross"></i></button><button type="button" class="btn btn-default minus"><span class="dripicons-minus"></span></button></span><input type="text" name="qty[]" class="form-control qty numkey input-number" step="any" value="' +
                data[15] +
                '" required><span class="input-group-btn"><button type="button" class="btn btn-default plus"><span class="dripicons-plus"></span></button></span></div></td>';
            cols += '<td class="col-sm-2 sub-total"></td>';
            cols += '<input type="hidden" class="product-code" name="product_code[]" value="' + data[1] + '"/>';
            cols += '<input type="hidden" class="product-id" name="product_id[]" value="' + data[9] + '"/>';
            cols += '<input type="hidden" class="product_price" />';
            cols += '<input type="hidden" class="sale-unit" name="sale_unit[]" value="' + temp_unit_name[0] + '"/>';
            cols += '<input type="hidden" class="net_unit_price" name="net_unit_price[]" />';
            cols += '<input type="hidden" class="discount-value" name="discount[]" />';
            cols += '<input type="hidden" class="tax-rate" name="tax_rate[]" value="' + data[3] + '"/>';
            cols += '<input type="hidden" class="tax-value" name="tax[]" />';
            cols += '<input type="hidden" class="tax-name" value="' + data[4] + '" />';
            cols += '<input type="hidden" class="tax-method" value="' + data[5] + '" />';
            cols += '<input type="hidden" class="sale-unit-operator" value="' + data[7] + '" />';
            cols += '<input type="hidden" class="sale-unit-operation-value" value="' + data[8] + '" />';
            cols += '<input type="hidden" class="subtotal-value" name="subtotal[]" />';
            if (data[18])
                cols += '<input type="hidden" class="imei-number" name="imei_number[]" value="' + data[18] + '" />';
            else
                cols += '<input type="hidden" class="imei-number" name="imei_number[]" value="" />';

            newRow.append(cols);
            if (keyboard_active == 1) {
                $("table.order-list tbody").prepend(newRow).find('.qty').keyboard({
                    usePreview: false,
                    layout: 'custom',
                    display: {
                        'accept': '&#10004;',
                        'cancel': '&#10006;'
                    },
                    customLayout: {
                        'normal': ['1 2 3', '4 5 6', '7 8 9', '0 {dec} {bksp}', '{clear} {cancel} {accept}']
                    },
                    restrictInput: true,
                    preventPaste: true,
                    autoAccept: true,
                    css: {
                        container: 'center-block dropdown-menu',
                        buttonDefault: 'btn btn-default',
                        buttonHover: 'btn-primary',
                        buttonAction: 'active',
                        buttonDisabled: 'disabled'
                    },
                });
            } else
                $("table.order-list tbody").prepend(newRow);

            rowindex = newRow.index();

            if (!data[11] && product_warehouse_price[pos]) {
                product_price.splice(rowindex, 0, parseFloat(product_warehouse_price[pos] * currency[
                        'exchange_rate']) +
                    parseFloat(product_warehouse_price[pos] * currency['exchange_rate'] * customer_group_rate));
            } else {
                product_price.splice(rowindex, 0, parseFloat(data[2] * currency['exchange_rate']) + parseFloat(data[
                        2] *
                    currency['exchange_rate'] * customer_group_rate));
            }
            if (data[16])
                wholesale_price.splice(rowindex, 0, parseFloat(data[16] * currency['exchange_rate']) + parseFloat(
                    data[16] *
                    currency['exchange_rate'] * customer_group_rate));
            else
                wholesale_price.splice(rowindex, 0, '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            cost.splice(rowindex, 0, parseFloat(data[17] * currency['exchange_rate']));
            product_discount.splice(rowindex, 0, '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            tax_rate.splice(rowindex, 0, parseFloat(data[3]));
            tax_name.splice(rowindex, 0, data[4]);
            tax_method.splice(rowindex, 0, data[5]);
            unit_name.splice(rowindex, 0, data[6]);
            unit_operator.splice(rowindex, 0, data[7]);
            unit_operation_value.splice(rowindex, 0, data[8]);
            is_imei.splice(rowindex, 0, data[13]);
            is_variant.splice(rowindex, 0, data[14]);
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product_price').val(
                product_price[
                    rowindex]);
            localStorageQty.splice(rowindex, 0, data[15]);
            localStorageProductId.splice(rowindex, 0, data[9]);
            localStorageProductCode.splice(rowindex, 0, data[1]);
            localStorageSaleUnit.splice(rowindex, 0, temp_unit_name[0]);
            localStorageProductDiscount.splice(rowindex, 0, product_discount[rowindex]);
            localStorageTaxRate.splice(rowindex, 0, tax_rate[rowindex].toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorageTaxName.splice(rowindex, 0, data[4]);
            localStorageTaxMethod.splice(rowindex, 0, data[5]);
            localStorageTempUnitName.splice(rowindex, 0, data[6]);
            localStorageSaleUnitOperator.splice(rowindex, 0, data[7]);
            localStorageSaleUnitOperationValue.splice(rowindex, 0, data[8]);
            //put some dummy value
            localStorageNetUnitPrice.splice(rowindex, 0,
                '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            localStorageTaxValue.splice(rowindex, 0,
                '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            localStorageSubTotalUnit.splice(rowindex, 0,
                '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');
            localStorageSubTotal.splice(rowindex, 0,
                '<?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>');

            localStorage.setItem("localStorageProductId", localStorageProductId);
            localStorage.setItem("localStorageSaleUnit", localStorageSaleUnit);
            localStorage.setItem("localStorageProductCode", localStorageProductCode);
            localStorage.setItem("localStorageTaxName", localStorageTaxName);
            localStorage.setItem("localStorageTaxMethod", localStorageTaxMethod);
            localStorage.setItem("localStorageTempUnitName", localStorageTempUnitName);
            localStorage.setItem("localStorageSaleUnitOperator", localStorageSaleUnitOperator);
            localStorage.setItem("localStorageSaleUnitOperationValue", localStorageSaleUnitOperationValue);
            checkQuantity(data[15], true);
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
            if (data[16]) {
                populatePriceOption();
                // $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.edit-product').click();
            }
        }

        function populatePriceOption() {
            $('#editModal select[name=price_option]').empty();
            $('#editModal select[name=price_option]').append('<option value="' + product_price[rowindex] + '">' +
                product_price[rowindex] + '</option>');
            if (wholesale_price[rowindex] > 0)
                $('#editModal select[name=price_option]').append('<option value="' + wholesale_price[rowindex] +
                    '">' +
                    wholesale_price[rowindex] + '</option>');
            $('.selectpicker').selectpicker('refresh');
        }

        function edit() {
            $(".imei-section").remove();
            if (is_imei[rowindex]) {
                console.log('das');
                var imeiNumbers = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                        '.imei-number')
                    .val();
                console.log(imeiNumbers);
                if (imeiNumbers.length) {
                    imeiArrays = imeiNumbers.split(",");
                    htmlText = `<div class="col-md-8 form-group imei-section">
                            <label>IMEI or Serial Numbers</label>
                            <div class="table-responsive ml-2">
                                <table id="imei-table" class="table table-hover">
                                    <tbody>`;
                    for (var i = 0; i < imeiArrays.length; i++) {
                        htmlText +=
                            `<tr>
                                    <td>
                                        <input type="text" class="form-control imei-numbers" name="imei_numbers[]" value="` +
                            imeiArrays[i] + `" />
                                    </td>
                                    <td>
                                        <button type="button" class="imei-del btn btn-sm btn-danger">X</button>
                                    </td>
                                </tr>`;
                    }
                    htmlText += `</tbody>
                                </table>
                            </div>
                        </div>`;
                    $("#editModal .modal-element").append(htmlText);
                }
            }
            populatePriceOption();
            $("#product-cost").text(cost[rowindex]);
            var row_product_name_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                'td:nth-child(1)').text();
            $('#modal_header').text(row_product_name_code);

            var qty = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val();
            $('input[name="edit_qty"]').val(qty);

            $('input[name="edit_discount"]').val(parseFloat(product_discount[rowindex]).toFixed(
                <?php echo e($general_setting->decimal); ?>));

            var tax_name_all = <?php echo json_encode($tax_name_all); ?>;
            pos = tax_name_all.indexOf(tax_name[rowindex]);
            $('select[name="edit_tax_rate"]').val(pos);

            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                    '.product-code')
                .val();
            pos = product_code.indexOf(row_product_code);
            if (product_type[pos] == 'standard') {
                unitConversion();
                temp_unit_name = (unit_name[rowindex]).split(',');
                temp_unit_name.pop();
                temp_unit_operator = (unit_operator[rowindex]).split(',');
                temp_unit_operator.pop();
                temp_unit_operation_value = (unit_operation_value[rowindex]).split(',');
                temp_unit_operation_value.pop();
                $('select[name="edit_unit"]').empty();
                $.each(temp_unit_name, function(key, value) {
                    $('select[name="edit_unit"]').append('<option value="' + key + '">' + value +
                        '</option>');
                });
                $("#edit_unit").show();
            } else {
                row_product_price = product_price[rowindex];
                $("#edit_unit").hide();
            }
            $('input[name="edit_unit_price"]').val(row_product_price.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('.selectpicker').selectpicker('refresh');
        }

        //Delete imei
        $(document).on("click", "table#imei-table tbody .imei-del", function() {
            $(this).closest("tr").remove();
            //decreaing qty
            var edit_qty = parseFloat($('input[name="edit_qty"]').val());
            $('input[name="edit_qty"]').val(edit_qty - 1);
        });

        function couponDiscount() {
            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                alert("Please insert product to order table!")
            } else if ($("#coupon-code").val() != '') {
                valid = 0;
                $.each(coupon_list, function(key, value) {
                    if ($("#coupon-code").val() == value['code']) {
                        valid = 1;
                        todyDate = <?php echo json_encode(date('Y-m-d')); ?>;
                        if (parseFloat(value['quantity']) <= parseFloat(value['used']))
                            alert('This Coupon is no longer available');
                        else if (todyDate > value['expired_date'])
                            alert('This Coupon has expired!');
                        else if (value['type'] == 'fixed') {
                            if (parseFloat($('input[name="grand_total"]').val()) >= value[
                                    'minimum_amount']) {
                                $('input[name="grand_total"]').val($('input[name="grand_total"]').val() - (
                                    value[
                                        'amount'] * currency['exchange_rate']));
                                $('#grand-total').text(parseFloat($('input[name="grand_total"]').val())
                                    .toFixed(
                                        <?php echo e($general_setting->decimal); ?>));
                                $('#grand-total-m').text(parseFloat($('input[name="grand_total"]').val())
                                    .toFixed(
                                        <?php echo e($general_setting->decimal); ?>));
                                if (!$('input[name="coupon_active"]').val())
                                    alert('Congratulation! You got ' + (value['amount'] * currency[
                                        'exchange_rate']) + ' ' + currency['code'] + ' discount');
                                $(".coupon-check").prop("disabled", true);
                                $("#coupon-code").prop("disabled", true);
                                $('input[name="coupon_active"]').val(1);
                                $("#coupon-modal").modal('hide');
                                $('input[name="coupon_id"]').val(value['id']);
                                $('input[name="coupon_discount"]').val(value['amount'] * currency[
                                    'exchange_rate']);
                                $('#coupon-text').text(parseFloat(value['amount'] * currency[
                                        'exchange_rate'])
                                    .toFixed(<?php echo e($general_setting->decimal); ?>));
                            } else
                                alert('Grand Total is not sufficient for discount! Required ' + value[
                                    'minimum_amount'] + ' ' + currency['code']);
                        } else {
                            var grand_total = $('input[name="grand_total"]').val();
                            var coupon_discount = grand_total * (value['amount'] / 100);
                            grand_total = grand_total - coupon_discount;
                            $('input[name="grand_total"]').val(grand_total);
                            $('#grand-total').text(parseFloat(grand_total).toFixed(
                                <?php echo e($general_setting->decimal); ?>));
                            $('#grand-total-m').text(parseFloat(grand_total).toFixed(
                                <?php echo e($general_setting->decimal); ?>));
                            if (!$('input[name="coupon_active"]').val())
                                alert('Congratulation! You got ' + value['amount'] + '% discount');
                            $(".coupon-check").prop("disabled", true);
                            $("#coupon-code").prop("disabled", true);
                            $('input[name="coupon_active"]').val(1);
                            $("#coupon-modal").modal('hide');
                            $('input[name="coupon_id"]').val(value['id']);
                            $('input[name="coupon_discount"]').val(coupon_discount);
                            $('#coupon-text').text(parseFloat(coupon_discount).toFixed(
                                <?php echo e($general_setting->decimal); ?>));
                        }
                    }
                });
                if (!valid)
                    alert('Invalid coupon code!');
            }
        }

        function checkDiscount(qty, flag) {
            var customer_id = $('#customer_id').val();
            var warehouse_id = $('#warehouse_id').val();
            var product_id = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .product-id').val();
            if (flag) {
                $.ajax({
                    type: 'GET',
                    async: false,
                    url: '<?php echo e(url('/')); ?>/sales/check-discount?qty=' + qty + '&customer_id=' +
                        customer_id +
                        '&product_id=' + product_id + '&warehouse_id=' + warehouse_id,
                    success: function(data) {
                        //console.log(data);
                        pos = product_code.indexOf($('table.order-list tbody tr:nth-child(' + (
                                rowindex + 1) +
                            ') .product-code').val());
                        product_price[rowindex] = parseFloat(data[0] * currency['exchange_rate']) +
                            parseFloat(
                                data[0] * currency['exchange_rate'] * customer_group_rate);
                    }
                });
            }
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ') .qty').val(qty);
            checkQuantity(String(qty), flag);
            localStorage.setItem("tbody-id", $("table.order-list tbody").html());
        }

        function checkQuantity(sale_qty, flag) {

            var row_product_code = $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find(
                    '.product-code')
                .val();
            pos = product_code.indexOf(row_product_code);
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.in-stock').text(product_qty[
                pos]);
            localStorageQty[rowindex] = sale_qty;
            localStorage.setItem("localStorageQty", localStorageQty);
            if (without_stock == 'no') {
                if (product_type[pos] == 'standard' || product_type[pos] == 'combo') {
                    var operator = unit_operator[rowindex].split(',');
                    var operation_value = unit_operation_value[rowindex].split(',');
                    if (operator[0] == '*')
                        total_qty = sale_qty * operation_value[0];
                    else if (operator[0] == '/')
                        total_qty = sale_qty / operation_value[0];
                    if (total_qty > parseFloat(product_qty[pos])) {
                        alert('Quantity exceeds stock quantity!');
                        if (flag) {
                            sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                            localStorageQty[rowindex] = sale_qty;
                            localStorage.setItem("localStorageQty", localStorageQty);
                            checkQuantity(sale_qty, true);
                        } else {
                            localStorageQty[rowindex] = sale_qty;
                            localStorage.setItem("localStorageQty", localStorageQty);
                            edit();
                            return;
                        }
                    }
                    $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
                }
                // else if(product_type[pos] == 'combo'){
                //     child_id = product_list[pos].split(',');
                //     child_qty = qty_list[pos].split(',');
                //     //console.log(child_id);
                //     $(child_id).each(function(index) {
                //         var position = product_id.indexOf(child_id[index]);
                //         if( position == -1 || parseFloat(sale_qty * child_qty[index]) > product_qty[position] ) {
                //             alert('Quantity exceeds stock quantity!');
                //             if (flag) {
                //                 sale_qty = sale_qty.substring(0, sale_qty.length - 1);
                //                 $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
                //             }
                //             else {
                //                 edit();
                //                 flag = true;
                //                 return false;
                //             }
                //         }
                //     });
                // }
            } else
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
            if (!flag) {
                $('#editModal').modal('hide');
                $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.qty').val(sale_qty);
            }
            calculateRowProductData(sale_qty);
        }

        function unitConversion() {
            var row_unit_operator = unit_operator[rowindex].slice(0, unit_operator[rowindex].indexOf(","));
            var row_unit_operation_value = unit_operation_value[rowindex].slice(0, unit_operation_value[rowindex]
                .indexOf(
                    ","));


            if (row_unit_operator == '*') {
                row_product_price = product_price[rowindex] * row_unit_operation_value;
            } else {
                row_product_price = product_price[rowindex] / row_unit_operation_value;
            }
        }

        function calculateRowProductData(quantity) {
            if (product_type[pos] == 'standard')
                unitConversion();
            else
                row_product_price = product_price[rowindex];
            if (tax_method[rowindex] == 1) {
                var net_unit_price = row_product_price - product_discount[rowindex];
                var tax = net_unit_price * quantity * (tax_rate[rowindex] / 100);
                var sub_total = (net_unit_price * quantity) + tax;

                if (parseFloat(quantity))
                    var sub_total_unit = sub_total / quantity;
                else
                    var sub_total_unit = sub_total;
            } else {
                var sub_total_unit = row_product_price - product_discount[rowindex];
                var net_unit_price = (100 / (100 + tax_rate[rowindex])) * sub_total_unit;
                var tax = (sub_total_unit - net_unit_price) * quantity;
                var sub_total = sub_total_unit * quantity;
            }

            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.discount-value').val((
                product_discount[
                    rowindex] * quantity).toFixed(<?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-rate').val(tax_rate[
                    rowindex]
                .toFixed(<?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.net_unit_price').val(
                net_unit_price
                .toFixed(<?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.tax-value').val(tax.toFixed(
                <?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.product-price').text(
                sub_total_unit
                .toFixed(<?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.sub-total').text(sub_total
                .toFixed(
                    <?php echo e($general_setting->decimal); ?>));
            $('table.order-list tbody tr:nth-child(' + (rowindex + 1) + ')').find('.subtotal-value').val(sub_total
                .toFixed(
                    <?php echo e($general_setting->decimal); ?>));

            localStorageProductDiscount.splice(rowindex, 1, (product_discount[rowindex] * quantity).toFixed(
                <?php echo e($general_setting->decimal); ?>));
            localStorageTaxRate.splice(rowindex, 1, tax_rate[rowindex].toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorageNetUnitPrice.splice(rowindex, 1, net_unit_price.toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorageTaxValue.splice(rowindex, 1, tax.toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorageSubTotalUnit.splice(rowindex, 1, sub_total_unit.toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorageSubTotal.splice(rowindex, 1, sub_total.toFixed(<?php echo e($general_setting->decimal); ?>));
            localStorage.setItem("localStorageProductDiscount", localStorageProductDiscount);
            localStorage.setItem("localStorageTaxRate", localStorageTaxRate);
            localStorage.setItem("localStorageNetUnitPrice", localStorageNetUnitPrice);
            localStorage.setItem("localStorageTaxValue", localStorageTaxValue);
            localStorage.setItem("localStorageSubTotalUnit", localStorageSubTotalUnit);
            localStorage.setItem("localStorageSubTotal", localStorageSubTotal);

            calculateTotal();
        }

        function calculateTotal() {
            //Sum of quantity
            var total_qty = 0;
            $("table.order-list tbody .qty").each(function(index) {
                if ($(this).val() == '') {
                    total_qty += 0;
                } else {
                    total_qty += parseFloat($(this).val());
                }
            });
            $('input[name="total_qty"]').val(total_qty);

            //Sum of discount
            var total_discount = 0;
            $("table.order-list tbody .discount-value").each(function() {
                total_discount += parseFloat($(this).val());
            });

            $('input[name="total_discount"]').val(total_discount.toFixed(<?php echo e($general_setting->decimal); ?>));

            //Sum of tax
            var total_tax = 0;
            $(".tax-value").each(function() {
                total_tax += parseFloat($(this).val());
            });

            $('input[name="total_tax"]').val(total_tax.toFixed(<?php echo e($general_setting->decimal); ?>));

            //Sum of subtotal
            var total = 0;
            $(".sub-total").each(function() {
                total += parseFloat($(this).text());
            });
            $('input[name="total_price"]').val(total.toFixed(<?php echo e($general_setting->decimal); ?>));

            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            var item = $('table.order-list tbody tr:last').index();
            var total_qty = parseFloat($('input[name="total_qty"]').val());
            var subtotal = parseFloat($('input[name="total_price"]').val());
            var order_tax = parseFloat($('select[name="order_tax_rate_select"]').val());
            var order_discount_type = $('select[name="order_discount_type_select"]').val();
            var order_discount_value = parseFloat($('input[name="order_discount_value"]').val());

            if (!order_discount_value)
                order_discount_value = <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>;

            if (order_discount_type == 'Flat') {
                if (!currencyChange) {
                    var order_discount = parseFloat(order_discount_value);
                } else
                    var order_discount = parseFloat(order_discount_value * currency['exchange_rate']);
            } else
                var order_discount = parseFloat(subtotal * (order_discount_value / 100));

            localStorage.setItem("order-tax-rate-select", order_tax);
            localStorage.setItem("order-discount-type", order_discount_type);
            $("#discount").text(order_discount.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('input[name="order_discount"]').val(order_discount);
            $('input[name="order_discount_type"]').val(order_discount_type);
            if (!currencyChange)
                var shipping_cost = parseFloat($('input[name="shipping_cost"]').val());
            else
                var shipping_cost = parseFloat($('input[name="shipping_cost"]').val() * currency['exchange_rate']);
            if (!shipping_cost)
                shipping_cost = <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>;

            item = ++item + '(' + total_qty + ')';
            order_tax = (subtotal - order_discount) * (order_tax / 100);
            var grand_total = (subtotal + order_tax + shipping_cost) - order_discount;
            $('input[name="grand_total"]').val(grand_total.toFixed(<?php echo e($general_setting->decimal); ?>));

            if ($("#coupon-code").val() != '')
                couponDiscount();
            if (!currencyChange)
                var coupon_discount = parseFloat($('input[name="coupon_discount"]').val());
            else
                var coupon_discount = parseFloat($('input[name="coupon_discount"]').val() * currency[
                    'exchange_rate']);
            if (!coupon_discount)
                coupon_discount = <?php echo e(number_format(0, $general_setting->decimal, '.', '')); ?>;
            grand_total -= coupon_discount;

            $('#item').text(item);
            $('input[name="item"]').val($('table.order-list tbody tr:last').index() + 1);
            $('#subtotal').text(subtotal.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('#tax').text(order_tax.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('input[name="order_tax"]').val(order_tax.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('#shipping-cost').text(shipping_cost.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('input[name="shipping_cost"]').val(shipping_cost);
            $('#grand-total').text(grand_total.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('#grand-total-m').text(grand_total.toFixed(<?php echo e($general_setting->decimal); ?>));
            $('input[name="grand_total"]').val(grand_total.toFixed(<?php echo e($general_setting->decimal); ?>));
            currencyChange = false;
        }



        function cancel(rownumber) {
            while (rownumber >= 0) {
                product_price.pop();
                wholesale_price.pop();
                product_discount.pop();
                tax_rate.pop();
                tax_name.pop();
                tax_method.pop();
                unit_name.pop();
                unit_operator.pop();
                unit_operation_value.pop();
                $('table.order-list tbody tr:last').remove();
                rownumber--;
            }
            $('input[name="shipping_cost"]').val('');
            $('input[name="order_discount_value"]').val('');
            $('select[name="order_tax_rate_select"]').val(0);
            localStorage.clear();
            calculateTotal();
        }

        function confirmCancel() {
            var audio = $("#mysoundclip2")[0];
            audio.play();
            if (confirm("Are you sure want to cancel?")) {
                cancel($('table.order-list tbody tr:last').index());
            }
            return false;
        }

        $(document).on('submit', '.payment-form', function(e) {
            $("table.order-list tbody .qty").each(function(index) {
                if ($(this).val() == '') {
                    alert('One of products has no quantity!');
                    e.preventDefault();
                }
            });
            var rownumber = $('table.order-list tbody tr:last').index();
            if (rownumber < 0) {
                alert("Please insert product to order table!")
                e.preventDefault();
            } else if (parseFloat($('input[name="total_qty"]').val()) <= 0) {
                alert('Product quantity is 0');
                e.preventDefault();
            } else {
                if ($('input[name="sale_status"]').val() == 1) {
                    $("#submit-btn").prop('disabled', true).html(
                        '<span class="spinner-border text-light" role="status"></span>');
                }
                $('input[name="paid_by_id"]').val($('select[name="paid_by_id_select"]').val());
                $('select[name="paid_by_id_select[]"]').each(function(index) {
                    $('input[name="paid_by_id[]"]').eq(index).val($(this).val());
                });
                $('input[name="order_tax_rate"]').val($('select[name="order_tax_rate_select"]').val());

                e.preventDefault(); // Prevents the default form submission behavior

                $.ajax({
                    url: $('.payment-form').attr('action'), // The form's action URL
                    type: $('.payment-form').attr('method'), // The form's method (GET or POST)
                    data: $('.payment-form').serialize(), // Serialize the form data
                    success: function(response) {
                        if ($('input[name="sale_status"]').val() == 1) {

                            getProduct($("#warehouse_id").val());

                            let link = "<?php echo e(url('sales/gen_invoice/')); ?>" + '/' + response;

                            $('#pos-layout').css('display', 'none');
                            var head = $('head').html();
                            $('head').html('');

                            $('#print-layout').load(link, function() {
                                setTimeout(function() {
                                    window.print();
                                }, 50);
                            });

                            $("#submit-btn").prop('disabled', false).html(
                                "<?php echo e(trans('file.submit')); ?>");
                            $('#add-payment').modal('hide');
                            cancel($('table.order-list tbody tr:last').index());

                            setTimeout(function() {
                                window.onafterprint = (event) => {
                                    if (isMobile == false) {
                                        $('#pos-layout').css('display', 'block');
                                        $('#print-layout').html('');
                                        $('head').html(head);
                                        location.reload();
                                    }
                                };
                            }, 100);

                            $.get('<?php echo e(url('/sales/recent-sale')); ?>/', function(data) {
                                populateRecentSale(data);
                            });
                        } else if ($('input[name="sale_status"]').val() == 3) {
                            $('#pos-layout').prepend(
                                '<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(trans('file.Sale successfully added to draft')); ?></div>'
                            );
                            $('input[name="sale_status"]').val(1);
                            cancel($('table.order-list tbody tr:last').index());
                            $.get('<?php echo e(url('/sales/recent-draft')); ?>/', function(data) {
                                populateRecentDraft(data);
                            });
                        } else {
                            localStorage.clear();
                            location.href = response;
                        }

                    },
                    error: function(xhr) {
                        console.log('Form submission failed.');
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.top-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/resources/views/backend/sale/pos.blade.php ENDPATH**/ ?>