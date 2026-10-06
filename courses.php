<?php
require_once 'config.php';
require_login();
$user = get_current_user_data($pdo);

$courses = [
    ['title' => 'Web бағдарламалау', 'teacher' => 'А. Сәрсенов', 'progress' => 78, 'icon' => '01'],
    ['title' => 'PHP және MySQL', 'teacher' => 'М. Әлиев', 'progress' => 62, 'icon' => '02'],
    ['title' => 'UI/UX дизайн', 'teacher' => 'Д. Қасымова', 'progress' => 91, 'icon' => '03'],
    ['title' => 'Git және GitHub', 'teacher' => 'Е. Нұрлан', 'progress' => 54, 'icon' => '04'],
];
?>
<!DOCTYPE html>
<html lang="kk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Менің курстарым — Student Portal</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
<header class="topbar">
    <a class="brand" href="dashboard.php">Student<span>Portal</span></a>
    <nav>
        <a href="dashboard.php">Кабинет</a>
        <a href="profile.php">Профиль</a>
        <a href="announcements.php">Хабарламалар</a>
        <a href="logout.php" class="nav-danger">Шығу</a>
    </nav>
</header>

<main class="content">
    <div class="welcome">
        <div>
            <p class="eyebrow">MY COURSES</p>
            <h1>Менің курстарым</h1>
            <p class="muted">Оқу барысын бір беттен бақылаңыз.</p>
        </div>
    </div>

    <section class="course-grid">
        <?php foreach ($courses as $course): ?>
        <article class="course-card">
            <div class="course-top">
                <span class="link-icon"><?= e($course['icon']) ?></span>
                <span class="course-status">Белсенді</span>
            </div>
            <h2><?= e($course['title']) ?></h2>
            <p>Оқытушы: <?= e($course['teacher']) ?></p>
            <div class="progress-label">
                <span>Прогресс</span>
                <strong><?= e((string)$course['progress']) ?>%</strong>
            </div>
            <div class="progress">
                <div style="width: <?= (int)$course['progress'] ?>%"></div>
            </div>
        </article>
        <?php endforeach; ?>
    </section>
</main>
</div>
</body>
</html>
