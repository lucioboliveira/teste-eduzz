<html>
    <head>
        <meta charset="UTF-8">
        <title>Candidatos</title>
        <link rel="stylesheet" href="/assets/node_modules/sweetalert2/dist/sweetalert2.min.css">        
    </head>
    <body>
        <h1>Novo Candidato</h1>
        <a href="/">Voltar</a>
        <br>
        <br>        
        
        <form id="form-register" action="/save" method="POST">
            NOME:   <input type="text" id="nome" name="nome"/>
            E-MAIL: <input type="text" id="email" name="email"/>
            SEXO:   <input type="text" id="sexo" name="sexo"/>
            <input type="submit" id="btnSend" value="Enviar"/>
        </form>
        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="/assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#btnSend").click(function(){
                    $.ajax({
                        type: "POST",
                        url: "/save",
                        dataType: 'json',
                        data: $("#form-register").serialize(),
                        success: function (ret)
                        {
                            if(ret.id > 0) {
                                swal(
                                    'Sucesso!',
                                    'Candidato cadastrado com sucesso!',
                                    'success'
                                );
                            } else {
                                swal(
                                    'Ops!',
                                    'Não foi possível cadastrar o candidato!',
                                    'error'
                                );                                
                            }
                        },
                        error: function (r) {
                            swal(
                                'Ops!',
                                'Falha no servidor. Entre em contato com o suporte!',
                                'error'
                            );
                        }
                    });
                    return false;
                });
            });
        </script>
    </body>
</html>