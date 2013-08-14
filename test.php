<html>
<body>
	<?php echo "PHP test"; ?>
	<?php
		$db = mysql_connect("127.0.0.1", "root", "jiajiangye"); 
		if(!$db) echo "Can't connect database.<br/>"; 
		else echo "<br/>Connected database.<br/>"; 
	?>
	</body>
</html>