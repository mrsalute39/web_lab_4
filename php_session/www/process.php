<?php
session_start();

$username = htmlspecialchars($_POST['username'] ?? '');
$userage = htmlspecialchars($_POST['userage'] ?? '');
$theme = htmlspecialchars($_POST['theme'] ?? '');
$prize_bool = isset($_POST['prize_bool']) ? 'yes' : 'no';  
$difficulty = htmlspecialchars($_POST['difficulty'] ?? '');

$errors = [];
if(empty($username)) $errors[] = "Имя не может быть пустым";
if(empty($userage)) $errors[] = "Возраст не может быть пустым";
if(empty($theme)) $errors[] = "Тема должна быть выбрана";
if(empty($username)) $errors[] = "Сложность должна быть выбрана";

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}


$_SESSION['username'] = $username;
$_SESSION['userage'] = $userage;
$_SESSION['theme'] = $theme;
$_SESSION['prize_bool'] = $prize_bool;
$_SESSION['difficulty'] = $difficulty;

$line = $username . ";" . $userage . ";" . $theme . ";" . $prize_bool . ";" . $difficulty . "\n";

file_put_contents("data.txt", $line, FILE_APPEND);



header("Location: index.php");
exit();
?>