<?php 
	//include_once ('../db/Database.php');
	//C:\xampp\htdocs\crud-with-php-oop-and-mysqli\classes
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath. '/../db/Database.php');
	include_once ($filepath. '/../helpers/Format.php');
?>

<?php
class Student {
	private $db;
	private $fm;

	public function __construct() {
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function studentInsert($data){
		$name = $this->fm->validation($data['name']);
		$email = $this->fm->validation($data['email']);
		$skill = $this->fm->validation($data['skill']);
		//mysqli_real_escape_string-->removes any special characters & takes two parameter
		$name = mysqli_real_escape_string($this->db->link, $data['name']); 	
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$skill = mysqli_real_escape_string($this->db->link, $data['skill']);

		/***
		 * 
		 * | -> bitwise or
		 * || -> boolean or/logical or
		 * 5 | 3 is 0101 OR 0011 which is 0111 which is 7, 
		 * whereas True || False is True and False || False is False.
		 * 
		 * ***/


	    if($name == "" || $email == "" || $skill == ""){
    		$msg = "Field must not be emplty !";
			return $msg;

	    } else{
			$sql = "insert into user(name,email,skill) values('$name','$email','$skill')";
			$studentinsert = $this->db->insert($sql);
			if($studentinsert) {
				$msg = "Student inserted successfully.";
				return $msg;
			} else{
				$msg = "Student not inserted.";
				return $msg;				
			}
		}		
	}

	public function getAllStudent(){
		$sql = "select * from user";
		$result = $this->db->select($sql);
		return $result;
	}

	public function getStudentById($id){
		$sql = "select * from user where id = $id";
		$result = $this->db->select($sql);
		return $result;
	}

	public function studentUpdate($data, $id){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);		
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$skill = mysqli_real_escape_string($this->db->link, $data['skill']);

		if($name == "" || $email == "" || $skill == "") {
			$msg = "Field field must not emplty !";
			return $msg;
		} else{
			$sql = "update user set name = '$name', email = '$email',skill = '$skill' where id = $id";		
			$updatestudent = $this->db->update($sql);
			if($updatestudent) {
				$msg = "Student updated successfully.";
				return $msg;
			} else{
				$msg = "Student not updated.";
				return $msg;				
			}
	}
}

	public function delStudentById($id){
		$sql = "delete from user where id = $id";
		$delstudent = $this->db->delete($sql);
		if($delstudent) {
			$msg = "Student deleted successfully.";
				return $msg;
			} else{
				$msg = "Student not deleted.";
				return $msg;				
			}
		}	
}	
?>