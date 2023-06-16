<?php
require_once 'dbf.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hoteistyle.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

    </div><div id="menuc">
        <img src="Hotelivre.png">
        <li><a href="index.html">🠔</a></li>
    </div><br>
    <h3>Reserva</h3>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <?php
    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $quantpessoas = $_POST['quantpessoas'];
        $hotel = $_POST['hotel'];
        $inicio = $_POST['inicio'];
        $fim = $_POST['fim'];
        $pagamento = $_POST['pagamento'];

        $stmt = $pdo->prepare('SELECT COUNT(*)
        FROM tabela_produto WHERE preco = ?');
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $error = 'Já existe um usuário com esse nome.';
        } else {
            
            $stmt = $pdo->prepare('INSERT INTO tabela_produto (nome, telefone, quantpessoas, hotel, inicio, fim, pagamento) VALUES (:nome, :telefone, :quantpessoas, :hotel, :inicio, :fim, :pagamento)');
            $stmt->execute(['nome' => $nome, 'telefone' => $telefone, 'quantpessoas' => $quantpessoas, 'hotel' => $hotel, 'inicio' => $inicio, 'fim' => $fim, 'pagamento' => $pagamento]);

            if ($stmt->rowCount ()) {
                echo '<span>Compra feita com sucesso!</span>';
            } else {
                echo '<span>Erro ao fazer a compra. Tente novamente mais tarde.</span>';
            }
        }
        if (isset($error)) {
            echo '<span>' . $error . '</span>';
        }
    }
    ?>

    <form method="post">

    <label for="nome">Nome:</label>
    <input type="text" name="nome" required></br>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required></br>

    <label for="quantpessoas">Quantidade de pessoas:</label>
    <input type="text" name="quantpessoas" required></br>

    <label for="hotel">Hotel escolhido:</label>
    <input type="text" name="hotel" required></br>

    <label for="inicio">Data para hospedagem</label>
    <input type="date" name="inicio" required></br>

    <label for="fim">Data para o fim da hospedagem</label>
    <input type="date" name="fim" required></br>

    <label for="pagamento">Pagamento em:</label>
    <input type="text" name="pagamento" required></br>
    Cartão...
    <div>
        <button type="submit" name="submit" value="agendar">Reservar</button></br>
        <button><a href="listar.php">Reservas Anteriores</a></button>
    </div>
    
</form>

</div>
</section>

</body>
</html>