<?php
error_reporting(0);

class con{
    public function dbcon(){
        try {
            return $handler = new PDO ('mysql:host=172.20.10.52;dbname=logistics-website','remote_admin','nikkoz06');
            $handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
    }
} //endClass


class user{
	private $username,$password;
	public function __construct(){
		$this->db = new con();
		$this->db = $this->db->dbcon();
	}

	public function getLoginDetails($username,$password){
	$this->username = $username;
	$this->password = $password;
	}

	public function verifyUser(){
		$query = "SELECT * FROM login_tbl WHERE username=? AND password=? LIMIT 1";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(1,$this->username,PDO::PARAM_STR);
		$stmt->bindParam(2,$this->password,PDO::PARAM_STR);
		$stmt->execute();

		if ($stmt->rowCount()==1) {
			Session_start();
			$_SESSION['successfull_login'] = TRUE;

			while ($rows=$stmt->fetch(PDO::FETCH_OBJ)) {
				$name = $rows->username;
				$_SESSION['jobPortal_userName']=$name;
			}
			echo"<script type=text/javascript>alert('Welcome $name');window.location.href='post-a-job';</script>";
		}else{
			echo"<script type=text/javascript>alert('Sorry wrong Username or Password!');window.location.href='index'</script>";
		}
	}


}


class jobs{
	private $db,$title,$qualifications;
	private $active = "active";

	
	public function __construct(){
		$this->db = new con();
		$this->db = $this->db->dbcon();
	}

	public function viewJobs(){
		$query = "SELECT * FROM title_tbl WHERE status=?";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(1,$this->active,PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount()){
			while ($rows=$stmt->fetch(PDO::FETCH_OBJ)) {
				$title= "<hr style='margin-top:10px;border-top:1px solid #E8CECE'><h4><strong><i class='fa fa-plane'></i> " . $rows->job_name . "</strong></h4>";
				$jobs= "<span style='font-family:arial;font-size:12px'>". nl2br($rows->qualification) . "</span>";
				echo $title.$jobs;
			}
		}
	}

	
	public function getJobDetails($title,$qualifications){
		$this->title = $title;
		$this->qualifications = $qualifications;
	}


	public function addJobs(){
		$sql = "INSERT INTO title_tbl (job_name,qualification,status) VALUES (?,?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(1,$this->title,PDO::PARAM_STR);
		$stmt->bindParam(2,$this->qualifications,PDO::PARAM_STR);
		$stmt->bindParam(3,$this->active,PDO::PARAM_STR);
		$stmt->execute();

		if($stmt->rowCount()==1){
			echo"<script type=text/javascript>alert('Job Successfully Posted');window.location.href='post-a-job';</script>";
		}

	}


	public function jobTitleCount(){
		
		$query = "SELECT job_name FROM title_tbl WHERE status=?";
		$stmt = $this->db->prepare($query);
		$stmt->bindParam(1,$this->active,PDO::PARAM_STR);
		$stmt->execute();

		if($count =$stmt->rowCount()){
			echo "<h3><strong>Job Posted: <span class='badge' style='font-size:inherit;background-color:#337ab7'>$count</span></strong></h3>";
			while ($rows=$stmt->fetch(PDO::FETCH_OBJ)) {
			echo 
				"<ul>
					<li>$rows->job_name</li>
				</ul>
				";
			}
		}
	}


}//endClass

?>


