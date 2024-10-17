<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=data_security;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>