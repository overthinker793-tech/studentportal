<?php
require_once 'config.php';
require_login();

$user = get_current_user_data($pdo);
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Қорғалған ақпарат — Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="dashboard.php">Student<span>Portal</span></a>
        <nav>
            <a href="dashboard.php">Жеке кабинет</a>
            <a href="profile.php">Профиль</a>
            <a href="logout.php" class="nav-danger">Шығу</a>
        </nav>
    </header>

    <main class="protected-wrap">
        <section class="protected-card">
            <div class="shield">✓</div>
            <p class="eyebrow">PROTECTED AREA</p>
            <h1>Қорғалған ақпарат</h1>
            <p class="protected-name"><?= e($user['name']) ?></p>
            <div class="status-box">
                <strong>Сіздің жеке сессияңыз белсенді</strong>
                <p>Авторизация сәтті өтті. Бұл ақпаратқа тек жүйеге кірген пайдаланушы қол жеткізе алады.</p>
            </div>
            <a class="btn btn-primary" href="dashboard.php">Жеке кабинетке оралу</a>
        </section>
    </main>
</div>
</body>
</html>
