<?php 
//echo (scandir('.'));
//print_r((scandir('.')));

$indexador=scandir('.');
echo implode(', ',$indexador);

?>