<html>
    <head>
        <meta charset="UTF-8">
        <title>Candidatos</title>        
    </head>
    <body>
        <h1>Candidatos</h1>
        <a href="/cadastrar">Cadastrar</a>
        <br>
        <br>        
        
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Sexo</th>
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
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </body>
</html>