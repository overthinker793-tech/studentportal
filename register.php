<?php
require_once 'config.php';

if (is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$fullname = '';
$email = '';
$username = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if ($fullname === '' || $email === '' || $username === '' || $password === '' || $password_confirm === '') {
        $error = 'Барлық өрістерді толтырыңыз.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email форматы дұрыс емес.';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль кемінде 6 таңбадан тұруы керек.';
    } elseif ($password !== $password_confirm) {
        $error = 'Парольдер сәйкес келмейді.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);

        if ($stmt->fetch()) {
            $error = 'Бұл Email немесе логин бұрын тіркелген.';
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare(
                "INSERT INTO users (name, email, username, password)
                 VALUES (?, ?, ?, ?)"
            );
            $stmt->execute([$fullname, $email, $username, $hash]);

            $_SESSION['register_success'] = 'Тіркелу сәтті аяқталды. Енді жүйеге кіріңіз.';
            header('Location: login.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тіркелу — Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="index.php">Student<span>Portal</span></a>
        <nav>
            <a href="index.php">Басты бет</a>
            <a href="login.php">Кіру</a>
        </nav>
    </header>

    <main class="form-wrap">
        <section class="form-card">
            <p class="eyebrow">CREATE ACCOUNT</p>
            <h1>Тіркелу</h1>
            <p class="muted">Жаңа Student Portal аккаунтын жасаңыз.</p>

            <?php if ($error): ?>
                <div class="alert alert-error"><?= e($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <label>Аты-жөні
                    <input type="text" name="fullname" value="<?= e($fullname) ?>" required>
                </label>

                <label>Email
                    <input type="email" name="email" value="<?= e($email) ?>" required>
                </label>

                <label>Логин
                    <input type="text" name="username" value="<?= e($username) ?>" required>
                </label>

                <label>Пароль
                    <input type="password" name="password" required>
                </label>

                <label>Парольді қайталау
                    <input type="password" name="password_confirm" required>
                </label>

                <button class="btn btn-primary btn-full" type="submit">Тіркелу</button>
            </form>

            <p class="form-bottom">Аккаунтыңыз бар ма? <a href="login.php">Кіру</a></p>
        </section>
    </main>
</div>
</body>
</html>
