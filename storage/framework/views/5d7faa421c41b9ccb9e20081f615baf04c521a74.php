<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>

    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ======= Sidebar ======= -->
    <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Prodi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Input Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section ">
            <div class="col-lg-12 ">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Input Data Prodi</h5>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                                <p class="d-inline-block">Klik <a target="_blank"
                                        href=<?php echo e(route('prodi.index')); ?>>disini</a> untuk
                                    melihat!</p>
                            </div>
                        <?php endif; ?>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger w-100">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <!-- General Form Elements -->
                        <form action=<?php echo e(route('prodi.store')); ?> method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Prodi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center ">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->

    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\laravel8\CRUD-Mhs\resources\views/prodi/create.blade.php ENDPATH**/ ?>