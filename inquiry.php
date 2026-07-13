<?php

session_start();
include "data.php";

// This will get the writer's id
$writer_id = 0;

if (isset($_GET["member"]))
{
    $writer_id = (int)$_GET["member"];
}

// This will find the selected writer
$writer = null;

foreach ($writers as $currentWriter)
{
    if ($currentWriter["id"] == $id)
    {
        $writer = $currentWriter;
        break;
    }
}

// Returns user to main/home page if the writer selected does not exist
if ($writer == null)
{
    header("Location: index.php");
    exit();
}

// Sets page title to "Commission Inquiry
$pageTitle = "Commission Inquiry";

// Store form values
$name = "";
$email = "";
$message = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    if ($name == "")
    {
        $errors[] = "Please enter your name.";
    }

    if ($email == "")
    {
        $errors[] = "Please enter your email.";
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "Please enter a valid email address.";
    }

    if ($message == "")
    {
        $errors[] = "Please enter a message.";
    }

    if (empty($errors))
    {

        $_SESSION["inquiry"] = [
            "writer" => $member["name"],
            "name" => htmlspecialchars($name),
            "email" => htmlspecialchars($email),
            "message" => htmlspecialchars($message)
        ];

        header("Location: thankyou.php");
        exit();
    }
}

include "includes/header.php";

?>

<div class="profile-page single-column">
<div class="profile-info">

<h2>
Commission Inquiry
</h2>

<p>
Send a commission inquiry to
<strong>

<?php echo $member["name"]; ?>
</strong>.
</p>

<?php

foreach ($errors as $error)
{

?>
<p class="error-message">
<?php echo $error; ?>
</p>

<?php
}

?>

<form method="post">

<p>
<label>
Name
</label>

<input
type="text"
name="name"
value="<?php echo htmlspecialchars($name); ?>"
>
</p>

<p>
<label>
Email
</label>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($email); ?>"
>
</p>

<p>

<label>
Message
</label>

<textarea name="message" rows="8"><?php echo htmlspecialchars($message); ?></textarea>

</p>

<input
type="submit"
value="Send Inquiry"
>

</form>

</div>

</div>

<?php
include "includes/footer.php";
?>