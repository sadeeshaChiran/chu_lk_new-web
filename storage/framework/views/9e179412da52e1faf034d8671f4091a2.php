 <?php $__env->startSection('content'); ?>
<?php if(session()->has('not_permitted')): ?>
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div>
<?php endif; ?>

<section>

    <div class="container-fluid">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible text-center mar-bot-30"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(session()->has('message')): ?>
        <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible text-center mar-bot-30"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session('message')); ?></div>
        <?php endif; ?>
        <a href="<?php echo e(route('page.create')); ?>" class="btn btn-info parent_load"><i class="fa fa-plus"></i> <?php echo e(__('Add Page')); ?></a>
    </div>

    <div class="table-responsive">
        <table id="page_list_table" class="table ">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th scope="col"><?php echo e(trans('file.Page')); ?></th>
                    <th scope="col"><?php echo e(trans('file.Template')); ?></th>
                    <th scope="col"><?php echo e(trans('file.Status')); ?></th>
                    <th scope="col"><?php echo e(trans('file.action')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($page->id); ?>">
                    <td><?php echo e($key); ?></td>
                    <td><?php echo e($page->page_name); ?></td>
                    <td><?php echo e($page->template); ?></td>
                    <td>
                        <?php if($page->status > 0): ?>
                        <span class="badge badge-success"><?php echo e(trans('file.Active')); ?></span>
                        <?php else: ?>
                        <span class="badge badge-danger"><?php echo e(trans('file.Inactive')); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(url('/pages/edit')); ?>/<?php echo e($page->id); ?>" class="btn btn-primary btn-sm">
                            <i class="dripicons-pencil"></i>
                        </a>&nbsp;&nbsp;
                        <?php echo e(Form::open(['route' => ['page.destroy', $page->id], 'method' => 'GET', 'class' => 'd-inline'] )); ?>

                        <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')">
                            <i class="dripicons-trash"></i>
                        </button>&nbsp;&nbsp;
                        <?php echo e(Form::close()); ?>

                        <?php if($page->status > 0): ?>
                        <button type="button" name="delete" data-id="<?php echo e($page->id); ?>" data-status="0" class=" btn btn-danger btn-sm status">
                            <i class="dripicons-thumbs-down"></i>
                        </button>
                        <?php else: ?>
                        <button type="button" name="delete" data-id="<?php echo e($page->id); ?>" onclick="return confirmDelete()" data-status="1" class=" btn btn-success btn-sm status">
                            <i class="dripicons-thumbs-up"></i>
                        </button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title"><?php echo e(trans('file.Confirmation')); ?></h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;"><?php echo e(__('want to remove?')); ?></h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger"><?php echo e(trans('file.OK')); ?>'
                </button>
                <button type="button" class="close btn-default" data-dismiss="modal"><?php echo e(trans('file.Cancel')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    "use strict";

    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

    $('#page_list_table').DataTable({
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
            "info": '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
            "search": '<?php echo e(trans("file.Search")); ?>',
            'paginate': {
                'previous': '<i class="dripicons-chevron-left"></i>',
                'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [{
                "orderable": false,
                'targets': [0, 3, 4]
            },
            {
                'render': function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                    return data;
                },
                'checkboxes': {
                    'selectRow': true,
                    'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': {
            style: 'multi',
            selector: 'td:first-child'
        },
        'lengthMenu': [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        dom: '<"row"lfB>rtip',
        buttons: [{
                extend: 'pdf',
                text: '<i title="export to pdf" class="fa fa-file-pdf-o"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
                customize: function(doc) {
                    for (var i = 1; i < doc.content[1].table.body.length; i++) {
                        if (doc.content[1].table.body[i][0].text.indexOf('<img src=') !== -1) {
                            var imagehtml = doc.content[1].table.body[i][0].text;
                            var regex = /<img.*?src=['"](.*?)['"]/;
                            var src = regex.exec(imagehtml)[1];
                            var tempImage = new Image();
                            tempImage.src = src;
                            var canvas = document.createElement("canvas");
                            canvas.width = tempImage.width;
                            canvas.height = tempImage.height;
                            var ctx = canvas.getContext("2d");
                            ctx.drawImage(tempImage, 0, 0);
                            var imagedata = canvas.toDataURL("image/png");
                            delete doc.content[1].table.body[i][0].text;
                            doc.content[1].table.body[i][0].image = imagedata;
                            doc.content[1].table.body[i][0].fit = [30, 30];
                        }
                    }
                },
            },
            {
                extend: 'csv',
                text: '<i title="export to csv" class="fa fa-file-text-o"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    format: {
                        body: function(data, row, column, node) {
                            if (column === 0 && (data.indexOf('<img src=') !== -1)) {
                                var regex = /<img.*?src=['"](.*?)['"]/;
                                data = regex.exec(data)[1];
                            }
                            return data;
                        }
                    }
                },
            },
            {
                extend: 'print',
                text: '<i title="print" class="fa fa-print"></i>',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible',
                    stripHtml: false
                },
            },
            {
                text: '<i title="delete" class="dripicons-cross"></i>',
                className: 'buttons-delete',
                action: function(e, dt, node, config) {
                    if (user_verified == '1') {
                        brand_id.length = 0;
                        $(':checkbox:checked').each(function(i) {
                            if (i) {
                                brand_id[i - 1] = $(this).closest('tr').data('id');
                            }
                        });
                        if (brand_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type: 'POST',
                                url: 'brand/deletebyselection',
                                data: {
                                    brandIdArray: brand_id
                                },
                                success: function(data) {
                                    alert(data);
                                }
                            });
                            dt.rows({
                                page: 'current',
                                selected: true
                            }).remove().draw(false);
                        } else if (!brand_id.length)
                            alert('No brand is selected!');
                    } else
                        alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '<i title="column visibility" class="fa fa-eye"></i>',
                columns: ':gt(0)'
            },
        ],
    });



    $('#page_list_table').on('click', '.status', function() {
        let id = $(this).data('id');
        let status = $(this).data('status');

        var target = "<?php echo e(route('page.index')); ?>/" + id + '/' + status;

        $.ajax({
            url: target,
            dataType: "json",
            success: function(data) {
                let html = '';
                if (data.success) {
                    location.reload();
                }
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/backend/pages/index.blade.php ENDPATH**/ ?>