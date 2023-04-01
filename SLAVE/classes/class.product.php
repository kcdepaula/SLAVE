<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='slave';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_product($pname,$desc,$price,$type,$size){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
	
		$data = [
			[$pname,$desc,$price,$type,$size],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_product(product_name, product_description, product_price, product_type, product_size) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
	
		return $id;
	
		}
		public function update_product($pname,$description,$type,$price,$size, $id){
		
			/* Setting Timezone for DB */
			$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
			$NOW = $NOW->format('Y-m-d H:i:s');
	
			$sql = "UPDATE tbl_product SET product_id=:product_id,order_id=:order_id,user_id=:user_id,order_date=:order_date,order_price=:order_price,order_id=:order_id WHERE product_id=:product_id";
	
			$q = $this->conn->prepare($sql);
			$q->execute(array(':product_id'=>$productid, ':order_id'=>$orderid,':user_id'=>$userid,':order_date'=>$NOW,':order_price'=>$orderprice,':product_id'=>$id));
			return true;
		}


	
		public function list_product(){
			$sql="SELECT * FROM tbl_product";
			$q = $this->conn->query($sql) or die("failed!");
			while($r = $q->fetch(PDO::FETCH_ASSOC)){
			$data[]=$r;
			}
			if(empty($data)){
			   return false;
			}else{
				return $data;	
			}
		}
		function get_product_name($id){
			$sql="SELECT product_name FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$prod_name = $q->fetchColumn();
			return $prod_name;
		}
		function get_product_desc($id){
			$sql="SELECT product_description FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$prod_description = $q->fetchColumn();
			return $prod_description;
		}
		function get_product_type($id){
			$sql="SELECT product_id FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$type_id = $q->fetchColumn();
			return $type_id;
		}
	
		function get_product_type_name($id){
			$sql="SELECT product_name FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$type_name = $q->fetchColumn();
			return $type_name;
		}
	
		function get_product_price($id){
			$sql="SELECT product_price FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$prod_price = $q->fetchColumn();
			return $prod_price;
		}
	
		function get_product_image($id){
			$sql="SELECT prod_image FROM tbl_product WHERE product_id = :id";	
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$prod_image = $q->fetchColumn();
			return $prod_image;
		}

		function get_product_size($id){
			$sql="SELECT product_size FROM tbl_product WHERE product_id = :id";
			$q = $this->conn->prepare($sql);
			$q->execute(['id' => $id]);
			$prod_image = $q->fetchColumn();
			return $prod_size;
			
		}
	}
?>