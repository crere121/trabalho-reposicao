    <?php 
    include "../db.php"; 
    session_start();

    // Redireciona se não estiver logado
    // CRÍTICO: Verificando se a chave 'usuario_id' existe na sessão
    if(!isset($_SESSION['usuario_id'])) { 
        header("Location: login.php");
        exit;
    }

    $usuario_id = $_SESSION['usuario_id'];
    $user_name = $_SESSION['user'];

    // Lógica de adicionar anotação
    if(isset($_POST['titulo']) && isset($_POST['conteudo'])){
        $t = $_POST['titulo'];
        $c = $_POST['conteudo'];
        
        // Inserção usando 'usuario_id', 'lembrete' e 'anotacao'
        $conn->query("INSERT INTO anotacoes (usuario_id, lembrete, anotacao) VALUES ('$usuario_id', '$t', '$c')");
        $msg = "Anotação salva com sucesso!";
    }

    // Lógica de carregar anotações
    $anotacoes_query = $conn->query("SELECT * FROM anotacoes WHERE usuario_id='$usuario_id' ORDER BY data_criacao DESC");
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title>Minhas Anotações | EEPD-BH</title>
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
                <li class="nav-item"><a class="nav-link" href="anotacoes.php">Anotações</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Sair (<?= htmlspecialchars($_SESSION['user']) ?>)</a></li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="container mt-5">
    <a href="../index.php" class="btn btn-secondary back-button">⬅️ Voltar para Início</a>

    <h2 class="section-title">Minhas Anotações Pessoais</h2>

    <p class="lead">Bem-vindo(a), <?= htmlspecialchars($_SESSION['user']) ?>. Aqui você pode gerenciar suas anotações.</p>

    <div class="alert alert-info">
        Esta é a área restrita de anotações. A lógica para salvar e exibir anotações deve ser implementada aqui.
</div>
</div>
    <div class="card p-4 mb-4 shadow-sm">
        <h4 class="card-title">Adicionar Nova Anotação</h4>
        <form method="POST">
            <input class="form-control mb-2" name="titulo" placeholder="Título (Será salvo como Lembrete)" required>
            <textarea class="form-control mb-3" name="conteudo" rows="4" placeholder="Conteúdo da anotação (Será salvo como Anotação)..." required></textarea>
            <button class="btn btn-accent" type="submit">Salvar Anotação</button>
        </form>
</div>

    <h3 class="mt-4">Minhas Anotações Salvas</h3>
    <?php if($anotacoes_query->num_rows > 0): ?>
        <?php while($a = $anotacoes_query->fetch_assoc()): ?>
        <div class="card p-3 mb-3">
            <h4><?= htmlspecialchars($a['lembrete']) ?></h4> 
            <p><?= nl2br(htmlspecialchars($a['anotacao'])) ?></p>
            <small class="text-muted">Criada em: <?= date('d/m/Y H:i', strtotime($a['data_criacao'])) ?></small>
        </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-info">Você ainda não tem anotações salvas. Comece a registrar suas ideias!</div>
    <?php endif; ?>

</div>

<footer>
Escola Presidente Dutra - BH<br>
CNPJ: 18.715.599/0001-05<br>
SRE-METROPOLITANA-A<br>
CEP: 31.035-536<br>
Endereço: Rua Carlos tomoyose Nº 2000 - Belo Horizonte/MG<br>
Desenvolvido por Desenvolvimento de Sistemas © Todos os direitos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/scripts.js"></script>
</body>
</html>