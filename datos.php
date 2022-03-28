<?php
//Conexión a la BD.
$mysqli = new mysqli('localhost','root','12345','graficasphp');

//Consulta a la base de datos.
$datos = $mysqli->query("SELECT * FROM finanzas");

$ingresos = array();
$gastos = array();
$meses = array();

$ingresos['name'] = "Ingresos";
$ingresos['data'] = [];

$gastos['name'] = "Gastos";
$gastos['data'] = [];

while($fila = $datos->fetch_assoc()){
	array_push($ingresos['data'], $fila['ingresos']);
	array_push($gastos['data'], $fila['gastos']);
	array_push($meses,$fila['mes']);
}

$datosGrafica = array($ingresos,$gastos,$meses);

echo json_encode($datosGrafica);


/*
{
name: 'Ingresos',
data: [500, 85]
}, {
name: 'Gastos',
data: [200, 20]
}

*/
?>