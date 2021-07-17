<head>
  <title>Admin - Result Area</title>
</head>


<style type="text/css">
  .pagination>li {
display: inline;
padding:0px !important;
margin:0px !important;
border:none !important;
}
.modal-backdrop {
  z-index: -1 !important;
}
/*
Fix to show in full screen demo
*/
iframe
{
    height:700px !important;
}

.btn {
display: inline-block;
padding: 6px 12px !important;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
line-height: 1.42857143;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-ms-touch-action: manipulation;
touch-action: manipulation;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
background-image: none;
border: 1px solid transparent;
border-radius: 4px;
}

.btn-primary {
color: #fff !important;
background: #428bca !important;
border-color: #357ebd !important;
box-shadow:none !important;
}
.btn-danger {
color: #fff !important;
background: #d9534f !important;
border-color: #d9534f !important;
box-shadow:none !important;
}
</style>


<?php include('header.php');?>

<body>
<div class="container">
  <div class="row">
  </div>
    
        <div class="row">
    
            <div class="col-md-12">
            
            
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
              <th>SL</th>
              <th>Source Image ID</th>
              <th>Source Image</th>
              <th>Result Value</th>
              <th>Result Value Image</th>
              <th>Approve</th>
              <th>Reject</th>
              <th>Delete</th>
            </tr>
          </thead>
  <tbody>

  <?php $i=0;
        // $sql = "SELECT * FROM result ORDER BY  result_id ASC";
          $sql ="SELECT result.*,image_info.*,character_base.*
          FROM result
          INNER JOIN  image_info
          ON result.char_id =image_info.img_serial
          INNER JOIN character_base
          ON result.char_value=character_base.char_val
          ORDER BY result.char_id  ASC ";

        mysqli_query($db,'SET CHARACTER SET utf8');
         mysqli_query($db,"SET SESSION collation_connection ='utf8_general_ci'");
         $result = mysqli_query($db, $sql);
         while($row = mysqli_fetch_assoc($result)){
          $i++; 
        ?>


      <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $row['char_id']?></td>
              <td><img src="../picture/<?php echo $row['image_name']?>" alt="<?php echo $row['char_id']?>" height="50px" width="50px"></td>
              <td> <?php $rescharval=$row['char_value']; echo $rescharval;?></td>
              <td><?php echo $row['char_txt']?></td>

            
     <td><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button></td>

     <td><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>

    <td><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>

        <?php  } ?>

    </tbody>
  </table>

  
  </div>
  </div>
</div>


<!-- /.modal-dialog --> <script type="text/javascript">
  $(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>
 
</body>

</html>