<?php 
include "../db.php";
session_start();

// CORREÇÃO: Redireciona se o usuário JÁ estiver logado
if(isset($_SESSION['user'])){
    header("Location: ../index.php");
    exit;
}

if(isset($_POST['nome'])){
    $n = $_POST['nome'];
    $e = $_POST['email'];
    $s = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Adicionado checagem de e-mail duplicado (melhor prática)
    $check = $conn->query("SELECT id FROM usuarios WHERE email='$e'");
    if($check->num_rows > 0) {
        $erro = "Este email já está cadastrado. Tente fazer login.";
    } else {
        $conn->query("INSERT INTO usuarios (nome,email,senha) VALUES ('$n','$e','$s')");
        $ok = "Cadastro realizado com sucesso! Você já pode fazer login.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cadastro | EEPD-BH</title>
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

<h2 class="section-title">Cadastro de Alunos e Usuários</h2>

<p class="lead">Preencha o formulário abaixo para criar sua conta e ter acesso completo ao sistema, incluindo a área de anotações.</p>

<?php if(isset($ok)) echo "<div class='alert alert-success'>$ok</div>"; ?>
<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form method="POST" class="p-4 border rounded shadow-sm bg-white">
            <h5 class="mb-3 text-primary">Informações de Acesso</h5>
            <input class="form-control mb-3" name="nome" placeholder="Seu Nome Completo" required>
            <input class="form-control mb-3" name="email" placeholder="Seu Melhor Email" required>
            <input class="form-control mb-4" type="password" name="senha" placeholder="Crie uma Senha Forte" required>
            <button class="btn btn-success w-100">Finalizar Cadastro</button>
        </form>
    </div>
</div>

<p class="mt-4 text-center">Já tem uma conta? <a href="login.php">Faça login aqui.</a></p>

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