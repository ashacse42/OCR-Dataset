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
              <th>Result (True/False)Out of Count</th>
              <th>Actual Value Image</th>
              <th>Approve</th>
              <th>Reject</th>
              <th>Delete</th>
            </tr>
          </thead>
  <tbody>

  <?php $i=0;
        $sql ="SELECT DISTINCT(char_id) from result WHERE flag=0 AND flag !=1 AND flag !=2";
		$result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result)){
         $i++; 
    ?>


      <tr>

      	<?php 
      	//getting true value 
      	$param=$row['char_id'];

   		$resultcountx=mysqli_query($db,"SELECT count(char_id) AS totaltrue FROM result WHERE char_id=$param AND decision=1");
		$datax=mysqli_fetch_assoc($resultcountx);
		$tt = $datax['totaltrue'];

      	  //getting falsefalue
   		$resultcounty=mysqli_query($db,"SELECT count(char_id) AS totalfalse FROM result WHERE char_id=$param AND decision=0");
		$datay=mysqli_fetch_assoc($resultcounty);
		$tf=$datay['totalfalse'];

      	?>
		<td><?php echo $i;?></td>
         <td><?php echo $row['char_id']?></td>
	     <td><?php
				$sqlimg ="SELECT * FROM image_info WHERE img_serial=$param";
				$resultimg = mysqli_query($db, $sqlimg);
         		while($row = mysqli_fetch_assoc($resultimg)){?>
        		<img src="../picture/<?php echo $row['image_name']?>" alt="<?php echo $row['char_id']?>" height="50px" width="50px"><?php }?>
          </td>


              <td style="font-weight: bold;text-align: center;">( <span style="color:green;"><?php echo $tt;?></span> / <span style="color:red;"><?php echo $tf;?> </span>) ==> <?php echo($tt+$tf);?></td>


              

				<?php

		$ckd=mysqli_query($db,"SELECT character_value AS t FROM image_info WHERE img_serial=$param ");
		$datac=mysqli_fetch_assoc($ckd);
		$ckdval = $datac['t'];

				$sqlrm ="SELECT * FROM character_base WHERE char_val=$ckdval";

				mysqli_query($db,'SET CHARACTER SET utf8');
         		mysqli_query($db,"SET SESSION collation_connection ='utf8_general_ci'");

				$resultrm = mysqli_query($db, $sqlrm);
         		while($row = mysqli_fetch_assoc($resultrm)){?>
        		<td><?php echo $row['char_txt']?></td><?php }?>


              	
<script>
  function approve(param)
  {
    if(confirm("You want to approve this record ?"))
    {
    window.location.href="approve.php?param="+param;
    }
  }
  
  function reject(param)
  {
    if(confirm("Are you sure to reject this record ?"))
    {
    window.location.href="reject.php?param="+param;
    }
  }

   function del(param)
  {
    if(confirm("Are you sure to delete this record ?"))
    {
    window.location.href="delete.php?param="+param;
    }
  }
</script>    	

              

            
     <td>
      <a href="javascript:approve('<?php echo $param; ?>')"><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok"></span></button></a>
    </td>

     <td>
      <a href="javascript:reject('<?php echo $param; ?>')"><button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span></button></a>
    </td>

    <td>
      <a href="javascript:del('<?php echo $param; ?>')"><button class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button></a>
    </td>
            



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