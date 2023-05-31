<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAYANAN CLIENT MEDIS</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">DATA OBAT</h1>
    <a href="login.php" type="button" class="btn btn-warning btn-sm">KELUAR</a>
    <div class="row">
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>id</th>
                    <th>Nama Obat</th>
                    <th>Stock</th>
                    <th>Harga per Unit</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('files/medicines.xml');
                    
                    foreach($file->medicine as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->nama; ?></td>
                            <td><?php echo $row->stok; ?></td>
                            <td><?php echo $row->harga; ?></td>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
            
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="client_index.php" class="btn btn-info me-md-2" type="button">Pasien</a>
            <a href="client_pegawaipage.php" class="btn btn-info" type="button">Pegawai</a>
        </div>
    </div>
</div>
<?php include('obat_add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>