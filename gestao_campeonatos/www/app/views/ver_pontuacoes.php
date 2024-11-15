<?php
session_start();
if (!isset($_SESSION['id_utilizador']) || $_SESSION['tipo_utilizador'] !== 'utilizador') {
    header("Location: login.php");
    exit();
}

require_once '../models/Pontuacao.php'; // Incluindo o modelo de Pontuação
require_once '../models/Campeonato.php'; // Incluindo o modelo de Campeonato
require_once '../models/Parametro.php'; // Incluindo o modelo de Parâmetro

// Instanciando os modelos
$pontuacaoModel = new Pontuacao();
$campeonatoModel = new Campeonato();
$parametroModel = new Parametro();

// Buscando as pontuações do utilizador logado
$id_jogador = $_SESSION['id_utilizador']; // Supondo que 'id_utilizador' é o ID do jogador
$pontuacoes = $pontuacaoModel->getPontuacoesByJogador($id_jogador); // Método a ser implementado

// Buscando todos os parâmetros
$parametros = $parametroModel->getAllParametros();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Pontuações</title>
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
                        <a class="nav-link" href="editar_perfil.php">Editar Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ver_pontuacoes.php">Ver Pontuações</a>
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
        <h2 class="text-center">Suas Pontuações</h2>
        <br>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Campeonato</th>
                    <?php foreach ($parametros as $parametro): ?>
                        <th><?php echo htmlspecialchars($parametro['nome_parametro']); ?></th>
                    <?php endforeach; ?>
                    <th>Pontuação Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pontuacoes)): ?>
                    <?php
                    // Agrupando pontuações por campeonato
                    $pontuacoesPorCampeonato = [];
                    foreach ($pontuacoes as $pontuacao) {
                        $pontuacoesPorCampeonato[$pontuacao['id_campeonato']][] = $pontuacao;
                    }
                    ?>
                    <?php foreach ($pontuacoesPorCampeonato as $id_campeonato => $pontuacoes): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($campeonatoModel->getCampeonatoById($id_campeonato)['nome_campeonato']); ?></td>
                            <?php
                            // Inicializando as pontuações para cada parâmetro
                            $pontuacaoTotal = 0;
                            $pontuacaoPorParametro = [];
                            foreach ($parametros as $parametro) {
                                $pontuacaoPorParametro[$parametro['id_parametro']] = 0;
                            }

                            // Somando as pontuações
                            foreach ($pontuacoes as $pontuacao) {
                                $pontuacaoPorParametro[$pontuacao['id_parametro']] += $pontuacao['pontuacao'];
                                $pontuacaoTotal += $pontuacao['pontuacao'];
                            }

                            // Exibindo as pontuações por parâmetro
                            foreach ($parametros as $parametro) {
                                echo '<td>' . htmlspecialchars($pontuacaoPorParametro[$parametro['id_parametro']]) . '</td>';
                            }
                            ?>
                            <td><?php echo htmlspecialchars($pontuacaoTotal); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="<?php echo count($parametros) + 2; ?>" class="text-center">Nenhuma pontuação encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>