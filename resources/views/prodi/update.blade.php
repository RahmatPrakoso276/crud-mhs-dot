<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>

    @include('layout.header')
    <!-- ======= Sidebar ======= -->
    @include('layout.sidebar')

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
                        <h5 class="card-title">Update Data Prodi</h5>
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

                        <!-- General Form Elements -->
                        <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Method untuk mengupdate data -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Prodi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ $prodi->nama }}">
                                </div>
                            </div>

                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </div>
                        </form>
                        <!-- End General Form Elements -->

                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->

    @include('layout.footer')

</body>

</html>
