<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Campeonatos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Gerir Campeonatos</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="gerir_pontuacoes.php">Gerir Pontuações</a></li>
                    <li class="nav-item"><a class="nav-link" href="classificacoes.php">Classificações</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Gerir Campeonatos</h2>
        <form action="" method="POST" class="mt-4">
            <div class="form-group">
                <label for="nome-campeonato">Nome do Campeonato</label>
                <input type="text" class="form-control" id="nome-campeonato" name="nome-campeonato" required>
            </div>
            <div class="form-group">
                <label for="data-inicio">Data de Início</label>
                <input type="date" class="form-control" id="data-inicio" name="data-inicio" required>
            </div>
            <div class="form-group">
                <label for="data-fim">Data de Fim</label>
                <input type="date" class="form-control" id="data-fim" name="data-fim" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Campeonato</button>
        </form>
    </div>

    <!-- Rodapé -->
    <footer class="bg-light text-center py-3 mt-5">
        <div class="container">
            <small>&copy; 2024 Gestão de Campeonatos. Todos os direitos reservados.</small>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>