<?php

// Display the page title
if (!isset($pageTitle))
{
    $pageTitle = "Novelists From Georgia";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<input type="radio" name="theme" id="light-mode" checked>
<input type="radio" name="theme" id="dark-mode">
<input type="radio" name="theme" id="star-mode">
<input type="radio" name="theme" id="forest-mode">

<div class="theme-switcher">

    <label for="light-mode">
        Light Mode
    </label>

    <label for="dark-mode">
        Dark Mode
    </label>

    <label for="star-mode">
        Star Mode
    </label>

    <label for="forest-mode">
        Forest Mode
    </label>
</div>

<div class="container">

<header>
    <h1>
        <a class="site-title" href="index.php">
            Novelists From Georgia
        </a>
    </h1>
</header>