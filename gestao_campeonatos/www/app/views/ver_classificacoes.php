<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'utilizador') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Classificações</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="painel_utilizador.php">Painel do Utilizador</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ver_pontuacoes.php">Ver Pontuações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_perfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_classificacoes.php">Ver Classificações</a>
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
        <h2 class="text-center">Ver Classificações</h2>

        <form action="" method="POST" class="mb-4">
            <div class="form-group">
                <label for="id_campeonato">Selecione um Campeonato</label>
                <select class="form-control" id="id_campeonato" name="id_campeonato" required>
                    <option value="">Selecione um Campeonato</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ver Classificações</button>
        </form>
        <br>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Posição</th>
                        <th>Utilizador</th>
                        <th>Parâmetro 1</th>
                        <th>Parâmetro 2</th>
                        <th>Pontuação Total</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>1º</td>
                            <td>user</td>
                            <td>33</td>
                            <td>10</td>
                            <td>100</td>
                        </tr>
                </tbody>
            </table>
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