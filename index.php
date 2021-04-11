<!DOCTYPE html>
<html>
<head>
    <Title>Ein neuer Versuch</Title>
</head>
<body>
    <?php
		$db_link = mysqli_connect (
						 "db4free.net:3306", 
						 "virustestshouser", 
						 "wfjkg4P2Na9W5df", 
						 "virustestshopdb"
						);
		$sql = "SELECT * FROM DUAL";

		$db_erg = mysqli_query( $db_link, $sql );
		if ( ! $db_erg )
		{
		echo "FEHLER!";
		  die('Ungültige Abfrage: ' . mysqli_error());
		} else{
		echo "erfolgreich!";
		}
					
    ?>
</body>
</html>