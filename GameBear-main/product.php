<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>GAMEBEAR PRODUCT MANAGEMENT</title>
    <link rel="stylesheet" type="text/css" href="../gamebear/bootstrap/css/bootstrap.css">
    <style>
        .page-header {
            padding-bottom: 9px;
            margin: 40px 0 20px;
            border-bottom: 1px solid #1c6e8c;
            }
            a,p,h1,h2,h3,h4,h5,h6,th,td {
                font-family: "Nunito", sans-serif;
                font-optical-sizing: auto;
                font-weight: 600;
                font-style: normal;
            }
            th{
                font-weight: 400;
            }
            td{
                font-weight: 300;
            }
            .btn-primary {
                color: #fff;
                background-color: #1ccb85;
                border-color: #ffffff;
            }
            .btn-success {
                color: #fff;
                background-color: #1c6e8c;
                border-color: #ffffff;
            }
            .btn-danger {
                color: #fff;
                background-color: #970b06;
                border-color: #ffffff;
            }
            .btn-success {
                color: #fff;
                background-color: #157c30;
                border-color: #ffffff;
            }
            html{
                background: rgb(28,110,140);
                background: linear-gradient(0deg, rgba(28,110,140,1) 0%, rgba(122,200,229,1) 33%, rgba(255,255,255,1) 100%);
            }
    </style>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">GAMEBEAR PRODUCT MANAGEMENT</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
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
                    <th>Product ID</th>
                    <th>Product Desc</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $file = simplexml_load_file('productStock.xml');
 
                    foreach($file->product as $row){
                        ?>
                        <tr>
                            <td><?php echo $row->prodId; ?></td>
                            <td><?php echo $row->prodName; ?></td>
                            <td><?php echo $row->Price; ?></td>
                            <td><?php echo $row->Quantity; ?></td>
                            <td>
                                <a href="#edit_<?php echo $row->prodId; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#delete_<?php echo $row->prodId; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            </td>
                            <?php include('edit_delete_modal.php'); ?>
                        </tr>
                        <?php
                    }
 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>