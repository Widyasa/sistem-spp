<body id="page-top pt-5">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary pt-5 sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-text mx-3">SpA</div>
        </a>

        <!-- Divider -->
        

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>dashboard">
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Divider -->
       
        <?php if($_SESSION['user']['role'] == 'petugas' || $_SESSION['user']['role'] == 'admin') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>Transaksi">
                <span>SPP</span>
            </a>
        </li>
        <?php endif ?>
        <?php if($_SESSION['user'] ['role'] == 'admin') : ?>
        <li class="nav-item">
             <a class="nav-link " href="<?=baseurl?>pembayaran/">Tahun Ajaran</a>
        </li>
        <?php endif ?>
        <?php if($_SESSION['user']['role'] == 'petugas' || $_SESSION['user']['role'] == 'admin') : ?>
        <li class="nav-item">
             <a class="nav-link" href="<?=baseurl?>kelas/">Kelas</a>
        </li>
        <?php endif ?>
        <?php if($_SESSION['user'] ['role'] == 'admin') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>/siswa">Siswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>petugas">Petugas</a>
        </li>
        <?php endif ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>laporan">Laporan</a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        

    

       

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Tables -->



        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?=baseurl?>auth/logout">
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <!-- <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div> -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

            <!-- End of Topbar -->