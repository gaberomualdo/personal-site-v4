<?php include __DIR__ . "/_config.php" ?>

<?php $filename = "resume"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="container">
            <div class="block_list">
                <div class="block resume_container post_content">
                    <div class="mobile content post_content">
                        <h1 class="big_title">Résumé</h1>
                        <p>This page is not available on mobile yet. Switch to a larger device or reach out to me over email for a copy of my résumé directly.</p>
                        <!-- <a href="<?php echo $page_data["content"]["png_version_url"]; ?>" download="Gabriel Romualdo's Résumé.png">Download Résumé (PNG)</a><br>
                        <a href="<?php echo $page_data["content"]["pdf_version_url"]; ?>" download="Gabriel Romualdo's Résumé.pdf">Download Résumé (PDF)</a> -->
                    </div>
                    <div class="row top_area content">
                        <div class="col image">
                            <img src="<?php echo $page_data["content"]["photo_url"]; ?>" alt="Picture of Me">
                        </div>
                        <div class="col main">
                            <h1 class="name"><?php echo $page_data["content"]["name"]; ?></h1>
                            <h4 class="job_description"><?php echo $page_data["content"]["description"]; ?></h4>
                            <p class="description"><?php echo $page_data["content"]["detailed_description_text"]; ?></p>
                            <div class="socials" style="display: none;">
                                <?php
                                foreach($page_data["content"]["social_links"] as $link) {
                                    echo "<a style='--color: " . $link["color"] . ";--bg-color: " . $link["bgcolor"] . ";' href='" . $link["url"] . "' target='_blank'>";
                                    echo "<strong>" . $link["social_name"] . ": </strong><span>" . $link["name"] . "</span>";
                                    echo "</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- <p class="last_updated"><a href="<?php echo $page_data["content"]["pdf_version_url"]; ?>" download="Gabriel Romualdo's Résumé.pdf">Download as PDF</a></p> -->
                    </div>
                    <div class="row socials content" style="display:block">
                        <?php
                        foreach($page_data["content"]["social_links"] as $link) {
                            echo "<div class='col'>";
                            echo $link["logo"];
                            echo "<p><a class='natural_link' href='" . $link["url"] . "' target='_blank'>" . $link["name"] . "</a></p>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="row quote content">
                        <p class="quote_content">
                        With every aspect of the project, [Gabriel] exceeded expectations, completing tasks efficiently and accurately but also going beyond the call of duty each time to add more value.
                        </p>
                        <p class="attribution"><em>&mdash; Alex Koumpas, Product Manager at Spirited Network</em></p>
                    </div>
                    <div class="row main content">
                        <div class="col left">
                            <ul class="projects">
                                <h1 class="title">Work Experience</h1>
                                <?php
                                foreach($page_data["content"]["experience"] as $experience) {
                                    echo "<li><h2 class='name'>" . $experience["name"] . "</h2><h4 class='link'>" . $experience["title"] . " &nbsp;&bull;&nbsp; " . $experience["duration"] . "</h4><p class='description'>" . $experience["description"] . "</p></li>";
                                }
                                ?>
                            </ul>
                            <div class="skills">
                                <?php
                                function generate_years_experience_list($list){
                                    foreach($list as $tech) {
                                        if(!array_key_exists('name', $tech)) {
                                            echo "<span class='li-separator'></span>";
                                            continue;
                                        }

                                        $extra_s = "s";
                                        if(is_numeric($tech["years_of_experience"]) && intval($tech["years_of_experience"]) == 1) {
                                            $extra_s = "";
                                        }
                                        echo "<li><strong>" . $tech["name"] . "</strong><span> &bull; " . $tech["years_of_experience"] . " Year" . $extra_s . " of Experience</span></li>";
                                    }
                                }
                                ?>
                                <ul class="list-section">
                                    <h1 class="title">Education</h1>
                                    <?php
                                    foreach($page_data["content"]["education"] as $education) {
                                        echo "<li><strong>" . $education["name"] . "</strong><span> &bull; " . $education["years"] . "</span></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col right">
                            <ul class="projects">
                                <h1 class="title">Projects</h1>
                                <?php
                                foreach($page_data["content"]["notable_projects"] as $project) {
                                    $parsed_project_url = parse_url($project["url"]);
                                    $project_url_stripped = $parsed_project_url["host"];
                                    if($parsed_project_url["path"] != "/"){
                                        $project_url_stripped .= $parsed_project_url["path"];
                                    }
                                    if(array_key_exists("query", $parsed_project_url)) {
                                        $project_url_stripped .= "?" . $parsed_project_url["query"];
                                    }

                                    echo "<li><h2 class='name'>" . $project["name"] . "</h2><h4 class='link'><a class='natural_link' href='" . $project["url"] . "' target='_blank'>" . $project_url_stripped . "</a></h4><p class='description'>" . $project["description"] . "</p></li>";
                                }
                                ?>
                            </ul>
                            <ul class="section">
                                <h1 class="title">Technical Skills</h1>
                                <?php
                                generate_years_experience_list($page_data["content"]["technologies"]);
                                ?>
                            </ul>
                            <ul class="list-section" style="margin-top: 2.5rem;">
                                <h1 class="title">Activities</h1>
                                <?php
                                foreach($page_data["content"]["activities"] as $activities) {
                                    echo "<li><strong>" . $activities["name"] . "</strong><span> &bull; " . $activities["description"] . "</span></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include get_path_of_include("footer.php") ?>
        <?php
        // resume display mode is for printing the resume
        $query_params = $request->getQueryParams();
        if(array_key_exists('print-this-page', $query_params)) {
            echo "
            <style>
                body > div.container > div.block_list > div.resume_container > div.row.quote {
                    display: none;
                }
                body {
                    zoom: 55%;
                }
                .container {
                    padding: 0 !important;
                    margin-top: 0 !important;
                    margin-bottom: 0 !important;
                }
                .block_list, body>div.container>div.block_list, body>div.container>div.block_list>.block {
                    margin-bottom: 0 !important;
                }
                nav, .nav_background, footer, body>div.container>div.block_list>div.resume_container>div.row.top_area>p.last_updated {
                    display: none !important;
                }
                body>div.container>div.block_list>.block>.content {
                    padding-bottom: 1.6rem;
                }
                a {
                    color: inherit !important;
                    font-weight: inherit !important;
                }
            </style>
            ";
        }
        ?>

        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>