<?php

	class Message{
		var $name;
		var $time;
		var $content;

		function __construct($n, $t, $c){
			$this->name = $n;
			$this->time = $t;
			$this->content = $c;
		}
		function show(){
			echo "Name : ".$this->name."<br>";
			echo "Time : ".$this->time."<br>";
			echo "Content : ".$this->content."<br>";
			echo "=============================="."<br>";
		}
	}
//$m = new Message("apple", "2019-7-20", "apple is dog");
//$m->show();

//var_dump($m);
class DB{
	var  $database = null;
	
	function __construct(){
		$dbhost = "localhost";
		$account = "user";
		$password = "0211";
		
		$this->database = mysqli_connect($dbhost, $account, $password);
		
		if($this->database){
			//echo "DB connected.";
		}else{
			//echo "DB connect fail.";
		}
		$result = mysqli_select_db($this->database, "db_message");
		if($result){
			//echo "DB select success.";
		}else{
			//echo "DB select fail.";
		}
	}
	function __destruct(){
		mysqli_close($this->database);
	}
}
//$db = new DB;
?>