<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'administrador') {
    header("Location: login.php");
    exit();
}

require_once '../models/Parametro.php'; // Incluindo o modelo de Parâmetro
require_once '../models/Campeonato.php'; // Incluindo o modelo de Campeonato

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_parametro = $_POST['nome_parametro'];
    $ponderacao = $_POST['ponderacao'];
    $id_campeonato = $_POST['id_campeonato'];

    // Instancia o modelo de Parâmetro
    $parametro = new Parametro();

    // Tenta criar o parâmetro
    $success = $parametro->createParametro($nome_parametro, $ponderacao, $id_campeonato);

    if ($success) {
        header("Location: adicionar_parametros.php?success=Parâmetro adicionado com sucesso!");
        exit();
    } else {
        header("Location: adicionar_parametros.php?error=Erro ao adicionar parâmetro. Tente novamente.");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Parâmetros de Pontuação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="painel_administrador.php">Painel do Administrador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="criar_campeonatos.php">Criar Campeonatos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adicionar_parametros.php">Adicionar Parâmetros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inserir_pontuacoes.php">Inserir Pontuações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Terminar Sessão</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container principal -->
    <div class="container mt-5">
        <h2 class="text-center">Adicionar Parâmetros de Pontuação</h2>
        <br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nome_parametro">Nome do Parâmetro</label>
                <input type="text" class="form-control" id="nome_parametro" name="nome_parametro" required>
            </div>
            <div class="form-group">
                <label for="ponderacao">Ponderação</label>
                <input type="number" class="form-control" id="ponderacao" name="ponderacao" required>
            </div>
            <div class="form-group">
                <label for="id_campeonato">Campeonato</label>
                <select class="form-control" id="id_campeonato" name="id_campeonato" required>
                    <option value="">Selecione um Campeonato</option>
                    <?php
                    // Aqui você deve buscar os campeonatos do banco de dados e exibi-los
                    $campeonatoModel = new Campeonato();
                    $campeonatos = $campeonatoModel->getAllCampeonatos(); // Método para buscar todos os campeonatos

                    foreach ($campeonatos as $campeonato) {
                        echo "<option value='{$campeonato['id_campeonato']}'>{$campeonato['nome_campeonato']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Parâmetro</button>
        </form>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt- 3">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>