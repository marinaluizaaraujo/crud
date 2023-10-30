<?php
include_once('conexao.php');
$valor=$_POST['valor'];
$forma_pagamento=$_POST[' forma_pagamento'];
$fk_clientes_cpf = $_POST['fk_clientes_cpf '];
$fk_funcionarioos_cpf = $_POST['fk_funcionarioos_cpf']; 

try {
    //somentes usaremos PREPARE na inserção de dados e na atualização de dados 
    $inserir = $conexao->prepare('INSERT INTO venda (valor, forma_pagamento, fk_clientes_cpf, fk_funcionarioos_cpf  ) VALUES (:cpf, :carga_horaria, :endereco, :telefone,:nome )');
    $inserir->execute(
        [
            ':cpf' => $cpf,
            ':carga_horaria' => $carga_horaria,
            ':endereco' => $endereco,
            ':telefone' => $telefone,
            ':nome' => $nome


            ]
    );
    echo $inserir->rowCount();
    header('location:ver_funcionarioos.php');
} catch (PDOException $erro) {
    echo $erro->getMessage();
    header('location:index_funcionarioos.php');
}
;

?>