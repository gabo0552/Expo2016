<!--?php
	require("sql/conexion.php");
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT count(*) FROM reservaciones";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;

    if($data == null)
    {
    	print("<script> alert('Hay una nueva Reservación'); </script>");
    }
?!-->