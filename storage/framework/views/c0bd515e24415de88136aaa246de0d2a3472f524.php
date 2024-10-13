<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<body>

    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Prodi</h5>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('success')); ?>

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
                            <!-- Table with stripped rows -->

                            <table class="table">

                                <form action="<?php echo e(route('prodi.index')); ?>" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                                            class="form-control" placeholder="Cari Prodi" aria-label="Cari Prodi"
                                            aria-describedby="button-addon2">
                                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                    </div>
                                </form>
                                <thead>
                                    <tr>
                                        <th class="w-100">
                                            Nama Prodi
                                        </th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $dataProdi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($prodi->nama); ?></td>

                                            <td class="d-flex gap-2">
                                                <a href=<?php echo e(route('prodi.edit', $prodi->id)); ?>

                                                    class="btn btn-warning">Edit</a>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" data-id="<?php echo e($prodi->id); ?>"
                                                    data-name="<?php echo e($prodi->name); ?>">
                                                    Hapus
                                                </button>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Global -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda yakin ingin menghapus data <span id="modalItemName"></span>?
                        </div>
                        <form id="deleteForm" method="POST" action="">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>

    </main><!-- End #main -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');

            // Tambahkan event listener saat modal akan ditampilkan
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const itemId = button.getAttribute('data-id'); // Ambil ID dari data-id
                const form = deleteModal.querySelector('#deleteForm');
                form.action = '/prodi/' + itemId;
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\laravel8\CRUD-Mhs\resources\views/prodi/index.blade.php ENDPATH**/ ?>