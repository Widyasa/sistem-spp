
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
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['petugas'] as $petugas) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$petugas['nama']?></td>
                                <td><?=$petugas['username']?></td>
                                <td><?=$petugas['password']?></td>
                                <td class="d-flex flex-row">
                                <button type="button" class="align-self-end btn btn-warning" href="#" data-toggle="modal" data-target="#editModal<?=$petugas['petugas_id']?>">
                                    Edit
                                </button>
                                <form method="post" action="<?=baseurl?>Petugas/deletePetugas/<?=$petugas['petugas_id']?>">
                                    <input type="hidden" name="petugas_id" value="<?=$petugas['petugas_id']?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>petugas/addPetugas" method="post">    
                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "username">Nama</label>  
                                <input type="text" name="nama" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "username">Username</label>  
                                <input type="text" name="username" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "username">Password</label>  
                                <input type="text" name="password" class="form-control form-control-user">
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


<?php foreach ($data['petugas'] as $petugas) : ?>
<div class="modal fade" id="editModal<?=$petugas['petugas_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>petugas/editPetugas" method="post">    
                <input type="hidden" value="<?=$petugas['petugas_id']?>" name="petugas_id">
                <input type="hidden" value="<?=$petugas['pengguna_id']?>" name="pengguna_id">

                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "username">Nama</label>  
                                <input type="text" name="nama" value="<?=$petugas['nama']?>" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "username">Username</label>  
                                <input type="text" name="username" value="<?=$petugas['username']?>" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "username">Password</label>  
                                <input type="text" name="password" value="<?=$petugas['password']?>" class="form-control form-control-user">
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
