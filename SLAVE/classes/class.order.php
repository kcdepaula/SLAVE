<?php
class order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='slave';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_order($oname, $quant, $pname) {
        /* Setting Timezone for DB */
        $NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
        $NOW = $NOW->format('Y-m-d H:i:s');

        $data = [
            $oname, $quant, $pname, $NOW, $NOW
        ];
        $stmt = $this->conn->prepare("INSERT INTO tbl_order(customer_name, quantity, product_name, order_date_added, order_time_added) VALUES (?, ?, ?, ?, ?)");
        try {
            $this->conn->beginTransaction();
            $stmt->execute($data);
            $id = $this->conn->lastInsertId();
            $this->conn->commit();
        } catch (Exception $e) {
            $this->conn->rollback();
            throw $e;
        }

        return $id;
    }
	public function list_order(){
		$sql="SELECT * FROM tbl_order";
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
	public function list_order_search($keyword) {
        $q = $this->conn->prepare('SELECT * FROM `tbl_order` WHERE `customer_name` LIKE ?');
        $q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
        $q->execute();
        
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $r;
        }
        
        if (empty($data)) {
            return false;
        } else {
            return $data;
        }
    }

	function get_customer_name($id){
		$sql="SELECT customer_name FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$customer_name = $q->fetchColumn();
		return $customer_name;
	}
	function get_quantity($id){
		$sql="SELECT quantity FROM tbl_order WHERE order_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$quantity = $q->fetchColumn();
		return $quantity;
	}
	function get_receive_amount($id){
		$sql="SELECT rec_amount FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$type_id = $q->fetchColumn();
		return $type_id;
	}
	function get_receive_save($id){
		$sql="SELECT rec_saved FROM tbl_receive WHERE rec_id = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_saved = $q->fetchColumn();
		return $rec_saved;
	}
	public function list_receive_items($id){
		$sql="SELECT * FROM tbl_receive_items WHERE rec_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC))
		{
			$data[]=$r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}
	function getallorders ($id){
		$sql= "SELECT * FROM tbl_order WHERE order_id =id";
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$rec_saved = $q->fetchColumn();
		return $rec_saved;	
	}
	
	public function new_receive_item($recid,$prodid,$qty){
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$data = [
			[$recid,$prodid,$qty],
		];
		$stmt = $this->conn->prepare("INSERT INTO tbl_receive_items(rec_id, prod_id, rec_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}

	public function save_receive_items($id){
		
		/* Setting Timezone for DB */
		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		$status = 1;
		$sql = "UPDATE tbl_receive SET rec_saved=:rec_saved WHERE rec_id=$id";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':rec_saved'=>$status));
		return true;
	}


	public function save_to_inventory($id){
		$sql="SELECT * FROM tbl_receive_items WHERE rec_id=$id";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		$stmt = $this->conn->prepare("INSERT INTO tbl_product_inv(rec_id, prod_id, prod_qty) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row){
				extract($row);
				$stmt->execute(array($rec_id,$prod_id,$rec_qty));
			}
			//$id= $this->conn->lastInsertId();
			$this->conn->commit();
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return true;
	}
}