<?php

session_start();

// Return to the home page if no inquiry exists
if (!isset($_SESSION["inquiry"]))
{
    header("Location: index.php");
    exit();
}

$inquiry = $_SESSION["inquiry"];

// Set page title
$pageTitle = "Inquiry Submitted";
include "includes/header.php";
?>

<div class="profile-page single-column">
<div class="profile-info">

<h2>
Thank You!
</h2>

<p>
Your inquiry has been submitted successfully.
</p>

<section class="profile-section">

<p>
<strong>
Writer:
</strong>
<?php echo $inquiry["writer"]; ?>
</p>

<p>
<strong>
Your Name:
</strong>
<?php echo $inquiry["name"]; ?>
</p>

<p>
<strong>
Email:
</strong>

<?php echo $inquiry["email"]; ?>
</p>

<p>
<strong>
Message:
</strong>
</p>

<p>
<?php echo nl2br($inquiry["message"]); ?>
</p>

</section>

<p>
<a href="index.php">
Return to Home
</a>
</p>

</div>

</div>

<?php
include "includes/footer.php";
?>