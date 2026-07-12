<?php

include "data.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Novelists From Georgia</title>

    <link rel="stylesheet" href="styles/style.css">

</head>


<body>


<div class="container">


<h1>Novelists From Georgia</h1>


<div class="members">


<?php foreach ($members as $member): ?>


<div class="member-card">


<a href="profile.php?member=<?php echo $member['id']; ?>">

    <img 
        class="profile-image"
        src="<?php echo $member['profileImage']; ?>"
        alt="<?php echo $member['name']; ?>"
    >

</a>


<h2>
<?php echo $member['name']; ?>
</h2>


<p class="location">
<?php echo $member['location']; ?>
</p>



<div class="projects">


<?php foreach ($member['projects'] as $project): ?>


<div class="project">


<img 
src="<?php echo $project['image']; ?>"
alt="<?php echo $project['name']; ?>"
>


<p>
<?php echo $project['name']; ?>
</p>


</div>


<?php endforeach; ?>


</div>


</div>


<?php endforeach; ?>


</div>


</div>


</body>

</html>