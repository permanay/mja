<?php
	
	if (file_exists(dirname(__FILE__)."/../../config/App.php")) { 
        include_once dirname(__FILE__)."/../../config/App.php";
    }
	
    if (!class_exists('Database')) {
	
		/**
		* 
		*/
		class Database
		{

			public function open_connection(){
	            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
				$conn = new mysqli(App::DB_HOST, App::DB_USER, App::DB_PASS, App::DB_DB);

				// Check connection
				if (mysqli_connect_errno())
				{
				    echo "Failed to connect to MySQL: " . mysqli_connect_error();
				    //you need to exit the script, if there is an error
				    exit();
				}

				return $conn;
	        }


			public function close_connection($con){
	            mysqli_close($con);
	        }

	        public static function model($className) {
				if (file_exists(dirname(__FILE__)."/".$className . '.php')) { 
			        include dirname(__FILE__)."/".$className . '.php'; 
			        $model = new $className();
			        return $model; 
			    } 
			    return false; 
		    }

			public function select($field,$table){
				$conn = $this->open_connection();
				$sql = "SELECT ".$field." FROM `".$table."`";
	            $data = mysqli_query($conn,$sql);
	            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
	            $conn = $this->close_connection($conn);
	            return $result;
			}

			public function raw($sql){
				$conn = $this->open_connection();
	            $data = mysqli_query($conn,$sql);
	            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
	            $conn = $this->close_connection($conn);
	            return $result;
			}

			public function selectWhere($field,$table,$where){
				$conn = $this->open_connection();
				$sql = "SELECT ".$field." FROM `".$table."` where ".$where;
	            $data = mysqli_query($conn,$sql);
	            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
	            $conn = $this->close_connection($conn);
	            return $result;
			}

			public function insert($table,$field,$value,$id_insert=false){
				$conn = $this->open_connection();
				$sql = "INSERT INTO `".$table."` (".$field.") VALUES (".$value.");";
	            $data = mysqli_query($conn,$sql);
	            if ($id_insert) {
	            	$result = 0;
		            if ($data) {
		            	$result = mysqli_insert_id($conn);
		            }
	            }else{
	            	$result = false;
		            if ($data) {
		            	$result = true;
		            }	
	            }
	            
	            $conn = $this->close_connection($conn);
	            return $result;
			}

			public function update($table,$value,$where){
				$conn = $this->open_connection();
				$sql = "UPDATE `".$table."` SET ".$value." WHERE ".$where.";";
	            $data = mysqli_query($conn,$sql);
	            $result = false;
	            if ($data) {
	            	$result = true;
	            }
	            $conn = $this->close_connection($conn);
	            return $result;
			}

			public function delete($table,$where){
				$conn = $this->open_connection();
				$sql = "DELETE FROM `".$table."` WHERE ".$where;
				$result = 0;
				try {
				    $data = mysqli_query($conn,$sql);
		            if ($data) {
		            	$result = 1;
		            }
				} catch (mysqli_sql_exception $e) {
				    if ($e->getCode() == '1451') {
				        $result = 2;
				    }
				}
	            
	            $conn = $this->close_connection($conn);
	            return $result;
			}

		}
	}

?>