<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/core/Database.php';

$db = new Database();
$db->query("UPDATE events SET name = 'Congreso de Investigación 2026' WHERE name LIKE '%Investigaci%'");
$db->execute();

$db->query("SELECT * FROM events LIMIT 1");
$event = $db->single();
echo "EVENT TITLE: " . $event->name . "\n";


