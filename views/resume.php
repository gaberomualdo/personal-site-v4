<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "resume"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="block_list">
                <div class="resume_container block">
                    <div class="row top">
                        <p class="last_updated"><?php echo date("F j, Y", strtotime($page_data["content"]["last_updated"])); ?></p>
                        <div class="col">
                            <img src="<?php echo $page_data["content"]["photo_url"]; ?>" alt="Picture of Me">
                        </div>
                        <div class="col">
                            <h1 class="name"><?php echo $page_data["content"]["name"]; ?></h1>
                            <h2 class="job_description"><?php echo $page_data["content"]["description"]; ?></h2>
                            <p class="description"><?php echo $page_data["content"]["detailed_description_text"]; ?></p>
                        </div>
                    </div>
                    <div class="row socials">
                        <div class="col">
                            <?php echo $page_data["content"]["social_links"][0]["logo"]; echo "<p>" . $page_data["content"]["social_links"][0]["name"] . "</p>"; ?>
                        </div>
                        <div class="col">
                            <?php echo $page_data["content"]["social_links"][1]["logo"]; echo "<p>" . $page_data["content"]["social_links"][1]["name"] . "</p>"; ?>
                        </div>
                        <div class="col">
                            <?php echo $page_data["content"]["social_links"][2]["logo"]; echo "<p>" . $page_data["content"]["social_links"][2]["name"] . "</p>"; ?>
                        </div>
                    </div>
                    <div class="row main">
                        <div class="col left">
                            <div class="skills">
                                <h1>Tech Skills</h1>
                                <ul class="section">
                                    <h2>Frontend</h2>
                                    <?php
                                    foreach($page_data["content"]["frontend_technologies"] as $tech) {
                                        echo "<li>" . $tech["name"] . " &bull; " . $tech["years_of_experience"] . " Years of Experience</li>";
                                    }
                                    ?>
                                </ul>
                                <ul class="section">
                                    <h2>Backend</h2>
                                    <?php
                                    foreach($page_data["content"]["backend_technologies"] as $tech) {
                                        echo "<li>" . $tech["name"] . " &bull; " . $tech["years_of_experience"] . " Years of Experience</li>";
                                    }
                                    ?>
                                </ul>
                                <ul class="section">
                                    <h2>Other</h2>
                                    <?php
                                    foreach($page_data["content"]["other_technologies"] as $tech) {
                                        echo "<li>" . $tech["name"] . " &bull; " . $tech["years_of_experience"] . " Years of Experience</li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <ul class="education">
                                <h1>Education</h1>
                                <?php
                                foreach($page_data["content"]["education"] as $education) {
                                    echo "<li>" . $education["name"] . " &bull; " . $education["years"] . "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col right">
                            <h1>Notable Projects</h1>
                            <?php
                            foreach($page_data["content"]["notable_projects"] as $project) {
                                echo "<li><h1 class='name'>" . $project["name"] . "</h1><h2 class='link'>" . $project["url"] . "</h2><p class='description'>" . $project["description"] . "</p></li>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>