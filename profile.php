<?php

include "data.php";

// Get writer ID from URL

$id = (int)($_GET['member'] ?? 0);


// Find matching writer for selected

$found = array_filter
($writers,fn($m) => $m['id'] === $id);


// Redirect user to the main page (index.php) if profile for the selected author doesn't exist

if (empty($found)) {header("Location: index.php");exit();}


// Convert filtered array into single writer object

$writer = array_values($found)[0];


// Set page title for selected author

$pageTitle = $writer['name'] . " | Profile";


include "includes/header.php";

?>


<div class="profile-page">


    <div class="profile-gallery">


        <img
            class="profile-main-image"
            src="<?php echo $writer['profileImage']; ?>"
            alt="<?php echo $writer['name']; ?>"
        >



        <div class="profile-projects">


            <?php foreach ($writer['projects'] as $project): ?>


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




    <div class="profile-info">


        <div>


            <h1>

                <?php echo $writer['name']; ?>

            </h1>


            <p class="profile-location">

                <?php echo $writer['location']; ?>

            </p>


            <p>

                <?php echo $writer['discipline'] ?? "Novelist"; ?>

            </p>


        </div>





        <section class="profile-section">


            <h2>

                Bio

            </h2>


            <p>

                <?php echo $writer['bio'] ?? "Placeholder bio"; ?>

            </p>


        </section>





        <section class="profile-section">


            <h2>

                Upcoming Events

            </h2>



            <ul>


                <?php

                if (isset($writer['events']))
                {

                    foreach ($writer['events'] as $event)
                    {

                ?>


                    <li>

                        <?php echo $event['name']; ?>

                    </li>


                <?php

                    }

                }

                ?>


            </ul>


        </section>






        <section class="profile-section">


            <h2>

                Commission Inquiry

            </h2>


            <p>

                Are you interested in inviting 
                
                <?php echo $writer['name']; ?>

                to a book signing, speaking event, or interview?

            </p>


            <a 
                class="commission-button" 
                href="inquiry.php?member=<?php echo $writer['id']; ?>"
            >

                Send Inquiry

            </a>


        </section>






        <section class="profile-section">


            <h2>

                Contact Information

            </h2>



            <p>

                <strong>Email:</strong>

                <?php echo $writer['email'] ?? "Placeholder email"; ?>

            </p>



            <p>

                <strong>Phone:</strong>

                <?php echo $writer['phone'] ?? "Placeholder phone"; ?>

            </p>



            <p>

                <strong>Website:</strong>

                <?php echo $writer['website'] ?? "Placeholder website"; ?>

            </p>


        </section>




    </div>


</div>



<?php

include "includes/footer.php";

?>