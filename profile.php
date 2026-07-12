<?php

include "data.php";

// Get member ID from URL

$id = (int)($_GET['member'] ?? 0);


// Find matching member

$found = array_filter
(
    $members,
    fn($m) => $m['id'] === $id
);


// Redirect if profile does not exist

if (empty($found)) 
{
    header("Location: index.php");
    exit();
}


// Convert filtered array into single member object

$member = array_values($found)[0];


// Set page title

$pageTitle = $member['name'] . " | Profile";


include "includes/header.php";

?>


<div class="profile-page">


    <div class="profile-gallery">


        <img
            class="profile-main-image"
            src="<?php echo $member['profileImage']; ?>"
            alt="<?php echo $member['name']; ?>"
        >



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




    <div class="profile-info">


        <div>


            <h1>

                <?php echo $member['name']; ?>

            </h1>


            <p class="profile-location">

                <?php echo $member['location']; ?>

            </p>


            <p>

                <?php echo $member['discipline'] ?? "Novelist"; ?>

            </p>


        </div>





        <section class="profile-section">


            <h2>

                Bio

            </h2>


            <p>

                <?php echo $member['bio'] ?? "Placeholder bio"; ?>

            </p>


        </section>





        <section class="profile-section">


            <h2>

                Upcoming Events

            </h2>



            <ul>


                <?php

                if (isset($member['events']))
                {

                    foreach ($member['events'] as $event)
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
                
                <?php echo $member['name']; ?>

                to a book signing, speaking event, or interview?

            </p>


            <a 
                class="commission-button" 
                href="inquiry.php?member=<?php echo $member['id']; ?>"
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

                <?php echo $member['email'] ?? "Placeholder email"; ?>

            </p>



            <p>

                <strong>Phone:</strong>

                <?php echo $member['phone'] ?? "Placeholder phone"; ?>

            </p>



            <p>

                <strong>Website:</strong>

                <?php echo $member['website'] ?? "Placeholder website"; ?>

            </p>


        </section>




    </div>


</div>



<?php

include "includes/footer.php";

?>