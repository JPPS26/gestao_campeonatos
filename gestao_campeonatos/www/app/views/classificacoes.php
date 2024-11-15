<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Classificações</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Painel de Classificações</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="logout.php">Terminar Sessão</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Classificações</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID do Jogador</th>
                    <th>Nome</th>
                    <th>Pontuação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jogador A</td>
                    <td>1500</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jogador B</td>
                    <td>1200</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Jogador C</td>
                    <td>1000</td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>