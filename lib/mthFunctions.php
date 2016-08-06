<?php

	function creartabla(){
		$id = 1;
		$conn = mysqli_connect('localhost','root','','practicas');
		$sql = "SELECT * FROM usuario WHERE id_user = '".$id."'";
		$result = mysqli_query($conn,$sql);
		echo "
			<table border = 1 cellspacing = 1 cellpadding = 1>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Edad</th>
				</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "
				<tr>
					<td>".$row[0]."</td>
					<td>".$row[1]."</td>
					<td>".$row[2]."</td>
					<td>".$row[3]."</td>
				</tr>";
		}
		echo "</table>";
	}

?>