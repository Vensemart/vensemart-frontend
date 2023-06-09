<?php
/*
This class manage all Database related action or (query)
This class has many mysql database php functions for valida data
*/

if(!class_exists('mysql')){
	
		class mysql{
		
		private $conn;
		public $record;
		public $resultset;
		public $num_rows=0;
		public $sql;
		
		// Establish connection
		public function Connect($host,$username,$password,$database){
			
			try{
				
				$this->conn = @($GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password)) or die('Could not establish connection');
				mysqli_select_db($this->conn, $database) or die('database not selected');
				
			}catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		// Execute query
		public function exe_query($sql){
			
			try{
				
				$this->resultset = mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die($sql.mysqli_error($GLOBALS["___mysqli_ston"]));
				
				if($this->resultset)
					return true;
				else
					return false;
				
			}catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		
		/*
		select record from database
		Param first is query of mysql
		Param second is you want get single record or multi record
		Param third is which format you want fetch record like (row, assoc, array, obj)
		return single array or multi array
		*/
		public function select($query, $single, $record_format) {
			
			try{
				
				$this->exe_query($query);
				$results = array();				
				//Fetch results
				if($this->resultset)
				{
					$this->num_rows=0;
					
					if( strtolower($record_format) == 'array' )
					{
						if($single){
							$results = mysqli_fetch_array($this->resultset);
							$this->num_rows=1;
						}
						else{				
								//Create results object
								while ($row = mysqli_fetch_array($this->resultset)) {
									$results[] = $row;
									$this->num_rows++;
								}
				
							}
					}
					elseif( strtolower($record_format) == 'assoc' )
					{
						if($single){
							$results = mysqli_fetch_assoc($this->resultset);
							$this->num_rows=1;
						}
						else{				
								//Create results object
								while ($row = mysqli_fetch_assoc($this->resultset)) {
									$results[] = $row;
									$this->num_rows++;
								}
				
							}
					}
					elseif( strtolower($record_format) == 'obj' )
					{
						if($single){
							$results = mysqli_fetch_object($this->resultset);
							$this->num_rows=1;
						}
						else{				
								//Create results object
								while ($row = mysqli_fetch_object($this->resultset)) {
									$results[] = $row;
									$this->num_rows++;
								}
				
							}
					}
					elseif( strtolower($record_format) == 'row' )
					{
						if($single){
							$results = mysqli_fetch_row($this->resultset);
							$this->num_rows=1;
						}
						else{				
								//Create results object
								while ($row = mysqli_fetch_row($this->resultset)) {
									$results[] = $row;
									$this->num_rows++;
								}
				
							}
					}
						
					((mysqli_free_result($this->resultset) || (is_object($this->resultset) && (get_class($this->resultset) == "mysqli_result"))) ? true : false);
					return $results;
				}
				
			}catch (Exception $e){
				echo $e->getMessage();
			}
		}
		
		/*
		insert record into table
		Param first is table name 
		Param second is array of insert values and fields (put field name as key in array and value inti value of that field as value)
		*/
		public function insert($table, $insert_array) {
			
			try{
				
				$this->sql="INSERT INTO $table set ";
	
				foreach($insert_array as $key=>$val)
					$this->sql.=$key."='".$this->_escape_real_string($val)."',";
					
				$this->sql=substr($this->sql,0,strlen($this->sql)-1);
				return $this->exe_query($this->sql);
				
							
			}catch(Exception $e){
				$e->getMessage();
			}
		}
		
		/*
		update record into table
		Param first is table name 
		Param second is array of insert values and fields (put field name as key in array and value inti value of that field as value)
		Param third is condition by which you want to update record
		*/
		public function update($table, $update_array, $condition) {
			try{
				
				$this->sql="update $table set ";
				
				foreach($update_array as $key=>$val)
				{
					$this->sql.=$key."='".$this->_escape_real_string($val)."',";
				}
					
				$this->sql=substr($this->sql,0,strlen($this->sql)-1);
				
				$this->sql.=" where $condition";
				
				return $this->exe_query($this->sql);
				
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		/*
		delete record from table
		Param first is table name 
		Param second is condition by which you want to delete record
		*/
		public function delete($table, $condition) {
			try{
				
				$this->sql="DELETE FROM $table where $condition";
				
				return $this->exe_query($this->sql);
				
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}
		
		// get last insert id
		public function last_insert_id(){
			return ((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
		}
		
		// get total numbers of record if fetch from database;
		public function total_record(){
			return $this->num_rows;
		}
		
		// addslashesh before add value into database or fetch from database;
		public function _escape_real_string($val){
			return mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $val);
		}
		
		// retrun true if any table got insertion, updation and deletion;
		public function get_affected_row($rst){
			
			if(mysqli_affected_rows($rst))
				return true;
			else
				return false;
		}
	}
}

?>
