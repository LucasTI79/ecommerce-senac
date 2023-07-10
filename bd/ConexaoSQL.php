<?php

function conexao(){//A conexão ficará dentro da função
$hostname = "sqlsrv:Server=10.38.40.194";
$instancia = "";
$porta = 1433;
$dbname= "Database=BDCAFE";
$username = "TI_79";
$pass= "sala21";

//bloco try/catch para tratamento de erros
try {
    $pdo = new PDO( "{$hostname}\\{$instancia},{$porta};{$dbname}", $username,$pass);
    //PDO - PHP Objects - Criação da instância do BD - um retrato do BD neste momento.
     echo "Conectado com Sucesso!";
     return ($pdo);
     }catch(PDOExpection $ex){
        echo "Erro: ". $ex->getMessage();
        }
        }


    ?>
     
