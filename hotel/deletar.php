<?php
include 'dbf.php';

if (!isset($_GET['id'])) {
    header ('Location: listar.php');
    exit;
}
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tabela_produto WHERE id = ?');
$stmt->execute ([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('DELETE FROM tabela_produto WHERE id = ?');
    $stmt->execute([$id]);

    header('Location: listar.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cancelamento</title>
</head>
<body>
    <h1>Cancelamento</h1>
    <p>Tem certeza que deseja cancelar a sua reserva <?php echo $appointment ['nome']; ?>?</p>
    <p>Ao cancelar sua reserva voce pode perder a vaga no hotel, tem certeza que deseja continuar ?</p>
    <form method="post">
        <button type="submit">Sim</button>
        <a href="listar.php">Não</a>
</form>
</body>
</html>