<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>OOP CRUD Final</title> -->
</head>
<body>
<?php 
	class Database
	{
		private $db_servername = "localhost";
		private $db_username   = "root";
		private $db_password   = "";
		private $db_name       = "shop_db";

		private $connection    = false;
		private $conn          = "";
		private $result        = array();

		//Function to connect the Database!
		public function __construct()
		{
			if(!$this->connection)
			{
				$this->conn = new mysqli($this->db_servername,$this->db_username,$this->db_password,$this->db_name);
				$this->connection = true;

				if($this->conn->connect_error)
				{
					array_push($this->result,$this->conn->connect_error);
					return false;
				}
			}
			else
			{
				return true;
			}
		}

		//Insert Data into Database!
		public function insert($table,$param=array())
		{
			if($this->tableExists($table))
			{
				$insert_keys = implode(", ",array_keys($param));
				$insert_value = implode("', '",$param);
				$sql = "INSERT INTO $table ($insert_keys) VALUES ('$insert_value')";

				if($this->conn->query($sql))
				{
					array_push($this->result,$this->conn->insert_id);
					return true;
				}
				else
				{
					array_push($this->result,$this->conn->error);
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		//Function to Update Data into Database!
		public function update($table,$param = array(),$where)
		{
			if($this->tableExists($table))
			{
				$args = array();
				foreach ($param as $key => $value) {
					$args[]="  $key = '$value'";
				}

				$sql = "UPDATE $table SET ".implode(", ", $args);
				if($where!=null)
				{
					$sql .= " WHERE $where";
				}
				if($this->conn->query($sql))
				{
					array_push($this->result,$this->conn->affected_rows);
					return true;
				}
				else
				{
					array_push($this->result,$this->conn->error);
					return false;
				}


			}
			else
			{
				return false;
			}
		}

		//Function to Delete Data From Database!
		public function delete($table,$where)
		{
			if($this->tableExists($table))
			{
				$sql = "DELETE FROM $table ";
				if($where!=null)
				{
					$sql .= " WHERE $where";
				}
				if($this->conn->query($sql))
				{
					array_push($this->result,$this->conn->affected_rows);
					return true;
				}
				else
				{
					array_push($this->result,$this->conn->error);
					return false;
				}

			}
			else
			{
				return false;
			}

		}

		//Select Data using RAW QUERY!
		public function sql($sql)
		{
			$query = $this->conn->query($sql);

			if($query)
			{
				if($query->num_rows>0)
				{
					$this->result = $query->fetch_all(MYSQLI_ASSOC);
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		//Select Data From Database!
		public function select($table,$row="*",$join=null,$where=null,$order=null,$limit=null)
		{
			if($this->tableExists($table))
			{
				$sql = "SELECT $row FROM $table ";
				if($join !=null)
				{
					$sql .= " JOIN $join";
				}
				if($where !=null)
				{
					$sql .= " WHERE $where";
				}
				if($order !=null)
				{
					$sql .= " ORDER BY $order";
				}
				if($limit !=null)
				{
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}
					else
					{
						$page = 1;
					}

					$offset = ($page-1)*$limit;
					$sql .= " LIMIT $offset,$limit";
				}

				$query = $this->conn->query($sql);
				if($query)
				{
					if($query->num_rows>0)
					{
						$this->result = $query->fetch_all(MYSQLI_ASSOC);
						return true;
					}
				}
			}
			else
			{
				return false;
			}
		}

		//Pagination 
		public function pagination($table,$join=null,$where=null,$limit=null)
		{
			if($this->tableExists($table))
			{
				if($limit !=null)
				{
					$sql = "SELECT COUNT(*) FROM $table ";
					if($join !=null)
					{
						$sql .= " JOIN $join";
					}
					if($where !=null)
					{
						$sql .= " WHERE $where";
					}

					$query = $this->conn->query($sql);
					$total_records = $query->fetch_array();
					$total_records = $total_records[0];

					$total_pages = ceil($total_records/$limit);

					$url = basename($_SERVER['PHP_SELF']);
					if(isset($_GET['page']))
					{
						$page = $_GET['page'];
					}
					else
					{
						$page = 1;
					}

					$output = "<ul class='pagination'>";
					if($page>1)
					{
						$output .="<li><a href='$url?page=".($page-1)."'>Prev</a></li>";
					}
						if($total_records>$limit)
						{
							for($i=1; $i<=$total_pages;$i++)
							{
								if($i==$page)
								{
									$cls = "class='css'";
								}
								else
								{
									$cls = "";
								}
								$output .="<li><a class='btn-outline-danger bg-dark' $cls href='$url?page=$i'>$i</a></li>";
							}
						}
					if($page<$total_pages)
					{
						$output .="<li><a href='$url?page=".($page+1)."'>Next</a></li>";
					}
					$output .="</ul>";

					return $output;

				}
			}
			else
			{
				return false;
			}
		}

		//Show Result!
		public function getResults()
		{
			$var = $this->result;
			$this->result = array();
			return $var;

		}

		//Check if the Table exists or not!
		private function tableExists($table)
		{
			$sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";

			$tableInDb = $this->conn->query($sql);

			if($tableInDb)
			{
				if($tableInDb->num_rows==1)
				{
					return true;
				}
				else
				{
					array_push($this->result,$table." does not found!");
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		//Function to close the Connection of the Database!
		public function __destruct()
		{
			if($this->connection)
			{
				if($this->conn->close())
				{
					$this->connection = false;
					return true;
				}
			}
			else
			{
				return false;
			}
		}

	}
	?>
</body>
</html>