<?= $this->extend('layouts/admin')?>
<?= $this->section('title')?>
Masyarakat
<?= $this->endSection()?>
<?= $this->section('content')?>
        <div class="col">
            <div class="card-border-info">
                <div class="card-header bg-info">
                    <a href="#" data-masyarakat="" class="btn btn-light" data-target="#modalMasyarakat" data-toggle="modal"><i class="fas fa-fw fa-solid fa-user-plus"></i>Tambah Data Petugas</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="masyarakat">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Telp</th>                             
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=0;
                        foreach ($masyarakat as $row){
                            $data=$row['nik'].",".$row['nama'].",".$row['username'].",".$row['password'].",".$row['telp'].",".base_url('masyarakat/edit/'.$row['id_masyarakat']);
                            #code... 
                            $no++;
                            ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?=$row['nik']?></td>
                                <td><?=$row['nama']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['password']?></td>
                                <td><?=$row['telp']?></td>
                                <td>
                                    <a href=""data-masyarakat="<?=$data?>" data-target="#modalMasyarakat" data-toggle="modal" class="btn btn-dark"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="masyarakat/hapus/<?=$row['id_masyarakat']?>" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    
                </div>
                <?php if(!empty(session()->getFlashdata("message"))) :?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata("message") ;?>

                        </div>
                        <?php endif ?>
            </div>
        </div>
    <div class="modal fade" id="modalMasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLable">Input Data Masyarakat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="frmPetugas" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nik">Nik</label>
                            <input type="text" name="nik" class="form-control" id="nik">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>                        
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="telp">Telp</label>
                            <input type="text" name="telp" class="form-control" id="telp">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dissmis="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?=$this->endSection()?>
    <?=$this->section("script")?>
    <script>
        $(document).ready(function(){
            alert("a");
            $("#modalMasyarakat").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('masyarakat');
                if(data !=""){
                    const barisdata = data.split(",");
                    $('#nik').val(barisdata[0]);
                    $('#nama').val(barisdata[1]);
                    $('#username').val(barisdata[2]);
                    $('#password').val(barisdata[3]).change();
                    $('#telp').val(barisdata[4]);
                    $('#frmMasyarakat').attr('action',barisdata[5]);
                }else{
                    $('#nik').val('');
                    $('#nama').val('');
                    $('#username').val('');
                    $('#password').val('').change();
                    $('#telp').val('');
                    $('#frmMasyarakat').attr('action','/smasyarakat');
                }
            });
            $('#masyarakat').DataTable();
        })
    </script>
    <?=$this->endSection()?>
