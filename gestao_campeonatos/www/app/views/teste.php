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
    <title>Painel de Administração</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Painel de Administração</h1>

        <!-- Seção de Campeonatos -->
        <h2>Campeonatos</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>teste</td>
                        <td>teste</td>
                        <td>teste</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
            </tbody>
        </table>

        <!-- Seção de Parâmetros -->
        <h2>Parâmetros</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>teste</td>
                        <td>teste</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">Editar</a>
                            <a href="" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
            </tbody>
        </table>

        <!-- Seção de Pontuações -->
        <h2>Pontuações</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Jogador</th>
                    <th>ID Campeonato</th>
                    <th>Pontuação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="">Editar</a>
                            <a href="">Excluir</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>