<?php 
include "../db.php"; 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Alunos | EEPD-BH</title>
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

<h2 class="section-title">Nossos Alunos</h2>

<p class="lead">Conheça os estudantes que fazem parte da comunidade EEPD-BH, futuros líderes em diversas áreas da tecnologia e indústria.</p>

<div class="row">
<?php
$q = $conn->query("SELECT * FROM alunos ORDER BY nome ASC");

while($a = $q->fetch_assoc()):
?>
<div class="col-md-6 col-lg-4 mb-4">
    <div class="card p-3 h-100">
        <h5 class="card-title text-primary"><?= htmlspecialchars($a['nome']) ?></h5>
        <p class="card-text">
            <strong>Turma:</strong> <?= htmlspecialchars($a['turma']) ?>
        </p>
    </div>
</div>
<?php endwhile; ?>
</div>

<?php if($q->num_rows == 0): ?>
    <div class="alert alert-info mt-4">Nenhum aluno cadastrado no momento.</div>
<?php endif; ?>

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