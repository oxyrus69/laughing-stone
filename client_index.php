<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAYANAN CLIENT MEDIS</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">DATA PASIEN</h1>
    <div class="row">
    <a href="export.php" class="btn btn-primary"><span class="glyphicon glyphicon-export"></span> Export as XML</a>
        <div class="col-sm-8 col-sm-offset-2">
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>IDPasien</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Alamat</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('files/members.xml');
                    
                    foreach($file->user as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->firstname; ?></td>
                            <td><?php echo $row->lastname; ?></td>
                            <td><?php echo $row->address; ?></td>
                            
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
            <div class="d-grid gap-4 d-md-flex justify-content-md-end">
            <a href="client_obatpage.php" class="btn btn-info" type="button">Obat</a>
            <a href="client_pegawaipage.php" class="btn btn-info" type="button">Pegawai</a>
        </div>
        </div>
        
    </div>
    <a href="login.php" type="button" class="btn btn-warning btn-sm">KELUAR</a>
    <?php include 'footer.php'; ?>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>