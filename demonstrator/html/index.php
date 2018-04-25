<?php 

$path = "/var/www/html";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

$VINS=array("WDD2210561A233135","WAUZZZ4L0BD004645");

require('vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VIN2Cert (VIN to CertificateID conversion REST Service)</title>

    <meta name="description" content="Demonstrator for VIN2Cert (VIN ==> CertificateID WebService)">
    <meta name="author" content="RiPro GmbH">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.14.0/themes/prism.min.css" rel="stylesheet">

<script>
 var WSURL='<?php echo getenv('WSURL'); ?>'
 var WSPORT='<?php echo getenv('WSPORT'); ?>'
 var APIURL=<?php echo getenv('APIURL'); ?>
</script>

    <link href="css/style.css" rel="stylesheet">

  </head>
  <!-- <body style="background-image: url('bg.gif'); background-color: gray; "> -->
  <body style="background-color: gray; ">

  <div style="width:80%; margin-left: 5%; margin-top: 1%; border: 1px solid silver; padding: 20px; border-radius: 25px; background-color: silver; opacity: 0.95;">
    <div class="container-fluid" style="opacity: 1;">
	<div class="row">
		<div class="col-md-12">
			<div>
				<label for="testVINs">
					Test VINs:
				</label>
			</div>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="testVINs" data-toggle="dropdown">
					Select VIN Number:
				</button>
				<div class="dropdown-menu" aria-labelledby="testVINs">
<?php
for($i=0;$i<count($VINS);$i++) {
?>
					 <a class="dropdown-item" href="#" onClick="startVIN(this.id)" id="<?=$VINS[$i]?>"><?=$VINS[$i]?></a>
<?php
}
?>
				</div>
			</div>
			<br>
			<form>
				<div class="form-group">
					 
					<label for="vin">
						VIN Number:
					</label>
					<input type="text" class="form-control" id="vin" size="16" maxlength="16">
				</div>
				<button type="submit" class="btn btn-primary" onClick="startVIN($('#vin').val());">
					Start
				</button>
			</form>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-12">
			<div class="progress d-none">
				<div id="statusbar" class="progress-bar w-0 progress-bar-striped progress-bar-animated bg-warning">
				</div>
			</div>
			<div id="card-404583">
				<div class="card d-none template">
					<div class="card-header">
						 <a class="card-link" data-toggle="collapse" data-parent="#card-404583" href="#card-element-748509">
						 	<table class="w-100">
							  <tbody>
								<tr>
								  <td>ID</td>
								  <td>VIN</td>
								  <td>Step</td>
								  <td>Step&nbsp;Detail</td>
								  <td>Status</td>
								</tr>
							  </tbody>
							</table>
						 </a>
					</div>
					<div id="card-element-748509" class="collapse hide">
						<div class="card-block">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 result-left">
										Links
									</div>
									<div class="col-md-6 result-right">
										Rechts
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </div>
  </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-md5@0.7.3/src/md5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.14.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <script src="js/debugbar.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
