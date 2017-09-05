<?php
$data1 = new DateTime( '2017-07-01' );
$data2 = new DateTime( '2017-12-31' );

$intervalo = $data1->diff( $data2 );

echo "Intervalo é de {$intervalo->y} anos, {$intervalo->m} meses e {$intervalo->d} dias";
?>