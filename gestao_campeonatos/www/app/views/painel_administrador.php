<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'administrador') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
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
        <h2 class="text-center">Bem-vindo ao Painel do Administrador</h2>
        <p class="text-center">Aqui você pode gerenciar seu perfil, visualizar seus campeonatos e pontuações.</p>
        
        <!-- Botões de ações -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <a href="criar_campeonatos.php" class="btn btn-info btn-block">Criar Campeonatos</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="adicionar_parametros.php" class="btn btn-success btn-block">Adicionar Parâmetros</a>
            </div>
            <div class="col-md-4 mb-3">
                <a href="inserir_pontuacoes.php" class="btn btn-warning btn-block">Inserir Pontuações</a>
            </div>
        </div>

        <!-- Seção de Campeonatos -->
        <div class="mt-5">
            <h2 class="text-left">Campeonatos</h2>
            <table class="table table-bordered mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Teste</td>
                        <td>2024-01-01</td>
                        <td>2024-01-31</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Seção de Parâmetros -->
        <div class="mt-5">
            <h2 class="text-left">Parâmetros</h2>
            <table class="table table-bordered mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>Nome</th>
                        <th>Ponderação</th>
                        <th>Campeonato</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Teste</td>
                        <td>10</td>
                        <td>Campeonato 1</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Seção de Pontuações -->
        <div class="mt-5">
            <h2 class="text-left">Pontuações</h2>
            <table class="table table-bordered mt-3">
                <thead class="thead-light">
                    <tr>
                        <th>Utilizador</th>
                        <th>Campeonato</th>
                        <th>Parâmetro</th>
                        <th>Pontuação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Utilizador 1</td>
                        <td>Campeonato 1</td>
                        <td>Parâmetro 1</td>
                        <td>100</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2024 Gestão de Campeonatos. Todos os direitos reservados.</small>
        </div>
    </footer>

    <!-- Scripts do Bootstrap e jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
