<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $id = $_SESSION['ID'];
    $query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', e.Classificacao AS 'Avaliação' FROM patient AS p 
            INNER JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
            INNER JOIN users AS u ON e.ID_utilizador = u.ID
            WHERE u.ID = $id";

    $result = mysqli_query($connect, $query);
?>
<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Pacientes </h1>
</div>
<div>
    <table class="w3-table w3-striped w3-bordered w3-hoverable w3-responsive w3-center">
        <thead>
        <TR class="w3-light-grey">
            <TH> Nome </TH>
            <TH> Contacto </TH>
            <TH> Cartão de Saúde </TH>
            <TH> Classificação </TH>
            <TH> Data da Consulta </TH>
        </TR>
        </thead>
<?php
    while($row = mysqli_fetch_array($result)){
    $current_date = date("Y-m-d");
    $difference = date_diff($current_date, $row[4]);
?>
        <TR>
            <TD class="w3-text-black"> <?php echo $row[0]; ?> </TD>
            <TD class="w3-text-black"> <?php echo $row[1]; ?> </TD>
            <TD class="w3-text-black"> <?php echo $row[2]; ?> </TD>
            <TD class="w3-text-black"> <?php echo $row[3]; ?> </TD>
            <TD class="w3-text-black"> <?php echo $row[4]."(".$difference.")"; ?> </TD>
        </TR>
    <?php } ?>
</table>
</div>
