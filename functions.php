<?php
	
	error_reporting(1);
	
	 	// start session
        session_start();

		global $g_link;
        if( $g_link )
            return $g_link;
        $g_link = new mysqli("localhost", "westerdals", "passord123", "fjerdingen");
        $g_link->set_charset('utf8');
		if ($g_link->connect_errno) {
			return "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
    
    function GetMyConnection($g_link)
    {   
		$sql = "SELECT id, tittel, kategori, bilde, tekst, ingress, avdeling, dato FROM Nyheter";
		$result = $g_link->query($sql);
		
		return $result;
    }
    
    function getNyhet($id, $g_link)
    {   
		$sql = "SELECT id, tittel, kategori, bilde, tekst, ingress, avdeling, dato FROM Nyheter WHERE id = '$id'";
		$result = $g_link->query($sql);
		
		return $result;
    }
    
    function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		
		return $data;
	} 
?>