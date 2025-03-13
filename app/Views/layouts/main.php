<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Minha Aplicação' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Minha Aplicação</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Início</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">Sobre</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contato</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        
        <?= $this->renderSection('content') ?>
    
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>Minha Aplicação &copy; <?= date('Y') ?></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>