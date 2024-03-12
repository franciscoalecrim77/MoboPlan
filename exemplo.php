<?php

$inputSegundos = 11503;
$minuto = ($inputSegundos % 3600) / 60;
$segundo = $inputSegundos % 60;

$horaFormatada = sprintf('%02d:%02d', $minuto, $segundo);

echo $horaFormatada
?>