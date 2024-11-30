<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Data Post </title>
  </head>
  <body>
    <div class="container mt-2">
    <a href="<?php echo base_url('/logout') ?>" class="btn btn-md btn-danger mb-3">LOGOUT</a>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if(!empty(session()->getFlashdata('message'))) : ?>

                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('message');?>
                </div>
                    
                <?php endif ?>

                <a href="<?php echo base_url('/siswa/create') ?>" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>ID Siswa</th>
                            <th>Status</th>
                            <th>Waktu Hadir</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($siswass as $key => $siswas) : ?>

                            <tr>
                                <td><?php echo $siswas['id'] ?></td>
                                <td><?php echo $siswas['nama_siswa'] ?></td>
                                <td><?php echo $siswas['kelas_siswa'] ?></td>
                                <td><?php echo $siswas['id_siswa'] ?></td>
                                <td><?php echo $siswas['kehadiran'] ?></td>
                                <td><?php echo $siswas['waktu_kehadiran'] ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('/siswa/edit/'.$siswas['id']) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                    <a href="<?php echo base_url('/siswa/delete/'.$siswas['id']) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
                <?php echo $pager->links('siswa', 'bootstrap_pagination') ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>