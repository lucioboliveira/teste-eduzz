<html>
    <head>
        <meta charset="UTF-8">
        <title>Candidatos</title>        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href="/assets/node_modules/sweetalert2/dist/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
        <section class="container-fluid">
            <h1>Candidatos</h1>
            <a class="btn btn-primary" href="/cadastrar">Cadastrar</a>
            <br>
            <br>        

            <table id="candidatos">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th>Ação</th>
                </thead>
                <tbody>
                <?php
                    foreach ($candidatos as $candidato) {
                ?>
                    <tr>
                        <td><?php echo $candidato->id; ?></td>
                        <td><?php echo $candidato->nome; ?></td>
                        <td><?php echo $candidato->email; ?></td>
                        <td><?php echo $candidato->sexo == "f" ? "Feminino" : "Masculino"; ?></td>
                        <td>
                            <a class="btn btn-info" href="/editar/<?php echo $candidato->id; ?>">Editar</a> 
                            <a class="btn btn-danger" href="javascript:void(0);" onclick="deleteCandidate(<?php echo $candidato->id; ?>);">Excluir</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
                <tfoot>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Sexo</th>
                    <th>Ação</th>
                </tfoot>
            </table>
        </section>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="/assets/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <script type="text/javascript" src="/assets/js/scripts.js"></script>
        <script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#candidatos').DataTable();
            } );
        </script>
    </body>
</html>