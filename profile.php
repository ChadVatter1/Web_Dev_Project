<?php

include "data.php";


// Get member ID from URL

$id = (int)($_GET['member'] ?? 0);


// Find matching member

$found = array_filter(
    $members,
    fn($m) => $m['id'] === $id
);


// Redirect if profile does not exist

if (empty($found)) {

    header("Location: index.php");

    exit();

}


// Convert filtered array into single member object

$member = array_values($found)[0];


?>


<!DOCTYPE html>

<html lang="en">


<head>

    <meta charset="UTF-8">

    <title>
        <?php echo $member['name']; ?> | Profile
    </title>

    <link rel="stylesheet" href="styles/style.css">

</head>



<body>


<div class="container">


    <div class="profile-page">


        <!-- =====================
             LEFT SIDE
        ====================== -->


        <div class="profile-gallery">


            <!-- Main Profile Image -->

            <img
                class="profile-main-image"
                src="<?php echo $member['profileImage']; ?>"
                alt="<?php echo $member['name']; ?>"
            >




            <!-- Project Gallery -->

            <div class="profile-projects">


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





        <!-- =====================
             RIGHT SIDE
        ====================== -->


        <div class="profile-info">



            <!-- Name + Location -->


            <div>


                <h1>
                    <?php echo $member['name']; ?>
                </h1>


                <p class="profile-location">

                    <?php echo $member['location']; ?>

                </p>


                <p>

                    <?php echo $member['discipline']; ?>

                </p>


            </div>





            <!-- Bio Section -->


            <section class="profile-section">


                <h2>
                    Bio
                </h2>


                <p>

                    <?php echo $member['bio']; ?>

                </p>


            </section>







            <!-- Events Section -->


            <section class="profile-section">


                <h2>
                    Upcoming Events
                </h2>



                <ul>


                    <?php foreach ($member['events'] as $event): ?>


                        <li>

                            <?php echo $event; ?>

                        </li>


                    <?php endforeach; ?>


                </ul>


            </section>








            <!-- Contact Section -->


            <section class="profile-section">


                <h2>
                    Contact Information
                </h2>



                <p>

                    <strong>Email:</strong>

                    <?php echo $member['email']; ?>

                </p>



                <p>

                    <strong>Phone:</strong>

                    <?php echo $member['phone']; ?>

                </p>



                <p>

                    <strong>Website:</strong>

                    <?php echo $member['website']; ?>

                </p>



            </section>





        </div>


    </div>


</div>


</body>


</html>