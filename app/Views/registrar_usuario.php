<?= $this->extend('templates/template') ?>
<?= $this->section('conteudo') ?>
<style>
    .corpo_formulario {
        margin: 30px 130px 0 130px;
        padding: 10px 15px 10px 10px;
        box-shadow: 0 0 5px 5px #b2b2ba;
        border-radius: 5px;
    }

    h1 {
        text-align: center;
    }

    .margin_right {
        padding-right: 5px !important;
    }
</style>
<div class="corpo_formulario">
    <form>
        <h1>Cadastre-se</h1>
        <div class="mb-3 d-flex">
            <div class="col-6 margin_right">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" aria-describedby="nomeHelp">
            </div>
            <div class="col-6">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="phone" class="form-control" id="telefone" aria-describedby="telefoneHelp">
            </div>
        </div>
        <div class="mb-3 d-flex">
            <div class="col-6 margin_right">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="col-6">
                <label for="email_conf" class="form-label">Confirmar Email:</label>
                <input type="email" class="form-control" id="email_conf" aria-describedby="emailHelp">
            </div>
        </div>
        <div id="emailHelp" class="form-text">Nós nunca compartilharemos seu endereço de email com ninguém.</div>
        <div class="mb-3 d-flex">
            <div class="col-6 margin_right">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha">
            </div>
            <div class="col-6">
                <label for="senha_conf" class="form-label">Confirmar Senha:</label>
                <input type="password" class="form-control" id="senha_conf">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button id="botao_cadastro" type="button" class="btn btn-primary" onclick="cadastrar()">Cadastrar</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#telefone").mask('(00) 00000-0000')
    })

    function cadastrar() {
        var nome = $("#nome").val();
        var telefone = $("#telefone").val();
        var email = $("#email").val();
        var senha = $("#senha").val();
        var email_conf = $("#email_conf").val();
        var senha_conf = $("#senha_conf").val();

        if (nome == '') {
            $("#nome").addClass('borda_erro')
            return;
        }
        $("#nome").removeClass('borda_erro')

        if (telefone == '') {
            $("#telefone").addClass('borda_erro')
            return;
        }
        $("#telefone").removeClass('borda_erro')

        if (email !== email_conf || email == '' || email_conf == '') {
            $("#email").addClass('borda_erro')
            $("#email_conf").addClass('borda_erro')
            return;
        }

        $("#email").removeClass('borda_erro')
        $("#email_conf").removeClass('borda_erro')

        if (senha !== senha_conf || senha == '' || senha_conf == '') {
            $("#senha").addClass('borda_erro')
            $("#senha_conf").addClass('borda_erro')
            return;
        }

        $("#senha").removeClass('borda_erro')
        $("#senha_conf").removeClass('borda_erro')

        $.ajax({
            url: 'cadastro_usuario',
            type: 'POST',
            dataType: 'JSON',
            data: {
                nome,
                telefone,
                email,
                senha
            },
            success: function(data) {
                if (data) {
                    location.href = '/'
                } else {

                }
            },
            error: function(e) {}
        })
    }
</script>
<?= $this->endSection() ?>