<?php
session_start();

$host = 'localhost';
$db   = 'student_portal';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Деректер қорына қосылу қатесі. database.sql файлын импорттап, MySQL іске қосылғанын тексеріңіз.");
}

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function is_logged_in(): bool {
    return isset($_SESSION['user_id']);
}

function require_login(): void {
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function get_current_user_data(PDO $pdo): ?array {
    if (!is_logged_in()) {
        return null;
    }

    $stmt = $pdo->prepare(
        "SELECT id, name, email, username, created_at
         FROM users
         WHERE id = ?"
    );
    $stmt->execute([$_SESSION['user_id']]);

    $user = $stmt->fetch();

    if (!$user) {
        $_SESSION = [];
        header('Location: login.php');
        exit;
    }

    return $user;
}
