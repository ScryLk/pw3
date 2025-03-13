<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>

    <h3>Arquivos enviados:</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome do Arquivo</th>
                <th scope="col">Data de Upload</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach (session()->getFlashdata('arquivos') ?? [] as $arquivo) : ?>
                <tr>
                    <th scope="row"><?= $index++ ?></th>
                    <td><a href="<?= base_url('uploads/' . esc($arquivo)) ?>" target="_blank"><?= esc($arquivo) ?></a></td>
                    <td><?= date('d/m/Y H:i:s', filemtime(FCPATH . 'uploads/' . $arquivo)) ?></td>
                    <td>
                        <a href="" class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($perfil = session()->getFlashdata('perfil')) : ?>
                <tr>
                    <th scope="row"><?= $index++ ?></th>
                    <td><a href="<?= base_url('uploads/' . esc($perfil)) ?>" target="_blank"><?= esc($perfil) ?> (Foto de Perfil)</a></td>
                    <td><?= date('d/m/Y H:i:s', filemtime(FCPATH . 'uploads/' . $perfil)) ?></td>
                    <td>
                        <a href="<?= site_url('contato/delete/' . esc($perfil)) ?>" class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
            <?php if ($comprovante_residencia = session()->getFlashdata('comprovante_residencia')) : ?>
                <tr>
                    <th scope="row"><?= $index++ ?></th>
                    <td><a href="<?= base_url('uploads/' . esc($comprovante_residencia)) ?>" target="_blank"><?= esc($comprovante_residencia) ?> (Comprovante de Residência)</a></td>
                    <td><?= date('d/m/Y H:i:s', filemtime(FCPATH . 'uploads/' . $comprovante_residencia)) ?></td>
                    <td>
                        <a href="<?= site_url('contato/delete/' . esc($comprovante_residencia)) ?>" class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif ?>

<div class="container">
    <h2>Contato</h2>
    <p>Entre em contato conosco preenchendo o formulário abaixo:</p>
    <form action="<?= site_url('contato/submit') ?>" enctype="multipart/form-data" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="5" required><?= old('message') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="arquivos">Documento Oficial (PDF):</label>
            <input type="file" name="arquivos[]" multiple>
        </div>
        <div class="mb-3">
            <label for="perfil">Foto de Perfil:</label>
            <input type="file" name="perfil">
        </div>
        <div class="mb-3">
            <label for="comprovante_residencia">Comprovante de Residência (PNG ou JPG):</label>
            <input type="file" name="comprovante_residencia">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<?= $this->endSection() ?>