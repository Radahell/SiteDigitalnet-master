<?php
PHPINFO();
/*
// Database connection settings
$host = "RADAHELL";
$username = "Noc21";
$password = "Noc2123";
$dbname = "Controledevagas";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

// Retrieve the data for the dropdown options
$query = "SELECT NomeReg FROM Regiao";
$result = mysqli_query($conn, $query);

// Build an array of data
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $data[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Send the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>*/


$serverName = "localhost\SQLEXPRESS";
$connectionOptions = array(
    "Database" => "Controledevagas",
    "Uid" => "Noc21",
    "PWD" => "Noc2123"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$sql = "SELECT IDReg, NomeReg FROM Regiao";
$stmt = sqlsrv_query($conn, $sql);

$options = "";
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $options .= "<option value='" . $row['IDReg'] . "'>" . $row['NomeReg'] . "</option>";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

echo $options;
?>

