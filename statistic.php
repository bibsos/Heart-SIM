<div class="w3-row-padding w3-padding-64 w3-container">
    <h1> Estatística </h1>
<?php
    $connect = mysqli_connect('localhost', 'root', '','heartsim')
        or die('Error connecting to the server: ' . mysqli_error($connect));
    $query_class1 = "SELECT * FROM episodio_clinico AS e WHERE e.Classificacao = '1'";
    $result_class1 = count(mysqli_query($connect, $query_class1));
    $query_class2 = "SELECT * FROM episodio_clinico AS e WHERE e.Classificacao = '2'";
    $result_class2 = count(mysqli_query($connect, $query_class2));
    $query_class3 = "SELECT * FROM episodio_clinico AS e WHERE e.Classificacao = '3'";
    $result_class3 = count(mysqli_query($connect, $query_class3));
    $query_class4 = "SELECT * FROM episodio_clinico AS e WHERE e.Classificacao = '4'";
    $result_class4 = count(mysqli_query($connect, $query_class4));

    $query_fem = "SELECT * FROM patient AS p WHERE p.Sexo = 'F'";
    $result_fem = mysqli_query($connect, $query_fem);
    $num_fem = mysqli_num_rows($result_fem);

    $query_mas = "SELECT * FROM patient AS p WHERE p.Sexo = 'M'";
    $result_mas = mysqli_query($connect, $query_mas);
    $num_mas = mysqli_num_rows($result_mas);

    $query_0_9 = "SELECT * FROM patient AS p WHERE datediff(YEAR(CURRENT_TIMESTAMP), YEAR(p.Data_Nascimento)) >= 0 AND datediff(YEAR(CURRENT_TIMESTAMP), YEAR(p.Data_Nascimento)) < 10";
    $result_0_9 = mysqli_query($connect, $query_0_9);
    $num_0_9 = mysqli_num_rows($result_0_9);

    $query_10_19 = "SELECT * FROM patient AS p WHERE datediff(YEAR(CURRENT_TIMESTAMP), YEAR(p.Data_Nascimento)) >= 10 AND datediff(YEAR(CURRENT_TIMESTAMP), YEAR(p.Data_Nascimento)) < 20";
    $result_10_19 = mysqli_query($connect, $query_10_19);
    $num_10_19 = mysqli_num_rows($result_10_19);

    $query_20_29 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 20 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 30";
    $result_20_29 = mysqli_query($connect, $query_20_29);
    $num_20_29 = mysqli_num_rows($result_20_29);

    $query_30_39 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 30 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 40";
    $result_30_39 = mysqli_query($connect, $query_30_39);
    $num_30_39 = mysqli_num_rows($result_30_39);

    $query_40_49 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 40 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 50";
    $result_40_49 = mysqli_query($connect, $query_40_49);
    $num_40_49 = mysqli_num_rows($result_40_49);

    $query_50_59 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 50 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 60";
    $result_50_59 = mysqli_query($connect, $query_50_59);
    $num_50_59 = mysqli_num_rows($result_50_59);

    $query_60_69 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 60 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 70";
    $result_60_69 = mysqli_query($connect, $query_60_69);
    $num_60_69 = mysqli_num_rows($result_60_69);

    $query_70_79 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 70 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 80";
    $result_70_79 = mysqli_query($connect, $query_70_79);
    $num_70_79 = mysqli_num_rows($result_70_79);

    $query_80_89 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 80 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 90";
    $result_80_89 = mysqli_query($connect, $query_80_89);
    $num_80_89 = mysqli_num_rows($result_80_89);

    $query_90_99 = "SELECT * FROM patient AS p WHERE abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) >= 90 AND abs(YEAR(CURRENT_TIMESTAMP) - YEAR(p.Data_Nascimento)) < 100";
    $result_90_99 = mysqli_query($connect, $query_90_99);
    $num_90_99 = mysqli_num_rows($result_90_99);

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
<canvas id="Classificacao" style="width:150%;max-width:700px"></canvas>

<script>
    var xValues_class = ["1", "2", "3", "4"];
    var yValues_class = [<?php echo $result_class1.','.$result_class2.','.$result_class3.','.$result_class4?>];
    var barColors_class = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9"
    ];
    new Chart("Classificacao", {
        type: "pie",
        data: {
            labels: xValues_class,
            datasets: [{
                backgroundColor: barColors_class,
                data: yValues_class
            }]
        },
        options: {
            title: {
                display: true,
                text: "Classificação"
            }
        }
    });
</script>
<br>
    <canvas id="Sexo" style="width:150%;max-width:700px"></canvas>
<script>
    var xValues_sexo = ["Feminino", "Masculino"];
    var yValues_sexo = [<?php echo $num_fem.','.$num_mas?>];
    var barColors_sexo = ["red", "green"];

    new Chart("Sexo", {
        type: "bar",
        data: {
            labels: xValues_sexo,
            datasets: [{
                backgroundColor: barColors_sexo,
                data: yValues_sexo
            }]
        },
        options: {
            legend: {display: false},
            title: {
                display:true,
                text: "Sexo"
            }
        }
    });


</script>

    <canvas id="Idade" style="width:150%;max-width:700px"></canvas>

    <script>
        var xValues_idade = ["0-10", "11-20", "21-30", "31-40", "41-50", "51-60", "61-70", "71-80", "81-90", "91-100"];
        var yValues_idade = [<?php echo $num_0_9.','.$num_10_19.','.$num_20_29.','.$num_30_39.','.$num_40_49.','.$num_50_59.','.$num_60_69.','.$num_70_79.','.$num_80_89.','.$num_90_99?>];
        var barColors_idade = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#862d2d",
            "#40ff00",
            "#ff8000",
            "#ffff00",
            "#990099",
            "#006600"
        ];
        new Chart("Idade", {
            type: "pie",
            data: {
                labels: xValues_idade,
                datasets: [{
                    backgroundColor: barColors_idade,
                    data: yValues_idade
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Idade"
                }
            }
        });
    </script>
 <br>