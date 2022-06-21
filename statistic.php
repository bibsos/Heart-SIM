<div class="w3-teal w3-row-padding w3-padding-64 w3-container">
    <h1> Estatística </h1>
    <p> Relativa a dados dos pacientes</p>
</div>

<?php
$connect = mysqli_connect('localhost', 'root', '','heartsim')
or die('Error connecting to the server: ' . mysqli_error($connect));
$query_class1 = "SELECT e.ID FROM `episodio_clinico` AS e WHERE e.Classificacao = '1'";
$result_class1 = mysqli_query($connect, $query_class1);
$num_class1 = mysqli_num_rows($result_class1);
$query_class2 = "SELECT e.ID FROM `episodio_clinico` AS e WHERE e.Classificacao = '2'";
$result_class2 = mysqli_query($connect, $query_class2);
$num_class2 = mysqli_num_rows($result_class2);
$query_class3 = "SELECT e.ID FROM `episodio_clinico` AS e WHERE e.Classificacao = '3'";
$result_class3 = mysqli_query($connect, $query_class3);
$num_class3 = mysqli_num_rows($result_class3);
$query_class4 = "SELECT e.ID FROM episodio_clinico AS e WHERE e.Classificacao = '4'";
$result_class4 = mysqli_query($connect, $query_class4);
$num_class4 = mysqli_num_rows($result_class4);

$query_fem = "SELECT * FROM patient AS p WHERE p.Sexo = 'F'";
$result_fem = mysqli_query($connect, $query_fem);
$num_fem = mysqli_num_rows($result_fem);

$query_mas = "SELECT * FROM patient AS p WHERE p.Sexo = 'M'";
$result_mas = mysqli_query($connect, $query_mas);
$num_mas = mysqli_num_rows($result_mas);

$query_ave = "SELECT * FROM patient AS p WHERE p.Distrito = 'Aveiro'";
$result_ave = mysqli_query($connect, $query_ave);
$num_ave = mysqli_num_rows($result_ave);

$query_bej = "SELECT * FROM patient AS p WHERE p.Distrito = 'Beja'";
$result_bej = mysqli_query($connect, $query_bej);
$num_bej = mysqli_num_rows($result_bej);

$query_bra = "SELECT * FROM patient AS p WHERE p.Distrito = 'Braga'";
$result_bra = mysqli_query($connect, $query_bra);
$num_bra = mysqli_num_rows($result_bra);

$query_brag = "SELECT * FROM patient AS p WHERE p.Distrito = 'Bragança'";
$result_brag = mysqli_query($connect, $query_brag);
$num_brag = mysqli_num_rows($result_brag);

$query_cas = "SELECT * FROM patient AS p WHERE p.Distrito = 'Castelo Branco'";
$result_cas = mysqli_query($connect, $query_cas);
$num_cas = mysqli_num_rows($result_cas);

$query_coi = "SELECT * FROM patient AS p WHERE p.Distrito = 'Coimbra'";
$result_coi = mysqli_query($connect, $query_coi);
$num_coi = mysqli_num_rows($result_coi);

$query_evo = "SELECT * FROM patient AS p WHERE p.Distrito = 'Évora'";
$result_evo = mysqli_query($connect, $query_evo);
$num_evo = mysqli_num_rows($result_evo);

$query_far = "SELECT * FROM patient AS p WHERE p.Distrito = 'Faro'";
$result_far = mysqli_query($connect, $query_far);
$num_far = mysqli_num_rows($result_far);

$query_gua = "SELECT * FROM patient AS p WHERE p.Distrito = 'Guarda'";
$result_gua = mysqli_query($connect, $query_gua);
$num_gua = mysqli_num_rows($result_gua);

$query_lei = "SELECT * FROM patient AS p WHERE p.Distrito = 'Leiria'";
$result_lei = mysqli_query($connect, $query_lei);
$num_lei = mysqli_num_rows($result_lei);

$query_lis = "SELECT * FROM patient AS p WHERE p.Distrito = 'Lisboa'";
$result_lis = mysqli_query($connect, $query_lis);
$num_lis = mysqli_num_rows($result_lis);

$query_por = "SELECT * FROM patient AS p WHERE p.Distrito = 'Portalegre'";
$result_por = mysqli_query($connect, $query_por);
$num_por = mysqli_num_rows($result_por);

$query_port = "SELECT * FROM patient AS p WHERE p.Distrito = 'Porto'";
$result_port = mysqli_query($connect, $query_port);
$num_port = mysqli_num_rows($result_port);

$query_san = "SELECT * FROM patient AS p WHERE p.Distrito = 'Santarém'";
$result_san = mysqli_query($connect, $query_san);
$num_san = mysqli_num_rows($result_san);

$query_set = "SELECT * FROM patient AS p WHERE p.Distrito = 'Setúbal'";
$result_set = mysqli_query($connect, $query_set);
$num_set = mysqli_num_rows($result_set);

$query_via = "SELECT * FROM patient AS p WHERE p.Distrito = 'Viana do Castelo'";
$result_via = mysqli_query($connect, $query_via);
$num_via = mysqli_num_rows($result_via);

$query_vil = "SELECT * FROM patient AS p WHERE p.Distrito = 'Vila Real'";
$result_vil = mysqli_query($connect, $query_vil);
$num_vil = mysqli_num_rows($result_vil);

$query_vis = "SELECT * FROM patient AS p WHERE p.Distrito = 'Viseu'";
$result_vis = mysqli_query($connect, $query_vis);
$num_vis = mysqli_num_rows($result_vis);

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

<div class="w3-padding w3-container">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
    <table>
        <TR>
            <TD>
                <canvas id="Classificacao" style="width:150%;max-width:700px"></canvas>

                <script>
                    var xValues_class = ["1", "2", "3", "4"];
                    var yValues_class = [<?php echo $num_class1.','.$num_class2.','.$num_class3.','.$num_class4?>];
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
            </TD>
            <TD>
                <canvas id="Sexo" style="width:150%;max-width:700px"></canvas>
                <script>
                    var xValues_class = ["Feminino", "Masculino"];
                    var yValues_class = [<?php echo $num_fem.','.$num_mas?>];
                    var barColors_class = [
                        "#b91d47",
                        "#2b5797",
                    ];
                    new Chart("Sexo", {
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
                                text: "Sexo"
                            }
                        }
                    });
                </script>
            </TD>
        </TR>
        <TR>
            <TD>
                <p> <canvas id="Idade" style="width:150%;max-width:700px"></canvas> </p>

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
            </TD>
            <TD>
                <p> <canvas id="Distrito" style="width:150%;max-width:700px"></canvas> </p>

                <script>
                    var xValues_idade = ["Aveiro", "Beja", "Braga", "Bragança", "Castelo Branco", "Coimbra", "Évora", "Faro", "Guarda", "Leiria", "Lisboa", "Portalegre", "Porto", "Santarém", "Setúbal", "Viana do Castelo", "Vila Real", "Viseu"];
                    var yValues_idade = [<?php echo $num_ave.','.$num_bej.','.$num_bra.','.$num_brag.','.$num_cas.','.$num_coi.','.$num_evo.','.$num_far.','.$num_gua.','.$num_lei.','.$num_lis.','.$num_por.','.$num_port.','.$num_san.','.$num_set.','.$num_via.','.$num_vil.','.$num_vis?>];
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
                        "#006600",
                        "#ff0000",
                        "#00cca3",
                        "#b33c00",
                        "#ffccb3",
                        "#4d1a00",
                        "#ff66ff",
                        "#4d004d",
                        "#666633"

                    ];
                    new Chart("Distrito", {
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
                                text: "Distrito"
                            }
                        }
                    });
                </script>




            </TD>
        </TR>
    </table>
</div>