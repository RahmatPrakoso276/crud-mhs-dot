<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Mahasiswa</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/mahasiswa/create">
                        <i class="bi bi-circle"></i><span>Input Data</span>
                    </a>
                </li>
                <li>
                    <a href="/mahasiswa">
                        <i class="bi bi-circle"></i><span>Data Mahasiswa</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Prodi</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/prodi/create">
                        <i class="bi bi-circle"></i><span>Input Data</span>
                    </a>
                </li>
                <li>
                    <a href="/prodi">
                        <i class="bi bi-circle"></i><span>Data Prodi</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Tables Nav -->

    </ul>

</aside><!-- End Sidebar-->
