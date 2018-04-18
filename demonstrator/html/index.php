<?php 

$VINS=array("WDD2210561A233135","WAUZZZ4L0BD004645","WDD2210561A233315");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<script type="text/javascript">
 var WSURL='<?php echo getenv('WSURL'); ?>'
 var WSPORT='<?php echo getenv('WSPORT'); ?>'
</script>

  </head>
  <!-- <body style="background-image: url('bg.gif'); background-color: gray; "> -->
  <body style="background-color: gray; ">

  <div style="width:80%; margin-left: 5%; margin-top: 1%; border: 1px solid silver; padding: 20px; border-radius: 25px; background-color: silver; opacity: 0.95;">
    <div class="container-fluid" style="opacity: 1;">
	<div class="row">
		<div class="col-md-12">
			<div>
				<label for="exampleInputEmail1">
					Test VINs:
				</label>
			</div>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
					Select VIN Number:
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<?php
for($i=0;$i<count($VINS);$i++) {
?>
					 <a class="dropdown-item" href="#"><?=$VINS[$i]?></a>
<?php
}
?>
				</div>
			</div>
			<br>
			<form role="form">
				<div class="form-group">
					 
					<label for="exampleInputPassword1">
						VIN Number:
					</label>
					<input type="text" class="form-control" id="vin" size="16" maxlength="16">
				</div>
				<button type="submit" class="btn btn-primary">
					Start
				</button>
			</form>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-12">
			<div id="card-404583">
				<div class="card">
					<div class="card-header">
						 <a class="card-link" data-toggle="collapse" data-parent="#card-404583" href="#card-element-748509">
						 	<table border="0" width="100%">
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
					<div id="card-element-748509" class="collapse show">
						<div class="card-block">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6">
										Links
									</div>
									<div class="col-md-6">
										Rechts
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						 <a class="collapsed card-link" data-toggle="collapse" data-parent="#card-404583" href="#card-element-111918">
						 	<table width="100%">
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
					<div id="card-element-111918" class="collapse">
						<div class="card-block">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6">
										Links
									</div>
									<div class="col-md-6">
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>