<?php session_start(); ?>
<?php if(isset($_SESSION['username'])): ?>
    <p>Данные из сессии:</p>
    <ul>
        <li>Имя: <?= $_SESSION['username'] ?></li>
		<li>Имя: <?= $_SESSION['userage'] ?></li>
		<li>Имя: <?= $_SESSION['theme'] ?></li>
		<li>Имя: <?= $_SESSION['prize_bool'] ?></li>
		<li>Имя: <?= $_SESSION['difficulty'] ?></li>		
    </ul>
<?php else: ?>
    <p>Данных пока нет.</p>
<?php endif; ?>

<a href="form.html">Заполнить форму</a> |
<a href="view.php">Посмотреть все данные</a>
<?php if(isset($_SESSION['errors'])): ?>
    <ul style="color:red;">
        <?php foreach($_SESSION['errors'] as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php unset($_SESSION['errors']); ?>
	
if (isset($_SESSION['api_data'])) {
    echo "<h3>Данные из API:</h3>";
    echo "<pre>" . print_r($_SESSION['api_data'], true) . "</pre>";
}

require_once 'UserInfo.php';
$info = UserInfo::getInfo();

echo "<h3>Информация о пользователе:</h3>";
foreach ($info as $key => $val) {
    echo htmlspecialchars($key) . ': ' . htmlspecialchars($val) . '<br>';
}


<?php endif; ?>
