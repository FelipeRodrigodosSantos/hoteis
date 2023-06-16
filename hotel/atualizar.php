<?php
include 'dbf.php';
if (!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM tabela_produto WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment) {
    header('Location: listar.php');
    exit;   
}
$nome = $appointment['nome'];
$telefone = $appointment['telefone'];
$quantpessoas = $appointment['quantpessoas'];
$hotel = $appointment['hotel'];
$inicio = $appointment['inicio'];
$fim = $appointment['fim'];
$pagamento = $appointment['pagamento'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Alterar</title>
</head>
<body>
    
<h1>Alterar Reserva</h1>
<form method="post">
<label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?php echo $nome; ?>" required></br>

<label for="email">Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $telefone; ?>" required></br>

    <label for="quantpessoas">Quantidade de pessoas:</label>
    <input type="text" name="quantpessoas" value="<?php echo $quantpessoas; ?>" required></br>

    <label for="hotel">Hotel escolhido:</label>
    <input type="text" name="hotel" value="<?php echo $hotel; ?>" required></br>

    <label for="inicio">Data para hospedagem</label>
    <input type="date" name="inicio" value="<?php echo $inicio; ?>" required></br>

    <label for="fim">Data para o fim da hospedagem</label>
    <input type="date" name="fim" value="<?php echo $fim; ?>" required></br>

    <label for="pagamento">Pagamento em:</label>
    <input type="text" name="pagamento" value="<?php echo $pagamento; ?>" required></br>
    Cartão...

    <button type="submit">Atualizar</button>
</form>

</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $quantpessoas = $_POST['quantpessoas'];
    $hotel = $_POST['hotel'];
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];
    $pagamento = $_POST['pagamento'];

    //Validação dos dados do formulário aqui
    $stmt = $pdo->prepare('UPDATE tabela_produto SET nome = ?, telefone = ?, quantpessoas = ?, hotel = ?, inicio = ?, fim = ?, pagamento = ? WHERE id = ?');
    $stmt->execute([$nome, $telefone, $quantpessoas, $hotel, $inicio, $fim, $pagamento, $id]);
    header('Location: listar.php');
    exit;
}