<div id="content">



    <!-- Begin Page Content -->
    <div class="container-fluid mt-5 pt-3">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

        </div>

        <!-- Content Row -->
        <div class="row mt-5 pt-2">

            <div class="col-12">
                <h1 class="display-4">Selamat Datang, Anda Terdaftar Sebagai <?=$_SESSION['user']['role']?></h1>
            </div>

        </div>

        <!-- Content Row -->

        <div class="row mt-5">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary"> Video</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class=" ">
                            <video class="h-100" loop="true" autoplay="autoplay" controls muted src="<?=assets("video/contoh.mp4")?>">
                                <!-- <source   type="video/mp4" style="width: fit-content;"> -->
                            </video>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->


    </div>
    <!-- /.container-fluid -->

</div>