<?php 
echo"Metodo Recebido";
echo $_SERVER["REQUEST_METHOD"];

echo"\n\n Dados RECEBIDOS pelo POST:\n";
Print_R($_POST);
?>