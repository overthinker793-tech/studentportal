<?php
require_once 'config.php';
require_login();

$user = get_current_user_data($pdo);
$success = $_SESSION['login_success'] ?? '';
unset($_SESSION['login_success']);
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Жеке кабинет — Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="dashboard.php">Student<span>Portal</span></a>
        <nav>
            <a href="profile.php">Профиль</a>
            <a href="protected.php">Қорғалған бет</a>
            <a href="logout.php" class="nav-danger">Шығу</a>
        </nav>
    </header>

    <main class="dashboard">
        <?php if ($success): ?>
            <div class="alert alert-success"><?= e($success) ?></div>
        <?php endif; ?>

        <div class="welcome">
            <div>
                <p class="eyebrow">DASHBOARD</p>
                <h1>Сәлем, <?= e($user['name']) ?>!</h1>
                <p class="muted">Бұл бетке тек авторизацияланған пайдаланушылар кіре алады.</p>
            </div>
            <div class="session-badge">● Сессия белсенді</div>
        </div>

        <section class="profile-grid">
            <div class="info-card">
                <span class="label">Аты-жөні</span>
                <strong><?= e($user['name']) ?></strong>
            </div>
            <div class="info-card">
                <span class="label">Логин</span>
                <strong><?= e($user['username']) ?></strong>
            </div>
            <div class="info-card">
                <span class="label">Email</span>
                <strong><?= e($user['email']) ?></strong>
            </div>
            <div class="info-card">
                <span class="label">Тіркелген күні</span>
                <strong><?= e($user['created_at']) ?></strong>
            </div>
        </section>

        <section class="quick-links">
            <a href="courses.php" class="link-card">
                <span class="link-icon">04</span>
                <div><h3>Менің курстарым</h3><p>Курстар мен оқу прогресін көру.</p></div>
                <span>→</span>
            </a>

            <a href="announcements.php" class="link-card">
                <span class="link-icon">05</span>
                <div><h3>Хабарламалар</h3><p>Жаңалықтар мен хабарландыруларды оқу.</p></div>
                <span>→</span>
            </a>


            <a href="profile.php" class="link-card">
                <span class="link-icon">01</span>
                <div><h3>Профиль</h3><p>Жеке мәліметтерді қарау.</p></div>
                <span>→</span>
            </a>

            <a href="protected.php" class="link-card">
                <span class="link-icon">02</span>
                <div><h3>Қорғалған бет</h3><p>Белсенді сессияны тексеру.</p></div>
                <span>→</span>
            </a>

            <a href="logout.php" class="link-card danger-link">
                <span class="link-icon">03</span>
                <div><h3>Шығу</h3><p>Ағымдағы сессияны аяқтау.</p></div>
                <span>→</span>
            </a>
        </section>
    </main>
</div>
</body>
</html>
