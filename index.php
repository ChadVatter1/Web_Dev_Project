<?php

include "data.php";

// Available genres

$genres = [

    "All",

    "Literary Fiction",

    "Historical Fiction",

    "Southern Fiction",

    "Southern Gothic",

    "Poetry",

    "Memoir / Nonfiction",

    "Speeches & Nonfiction",

    "Children's Literature"

];

// Default genre

$selectedGenre = "All";

// Check if a genre was selected

if (isset($_GET["genre"]))
{
    $selectedGenre = $_GET["genre"];
}

$pageTitle = "Novelists From Georgia";

include "includes/header.php";

?>


<form
    method="get"
    class="genre-filter"
>

    <label for="genre">

        Search by Genre

    </label>


    <select
        name="genre"
        id="genre"
    >


        <?php

        foreach ($genres as $genre)
        {

            ?>

            <option
                value="<?php echo $genre; ?>"

                <?php

                if ($genre == $selectedGenre)
                {
                    echo "selected";
                }

                ?>

            >

                <?php echo $genre; ?>

            </option>


            <?php

        }

        ?>


    </select>


    <input
        type="submit"
        value="Search"
    >


</form>



<div class="members">


<?php

foreach ($members as $member)
{

    // Skip writers that do not match the selected genre

    if
    (
        $selectedGenre != "All"
        &&
        $member["genre"] != $selectedGenre
    )
    {
        continue;
    }

?>


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



<?php

foreach ($member['projects'] as $project)
{

?>


<div class="project">


<img 
    src="<?php echo $project['image']; ?>"
    alt="<?php echo $project['name']; ?>"
>


<p>

<?php echo $project['name']; ?>

</p>


</div>



<?php

}

?>



</div>


</div>



<?php

}

?>



</div>



<?php

include "includes/footer.php";

?>