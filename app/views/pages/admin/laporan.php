
<div id="content">

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-5 pt-3">Table Petugas</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Petugas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                    <?php if($_SESSION['user']['role']=='admin') : ?>   
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Pembayaran Bulan</th>
                            <th>Tahun Pembayaran</th>
                            <th>Tahun Ajaran</th>
                            <th>Nominal Pembayaran</th>
                            <th>Penginput</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['laporan'] as $laporan) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$laporan['nama_siswa']?></td>
                                <td><?=$laporan['tanggal_bayar']?></td>
                                <td><?=$laporan['bulan_dibayar']?></td>
                                <td><?=$laporan['tahun_dibayar']?></td>
                                <td><?=$laporan['tahun_ajaran']?></td>
                                <td><?=$laporan['nominal']?></td>
                                <td><?=$laporan['nama_petugas']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                        <?php endif ?>
                    <?php if($_SESSION['user']['role']=='petugas') : ?>   
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Pembayaran Bulan</th>
                            <th>Tahun Pembayaran</th>
                            <th>Tahun Ajaran</th>
                            <th>Nominal Pembayaran</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['laporan_petugas'] as $laporan) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$laporan['nama_siswa']?></td>
                                <td><?=$laporan['tanggal_bayar']?></td>
                                <td><?=$laporan['bulan_dibayar']?></td>
                                <td><?=$laporan['tahun_dibayar']?></td>
                                <td><?=$laporan['tahun_ajaran']?></td>
                                <td><?=$laporan['nominal']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                        <?php endif ?>
                    <?php if($_SESSION['user']['role']=='siswa') : ?>   
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Pembayaran Bulan</th>
                            <th>Tahun Pembayaran</th>
                            <th>Tahun Ajaran</th>
                            <th>Nominal Pembayaran</th>
                            <th>Penginput</th>
                        </tr>
                        </thead> 
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['laporan_siswa'] as $laporan) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$laporan['tanggal_bayar']?></td>
                                <td><?=$laporan['bulan_dibayar']?></td>
                                <td><?=$laporan['tahun_dibayar']?></td>
                                <td><?=$laporan['tahun_ajaran']?></td>
                                <td><?=$laporan['nominal']?></td>
                                <td><?=$laporan['nama_petugas']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                        <?php endif ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

