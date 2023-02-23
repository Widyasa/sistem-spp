
<div id="content">

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-5 pt-3"> Transaksi</h1>
        </div>
        <?php Flasher::flash()?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Transaksi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['siswa'] as $siswa) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$siswa['nama']?></td>
                                <td><?=$siswa['nama_kelas']?></td>
                                <td class="d-flex flex-row">
                                <button type="button" class="align-self-end btn btn-primary" href="#" data-toggle="modal" data-target="#addModal<?=$siswa['siswa_id']?>">
                                    Bayar SPP
                                </button>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['siswa'] as $siswa) : ?>
    

<div class="modal fade" id="addModal<?=$siswa['siswa_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pembayaran SPP</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>transaksi/addTransaksi" method="post">    
                    <input type="hidden" name="siswa_id" value="<?=$siswa['siswa_id']?>">
                    <input type="hidden" name="petugas_id" value="<?=$_SESSION['user']['petugas_id']?>">
                    <input type="hidden" name="pembayaran_id" value="<?=$siswa['pembayaran_id']?>">
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">Bulan</label>  
                                    <select name="bulan_dibayar" id="">
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "tahun_dibayar">Tahun</label>  
                                    <select name="tahun_dibayar" id="">
                                        <?php foreach ($data['tahun_ajaran'] as $tahun_ajaran) :?>
                                            <option value="<?=$tahun_ajaran?>"><?=$tahun_ajaran?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="d-flex flex-column">
                                    <label for = "tahun_dibayar">Tanggal Bayar</label>  
                                    <input type="datetime-local" name="tanggal_bayar" class="form-control form-control-user">
                                </div>
                            </div> -->
                           
                            

                        </div>
                            
                            
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php endforeach ?>


