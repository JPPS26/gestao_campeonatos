<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'administrador') {
    header("Location: login.php");
    exit();
}

require_once '../models/Utilizador.php'; // Incluindo o modelo de Utilizador
require_once '../models/Campeonato.php'; // Incluindo o modelo de Campeonato
require_once '../models/Parametro.php'; // Incluindo o modelo de Parâmetro
require_once '../models/Pontuacao.php'; // Incluindo o modelo de Pontuação

// Instanciando os modelos
$utilizadorModel = new Utilizador();
$campeonatoModel = new Campeonato();
$parametroModel = new Parametro();
$pontuacaoModel = new Pontuacao();

// Processando o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se 'id_campeonato' está definido
    if (isset($_POST['id_campeonato'])) {
        $id_campeonato = $_POST['id_campeonato'];
    } else {
        header("Location: inserir_pontuacoes.php?error=Campeonato não selecionado.");
        exit();
    }

    // Captura outros dados do formulário
    $id_utilizador = $_POST['id_utilizador'];
    $id_parametro = $_POST['id_parametro'];
    $pontuacao = $_POST['pontuacao'];

    // Tenta inserir a pontuação
    $success = $pontuacaoModel->createPontuacao($id_utilizador, $id_campeonato, $id_parametro, $pontuacao);

    if ($success) {
        header("Location: inserir_pontuacoes.php?success=Pontuação inserida com sucesso!");
        exit();
    } else {
        header("Location: inserir_pontuacoes.php?error=Erro ao inserir pontuação. Tente novamente.");
        exit();
    }
}

// Buscando utilizadores, campeonatos e parâmetros para o formulário
$utilizadores = $utilizadorModel->getAllUtilizadores(); // Método para buscar todos os utilizadores
$campeonatos = $campeonatoModel->getAllCampeonatos(); // Método para buscar todos os campeonatos
$parametros = $parametroModel->getAllParametros(); // Método para buscar todos os parâmetros
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Pontuações</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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

    <div class="container mt-5">
        <h2 class="text-center">Inserir Pontuações</h2>
        <br>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_utilizador">Utilizador</label>
                <select class="form-control" id="id_utilizador" name="id_utilizador" required>
                    <option value="">Selecione um Utilizador</option>
                    <?php foreach ($utilizadores as $utilizador): ?>
                        <option value="<?php echo $utilizador['id_utilizador']; ?>"><?php echo $utilizador['nome_completo']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_campeonato">Campeonato</label>
                <select class="form-control" id="id_campeonato" name="id_campeonato" required>
                    <option value="">Selecione um Campeonato</option>
                    <?php foreach ($campeonatos as $campeonato): ?>
                        <option value="<?php echo $campeonato['id_campeonato']; ?>"><?php echo $campeonato['nome_campeonato']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_parametro">Parâmetro</label>
                <select class="form-control" id="id_parametro" name="id_parametro" required>
                    <option value="">Selecione um Parâmetro</option>
                    <?php foreach ($parametros as $parametro): ?>
                        <option value="<?php echo $parametro['id_parametro']; ?>"><?php echo $parametro['nome_parametro']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pontuacao">Pontuação</label>
                <input type="number" class="form-control" id="pontuacao" name="pontuacao" required>
            </div>
            <button type="submit" class="btn btn-primary">Inserir Pontuação</button>
        </form>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger mt-3"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>