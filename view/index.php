<?php include("view/header.php"); ?>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Sexo</th>
            <th>Criação</th>
            <th>Alteração</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        <?php new listarPessoas();  ?>
    </tbody>
</table>
<?php include("view/footer.php"); ?>