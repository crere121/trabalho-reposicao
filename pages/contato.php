<?php 
include "../db.php";
session_start();

if(isset($_POST['nome'])){
    $n = $_POST['nome'];
    $e = $_POST['email'];
    $m = $_POST['mensagem'];

    $conn->query("INSERT INTO contato (nome,email,mensagem) VALUES ('$n','$e','$m')");
    $msg = "Mensagem enviada com sucesso! Em breve, nossa equipe entrará em contato."; 
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Contato | EEPD-BH</title>
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

<h2 class="section-title">Fale Conosco</h2>

<p class="lead">Tem dúvidas sobre nossos cursos, matrículas ou parcerias? Envie-nos uma mensagem e retornaremos o mais breve possível. Se preferir, visite nossa escola!</p>

<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>

<div class="row">
    <div class="col-lg-8">
        <form method="POST" class="p-4 border rounded shadow-sm bg-white">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input class="form-control" id="nome" name="nome" placeholder="Seu nome completo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" placeholder="Seu melhor e-mail para contato" required>
            </div>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Digite sua mensagem aqui..." required></textarea>
            </div>
            <button class="btn btn-primary w-100">Enviar Mensagem</button>
        </form>
    </div>
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card p-4 bg-light h-100 border-success" style="border-left: 5px solid var(--accent-color);">
            <h5 class="card-title text-success">Informações de Contato</h5>
            <p><strong>Endereço:</strong> Rua xxxx Nº xxxx - Belo Horizonte/MG</p>
            <p><strong>Telefone:</strong> (31) !A registrar!</p>
            <p><strong>Horário:</strong> Segunda a Sexta, das 8h às 18h</p>
            <hr>
            <small class="text-muted">Estamos localizados próximos à estação de metrô.</small>
        </div>
    </div>
</div>

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