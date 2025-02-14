 <?php $__env->startSection('content'); ?>

    <?php $__env->startPush('css'); ?>
        <style>
            .change-theme-color {
                align-items: center;
                cursor: pointer;
                display: flex;
                line-height: 2
            }

            .change-theme-color span {
                border-radius: 3px;
                height: 15px;
                margin-right: 10px;
                width: 15px;
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close"
                data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div>
    <?php endif; ?>
    <?php if(session()->has('not_permitted')): ?>
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?>

        </div>
    <?php endif; ?>
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4><?php echo e(trans('file.Ecommerce Settings')); ?></h4>
                        </div>
                        <div class="card-body">
                            <p class="italic">
                                <small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small>
                            </p>
                            <?php echo Form::open(['route' => 'setting.ecommerce.update', 'files' => true, 'method' => 'post']); ?>

                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Site Title')); ?> *</label>
                                        <input type="text" name="site_title" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->site_title); ?> <?php endif; ?>"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Theme')); ?></label>
                                        <select name="theme" class="form-control">
                                            <option <?php if(isset($settings->theme) && $settings->theme == 'default'): ?> selected <?php endif; ?> value="default">
                                                <?php echo e(trans('file.Default')); ?></option>
                                            <option <?php if(isset($settings->theme) && $settings->theme == 'fashion'): ?> selected <?php endif; ?> value="fashion">
                                                <?php echo e(trans('file.Fashion')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Font')); ?></label>
                                        <select name="theme_font" class="form-control">
                                            <option <?php if(isset($settings->theme_font) && $settings->theme_font == 'Inter'): ?> selected <?php endif; ?> value="Inter">Inter
                                            </option>
                                            <option <?php if(isset($settings->theme_font) && $settings->theme_font == 'Josefin Sans'): ?> selected <?php endif; ?> value="Josefin Sans">
                                                Josefin Sans</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Theme Color')); ?> *</label>
                                        <div class="dropdown">
                                            <button class="btn btn-default btn-block dropdown-toggle" type="button"
                                                data-toggle="dropdown"><span id="def_color"><span
                                                        style="background-color:<?php if($settings): ?> <?php echo e($settings->theme_color); ?> <?php endif; ?>;width:15px;height:15px"></span>
                                                    <?php if($settings): ?>
                                                        <?php echo e($settings->theme_color); ?>

                                                    <?php endif; ?>
                                                </span>
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li class="change-theme-color" data-color="#0071df"> <span
                                                        style="background-color:#0071df;"></span> #0071df</li>
                                                <li class="change-theme-color" data-color="#f51e46"> <span
                                                        style="background-color:#f51e46;"></span> #f51e46</li>
                                                <li class="change-theme-color" data-color="#fa9928"> <span
                                                        style="background-color:#fa9928;"></span> #fa9928</li>
                                                <li class="change-theme-color" data-color="#fd6602"> <span
                                                        style="background-color:#fd6602;"></span> #fd6602</li>
                                                <li class="change-theme-color" data-color="#59b210"> <span
                                                        style="background-color:#59b210;"></span> #59b210</li>
                                                <li class="change-theme-color" data-color="#ff749f"> <span
                                                        style="background-color:#ff749f;"></span> #ff749f</li>
                                                <li class="change-theme-color" data-color="#f8008c"> <span
                                                        style="background-color:#f8008c;"></span> #f8008c</li>
                                                <li class="change-theme-color" data-color="#6453f7"> <span
                                                        style="background-color:#6453f7;"></span> #6453f7</li>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="theme_color" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->theme_color); ?> <?php endif; ?>"
                                            required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.RTL layout')); ?></label>
                                        <select name="is_rtl" class="form-control">
                                            <option <?php if(isset($settings->is_rtl) && $settings->is_rtl == 0): ?> selected <?php endif; ?> value="0">
                                                <?php echo e(trans('file.LTR')); ?></option>
                                            <option <?php if(isset($settings->is_rtl) && $settings->is_rtl == 1): ?> selected <?php endif; ?> value="1">
                                                <?php echo e(trans('file.RTL')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Home Page')); ?></label>
                                        <select name="home_page" class="form-control">
                                            <option></option>
                                            <?php if($pages): ?>
                                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(isset($settings->home_page) && $settings->home_page == $page->id): ?> selected <?php endif; ?>
                                                        value="<?php echo e($page->id); ?>"><?php echo e($page->page_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Show search results in')); ?></label>
                                        <select name="search" class="form-control">
                                            <option <?php if(isset($settings->search) && $settings->search == 0): ?> selected <?php endif; ?> value="0">
                                                <?php echo e(trans('file.Dropdown')); ?></option>
                                            <option <?php if(isset($settings->search) && $settings->search == 1): ?> selected <?php endif; ?> value="1">
                                                <?php echo e(trans('file.Full Page')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Store Phone')); ?></label>
                                        <input type="text" name="store_phone" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->store_phone ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Store Email')); ?></label>
                                        <input type="text" name="store_email" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->store_email ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Store Address')); ?></label>
                                        <input type="text" name="store_address" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->store_address ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Contact From Email')); ?></label>
                                        <input type="text" name="contact_form_email" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->contact_form_email ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Min amount for free shipping')); ?></label>
                                        <input type="text" name="free_shipping_from" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->free_shipping_from ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Flat Rate Shipping')); ?></label>
                                        <input type="text" name="flat_rate_shipping" class="form-control"
                                            value="<?php if($settings): ?> <?php echo e($settings->flat_rate_shipping ?? ''); ?> <?php endif; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Default Warehouse')); ?></label>
                                        <select required name="warehouse_id" class="selectpicker form-control"
                                            data-live-search="true" data-live-search-style="begins"
                                            title="Select warehouse...">
                                            <?php $__currentLoopData = $warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(isset($settings) && $settings->warehouse_id == $warehouse->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Default Biller')); ?></label>
                                        <select required name="biller_id" class="selectpicker form-control"
                                            data-live-search="true" data-live-search-style="begins"
                                            title="Select Biller...">
                                            <?php $__currentLoopData = $biller_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(isset($settings) && $settings->biller_id == $biller->id): ?> selected <?php endif; ?>
                                                    value="<?php echo e($biller->id); ?>">
                                                    <?php echo e($biller->name . ' (' . $biller->company_name . ')'); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Pages to read & accept before checkout')); ?></label>
                                        <select name="checkout_pages[]" class="selectpicker form-control" multiple>
                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($page->id); ?>"
                                                    <?php if(isset($settings) && isset($settings->checkout_pages) && in_array($page->id, json_decode($settings->checkout_pages))): ?> selected <?php endif; ?>>
                                                    <?php echo e($page->page_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2">
                                    <div class="custom-control custom-checkbox mt-3 mb-3">
                                        <input type="checkbox" class="custom-control-input ml-2" id="gift_card"
                                            name="gift_card" value="1"
                                            <?php if(isset($settings) && $settings->gift_card == 1): ?> checked <?php endif; ?>>
                                        <label class="custom-control-label fw-500"
                                            for="gift_card"><?php echo e(trans('file.Enable Gift Card payment on checkout page')); ?></label>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Custom CSS')); ?></label>
                                        <textarea name="custom_css" class="form-control">
<?php if($settings): ?>
<?php echo e($settings->custom_css); ?>

<?php endif; ?>
</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Custom JS')); ?></label>
                                        <textarea name="custom_js" class="form-control">
<?php if($settings): ?>
<?php echo e($settings->custom_js); ?>

<?php endif; ?>
</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Chat Code')); ?></label>
                                        <textarea name="chat_code" class="form-control">
<?php if($settings): ?>
<?php echo e($settings->chat_code); ?>

<?php endif; ?>
</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Google Analytics Code')); ?></label>
                                        <textarea name="analytics_code" class="form-control">
<?php if($settings): ?>
<?php echo e($settings->analytics_code); ?>

<?php endif; ?>
</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo e(trans('file.Facebook Pixel')); ?></label>
                                        <textarea name="fb_pixel_code" class="form-control">
<?php if($settings): ?>
<?php echo e($settings->fb_pixel_code); ?>

<?php endif; ?>
</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <input type="submit" value="<?php echo e(trans('file.submit')); ?>" class="btn btn-primary">
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).on('click', '.change-theme-color', function() {
            var color = $(this).data('color');
            var def_color = '<span style="background-color:' + color + ';width:15px;height:15px"></span> ' + color;
            $('input[name=theme_color]').val(color);
            $('#def_color').html(def_color)
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/backend/settings/index.blade.php ENDPATH**/ ?>