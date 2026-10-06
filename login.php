<?php
require_once 'config.php';

if (is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$username = '';
$error = '';
$success = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Логин және пароль енгізіңіз.';
    } else {
        $stmt = $pdo->prepare(
            "SELECT id, name, email, username, password
             FROM users
             WHERE username = ? OR email = ?
             LIMIT 1"
        );
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['login_success'] = 'Сіз жүйеге сәтті кірдіңіз.';
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'Логин/Email немесе пароль қате.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Кіру — Student Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="index.php">Student<span>Portal</span></a>
        <nav>
            <a href="index.php">Басты бет</a>
            <a href="register.php">Тіркелу</a>
        </nav>
    </header>

    <main class="form-wrap">
        <section class="form-card">
            <p class="eyebrow">WELCOME BACK</p>
            <h1>Кіру</h1>
            <p class="muted">Аккаунтыңызға кіру үшін мәліметтерді енгізіңіз.</p>

            <?php if ($success): ?>
                <div class="alert alert-success"><?= e($success) ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-error"><?= e($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <label>Логин немесе Email
                    <input type="text" name="username" value="<?= e($username) ?>" required>
                </label>

                <label>Пароль
                    <input type="password" name="password" required>
                </label>

                <button class="btn btn-primary btn-full" type="submit">Кіру</button>
            </form>

            <p class="form-bottom">Аккаунтыңыз жоқ па? <a href="register.php">Тіркелу</a></p>
        </section>
    </main>
</div>
</body>
</html>
