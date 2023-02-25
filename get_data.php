<?php

$serverName = "RADAHELL\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "Controledevagas",
    "Uid" => "Noc21",
    "PWD" => "Noc2123"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
/*
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT IDReg, NomReg FROM Regiao";
$stmt = sqlsrv_query($conn, $sql);

$options = "";
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $options .= "<option value='" . $row['IDReg'] . "'>" . $row['NomReg'] . "</option>";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

echo $options;*/
/*

if ($conn) {
    $sql = "SELECT * FROM Regiao";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $options = "";
    
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $options .= "<option value='" . $row['IDReg'] . "'>" . $row['NomeReg'] . "</option>";
    }
    
} else {
    echo "Connection could not be established.<br />";
    die(print_r(sqlsrv_errors(), true));
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
echo $options;*/

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$query = "SELECT * FROM Regiao";
$stmt = sqlsrv_query($conn, $query);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$options = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $options[] = array(
        'value' => $row['IDReg'],
        'text' => $row['NomeReg']
    );
}

header('Content-Type: application/json');
echo json_encode($options);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

?>