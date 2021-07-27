<?php
    include'./classes/Student.php';
    $stu = new Student();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        //when multiple variable	
        $studentinsert = $stu->studentInsert($_POST);

        //when single or some variable
        //$name   = $_POST['name'];
        //$studentinsert = $brand->studentInsert($name);
    }
?>
	


<?php include 'inc/header.php';?>
    <?php
        if(isset($studentinsert)){
            echo $studentinsert ;
        }
    ?> 
	<form action="create.php" method="post">
		<table>
			<tr>
				<td>Name</td>
				<td><input type="text" name="name" placeholder="Please enter name"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" placeholder="Please enter email"/></td>
			</tr>
				
			<tr>
				<td>Skill</td>
				<td><input type="text" name="skill" placeholder="Please enter Skill"/></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit"/>
					<input type="reset" Value="Reset" />
				</td>
			</tr>
				
		</table>
	</form>
	<a href="index.php">Go Back</a>

