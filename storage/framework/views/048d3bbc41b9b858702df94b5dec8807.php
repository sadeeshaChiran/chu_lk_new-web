<?php $__env->startSection('title'); ?> <?php echo e($page->meta_title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?> <?php echo e($page->meta_description); ?> . <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title"><?php echo e($page->page_name); ?></h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>"><?php echo e(trans('file.Home')); ?></a></li>
                        <li class="active"><?php echo e($page->page_name); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!--Section starts-->
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mar-bot-30">
                        <?php echo $page->description; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('ecommerce::frontend.layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/personal/projects/web/laravel/system-chu_lk/Modules/Ecommerce/Resources/views/frontend/page-show.blade.php ENDPATH**/ ?>