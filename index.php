<?php include ('messagehelper.php'); ?>	
<?php

	if(!empty($_POST['title'])&&!empty($_POST['message']))
	{
		$message = new stdClass();
		$message->content = $_POST['message'];
		$message->title = $_POST['title'];
		$helper = new helperMessage();
		$helper->sendMessage($message);
		header('Location: index.php');
		exit;
	}
?>
<html>
	<head>
		<title>Messageboard</title>
		<script type="text/javascript" src="script.js"></script>
		<link rel="stylesheet" href="general.css" type="text/css">
	</head>
	<body>
		<header>
			<h1>MessageBoard</h1>
		</header>
		<a href="#" onclick="displayPopup()"><div class="buttonAddMessage">+</div></a>
		<div class="messagesList">
		<div id="popup" class="message">
			<form method="post" action="index.php">
				<input type="text" name="title" placeholder="Title"></input>
				<textarea name="message" placeholder="Content of your Message"></textarea>
				<input type="submit" value="Send"></input>
			</form>
		</div>
			<?php
				$helper = new helperMessage();
				$messages = $helper->getMessages();
				foreach($messages as $oneMessage) {
					echo $helper->displayMessage($oneMessage);
				}
			?>
		</div>
		<footer></footer>
	</body>
</html>