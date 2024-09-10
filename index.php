<?php
$serverName = "mssql-service";
$connectionOptions = array(
    "Database" => "your_database",
    "Uid" => "sa",
    "PWD" => "YourStrongPassword"
);

// Membuat koneksi
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Mengecek koneksi
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Query untuk mengambil data
$sql = "SELECT * FROM your_table";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Tampilkan hasil
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo $row['column_name'] . "<br />";
}

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>