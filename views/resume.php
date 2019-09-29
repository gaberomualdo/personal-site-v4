<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "resume"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="block_list">
                <div class="resume_container block post_content">
                    <div class="mobile content post_content">
                        <h1 class="big_title">Résumé</h1>
                        <a href="<?php echo $page_data["content"]["png_version_url"]; ?>" download="Fred_Adams_Résumé.png">Download Résumé (PNG)</a><br>
                        <a href="<?php echo $page_data["content"]["pdf_version_url"]; ?>" download="Fred_Adams_Résumé.pdf">Download Résumé (PDF)</a>
                    </div>
                    <div class="row top_area content">
                        <div class="col image">
                            <img src="<?php echo $page_data["content"]["photo_url"]; ?>" alt="Picture of Me">
                        </div>
                        <div class="col main">
                            <h1 class="name"><?php echo $page_data["content"]["name"]; ?></h1>
                            <h4 class="job_description"><?php echo $page_data["content"]["description"]; ?></h4>
                            <p class="description"><?php echo $page_data["content"]["detailed_description_text"]; ?></p>
                        </div>
                        <p class="last_updated"><?php echo date("F Y", strtotime($page_data["content"]["last_updated"])); ?></p>
                    </div>
                    <div class="row socials content">
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
                    <div class="row main content">
                        <div class="col left">
                            <div class="skills">
                                <h1 class="title">Tech Skills</h1>
                                <ul class="section">
                                    <h2 class="subtitle">Frontend</h2>
                                    <?php
                                    foreach($page_data["content"]["frontend_technologies"] as $tech) {
                                        echo "<li><strong>" . $tech["name"] . "</strong><span> &bull; " . $tech["years_of_experience"] . " Years of Experience</span></li>";
                                    }
                                    ?>
                                </ul>
                                <ul class="section">
                                    <h2 class="subtitle">Backend</h2>
                                    <?php
                                    foreach($page_data["content"]["backend_technologies"] as $tech) {
                                        echo "<li><strong>" . $tech["name"] . "</strong><span> &bull; " . $tech["years_of_experience"] . " Years of Experience</span></li>";
                                    }
                                    ?>
                                </ul>
                                <ul class="section">
                                    <h2 class="subtitle">Other</h2>
                                    <?php
                                    foreach($page_data["content"]["other_technologies"] as $tech) {
                                        echo "<li><strong>" . $tech["name"] . "</strong><span> &bull; " . $tech["years_of_experience"] . " Years of Experience</span></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <ul class="education">
                                <h1 class="title">Education</h1>
                                <?php
                                foreach($page_data["content"]["education"] as $education) {
                                    echo "<li><strong>" . $education["name"] . "</strong><span> &bull; " . $education["years"] . "</span></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="col right">
                            <h1 class="title">Notable Projects</h1>
                            <?php
                            foreach($page_data["content"]["notable_projects"] as $project) {
                                echo "<li><h2 class='name'>" . $project["name"] . "</h2><h4 class='link'>" . $project["url"] . "</h4><p class='description'>" . $project["description"] . "</p></li>";
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