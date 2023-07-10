<html>
    <head>
    <title> Teste </title>
    <meta charset="utf-8">
    </head>
<body>
<?php
try {
    
$dbcontroller = new DBController();
$rawData = $dbcontroller->executeSelectQuery($query);
$query = $pdo->prepare("select * FROM Siscafebar");
    //-> símbolo usado para chamar um método ou variável de uma classe.
    //prepare - valores para a consulta são passados através de parâmetros.
$query->execute(); //executar a conexão e o comando do BD.
?>
    
<table border="1" width="">
    <tr>
    <th> Código </th>
    <th> Nome </th>
    <th> Telefone </th>
    <th> Email </th>
    <th> Mensagem </th>
    </tr>

<?php
for($i=0; $row = $query->fetch(); $i++){ //fetch - associa cada linha do BD.
?> 
    
<tr>
    <td> <?= $row['Cod_cliente']; ?> </td>
    <td> <?php echo $row['Nome']; ?> </td>
    <td> <?php echo $row['Telefone']; ?> </td>
    <td> <?php echo $row['Email']; ?> </td>
     <td> <?php echo $row['Mensagem']; ?> </td>
</tr>

<?php    
}
unset($pdo); //apagar a variável e liberar a memória do servidor.
unset($query);
?>
    </table>
    </body>
</html>
