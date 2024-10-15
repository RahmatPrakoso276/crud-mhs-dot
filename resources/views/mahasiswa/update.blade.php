<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>

    @include('layout.header')
    <!-- ======= Sidebar ======= -->
    @include('layout.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Data Mahasiswa</h1>
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
                        <h5 class="card-title">Update Data Mahasiswa</h5>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                <p class="d-inline-block">Klik <a target="_blank"
                                        href={{ route('prodi.index') }}>disini</a> untuk
                                    melihat!</p>
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
                        <form method="POST" action={{ route('mahasiswa.update', $mahasiswa->id) }}>
                            @csrf
                            @method('put')

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim"
                                        value="{{ $mahasiswa->nim }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $mahasiswa->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Whatsapp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="whatsapp"
                                        value="{{ $mahasiswa->whatsapp }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Prodi</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="prodi_id">
                                        <option selected value={{ optional($mahasiswa->prodi)->id ?? 'null' }}>
                                            {{ optional($mahasiswa->prodi)->nama ?? 'N/A' }}
                                        </option>

                                        @foreach ($dataProdi as $item)
                                            @if ($item->id !== $mahasiswa->prodi_id)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center ">
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->

    @include('layout.footer')

</body>

</html>
