
<div id="content">

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-5 pt-3">Table Petugas</h1>
            <button type="button" class="align-self-end btn btn-primary" href="#" data-toggle="modal" data-target="#addModal">
                 Tambah
            </button>

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Petugas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['kelas'] as $kelas) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$kelas['nama_kelas']?></td>
                                <td><?=$kelas['kompetensi_keahlian']?></td>
                                <td class="d-flex flex-row">
                                <button type="button" class="align-self-end btn btn-warning" href="#" data-toggle="modal" data-target="#editModal<?=$kelas['kelas_id']?>">
                                    Edit
                                </button>
                                <form method="post" action="<?=baseurl?>Kelas/deleteKelas/<?=$kelas['kelas_id']?>">
                                    <input type="hidden" name="kelas_id" value="<?=$kelas['kelas_id']?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>kelas/addKelas" method="post">    
                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "nama">Nama Kelas</label>  
                                <input type="text" name="nama" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "kompetensi_keahlian">Kompetensi Keahlian</label>  
                                <input type="text" name="kompetensi_keahlian" class="form-control form-control-user">
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


<?php foreach ($data['kelas'] as $kelas) : ?>
<div class="modal fade" id="editModal<?=$kelas['kelas_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>kelas/editKelas" method="post">    
                <input type="hidden" value="<?=$kelas['kelas_id']?>" name="kelas_id">       
                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "username">Nama Kelas</label>  
                                <input type="text" name="nama_kelas" value="<?=$kelas['nama_kelas']?>" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "kompetensi_keahlian">Kompetensi Keahlian</label>  
                                <input type="text" name="kompetensi_keahlian" value="<?=$kelas['kompetensi_keahlian']?>" class="form-control form-control-user">
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
