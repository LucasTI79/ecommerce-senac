


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>S!S Café Bar</title>
    <script type="text/javascript">
	function redirect()
	{
		setInterval(function(){
			window.location.href = '../index.html';
		}, 0);
	}
</script>
</head>
<body>
    
    
<?php 
    include "./ConexaoSQL.php"; //inclui o arquivo de conexão
    $conexao= conexao(); //atribui a função conexão à uma variável


        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];

        $query= "INSERT INTO Mensagens (Nome,Telefone,Email,Mensagem) VALUES ('{$nome}','{$telefone}','{$email}','{$mensagem}')";


        $stmt = $conexao->prepare($query);


     if ($stmt->execute()){
        echo "<br>Inserido com Sucesso";
        }else{
            echo "<br>Erro ao inserir";
        }
    echo "<script type='text/javascript'>redirect();</script>";
    
?>
    
    
</body>
</html>


