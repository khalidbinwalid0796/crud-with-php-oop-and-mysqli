<?php 
	include'./classes/Student.php';
?>

<?php 
    //edit the selected student
    if(!isset($_GET['stuid']) || $_GET['stuid'] == NULL){
        echo "<script>window.location = 'index.php';</script>";
        //header("Refresh: 1; url=index.php");	
        //Refresh: 1-->specific page refresh korar jonno
		//Refresh: 0-->current page refresh korar jonno
		//header('location:index.php');
    }else{
        $id = $_GET['stuid'];
    }
    //updated the selected student    
    $stu = new Student();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    	$updatestudent = $stu->studentUpdate($_POST, $id);
    	header('location:index.php');
	}
?>
	

<?php include 'inc/header.php';?>
<?php
    if(isset($updatestudent)){
        echo $updatestudent ;
    }
?>
<?php

    $editData = $stu->getStudentById($id);
    if($editData){
        while ($result = $editData->fetch_assoc()) {
    
?>
<form action="" method="post">
	<table>
		 <tr>
			  <td>Name</td>
			  <td><input type="text" name="name" 
			  value="<?php echo $result['name'] ?>"/></td>
		 </tr>
		 <tr>
			  <td>Email</td>
			  <td><input type="text" name="email"
			  value="<?php echo $result['email'] ?>"/></td>
		 </tr>
		
		 <tr>
			  <td>Skill</td>
			  <td><input type="text" name="skill" 
			  value="<?php echo $result['skill'] ?>"/></td>
		 </tr>
		 <tr>
			  <td></td>
			  <td>
			  <input type="submit" name="submit" value="Update"/>
			  </td>
		 </tr>
	</table>
</form>
<?php } } ?>

<a href="index.php">Go Back</a>

