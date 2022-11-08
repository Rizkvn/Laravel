<?php 
if (isset($_POST["simpan"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah_data($_POST) > 0) {
        echo "
        <script>
        alert('DATA BERHASIL DITAMBAHKAN');
        document.location.href = 'index.php?page=user_page'
        </script>
        ";
    }
    else{
        echo "
        <script>
        alert('DATA GAGAL DITAMBAHKAN');
        document.location.href = 'index.php?page=user_page'
        </script>
        ";
    }
}
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
    <a href="" class="btn btn-primary mb-2" data-target="#tambah_id" data-toggle="modal">Tambah User</a>
    <div class="table-responsive">
        <div class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>nomor</th>
                                <th>username</th>
                                <th>password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor=1;?>
                             <?php $ambil=$conn->query("SELECT * FROM user") ?>
                             <?php while ($perdata=$ambil->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $perdata ['username']; ?></td>
                                <td><?= $perdata ['password']  ?></td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal Set -->
<div class="modal fade" id="tambah_id" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="" method="post" enctype="multipart/form-data">
            <table class="table table-responsive">
                <tr>
                    <td><label for="username">Username</label></td>
                    <td><input type="text" id="username" name="username" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password" class="form-control"></td>
                </tr>
                <tr></tr>
            </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>