<?php

	/**
	* Get Data to Mysql
	*/

	class Database
	{
		function __construct()
		{
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$this->conn = mysqli_connect("localhost", "root", "", "skripsi_kepegawaian");

			// Check connection
			if (mysqli_connect_errno())
			{
				return "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		}

		function select($field,$table){
			$sql = "SELECT ".$field." FROM `".$table."`";
            $data = mysqli_query($this->conn,$sql);
            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $result;
		}

		function raw($sql){
            $data = mysqli_query($this->conn,$sql);
            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $result;
		}

		function selectWhere($field,$table,$where){
			$sql = "SELECT ".$field." FROM `".$table."` where ".$where;
            $data = mysqli_query($this->conn,$sql);
            $result = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $result;
		}

		function insert($table,$field,$value){
			$sql = "INSERT INTO `".$table."` (".$field.") VALUES (".$value.");";
            $data = mysqli_query($this->conn,$sql);
            $result = false;
            if ($data) {
            	$result = true;
            }
            return $result;
		}

		function update($table,$value,$where){
			$sql = "UPDATE `".$table."` SET ".$value." WHERE ".$where.";";
            $data = mysqli_query($this->conn,$sql);
            $result = false;
            if ($data) {
            	$result = true;
            }
            return $result;
		}

		function delete($table,$where){
			$sql = "DELETE FROM `".$table."` WHERE ".$where;
            $data = mysqli_query($this->conn,$sql);
            $result = false;
            if ($data) {
            	$result = true;
            }
            return $result;
		}

	}

?>