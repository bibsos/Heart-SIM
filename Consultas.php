<?php
$query = "SELECT p.Nome AS 'Paciente', p.Contacto AS 'Contacto', p.Cartao_saude AS 'Número de Cartão Saúde', e.Classificacao AS 'Avaliação', p.ID AS 'ID' FROM patients AS p 
        INNER JOIN episodio_clinico AS e ON e.ID_paciente=p.ID
        WHERE p.Centro_saude = '$nome_centro_user'";

?>