<?php 
include "db.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>EEPD-BH | Escola Presidente Dutra</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/css.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">EEPD-BH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="pages/cursos.php">Cursos</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/blog.php">Blog</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/contato.php">Contato</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/professores.php">Professores</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/alunos.php">Alunos</a></li>
            <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item"><a class="nav-link" href="pages/anotacoes.php">Anotações</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/logout.php">Sair (<?= htmlspecialchars($_SESSION['user']) ?>)</a></li>
            <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="pages/login.php">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/cadastro.php">Cadastro</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
</nav>

<?php
$dir = "assets/img";
$imgs = array_diff(scandir($dir), ['.', '..']);
shuffle($imgs);
$imgs = array_slice($imgs, 0, 8);
?>

<div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-inner">
<?php
$active = true;
foreach ($imgs as $img):
?>
<div class="carousel-item <?= $active ? 'active' : '' ?>">
    <img src="assets/img/<?= $img ?>" class="d-block w-100">
</div>
<?php
$active = false;
endforeach;
?>
</div>
</div>

<section class="container mt-5 animar">

    <div class="main-title-container">
        <h1 class="main-school-title">Escola Presidente Dutra - BH</h1>
        <p class="lead text-secondary">Sua porta de entrada para o mercado de trabalho de Alta Tecnologia e Inovação.</p>
    </div>
    <h2 class="section-title">Nossa História, Visão e Compromisso com o Futuro</h2>
    <p class="lead">
    A Escola Estadual Presidente Dutra (EEPD-BH) é referência em ensino técnico e formação profissional,
    oferecendo cursos de excelência e preparando alunos para o mercado de trabalho.
    Fundada com o propósito de transformar vidas por meio da educação, a escola se destaca pela dedicação e qualidade no ensino.
    </p>
    <p>
    Com mais de 30 anos de história, a EEPD-BH investe continuamente em tecnologia e na capacitação do seu corpo docente para garantir que nossos alunos estejam sempre à frente. Nosso foco é a empregabilidade e o desenvolvimento integral, formando cidadãos competentes e prontos para os desafios do século XXI.
    </p>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card p-3 h-100">
                <h5 class="text-primary">Missão</h5>
                <p>Oferecer educação profissional de excelência, alinhada às demandas tecnológicas do mercado.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 h-100">
                <h5 class="text-primary">Visão</h5>
                <p>Ser reconhecida como a principal escola técnica de Belo Horizonte e região, impulsionando a inovação.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 h-100">
                <h5 class="text-primary">Valores</h5>
                <p>Qualidade, Inovação, Ética e Compromisso com o Sucesso do Aluno.</p>
            </div>
        </div>
    </div>
</section>

<footer>
Escola Presidente Dutra - BH<br>
CNPJ: 18.715.599/0001-05<br>
SRE-METROPOLITANA-A<br>
CEP: 31.035-536<br>
Endereço: Rua Carlos tomoyose Nº 2000 - Belo Horizonte/MG<br>
Desenvolvido por Desenvolvimento de Sistemas © Todos os direitos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>