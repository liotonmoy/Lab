<?php require('connection.php');?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Update Records</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" type="text/css" href="inc\bootstrap\css\bootstrap.min.css">
		<script type="text/javascript" href="inc\bootstrap\jquery.min.js"></script>
		<script type="text/javascript" href="inc\bootstrap\js\bootstrap.min.js"></script>
	</head> 
	<body>
		<div class="jumbotron bg-primary" style="margin-bottom: 0;">
 			<h2 style="text-align: center;">Lab Equipment Management System</h2>
 		</div>
		<!-- navbar -->
 		
		<nav class="container-fluid navbar navbar-inverse">
		
		    <ul class="nav navbar-nav navbar-center">
		      	<li><a href="plist.php">Programming Lab</a></li>
		     	<li><a href="lab2.php">Digital Electronics Lab</a></li>
		     	<li><a href="lab3.php">Network Lab</a></li>
		    </ul>
	
		</nav>	<!-- navbar closed -->

		<div class="container" style="margin-bottom: 5%;">
			<h2 style="text-align: center;"><u>Network Lab: Update Records</u></h2>
		</div>

		<?php
			$rno = trim($_POST["rno"]);
			$name = trim($_POST["name"]);
			$IssueEquipment = trim($_POST["IssueEquipment"]);
			$EquipmentDetails = trim($_POST["EquipmentDetails"]);
			$addr = trim($_POST["addr"]);
			
			$error = 0; 
			$msgSuccess = "";

			if ($name == "") { 
				$error = 1; 
				$errmsg1 = "<span style='color:red;'>Name can't empty</span>"; 
			}
				if ($IssueEquipment == "") { 
				$error = 1; 
				$errmsg2 = "<span style='color:red;'>Issue Equipmentcan't empty</span>"; 
			}
				if ($EquipmentDetails == "") { 
				$error = 1; 
				$errmsg3 = "<span style='color:red;'>Equipment Details can't empty</span>"; 
			}
			
			if ($addr == "") { 
				$error = 1; 
				$errmsg4 = "<span style='color:red;'>Date can't be empty</span>"; 
			}		

			if ($error == 0) { 
				mysql_query("update lab3 set lab3name='".$name."',lab3IssueEquip='".$IssueEquipment."',lab3EquipDetails='".$EquipmentDetails."',lab3addr='".$addr."' where lab3no='".$rno."'");
				$msgSuccess = "<div class='alert alert-success' style='text-align:center;'>Successfully Records Updated</div>";

			}
			
		?>

		<div class="container" style="width: 60%; margin:0 auto;">
			<?php
				echo $msgSuccess;
			?>

			<form action="lab3update.php" name="fdadd" method="post">
				<div class="form-group">
					<label for="1">Equipment Name</label>
					<span style="float:right;"><?php echo $errmsg1; ?></span>
					<input type="text" id="1" name="name" value="<?php echo $name;?>" class="form-control" >
					
				</div>
				<div class="form-group">
					<label for="2">Issue Equipment</label>
					<span style="float:right;"><?php echo $errmsg2; ?></span>
					<input type="text" id="2" name="IssueEquipment" value="<?php echo $IssueEquipment;?>" class="form-control" >

				</div>
				
				<div class="form-group">
					<label for="3">Equipment Details</label>
					<span style="float:right;"><?php echo $errmsg3; ?></span>
					<input type="text" id="3" name="EquipmentDetails" value="<?php echo $EquipmentDetails;?>" class="form-control" >
					
				</div>
				<div class="form-group">
					<label for="4">Date</label>
					<span style="float:right;"><?php echo $errmsg4; ?></span>
					<input type="text" id="4" name="addr" value="<?php echo $addr;?>" class="form-control" >
					 
				</div>
				<input type="hidden" name="rno" value="<?php echo $rno; ?>">
				<input type="submit" class="btn btn-primary" name="submit" value="Submit">
				
			</form>
		</div>

		<div class="well well-sm" style="margin-top: 5%;">
			<h4 style="text-align: center;"><a href=lab3.php>Continue...</a></h4>
		</div>
	</body>
</html>
