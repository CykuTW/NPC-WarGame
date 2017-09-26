<?php

ini_set('display_errors', 0);

$db_host = 'mysql:host=172.17.0.8;dbname=sqlinjection1';
$db_user = 'sqli1';
$db_pass = 'x2t4zTjKNfxMnK25zwH48B2ag8DAJF';

try {
    $db = new PDO($db_host, $db_user, $db_pass, array(PDO::ATTR_PERSISTENT => true)); //初始化一个PDO对象
    $db->exec('SET NAMES utf8mb4');
} catch (PDOException $e) {
    die ("<h1>資料庫掛了，請聯絡 NPC 社團。(這不是挑戰的一部份。)</h1>");
}

?>