<?php

class Todo extends DB
{

	function __construct(DB $conn)
	{
		$this->conn = $conn->conn;
	}

public function all_data (){
	$sql = "SELECT * FROM todos";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_obj);

}
public function edit($id){
	$sql = "SELECT * FROM todos WHERE id =".$id;
	$stmt = $this->conn->prepare($sql);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_obj);
}
public function insert(){
	$sql ="INSERT INTO ('todos', 'author', 'status') VALUES (:todos:author, :status)";
	$stmt =$this->conn->prepare($sql);
	$stmt->bindValue(':todos', $todos);
	$stmt->bindValue(':author', $author);
	$stmt->bindValue(':status', $status);
	$stmt->execute();
	return $stmt;


}

public function update($todos, $author, $status, $id){
	$sql ="UPDATE todos SET todo = :todo, author = :author, status = :status WHERE id = :id";
	$stmt =$this->conn->prepare($sql);
	$stmt->bindValue(':id', $id);
	$stmt->bindValue(':todos', $todos);
	$stmt->bindValue(':author', $author);
	$stmt->bindValue(':status', $status);
	$stmt->execute();
	return $stmt;

}

public function delete($todos, $author, $status, $id){
	$sql ="DELETE FROM todos  WHERE id = :id";
	$stmt =$this->conn->prepare($sql);
	$stmt->bindValue(':id', $id);
	$stmt->execute();
	return $stmt;
}
}