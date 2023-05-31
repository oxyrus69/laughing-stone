<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LAYANAN DATA MEDIS</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">LAYANAN DATA PEGAWAI</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-warning" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambahkan pegawai</a>
            <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>id</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Alamat</th>
                    <th>Profesi</th>
                    <th>Tindakan</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('files/employees.xml');
                    
                    foreach($file->user as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->firstname; ?></td>
                            <td><?php echo $row->lastname; ?></td>
                            <td><?php echo $row->address; ?></td>
                            <td><?php echo $row->profesi; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span>Ubah</a>
                                <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                            </td>
                            <?php include('pegawai_edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                    }
        
                    ?>
                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="obatpage.php" class="btn btn-info me-md-2" type="button">Obat</a>
            <a href="index.php" class="btn btn-info" type="button">Pasien</a>
        </div>
    </div>
</div>
<?php include('pegawai_add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>