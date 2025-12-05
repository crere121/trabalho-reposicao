<?php 
include "../db.php"; 
session_start();

// CORREÇÃO: Redireciona se o usuário JÁ estiver logado
if(isset($_SESSION['user'])){
    header("Location: ../index.php");
    exit;
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $conn->query("SELECT * FROM usuarios WHERE email='$email'");

    if($sql->num_rows > 0){
        $user = $sql->fetch_assoc();

        if(password_verify($senha, $user['senha'])){
            $_SESSION['user'] = $user['nome'];
            // SOLICITAÇÃO ATENDIDA: Redireciona para a página inicial e encerra a execução
            header("Location: ../index.php");
            exit; 
        } else {
            $erro = "Senha incorreta! Tente novamente."; 
        }
    } else {
        $erro = "Email não encontrado! Verifique o endereço ou cadastre-se."; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login | EEPD-BH</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/css.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="../index.php">EEPD-BH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="cursos.php">Cursos</a></li>
            <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
            <li class="nav-item"><a class="nav-link" href="professores.php">Professores</a></li>
            <li class="nav-item"><a class="nav-link" href="alunos.php">Alunos</a></li>
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item"><a class="nav-link" href="anotacoes.php">Anotações</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Sair (<?= htmlspecialchars($_SESSION['user']) ?>)</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="cadastro.php">Cadastro</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</nav>

<div class="container mt-5">
<a href="../index.php" class="btn btn-secondary back-button">⬅️ Voltar para Início</a>

<h2 class="section-title">Acesso ao Sistema EEPD-BH</h2>

<p class="lead">Entre com suas credenciais para acessar sua área de aluno, ver suas notas e utilizar o sistema de anotações.</p>

<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST" class="p-4 border rounded shadow-sm bg-white">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input class="form-control" id="emailInput" name="email" placeholder="Seu email de cadastro" required>
            </div>
            <div class="mb-3">
                <label for="senhaInput" class="form-label">Senha</label>
                <input class="form-control" id="senhaInput" type="password" name="senha" placeholder="Sua senha" required>
            </div>
            <button class="btn btn-primary w-100 mt-2">Entrar</button>
        </form>
    </div>
</div>

<p class="mt-4 text-center">Não tem cadastro? <a href="cadastro.php">Crie sua conta aqui.</a></p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<footer>
Escola Presidente Dutra - BH<br>
CNPJ: 18.715.599/0001-05<br>
SRE-METROPOLITANA-A<br>
CEP: 31.035-536<br>
Endereço: Rua Carlos tomoyose Nº 2000 - Belo Horizonte/MG<br>
Desenvolvido por Desenvolvimento de Sistemas © Todos os direitos reservados.
</footer>

</body>
</html>