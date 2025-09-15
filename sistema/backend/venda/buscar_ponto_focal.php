<?php
include '../conexao.php';

//recebendo o id da cidade
$cidade_id = $_POST['cidade_id'];

$ponto_focal = mysqli_query($conexao, "SELECT * FROM ponto_focal 
WHERE id_cidade_fk='$cidade_id' ORDER BY nome");

echo '<option value=""> Selecione </option>';
while($cid = mysqli_fetch_assoc($ponto_focal)){
    echo "<option value='{$cid['id']}'> {$cid['nome']} </option>";
}

?>