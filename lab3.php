<?php
require('connection.php');
error_reporting(1);
?>
<html>
 	<head>
  		<title>Equipment Lists</title>
 		
 		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" type="text/css" href="inc\bootstrap\css\bootstrap.min.css">
		<script type="text/javascript" href="inc\bootstrap\jquery.min.js"></script>
		<script type="text/javascript" href="inc\bootstrap\js\bootstrap.min.js"></script>
 	</head> 
 	<body>
 		<div class="jumbotron bg-primary" style="margin-bottom: 0;">
 			<h2 style="text-align: center;">Lab Equipment Management System</h2>
 		</div>
 				<!-- <form action="lab3search.php" method="post" style="text-align: right;">
             		Search: <input type="text" name="search" placeholder=" Search here ... "/>
        			<input type="submit" value="Submit" />
				</form> -->

				<br>

				<form action="lab3search.php" method="post" style="text-align: center;">
					<div class="form-inline">
						<label for="1">Search:</label>
					    <input type="text" id="1" name="search" placeholder=" Search here ... " class="form-control" />
		       		 	<input type="submit" class="btn btn-primary" value="Submit" class="form-control" />
					</div>
		             
				</form>
 	
		<nav class="container-fluid navbar navbar-inverse">
		
			<ul class="nav navbar-nav navbar-center">
		      	<li><a href="plist.php">Programming Lab</a></li>
		     	<li><a href="lab2.php">Digital Electronics Lab</a></li>
		     	<li><a href="lab3.php">Network Lab</a></li>
	    	</ul>
			

		</nav>	
		
		
		
		<div class="container">
			<h2 style="text-align: center;"><u>Network Lab Equipment List</u></h2>
		</div>

		<div class="container">
			<h3><a href="addlab3.php">Add New Record</a></h3>
		</div>

		<div class="container">
			<div class="table-responsive">          
		  		<table class="table table-striped table-condensed">
				    <thead>
				    	<tr>
					        <th style="text-align: left;">Serial No</th>
							<th style="text-align: left;">Equipment Name</th>
							<th style="text-align: left;">Issue Equipment</th>
							<th style="text-align:left;">Equipment Details</th>
							<th style="text-align: left;">Date</th>
							<th style="text-align: left;">Options</th>
				    	</tr>
				    </thead>
				    <tbody>	
						<?php
							$rs1=mysql_query("SELECT * from lab3 where lab3show='Y' order by
							lab3name;");
							$sno=1;
							while( $row=mysql_fetch_array($rs1)) {
								echo "<tr><td>$sno</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a href=lab3modify.php?rno=".$row[0].">Modify</a> | <a
							href=lab3del.php?rno=".$row[0].">Delete</a></td></tr>";
							 $sno++;
							}
							if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
							Not Found</font></td></tr>";
						?>	
				    </tbody>
  				</table>
  			</div>
		</div>

		<div class="container">
			<hr>
		</div>

		<div class="container">
			<h3><u>Deleted Records</u></h3>
		</div>

		<div class="container">
			<div class="table-responsive">          
		  		<table class="table table-striped table-condensed">
				    <thead>
				    	<tr>
					        <th style="text-align: left;">Serial No</th>
							<th style="text-align: left;">Equipment Name</th>
							<th style="text-align: left;">Issue Equipment</th>
							<th style="text-align:left;">Equipment Details</th>
							<th style="text-align: left;">Date</th>
							<th style="text-align: left;">Options</th>
				    	</tr>
				    </thead>
				    <tbody>	
						<?php
							$rs2=mysql_query("SELECT * from lab3 where lab3show='N' order by
							lab3name;");
							$sno=1;
							while( $row=mysql_fetch_array($rs2)) {
							 echo "<tr><td>$sno</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a
							href=lab3undel.php?rno=".$row[0].">Recover</a></td></tr>";
							 $sno++;
							}
							if ($sno==1) echo "<tr><td align=center><font size=4 color=red>Records
							Not Found</font></td></tr>";
						?>
				    </tbody>
  				</table>
  			</div>
		</div>
	</body>
</html> 