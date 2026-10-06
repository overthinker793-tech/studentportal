<?php
require_once 'config.php';
require_login();
$user = get_current_user_data($pdo);

$announcements = [
    ['date' => '02.10.2026', 'title' => 'PHP бойынша жаңа практикалық жұмыс', 'text' => 'Сессия және авторизация тақырыбы бойынша тапсырманы орындау қажет.'],
    ['date' => '30.09.2026', 'title' => 'Git тапсырмасы қабылданады', 'text' => 'Жобаның соңғы нұсқасын commit жасап, репозиторийге жүктеңіз.'],
    ['date' => '28.09.2026', 'title' => 'Жаңа оқу материалдары', 'text' => 'Web бағдарламалау бөліміне жаңа оқу материалдары қосылды.'],
];
?>
<!DOCTYPE html>
<html lang="kk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Хабарламалар — Student Portal</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
<header class="topbar">
    <a class="brand" href="dashboard.php">Student<span>Portal</span></a>
    <nav>
        <a href="dashboard.php">Кабинет</a>
        <a href="courses.php">Курстар</a>
        <a href="profile.php">Профиль</a>
        <a href="logout.php" class="nav-danger">Шығу</a>
    </nav>
</header>

<main class="content">
    <div class="welcome">
        <div>
            <p class="eyebrow">ANNOUNCEMENTS</p>
            <h1>Хабарламалар</h1>
            <p class="muted">Оқу порталының соңғы жаңалықтары мен хабарландырулары.</p>
        </div>
    </div>

    <section class="announcement-list">
        <?php foreach ($announcements as $item): ?>
        <article class="announcement-card">
            <div class="announcement-date"><?= e($item['date']) ?></div>
            <div>
                <h2><?= e($item['title']) ?></h2>
                <p><?= e($item['text']) ?></p>
            </div>
            <span class="arrow">→</span>
        </article>
        <?php endforeach; ?>
    </section>
</main>
</div>
</body>
</html>
