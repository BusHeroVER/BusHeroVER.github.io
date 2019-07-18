<?php
	include_once('item.php');
	class MessageBoard extends DB{
		var $message = array();

		function __construct(){
			parent::__construct();
			$this->receiveMessage();
			$this->loadData();
			$this->showAllMessage();
			$this->showFrom();
		}
		function receiveMessage(){
			if(count($_POST) == 2){
				$this->saveData($_POST[ 'userName' ],  date("Y/m/d", time()), $_POST[ 'content' ]);
			}
		}
		function saveData($u, $t, $c){
			$query = "INSERT INTO `a;;_message`(`name`, `time`, `content`) VALUE ('".$u."', '".$t."', '".$c."')";
			mysqli_query($this->database, $query);
		}
		function loadData(){
			$query = "SELECT * FROM `a;;_message`";
			$result = mysqli_query($this->database, $query);

			while($row = mysqli_fetch_array($result)){
				$temp = new Message($row['name'], $row['time'], $row['content']);
				array_push($this->message, $temp);
			}

			
		}
		function showAllMessage(){
			foreach($this->message as $m){
				$m->show();
			}
		}
		function showFrom(){
			echo "<form action='' method='POST' >";
			echo "Nmae : "."<input type = 'text' name='userName'>"."<br>";
			echo "Content : "."<input type = 'text' name='content' >";
			echo "<input type='submit' >";
			echo "</form>";
		}
	}
	$mb = new MessageBoard();
?>