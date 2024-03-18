<?= $this->extend('templates/template') ?>
<?= $this->section('conteudo') ?>
<style>
    .navegacao_filtro li {
        list-style-type: none;

    }

    .navegacao_filtro {
        position: fixed;
        padding: 20px;
        width: 200px;
        height: calc(100vh - 56px);
        border-right: 1px solid #000;
    }

    .body_conteudo {
        width: calc(100vw - 200px);
        margin-left: 200px;
    }
</style>
<div class="body d-flex">
    <nav class="d-flex flex-column navegacao_filtro">
        <ul>
            <li>
                <h3>Filtros</h3>
            </li>
        </ul>
    </nav>
    <div class="body_conteudo">
        <div style="height: 200vh;">a</div>
    </div>
</div>
<script>
    $(document).ready(function() {

    })
</script>
<?= $this->endSection() ?>