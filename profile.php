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
    <title>Профиль — Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="dashboard.php">Student<span>Portal</span></a>
        <nav>
            <a href="dashboard.php">Жеке кабинет</a>
            <a href="protected.php">Қорғалған бет</a>
            <a href="courses.php">Курстар</a>
            <a href="announcements.php">Хабарламалар</a>
            <a href="logout.php" class="nav-danger">Шығу</a>
        </nav>
    </header>

    <main class="content">
        <section class="profile-card">
            <div class="avatar"><?= e(mb_strtoupper(mb_substr($user['name'], 0, 1))) ?></div>
            <div>
                <p class="eyebrow">PROFILE</p>
                <h1><?= e($user['name']) ?></h1>
                <p class="muted">@<?= e($user['username']) ?></p>
            </div>
        </section>

        <section class="details-card">
            <h2>Жеке мәліметтер</h2>
            <div class="details-row"><span>Аты-жөні</span><strong><?= e($user['name']) ?></strong></div>
            <div class="details-row"><span>Email</span><strong><?= e($user['email']) ?></strong></div>
            <div class="details-row"><span>Логин</span><strong><?= e($user['username']) ?></strong></div>
            <div class="details-row"><span>Пайдаланушы ID</span><strong>#<?= e((string)$user['id']) ?></strong></div>
            <div class="details-row"><span>Тіркелген уақыты</span><strong><?= e($user['created_at']) ?></strong></div>
        </section>
    </main>
</div>
</body>
</html>
