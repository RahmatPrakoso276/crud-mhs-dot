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
                            <h5 class="card-title">Detail Mahasiswa</h5>
                            <table class="table">
                                <tr>
                                    <th>NIM</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $mahasiswa->name }}</td>
                                </tr>
                                <tr>
                                    <th>Whatsapp</th>
                                    <td>{{ $mahasiswa->whatsapp }}</td>
                                </tr>
                                <tr>
                                    <th>Prodi</th>
                                    <td>{{ optional($mahasiswa->prodi)->nama ?? 'N/A' }}</td>
                                </tr>
                            </table>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('layout.footer')
</body>

</html>
