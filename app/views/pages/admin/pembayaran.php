
<div id="content">

    <div class="container-fluid">
        <div class="d-flex flex-row align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 mt-5 pt-3">Tahun Ajaran</h1>
            <button type="button" class="align-self-end btn btn-primary" href="#" data-toggle="modal" data-target="#addModal">
                 Tambah
            </button>

        </div>
        <?php Flasher::flash()?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Tahun Ajaran</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Nominal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                           <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$pembayaran['tahun_ajaran']?></td>
                                <td><?=$pembayaran['nominal']?></td>
                                <td class="d-flex flex-row">
                                <button type="button" class="align-self-end btn btn-warning" href="#" data-toggle="modal" data-target="#editModal<?=$pembayaran['pembayaran_id']?>">
                                    Edit
                                </button>
                                <form method="post" action="<?=baseurl?>Pembayaran/deletePembayaran/<?=$pembayaran['pembayaran_id']?>">
                                    <input type="hidden" name="pembayaran_id" value="<?=$pembayaran['pembayaran_id']?>">
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>pembayaran/addPembayaran" method="post">    
                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "tahun_ajaran">Tahun Ajaran</label>  
                                <input type="text" name="tahun_ajaran" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "nominal">Nominal</label>  
                                <input type="number" name="nominal" class="form-control form-control-user">
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


<?php foreach ($data['pembayaran'] as $pembayaran) : ?>
<div class="modal fade" id="editModal<?=$pembayaran['pembayaran_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?=baseurl?>pembayaran/editPembayaran" method="post">    
                <input type="hidden" value="<?=$pembayaran['pembayaran_id']?>" name="pembayaran_id">       
                    <div class="modal-body">
                            <div class="d-flex flex-column">
                                <label for = "tahun_ajaran">Tahun Ajaran</label>  
                                <input type="text" name="tahun_ajaran" value="<?=$pembayaran['tahun_ajaran']?>" class="form-control form-control-user">
                            </div>
                            <div class="d-flex flex-column">
                                <label for = "nominal">Nominal</label>  
                                <input type="text" name="nominal" value="<?=$pembayaran['nominal']?>" class="form-control form-control-user">
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
