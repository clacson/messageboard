<?php
	class helperMessage {

		private $PARAM_host = "localhost";
		private $PARAM_dbname = "messageboard";
		private $PARAM_username = "root";
		private $PARAM_password = "";	

		function getMessages()
		{
			$connexion = new PDO('mysql:host='.$this->PARAM_host.';dbname='.$this->PARAM_dbname,$this->PARAM_username,$this->PARAM_password);
			$result = $connexion->query("SELECT * FROM messages ORDER BY id DESC LIMIT 10");
			$result->setFetchMode(PDO::FETCH_OBJ);
			return $result->fetchAll();
		}

		function displayMessage($messageToDisplay)
		{
			$title = '<h3 class="messagetitle">'.$messageToDisplay->title.'</h3>';
			$content = '<p class="messagecontent">'.$messageToDisplay->content.'</p>';
			return '<article class="message">'.$title.$content.'</article>';
		}

		function sendMessage($messageToSend)
		{
			$connexion = new PDO('mysql:host='.$this->PARAM_host.';dbname='.$this->PARAM_dbname,$this->PARAM_username,$this->PARAM_password);
			$result = $connexion->exec("INSERT INTO messages(title,content) VALUES (".$connexion->quote(strip_tags($messageToSend->title)).",".$connexion->quote(strip_tags($messageToSend->content)).")");
			return $result;
		}

	}
