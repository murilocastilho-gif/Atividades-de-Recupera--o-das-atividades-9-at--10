<?php
require 'conexao.php';

$stmt = $mysqli->prepare("SELECT * FROM produtos");
$stmt->execute();
$resultado = $stmt->get_result();
$produtos = $resultado->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Gestão de Produtos - Mercado</title>
</head>
<body>
    <h1>Estoque do Mercado</h1>
    <a href="cadastrar.php">Cadastrar Novo Produto</a>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Descrição</th>
            <th>Preço (€)</th>
            <th>Qtd.</th>
            <th>Validade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($produtos as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['id']) ?></td>
            <td><?= htmlspecialchars($p['nome']) ?></td>
            <td><?= htmlspecialchars($p['categoria']) ?></td>
            <td><?= htmlspecialchars($p['descricao']) ?></td>
            <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td><?= htmlspecialchars($p['quantidade']) ?></td>
            <td><?= date("d/m/Y", strtotime($p['data_validade'])) ?></td>
            <td>
                <a href="editar.php?id=<?= $p['id'] ?>">Editar</a> | 
                <a href="excluir.php?id=<?= $p['id'] ?>" onclick="return confirm('Tens a certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>