<?php
	session_start();
	include('../include/config.php');

		if(isset($_GET['del'])){
			mysqli_query($conn,"delete from nurse where nurse_ID='".$_GET['id']."'");
            echo "<script>alert('Nurse data deleted');</script>";
		  }
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin | Manage Nurse</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	
	<body>
		<div class="wrapper" id="wrapper">
			<div class="top_navbar">
				<div class="menu">
					<div class="logo">COVID19 Hospital Management System</div>
					<li><a href="home.php">Home</a>
					<a href="../include/logout.php" onClick="return confirm('Are you sure you want to logout?')">Logout</a></li>
				</div>
			</div>
			<p>ADMINISTRATOR&nbsp <small>MANAGE NURSE</small></p>
			<hr>
			
			<table>	
				<thead>
				<tr>
				<th>ID</th>
				<th>Nurse Name</th>
				<th>Contact Number</th>
				<th>Email</th>
				<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$sql=mysqli_query($conn,"select * from nurse");
					while($row=mysqli_fetch_array($sql)) {
				?>
				
				<tr>
				<td><?php echo $row['nurse_ID'];?></td>
				<td><?php echo $row['nFullName'];?></td>
				<td><?php echo $row['nNumber'];?></td>
				<td><?php echo $row['nEmail'];?></td>
		
				<td>
				<a href="edit-nrs.php?id=<?php echo $row['nurse_ID'];?>" class="icn" tooltip-placement="top" tooltip="Edit">Edit</a>
													
				<a href="manage-nrs.php?id=<?php echo $row['nurse_ID']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="icn" tooltip-placement="top" tooltip="Remove">Delete</a>
				</td></tr>
	
				<?php } ?>
				</tbody>
		</table>
	
		</div>
	</body>
	
</html>