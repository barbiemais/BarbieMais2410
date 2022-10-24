<?php
// Parâmetros para criar a conexão
$servername = "localhost";
$username = "id18746245_idbarbiemais";
$password = "Ijjls1305@ISERJ";
$dbname = "id18746245_barbiemais";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
  die("Você se deu mal: " . $conn->connect_error);
}
?>
