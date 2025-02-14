<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" type="image/png" href="<?php echo e(url('logo', $general_setting->site_logo)); ?>" />
        <title><?php echo e($lims_sale_data->customer->name.'_Sale_'.$lims_sale_data->reference_no); ?></title>
        <style type="text/css">
            span,td {
                font-size: 13px;
                line-height: 1.4;
            }
            @media print {
                .hidden-print {
                    display: none !important;
                }
                tr.table-header {
                    background-color:rgb(1, 75, 148) !important;
                    -webkit-print-color-adjust: exact;
                }
                td.td-text {
                    background-color:rgb(205, 218, 235) !important;
                    -webkit-print-color-adjust: exact;
                }
            }
            table,tr,td {font-family: sans-serif;border-collapse: collapse;}
        </style>
    </head>
    <body>
        <?php if(preg_match('~[0-9]~', url()->previous())): ?>
        <?php $url = '../../pos'; ?>
        <?php else: ?>
            <?php $url = url()->previous(); ?>
        <?php endif; ?>
        <div class="hidden-print">
            <table>
                <tr>
                    <td><a href="<?php echo e($url); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> <?php echo e(trans('file.Back')); ?></a> </td>
                    <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> <?php echo e(trans('file.Print')); ?></button></td>
                </tr>
            </table>
            <br>
        </div>
        <table style="width: 100%;border-collapse: collapse;">
            <tr>
                <td colspan="2" style="padding:9px 0;width:40%">
                    <h1 style="margin:0"><?php echo e($lims_biller_data->company_name); ?></h1>
                    <div>
                        <span>Address:</span>&nbsp;&nbsp;<span><?php echo e($lims_warehouse_data->address); ?></span>
                    </div>
                    <div>
                        <span>Phone:</span>&nbsp;&nbsp;<span><?php echo e($lims_warehouse_data->phone); ?></span>
                    </div>
                    <?php if($general_setting->vat_registration_number): ?>
                    <div>
                        <span><?php echo e(trans('file.VAT Number')); ?>:</span>&nbsp;&nbsp;<span><?php echo e($general_setting->vat_registration_number); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php
                        foreach($sale_custom_fields as $key => $fieldName) {
                            $field_name = str_replace(" ", "_", strtolower($fieldName));
                            echo '<div><span>'.$fieldName.': ' . $lims_sale_data->$field_name.'</span></div>';
                        }
                        foreach($customer_custom_fields as $key => $fieldName) {
                            $field_name = str_replace(" ", "_", strtolower($fieldName));
                            echo '<div><span>'.$fieldName.': ' . $lims_customer_data->$field_name.'</span></div>';
                        }
                    ?>
                </td>
                <td style="width:30%; text-align: middle; vertical-align: top;">
                    <img src="<?php echo e(url('logo', $general_setting->site_logo)); ?>" height="80" width="120">
                </td>
                <td style="padding:5px -19px;width:30%;text-align:right;">
                    <div style="display: flex;justify-content: space-between;border-bottom:1px solid #aaa">
                        <span>Invoice No:</span> <span><?php echo e($lims_sale_data->reference_no); ?></span>
                    </div>
                    <div style="display: flex;justify-content: space-between;border-bottom:1px solid #aaa">
                        <span>Date:</span> <span><?php echo e($lims_sale_data->created_at); ?></span>
                    </div>
                    <?php if($paid_by_info): ?>
                        <div style="display: flex;justify-content: space-between;border-bottom:1px solid #aaa">
                            <span>Paid By:</span> <span><?php echo e($paid_by_info); ?></span>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <table style="width: 100%;border-collapse: collapse; margin-top: 4px;">
            <tr>
                <td colspan="3" style="padding:4px 0;width:30%;vertical-align:top">
                    <h2 style="background-color: rgb(1, 75, 148); color: white; padding:3px 10px; margin-bottom:0">Bill To</h2>
                    <div style="margin-top: 10px;margin-left: 10px">
                        <span><?php echo e($lims_customer_data->name); ?></span>
                    </div>
                    <div style="margin-left: 10px">
                        <span>VAT Number:</span>&nbsp;&nbsp;<span><?php echo e($lims_customer_data->tax_no); ?></span>
                    </div>
                    <div style="margin-left: 10px">

                        <span>Address:</span>&nbsp;&nbsp;
                        <?php if($lims_sale_data->sale_type == 'online'): ?>
                        <span><?php echo e($lims_sale_data->shipping_name); ?>, <?php echo e($lims_sale_data->shipping_address); ?>, <?php echo e($lims_sale_data->shipping_city); ?>, <?php echo e($lims_sale_data->shipping_country); ?>, <?php echo e($lims_sale_data->shipping_zip); ?></span>
                        <?php else: ?>
                        <span><?php echo e($lims_customer_data->address); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if(isset($lims_customer_data->phone_number) || isset($lims_sale_data->shipping_phone)): ?>
                    <div style="margin-bottom: 10px;margin-left: 10px">
                        <span>Phone:</span>&nbsp;&nbsp;
                        <?php if($lims_sale_data->sale_type == 'online'): ?>
                        <span><?php echo e($lims_sale_data->shipping_phone); ?>

                        <?php else: ?>
                        <span><?php echo e($lims_customer_data->phone_number); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </td>
                <td colspan="4" style="width:60%">

                </td>
            </tr>
        </table>
        <table dir="<?php if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl): ?><?php echo e('rtl'); ?><?php endif; ?>" style="width: 100%;border-collapse: collapse;">
            <tr class="table-header" style="background-color: rgb(1, 75, 148); color: white;">
                <td style="border:1px solid #222;padding:1px 3px;width:4%;text-align:center">#</td>
                <td style="border:1px solid #222;padding:1px 3px;width:49%;text-align:center"><?php echo e(trans('file.Description')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;width:6%;text-align:center"><?php echo e(trans('file.Qty')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;width:9%;text-align:center"><?php echo e(trans('file.Unit Price')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;width:7%;text-align:center"><?php echo e(trans('file.Total')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;width:7%;text-align:center"><?php echo e(trans('file.Tax')); ?></td>
                <td style="border:1px solid #222;padding:1px 2px;width:13%;text-align:center;"><?php echo e(trans('file.Subtotal')); ?></td>
            </tr>
            <?php
                $total_product_tax = 0;
                $totalPrice = 0;
            ?>
            <?php $__currentLoopData = $lims_product_sale_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_sale_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $lims_product_data = \App\Models\Product::find($product_sale_data->product_id);
                if($product_sale_data->sale_unit_id) {
                    $unit = \App\Models\Unit::select('unit_code')->find($product_sale_data->sale_unit_id);
                    $unit_code = $unit->unit_code;
                }
                else
                    $unit_code = '';

                if($product_sale_data->variant_id) {
                    $variant = \App\Models\Variant::select('name')->find($product_sale_data->variant_id);
                    $variant_name = $variant->name;
                }
                else
                    $variant_name = '';
                $totalPrice += $product_sale_data->net_unit_price * $product_sale_data->qty;
            ?>
            <tr>
                <td style="<?php if( Config::get('app.locale') == 'ar' || $general_setting->is_rtl): ?><?php echo e('border-right:1px solid #222;'); ?><?php endif; ?> border:1px solid #222;padding:1px 3px;text-align: center;"><?php echo e($key+1); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;font-size: 15px;line-height: 1.2;">
                    <?php echo $lims_product_data->name; ?>

                    <?php $__currentLoopData = $product_custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $fieldName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $field_name = str_replace(" ", "_", strtolower($fieldName)) ?>
                        <?php if($lims_product_data->$field_name): ?>
                            <?php if(!$index): ?>
                            <br><?php echo e($fieldName.': '.$lims_product_data->$field_name); ?>

                            <?php else: ?>
                            <?php echo e('/'.$fieldName.': '.$lims_product_data->$field_name); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product_sale_data->imei_number && !str_contains($product_sale_data->imei_number, "null") ): ?>
                    <br>IMEI or Serial: <?php echo e($product_sale_data->imei_number); ?>

                    <?php endif; ?>
                </td>
                <td style="border:1px solid #222;padding:1px 3px;text-align:center"><?php echo e($product_sale_data->qty.' '.$unit_code.' '.$variant_name); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;text-align:center"><?php echo e(number_format($product_sale_data->net_unit_price, $general_setting->decimal, '.', ',')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;text-align:center"><?php echo e(number_format(($product_sale_data->net_unit_price * $product_sale_data->qty), $general_setting->decimal, '.', ',')); ?></td>
                <td style="border:1px solid #222;padding:1px 3px;text-align:center"><?php echo e(number_format($product_sale_data->tax, $general_setting->decimal, '.', ',')); ?></td>
                <td style="border:1px solid #222;border-right:1px solid #222;padding:1px 3px;text-align:center;font-size: 15px;"><?php echo e(number_format($product_sale_data->total, $general_setting->decimal, '.', ',')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3" rowspan="<?php if($general_setting->invoice_format == 'gst' && $general_setting->state == 2): ?> 5 <?php else: ?> 4 <?php endif; ?>" style="border:1px solid #222;padding:1px 3px;text-align: center; vertical-align: top;">
                    <?php echo e(trans('file.Note')); ?><br><?php echo e($lims_sale_data->sale_note); ?>

                </td>
                <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                    <?php echo e(trans('file.Total Before Tax')); ?>

                </td>
                <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                        <?php echo e(number_format((float)($lims_sale_data->total_price - ($lims_sale_data->total_tax+$lims_sale_data->order_tax) ) ,$general_setting->decimal, '.', ',')); ?>

                </td>
            </tr>
            <?php if($general_setting->invoice_format == 'gst' && $general_setting->state == 1): ?>
                <tr>
                    <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                        IGST
                    </td>
                    <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                        <?php echo e(number_format((float)($lims_sale_data->total_tax+$lims_sale_data->order_tax) ,$general_setting->decimal, '.', ',')); ?>

                    </td>
                </tr>
            <?php elseif($general_setting->invoice_format == 'gst' && $general_setting->state == 2): ?>
                <tr>
                    <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                        SGST
                    </td>
                    <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                        <?php echo e(number_format( ($lims_sale_data->total_tax+$lims_sale_data->order_tax) / 2 , $general_setting->decimal, '.', ',')); ?>

                    </td>
                </tr>
                <tr>
                    <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                        CGST
                    </td>
                    <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                        <?php echo e(number_format( ($lims_sale_data->total_tax+$lims_sale_data->order_tax) / 2 , $general_setting->decimal, '.', ',')); ?>

                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                        <?php echo e(trans('file.Tax')); ?>

                    </td>
                    <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                        <?php echo e(number_format((float)($lims_sale_data->total_tax+$lims_sale_data->order_tax) ,$general_setting->decimal, '.', ',')); ?>

                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                    <?php echo e(trans('file.Discount')); ?>

                </td>
                <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                    <?php echo e(number_format((float)($lims_sale_data->total_discount+$lims_sale_data->order_discount) ,$general_setting->decimal, '.', ',')); ?>

                </td>
            </tr>
            <tr>
                <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);"><?php echo e(trans('file.grand total')); ?></td>
                <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;"><?php echo e(number_format((float)$lims_sale_data->grand_total ,$general_setting->decimal, '.', ',')); ?></td>
            </tr>
            <tr>
                <?php if($general_setting->currency_position == 'prefix'): ?>
                    <td class="td-text" colspan="3" rowspan="4" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;vertical-align: bottom;font-size: 15px; vertical-align: top;">
                        <?php echo e(trans('file.In Words')); ?><br><?php echo e($currency_code); ?> <span style="text-transform:capitalize;font-size: 15px;"><?php echo e(str_replace("-"," ",$numberInWords)); ?></span> only
                    </td>
                <?php else: ?>
                    <td class="td-text" colspan="3" rowspan="4" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;vertical-align: bottom;font-size: 15px; vertical-align: top;">
                        <?php echo e(trans('file.In Words')); ?>:<br><span style="text-transform:capitalize;font-size: 15px;"><?php echo e(str_replace("-"," ",$numberInWords)); ?></span> <?php echo e($currency_code); ?> only
                    </td>
                <?php endif; ?>
            </tr>
            <tr>
                <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                    <?php echo e(trans('file.Paid')); ?>

                </td>
                <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                    <?php echo e(number_format((float)$lims_sale_data->paid_amount ,$general_setting->decimal, '.', ',')); ?>

                </td>
            </tr>
            <tr>
                <td class="td-text" colspan="3" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);">
                    <?php echo e(trans('file.Due')); ?>

                </td>
                <td class="td-text" style="border:1px solid #222;padding:1px 3px;background-color:rgb(205, 218, 235);text-align: center;font-size: 15px;">
                    <?php echo e(number_format((float)($lims_sale_data->grand_total - $lims_sale_data->paid_amount) ,$general_setting->decimal, '.', ',')); ?>

                </td>
            </tr>
            
        </table>
        <table style="width: 100%; border-collapse: collapse;margin-top:-9px;">
            <tr>
                <td style="width: 100%; text-align: center">
                    <br>
                    <?php echo '<img style="max-width:100%" src="data:image/png;base64,' . DNS1D::getBarcodePNG($lims_sale_data->reference_no, 'C128') . '" alt="barcode"   />';?>
                    <br><br>
                    <?php echo '<img style="width:5%" src="data:image/png;base64,' . DNS2D::getBarcodePNG($qrText, 'QRCODE') . '" alt="barcode"   />';?>
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            localStorage.clear();
            function auto_print() {
                window.print();

            }
            //setTimeout(auto_print, 1000);
        </script>
    </body>
</html>
<?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/resources/views/backend/sale/a4_invoice.blade.php ENDPATH**/ ?>