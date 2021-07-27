<?php 
	include'./classes/Student.php';
	$stu = new Student();
    if(isset($_GET['delstudent'])){
    	$id = $_GET['delstudent'];
    	$delstudent = $stu->delStudentById($id);
    }
?>


<?php include 'inc/header.php';?>
<?php
    if(isset($delstudent)){
        echo $delstudent ;
    }
?> 
<table class="tblone">
	<tr>
	    <th width="10%">Serial</th>
		<th width="28%">Name</th>
		<th width="25%">Email</th>
		<th width="12%">Skill</th>
		<th width="25%">Action</th>
	</tr>

	<?php 
		$getstu = $stu->getAllStudent();
		if($getstu){
		$i=1;
		while($row = $getstu->fetch_assoc()){
	?>
	<tr>
	    <td><?php echo $i++ ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['skill']; ?></td>
		<td>
			<a href="update.php?stuid=<?php echo $row['id']; ?>">Edit</a>
			<a href="?delstudent=<?php echo $row['id']; ?>">Delete</a>
		</td>
	</tr>


	<?php 
			} 
		} else { 
			echo "<p>Data is not available !!</p>";
		} 
	 ?>
</table>	
<a href="create.php">Create</a>
