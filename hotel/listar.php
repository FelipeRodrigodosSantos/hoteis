<?php include 'dbf.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reservas realizadas</title>
</head>
<body class="listar">
    <h1>Reservas realizadas</h1>
    
<?php
$stmt = $pdo->query('SELECT * FROM tabela_produto');
$cliente = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($cliente) == 0) {
    echo '<p>Nenhum pedido feito</p>';
} else {
    echo '<table border="1">';
    echo '<thead><tr><th>Nome</th><th>Telefone</th><th>Quantpessoas</th><th>Hotel</th><th>Inicio</th><th>Fim</th><th>Pagamento</th><th colspan="3">Opções</th></tr></thead>';
    echo '<tbody>';

    foreach ($cliente as $clientes) {
        echo '<td>' . $clientes['nome'] . '</td>';
        echo '<td>' . $clientes['telefone'] . '</td>';
        echo '<td>' . $clientes['quantpessoas'] . '</td>';
        echo '<td>' . $clientes['hotel'] . '</td>';
        echo '<td>' . date('d/m/y', strtotime($clientes['inicio'])) . '</td>';
        echo '<td>' . date('d/m/y', strtotime($clientes['fim'])) . '</td>';
        echo '<td>' . $clientes['pagamento'] . '</td>';
        echo '<td><a style="color:black;" href="atualizar.php?id=' . $clientes['id'] . '">Alterar</a></td>';
        echo '<td><a style="color:black;" href="deletar.php?id=' . $clientes['id'] . '">Cancelar</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
?>
<form method="post" action="reserva.php">
    <button type="submit" >Voltar</button>
</form>

</body>
</html>