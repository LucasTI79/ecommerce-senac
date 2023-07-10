	<?php
	
try{	
			$conn;
			$servidor = "10.38.40.194";
			$instancia = "";
			$porta = 1433;
			$database = "TI_79_LUCASF";
			$usuario = "TI_79";
			$senha = "sala21";
	
		$conn = new PDO( "sqlsrv:Server={$servidor}\\{$instancia},{$porta};Database={$database}", $usuario, $senha );
	
		}  
	catch(Exception $e)  
	{   
		die( print_r( $e->getMessage() ) );   
	}  

	$query = $conn->prepare(" SELECT @@VERSION");
$query->execute();
$resultado = $query->fetchAll();
echo $resultado ['0'] ['0'] ;?>

 <table border="1" width="200">
    <tr>
    <th> Código </th>
    <th> Nome </th>
    <th> Telefone </th>
    <th> Email </th>
    </tr>

<?php
for($i=0; $row = $query->fetch(); $i++){ //fetch - associa cada linha do BD.
?> 
    
<tr>
    <td> <?= $row['Codigo_cliente']; ?> </td>
    <td> <?php echo $row['nome']; ?> </td>
    <td> <?php echo $row['Telefone']; ?> </td>
    <td> <?php echo $row['Email']; ?> </td>
</tr>

<?php    
}
unset($pdo); //apagar a variável e liberar a memória do servidor.
unset($query);
?>
    </table>