<?php include('header.php');?>
          <!-- container-->
		  <?php 
		@$page=  $_GET['page'];
		  if($page!="")
		  {
		  	if($page=="manage_users")
			{
				include('manage_users.php');
			
			}
			
			if($page=="update_password")
			{
				include('update_password.php');
			
			}
			if($page=="New_user")
			{
			include('addUser.php');
			}
			
		  }
		  
		  else
		  {
		  ?>

		  
		  <h1 class="page-header">Dashboard (RESULT)</h1>
		  

		  
		  <?php }?>

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
              <th>DECISION</th>
            </tr>
          </thead>
  <tbody>

  <?php $i=0;
        $sql ="SELECT DISTINCT(character_id) from final_result";
		$result = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($result)){
         $i++; 
    ?>


      <tr>

      	<?php 
      	//getting true value 
      	$param=$row['character_id'];

   		$resultcountx=mysqli_query($db,"SELECT count(character_id) AS totaltrue FROM final_result WHERE character_id=$param AND decision=1");
		$datax=mysqli_fetch_assoc($resultcountx);
		$tt = $datax['totaltrue'];

      	  //getting falsefalue
   		$resultcounty=mysqli_query($db,"SELECT count(character_id) AS totalfalse FROM final_result WHERE character_id=$param AND decision=0");
		$datay=mysqli_fetch_assoc($resultcounty);
		$tf=$datay['totalfalse'];

      	?>
		<td><?php echo $i;?></td>
         <td><?php echo $row['character_id']?></td>
	     <td><?php
				$sqlimg ="SELECT * FROM image_info WHERE img_serial=$param";
				$resultimg = mysqli_query($db, $sqlimg);
         		while($row = mysqli_fetch_assoc($resultimg)){?>
        		<img src="../picture/<?php echo $row['image_name']?>" alt="<?php echo $row['character_id']?>" height="50px" width="50px"><?php }?>
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

            
     
     	<?php 
      	  //getting flag
   		$resultflag=mysqli_query($db,"SELECT flag_status AS flag FROM final_result WHERE character_id=$param");
		$dataflag=mysqli_fetch_assoc($resultflag);
		$flag=$dataflag['flag'];

		if($flag==1){?>
     	<td>
		    <p style="color:green;font-weight: bold;text-align: center;">ACCEPTED</p>
		    </td>
		<?php }else if($flag==2){?>
			<td>
		    <p style="color:red;font-weight: bold;text-align: center;">REJECTED</p>
		    </td> <?php }?>
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















		  

         
        </div>
      </div>
    </div>
<script src="js/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/vendor/holder.min.js"></script>
<script src="js/ie10-viewport-bug-workaround.js"></script>
 </body>
</html>
