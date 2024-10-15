<!DOCTYPE html>
<html lang="en">
@include('layout.head')


<body>

    @include('layout.header')


    @include('layout.sidebar')


    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Prodi</h5>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger w-100">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Table with stripped rows -->

                            <table class="table">

                                <form action="{{ route('prodi.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="{{ request('search') }}"
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
                                    @foreach ($dataProdi as $prodi)
                                        <tr>
                                            <td>{{ $prodi->nama }}</td>

                                            <td class="d-flex gap-2">
                                                <a href={{ route('prodi.edit', $prodi->id) }}
                                                    class="btn btn-warning">Edit</a>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" data-id="{{ $prodi->id }}"
                                                    data-name="{{ $prodi->name }}">
                                                    Hapus
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
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
                            @csrf
                            @method('delete')
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
    @include('layout.footer')

</body>

</html>
