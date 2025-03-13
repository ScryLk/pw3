<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>

    <h3>Arquivos enviados:</h3>
        <ul>
            <?php foreach (session()->getFlashdata('arquivos') ?? [] as $arquivo): ?>
                <li><?= esc($arquivo) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif ?>


<div class="container">
    <h2>Contato</h2>
    <p>Entre em contato conosco preenchendo o formulário abaixo:</p>
    <form action="<?= site_url('contato/submit') ?>" enctype="multipart/form-data" method="post">
    <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>"  required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="5"   required><?= old('message') ?></textarea>
        </div>

			  <div class="mb-3">
            <label for="arquivos">Arquivos:</label>
            <input type="file" name="arquivos[]" multiple>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?= $this->endSection() ?>