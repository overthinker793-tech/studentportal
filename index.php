<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="index.php">Student<span>Portal</span></a>
        <nav>
            <?php if (is_logged_in()): ?>
                <a href="dashboard.php">Жеке кабинет</a>
                <a href="logout.php" class="nav-danger">Шығу</a>
            <?php else: ?>
                <a href="login.php">Кіру</a>
                <a href="register.php" class="nav-accent">Тіркелу</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="hero">
        <div class="hero-card">
            <p class="eyebrow">STUDENT PORTAL</p>
            <h1>Студенттерге арналған<br><span>жеке кабинет</span></h1>
            <p class="hero-text">
                Тіркеліңіз, жүйеге кіріңіз және жеке сессияңыз арқылы қорғалған
                бөлімдерге қол жеткізіңіз.
            </p>

            <div class="hero-actions">
                <a class="btn btn-primary" href="register.php">Тіркелу</a>
                <a class="btn btn-secondary" href="login.php">Кіру</a>
            </div>

            <div class="features">
                <div class="feature">
                    <strong>01</strong>
                    <div>
                        <h3>Қауіпсіз кіру</h3>
                        <p>Парольдер хэш түрінде сақталады.</p>
                    </div>
                </div>
                <div class="feature">
                    <strong>02</strong>
                    <div>
                        <h3>Сессия</h3>
                        <p>Қорғалған беттер тек авторизациядан кейін ашылады.</p>
                    </div>
                </div>
                <div class="feature">
                    <strong>03</strong>
                    <div>
                        <h3>Жеке кабинет</h3>
                        <p>Профиль мәліметтерін бір жерден көріңіз.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">© 2026 Student Portal</footer>
</div>
</body>
</html>
