<?php
include "../connect_mysql.php";

if(!$conexao){
  echo "Erro: Não foi feita a conexão com o banco de dados. Tente novamente.";
}

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$datanascimento = $_POST['datanascimento'];

$sql="INSERT INTO usuario VALUES ";
$sql .="('$nome','$senha','$email','$telefone','$cpf','$datanascimento', '0')";
$resultado = mysqli_query ($conexao,$sql);

if($resultado)
{
  echo "Dados inseridos com sucesso.";
  exit;
}

else
{
  echo "Erro ao inserir dados.";
  exit;
}

?>