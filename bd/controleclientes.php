<?php

require_once("dbcontroller.php");
require_once("SimpleRest.php");


class ClienteRestBandler extends SimpleRest
    
{
    
    public function pesquisarCliente()
    {
    
    $nome = $_GET["txtpesquisarcliente"];
        
    //$query = " SELECT * FROM Cliente";
        
    $query = " SELECT * FROM Siscafebar WHERE Nome like '%{$nome}%'";  
        
    //echo $query;    
        
    // Instanciar a classe DBController	
			$dbcontroller = new DBController();
			$rawData = $dbcontroller->executeSelectQuery($query);
		
				//Verificar se o retorno está "vazio"
			if(empty($rawData))
			{
				$statusCode = 404;
				$rawData = array('success' => 0);		
			} else {
				$statusCode = 200;
			}
	
			$requestContentType = 'application/json';//$_POST['HTTP_ACCEPT'];
			$this ->setHttpHeaders($requestContentType, $statusCode);
			$result = $rawData;
					
			if(strpos($requestContentType,'application/json') !== false)
			{
				$response = $this->encodeJson($result);
				echo $response;
			}
    
    }
    
      public function encodeJson($responseData) 
	{
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
    
}
    

    
//Se o paramêtro txtpesquisarcliente estiver preenchido, instancia a classe e executa
//o método pesquisarCliente()    
if (isset($_GET["txtpesquisarcliente"])){
    

    $cliente = new ClienteRestBandler();
    $cliente -> pesquisarCliente();
    

    
}
  
?>