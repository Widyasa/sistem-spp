
<div id="content">

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-5 pt-3">Siswa</h1>
            <button type="button" class="align-self-end btn btn-primary" href="#" data-toggle="modal" data-target="#addModal">
                 Tambah
            </button>

        </div>

        <form action="<?=baseurl?>siswa" method="post">
             <div class="d-flex flex-row mb-4">
                <input type="text" name="nis" class="form-control w-25" id="" placeholder="Cari siswa berdasarkan NIS">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <?php Flasher::flash()?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['siswa'] as $siswa) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$siswa['nis']?></td>
                                <td><?=$siswa['nama']?></td>
                                <td><?=$siswa['nama_kelas']?></td>
                                <td><?=$siswa['kompetensi_keahlian']?></td>
                                <td class="d-flex flex-row">
                                <button type="button" class="align-self-end btn btn-primary" href="#" data-toggle="modal" data-target="#detailModal<?=$siswa['siswa_id']?>">
                                    Detail
                                </button>
                                <button type="button" class="align-self-end ml-3 btn btn-warning" href="#" data-toggle="modal" data-target="#editModal<?=$siswa['siswa_id']?>">
                                    Edit
                                </button>
                                <form method="post" action="<?=baseurl?>siswa/deleteSiswa/<?=$siswa['siswa_id']?>">
                                    <input type="hidden" name="siswa_id" value="<?=$siswa['siswa_id']?>">
                                    <button type="submit" class="align-self-end btn btn-danger ml-3" onclick="return confirm('yakin mau hapus?')">
                                        Hapus
                                    </button>
                                </form>
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


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>siswa/addSiswa" method="post">    
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NISN</label>  
                                    <input type="text" name="nisn" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NIS</label>  
                                    <input type="text" name="nis" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nama">Nama</label>  
                                    <input type="text" name="nama" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">No HP</label>  
                                    <input type="text" name="telepon" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Kelas</label>  
                                    <select name="kelas_id" id="" class="form-control">
                                        <?php foreach ($data['kelas'] as $kelas) : ?>
                                            <option  value="<?=$kelas['kelas_id']?>">
                                            <?=$kelas['nama_kelas']?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Tahun Ajaran</label>  
                                    <select name="pembayaran_id" class="form-control" id="">
                                        <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                                            <option  value="<?=$pembayaran['pembayaran_id']?>">
                                            <?=$pembayaran['tahun_ajaran']?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "username">Username</label>  
                                    <input type="text" name="username" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "password">Password</label>  
                                    <input type="text" name="password" class="form-control form-control-user" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <label for = "alamat">Alamat</label>  
                                    <input type="text" name="alamat" class="form-control form-control-user" required>
                                </div>
                            </div>

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


<?php foreach ($data['siswa'] as $siswa) : ?>
    <div class="modal fade" id="editModal<?=$siswa['siswa_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>siswa/editSiswa" method="post">    
                    <input type="hidden" name="siswa_id" value="<?=$siswa['siswa_id']?>">
                    <input type="hidden" name="pengguna_id" value="<?=$siswa['pengguna_id']?>">
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NISN</label>  
                                    <input type="text" name="nisn" value="<?=$siswa['nisn']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NIS</label>  
                                    <input type="text" name="nis" value="<?=$siswa['nis']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nama">Nama</label>  
                                    <input type="text" name="nama" value="<?=$siswa['nama']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">No HP</label>  
                                    <input type="text" name="telepon" value="<?=$siswa['telepon']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Kelas</label>  
                                    <select name="kelas_id" class="form-control" id="">
                                        <?php foreach ($data['kelas'] as $kelas) : ?>
                                            <option  value="<?=$kelas['kelas_id']?>">
                                            <?=$kelas['nama_kelas']?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Tahun Ajaran</label>  
                                    <select name="pembayaran_id" class="form-control" id="">
                                        <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                                            <option class="form-control" value="<?=$pembayaran['pembayaran_id']?>">
                                            <?=$pembayaran['tahun_ajaran']?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "username">Username</label>  
                                    <input type="text" name="username" value="<?=$siswa['username']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "password">Password</label>  
                                    <input type="text" name="password" value="<?=$siswa['password']?>" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <label for = "alamat">Alamat</label>  
                                    <input type="text" name="alamat" value="<?=$siswa['alamat']?>" class="form-control form-control-user">
                                </div>
                            </div>

                        </div>
                            
                            
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php endforeach ?>



<?php foreach ($data['siswa'] as $siswa) : ?>
    <div class="modal fade" id="detailModal<?=$siswa['siswa_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>siswa/addSiswa" method="post">    
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NISN</label>  
                                    <input value="<?=$siswa['nisn']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nisn">NIS</label>  
                                    <input value="<?=$siswa['nis']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "nama">Nama</label>  
                                    <input value="<?=$siswa['nama']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">No HP</label>  
                                    <input value="<?=$siswa['telepon']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Kelas</label>  
                                    <input value="<?=$siswa['nama_kelas']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "telepon">Tahun Ajaran</label>  
                                    <input value="<?=$siswa['tahun_ajaran']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "username">Username</label>  
                                    <input value="<?=$siswa['username']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex flex-column">
                                    <label for = "password">Password</label>  
                                    <input value="<?=$siswa['password']?>" readonly class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <label for = "alamat">Kompetensi Keahlian</label>  
                                    <input value="<?=$siswa['kompetensi_keahlian']?>" readonly name="alamat" class="form-control form-control-user">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-column">
                                    <label for = "alamat">Alamat</label>  
                                    <input value="<?=$siswa['alamat']?>" readonly name="alamat" class="form-control form-control-user">
                                </div>
                            </div>

                        </div>
                            
                            
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php endforeach ?>
