<?php
$pdoconnection = "mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8mb4";
$options = [
PDO::ATTR_EMULATE_PREPARES => false,
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
$pdo = new PDO($pdoconnection, "mc_auth", "D23btGB36wU27d1g", $options);
$member=$pdo->prepare("SELECT count(username) FROM users");
$member->execute();
$memberrow = $member->fetch(PDO::FETCH_NUM);
//total count
$membercount = $memberrow[0];
} catch (Exception $e) {
error_log($e->getMessage());
exit('Oops ! quelques problèmes');
}
?>