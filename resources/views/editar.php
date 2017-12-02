<html>
    <head>
        <meta charset="UTF-8">
        <title>Candidatos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="/assets/node_modules/sweetalert2/dist/sweetalert2.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        <style>
            .error {
                border: solid red 1px;
            }
        </style>
    </head>
    <body>
        <section class="container-fluid col-md-4">
            <h1>Editar Candidato</h1>
            <a class="btn btn-primary" href="/">Voltar</a>
            <br>
            <br>        

            <form id="form-register" action="/save" method="POST">
                <input type="hidden" id="action" name="action" value="/update"/>
                <input type="hidden" id="id" name="id" value="<?php echo $candidato->id; ?>"/>
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $candidato->nome; ?>" required/>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?php echo $candidato->email; ?>" required/>
                </div>
                <fieldset class="form-group">
                    <label for="nome">Sexo</label>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input sexo" name="sexo" value="f" <?php echo $candidato->sexo == 'f' ? 'checked="checked"' : ''; ?>/> Feminino
                      </label>
                    </div>
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input sexo" name="sexo" value="m" <?php echo $candidato->sexo == 'm' ? 'checked="checked"' : ''; ?>/> Masculino
                      </label>
                    </div>
                </fieldset>
                <input class="btn btn-success" type="submit" id="btnSend" value="Enviar"/>
            </form>
        </section>
        

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="/assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript" src="/assets/js/scripts.js"></script>
    </body>
</html>