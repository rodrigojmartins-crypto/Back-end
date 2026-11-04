<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$_SESSION['sorteados'] ??= [];

if (isset($_POST['resetar'])) {
    $_SESSION['sorteados'] = [];
    header("Location: sorteio.php");
    exit;
}

$premio = trim($_POST['premio'] ?? '');
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['sortear']) && $premio !== '') {
    $usados = array_column($_SESSION['sorteados'], 'numero');
    if (count($usados) >= 1000) {
        $erro = "Todos os 1000 números já foram sorteados!";
    } else {
        do { $num = random_int(1, 1000); } while (in_array($num, $usados));
        
        array_unshift($_SESSION['sorteados'], [
            'premio' => $premio,
            'numero' => str_pad($num, 4, '0', STR_PAD_LEFT),
            'data'   => date('d/m/Y H:i:s')
        ]);
        $premio = "";
    }
}
$ultimo = $_SESSION['sorteados'][0] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sorteio Rifa</title>
    <link rel="stylesheet" href="disining_sorteio.css">
</head>
<body>
    <main class="container">
        <header>
            <h1>Sorteio da Rifa</h1>
        </header>

        <section class="formulario">
            <form method="POST">
                <input type="text" name="premio" placeholder="Nome do prêmio" value="<?= htmlspecialchars($premio) ?>" required autofocus>
                <button type="submit" name="sortear">Sortear</button>
            </form>
            <?= $erro ? "<p class='erro'>$erro</p>" : "" ?>
        </section>

        <?php if ($ultimo): ?>
            <article class="destaque">
                <header>
                    <span>GANHADOR</span>
                    <h2><?= $ultimo['numero'] ?></h2>
                </header>
                <p>Prêmio: <strong><?= htmlspecialchars($ultimo['premio']) ?></strong></p>
                <footer>
                    <time><?= $ultimo['data'] ?></time>
                </footer>
            </article>
        <?php endif; ?>

        <?php if ($_SESSION['sorteados']): ?>
            <section class="historico">
                <header>
                    <h2>Ganhadores (<?= count($_SESSION['sorteados']) ?>/1000)</h2>
                    <form method="POST"><button name="resetar" class="btn-reset">Zerar</button></form>
                </header>
                <table>
                    <thead>
                        <tr><th>#</th><th>Rifa</th><th>Prêmio</th><th>Data/Hora</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['sorteados'] as $i => $g): ?>
                            <tr>
                                <td><?= count($_SESSION['sorteados']) - $i ?></td>
                                <td><strong><?= $g['numero'] ?></strong></td>
                                <td><?= htmlspecialchars($g['premio']) ?></td>
                                <td><time><?= $g['data'] ?></time></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
    </main>
</body>
</html>