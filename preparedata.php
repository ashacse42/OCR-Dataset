<?php include('../connection.php');?>
<?php 

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){


    $char_val=$_POST["materialExampleRadios"];


        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filenamet = $_FILES["submitedimage"]["name"];
        $filetype = $_FILES["submitedimage"]["type"];
        $filesize = $_FILES["submitedimage"]["size"];

        $filenamett = str_replace(' ','',$filenamet);
        $rand=rand(0,1000);
        $filename=$rand.$filenamett;
        // Verify file extension
       // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        //if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        if(in_array($filetype,$allowed))
              {
            // Check whether file exists before uploading it
            if(file_exists("../picture/" . $filename)){
                echo $filename . " is already exists.";
            } else{
              move_uploaded_file($_FILES["submitedimage"]["tmp_name"], "../picture/" . $filename);
        mysqli_query($db,'SET CHARACTER SET utf8');
        mysqli_query($db,"SET SESSION collation_connection ='utf8_general_ci'");
              $sql = "INSERT INTO image_info(image_name,character_value)
              VALUES
              ('$filename','$char_val')";
    if ($db->query($sql) === TRUE) {
      
    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('SUCCESS: Data Recorded.');
                    window.location.href='preparedata.php';
                    </script>");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
                //echo "Your file was uploaded successfully.";
            } 
        } else{
            echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Error: There was a problem to uploading your file. Please try again.');
                    window.location.href='preparedata.php';
                    </script>"); 
        } 
$db->close();

}?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Select Character</title>
  <!-- Roboto Font -->
  <link rel="stylesheet" href="../asset/css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../asset/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../asset/mdb-pro.min.css">
  <!-- Material Design Bootstrap Ecommerce -->
  <link rel="stylesheet" href="../asset/mdb.ecommerce.min.css">
  <!-- Your custom styles (optional) -->
  <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>

<style type="text/css">/* Chart.js */
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}</style></head>

<body class="skin-light" aria-busy="true">

  <!--Main Navigation-->
  <header>
    <div class="d-flex align-items-center h-100">
        <div class="container text-center py-5">
          <h5 class="mb-0">Prepare Data for Bangla Optical Character Recognition</h5>
          <a href="index.php"> <button type="button" class="btn btn-light btn-md "> Back to Home</button></a> 
        </div>
      </div>
</header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main>
    <div class="container">

      <!--Section: Block Content-->
      <section class="mb-5">
			<div class="row">
          <div class="col-md-2 mb-4 mb-md-0">


          </div>
		  
		  
	<!--<form  action="kbreturn.php" method="post">-->
<form enctype="multipart/form-data" class="form-horizontal"  method="post" action="" >
     <div class="form-group">
            <label>Photo<span style="color:red">&nbsp;*</span></label>
            <!--<input type="file" placeholder="Your photo..." class="form-control" required >-->
            <div style="float:right;background-color:#2FECF0"><img id="blah" src="" width="150" height="150" /></div>
            <input type="file"name="submitedimage" onchange="readURL(this);"required />
            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 1 MB.</p>
      </div>

    <script>
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <div class="table-responsive mb-2">

              <table class="table table-sm table-borderless">
                <tbody>
                  <tr>
                    <td class="pb-0">Select True Result</td>
                  </tr>
				  
				  <!-- first row-->
				  
                  <tr>
                   <td>
						
                      <div class="mt-1">
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="a" name="materialExampleRadios" value="101">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="a">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="aa" name="materialExampleRadios" value="102">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="aa">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="i" name="materialExampleRadios" value="103">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="i">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ii" name="materialExampleRadios" value="104">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ii">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="u" name="materialExampleRadios" value="105">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="u">???</label>
                        </div>
						
						<!---->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="uu" name="materialExampleRadios" value="106">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="uu">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="re" name="materialExampleRadios" value="107">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="re">??? </label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ea" name="materialExampleRadios" value="108">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ea">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="oi" name="materialExampleRadios" value="109">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="oi">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="o" name="materialExampleRadios" value="110">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="o">???</label>
                        </div>
						</div>
                    </td>
					</tr>
					
				  <!-- third row-->
                  <tr>
                   <td>
                      <div class="mt-1">
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ou" name="materialExampleRadios" value="111">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ou">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="akr" name="materialExampleRadios" value="112">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="akr">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ekr" name="materialExampleRadios" value="113">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ekr">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="rekr" name="materialExampleRadios" value="114">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="rekr">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ukr" name="materialExampleRadios" value="115">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ukr">???</label>
                        </div>
						
						<!---->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="uker" name="materialExampleRadios" value="116">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="uker">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="reukr" name="materialExampleRadios" value="117">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="reukr">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="rrikr" name="materialExampleRadios" value="118">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="rrikr">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="rekrx" name="materialExampleRadios" value="125">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="rekrx">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="akrx" name="materialExampleRadios" value="119">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="akrx">???</label>
                        </div>
						</div>
                    </td>
					</tr>
					
					 <!-- fifth row-->
                  <tr>
                   <td>
                      <div class="mt-1">
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="oiker" name="materialExampleRadios" value="120">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="oiker">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="oker" name="materialExampleRadios" value="121">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="oker">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ouker" name="materialExampleRadios" value="122"> 
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ouker">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="9k" name="materialExampleRadios" value="125">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="9k">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="hy" name="materialExampleRadios"value="124">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="hy">-</label>
                        </div>
						
						
						</div>
                    </td>
					</tr>
					
					
					<!-- seventh row-->
                  <tr>
                   <td>
                      <div class="mt-1">
						
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ka" name="materialExampleRadios" value="201">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ka">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="kha" name="materialExampleRadios" value="202">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="kha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ga" name="materialExampleRadios" value="203">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ga">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="gha" name="materialExampleRadios" value="204">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="gha">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="uma" name="materialExampleRadios" value="205">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="uma">???</label>
                        </div>
						
						<!---->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="cha" name="materialExampleRadios" value="206">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="cha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="chha" name="materialExampleRadios" value="207">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="chha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ja" name="materialExampleRadios" value="208">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ja">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="jha" name="materialExampleRadios" value="209">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="jha">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="eng" name="materialExampleRadios" value="210">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="eng">???</label>
                        </div>
						</div>
                    </td>
					</tr>
					
					
					
					<!-- 9th row-->
                  <tr>
                   <td>
                      <div class="mt-1"><div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ta" name="materialExampleRadios" value="211">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ta">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="tho" name="materialExampleRadios" value="212">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="tho"> ???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="da" name="materialExampleRadios" value="213">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="da">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="dha" name="materialExampleRadios" value="214">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="dha">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="mna" name="materialExampleRadios" value="215">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="mna">???</label>
                        </div>
						
						<!---->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="taa" name="materialExampleRadios" value="216">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="taa">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="tha" name="materialExampleRadios" value="217">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="tha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="daa" name="materialExampleRadios" value="218">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="daa">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="dhaa" name="materialExampleRadios" value="219">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="dhaa">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="na" name="materialExampleRadios" value="220">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="na">???</label>
                        </div>
						
						
						</div>
                    </td>
					</tr>
					
					
					
					<!-- 9th row-->
                  <tr>
                   <td>
                      <div class="mt-1">
						
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="pa" name="materialExampleRadios" value="221">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="pa">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="pha" name="materialExampleRadios" value="222">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="pha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ba" name="materialExampleRadios" value="223">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ba">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="bha" name="materialExampleRadios" value="224">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="bha">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ma" name="materialExampleRadios" value="225">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ma">???</label>
                        </div>
						
						<!---->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="jaa" name="materialExampleRadios" value="226">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="jaa">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ra" name="materialExampleRadios" value="227">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ra">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="la" name="materialExampleRadios" value="228">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="la">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="sha" name="materialExampleRadios" value="229">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="sha">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ssha" name="materialExampleRadios" value="230">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ssha">???</label>
                        </div>
						
						
						</div>
                    </td>
					</tr>
					
					
					
					<!-- 9th row-->
                  <tr>
                   <td>
                      <div class="mt-1">
						
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="sa" name="materialExampleRadios" value="231">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="sa">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ha" name="materialExampleRadios" value="232">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ha">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="dra" name="materialExampleRadios" value="233">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="dra">??????</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="dhra" name="materialExampleRadios" value="234">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="dhra">??????</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="ya" name="materialExampleRadios" value="235">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="ya">??????</label>
                        </div>
						
						<!----->
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="knth" name="materialExampleRadios" value="236">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="knth">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="onsur" name="materialExampleRadios" value="237">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="onsur">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="bishar" name="materialExampleRadios" value="238">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="bishar">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="chand" name="materialExampleRadios" value="239">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="chand">??????</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="hshs" name="materialExampleRadios" value="241">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="hshs">   ??????</label>
                        </div>
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="khiyo" name="materialExampleRadios" value="240">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="khiyo">   ?????????</label>
                        </div>
						</div>
                    </td>
					</tr>
					
					
					
					<!-- 9th row-->
                  <tr>
                   <td>
                      <div class="mt-1">
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="0" name="materialExampleRadios" value="301">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="0">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="1" name="materialExampleRadios" value="302">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="1">??? </label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="2" name="materialExampleRadios" value="303">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="2">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="3" name="materialExampleRadios" value="304">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="3">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="4" name="materialExampleRadios" value="305">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="4">??? </label>
                        </div>
						
						
						<!---->
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="5" name="materialExampleRadios" value="306">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="5"> ???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="6" name="materialExampleRadios" value="302">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="6">???</label>
                        </div>
						
                        <div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="7" name="materialExampleRadios" value="303">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="7">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="8" name="materialExampleRadios" value="304">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="8">???</label>
                        </div>
						
						<div class="form-check form-check-inline pl-0">
                          <input type="radio" class="form-check-input" id="9" name="materialExampleRadios" value="305">
                          <label class="form-check-label small text-uppercase card-link-secondary" for="9"> ???</label>
                        </div>
						</div>
                    </td>
					</tr>
					
				  
                </tbody>
              </table>
            </div>
			
           <input type="submit" class="btn btn-primary" style="float:right"  name="submit" value="Submit" />
          <!-- <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart pr-2" style="float:right" ></i>Submit</button>-->
           </form>
          </div>
          </section>


      

    </div>
  </main>
  <!--Main layout-->

</body>
</html>