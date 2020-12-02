<?php

function get_stripped_url($url) {
  $parsed_project_url = parse_url($url);
  $stripped_url = $parsed_project_url["host"];
  if($parsed_project_url["path"] != "/"){
    $stripped_url .= $parsed_project_url["path"];
  }
  if(array_key_exists("query", $parsed_project_url)) {
    $stripped_url .= "?" . $parsed_project_url["query"];
  }
  return $stripped_url;
}

function interpret_number($n, $abbreviate_magnitude) {
  if(!function_exists("round_to_nearest")){
    function round_to_nearest($toround, $nearest) {
      if($nearest == 0) {
        return 0;
      }
      return floor($toround / $nearest) * $nearest;
    }
  }

  if($abbreviate_magnitude) {
    $exponent = floor(log($n, 10));
    $power_of_ten = pow(10, $exponent);
    $magnitude_letter = "";
    if ($exponent >= 9) { // in the billions
      $magnitude_letter = "B";
      $power_of_ten = pow(10, 9);
    } else if ($exponent >= 6) { // in the millions
      $magnitude_letter = "M";
      $power_of_ten = pow(10, 6);
    } else if ($exponent >= 3) { // in the thousands
      $magnitude_letter = "K";
      $power_of_ten = pow(10, 3);
    } else { // less than a thousand
      return round_to_nearest($n, $power_of_ten);
    }
    return strval(floor($n / $power_of_ten * 10) / 10) . $magnitude_letter;
  } else {
    $round_to_nearest = pow(10, floor(log($n, 10)) - 1);
    return strval(number_format(round_to_nearest($n, $round_to_nearest)));
  }
}

function generate_projects_block($project) {
  global $Parsedown;

  if(!array_key_exists("has_image", $project)) {
    $project['has_image'] = false;
  }

  $list_html = "";
  foreach ($project['background'] as $markdown) {
    $list_html .= '<li>' . str_replace(array("<p>", "</p>"), "", $Parsedown->text($markdown)) . '</li>';
  }

  $stats_items_show = array(
    $project['stats']['lines_of_code'] >= 1000,
    $project['stats']['hits'] >= 1000,
    $project['stats']['stars'] >= 20
  );
  $stats_items_html = array(
    '~' . interpret_number($project['stats']['lines_of_code'], false) . ' Lines of Code',
    interpret_number($project['stats']['hits'], true) . '+ Views',
    interpret_number($project['stats']['stars'], true) . '+ GitHub Stars'
  );
  $stats_html = '';

  foreach ($stats_items_html as $key => $value) {
    if($stats_items_show[$key]) {
      if($stats_html != '') {
        $stats_html .= ' &nbsp;&bull;&nbsp; ';
      }
      $stats_html .= $value;
    }
  }

  $has_image = array_key_exists("has_image", $project) && $project["has_image"];
  
  $has_bg_color = array_key_exists("bg_color", $project);
  $has_bg_color = false;

  $show_stats = $stats_html != '';

  return '
  <div data-project-name="' . $project["name"] . '" class="block project ' . (($has_image || $has_bg_color) ? 'light' : '') . '">
    <div class="meta" style="' .
    ($has_image ? "background-image: /*linear-gradient(rgba(0,0,0,.2), rgba(0,0,0,.2)),*/ url('/api/content/static_files/projects/" . $project['name'] . ".jpg');" : '')
    . ($has_bg_color ? "background-color: " . $project['bg_color'] . ";" : "") . '">
      <div class="inner">
      <h1>' . $project['display_name'] . '</h1>
      <p>' . $project['description'] . '</p>
      ' . (array_key_exists("url", $project) ? '<a target="_blank" href="' . $project['url'] . '">Visit This Project &nbsp;&rarr;</a>' : '<strong>Contact Me for a Demo</strong>') . '
      </div>
    </div>
    <div class="main content">
      <div class="inner">
        <div class="list icons centered">
          <div class="inner">
            ' . (array_key_exists("github_url", $project) ? '<div class="li github with_theme">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
              </div>
              <p><a target="_blank" rel="noreferrer" href="' . $project["github_url"] . '">' . get_stripped_url($project["github_url"]) . '</a></p>
            </div>' : '') . '
            ' . (array_key_exists("tools", $project) ? '<div class="li extra">
              <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23.27 19.743l-11.946-11.945c-.557-.557-.842-1.331-.783-2.115.115-1.485-.395-3.009-1.529-4.146-1.03-1.028-2.375-1.537-3.723-1.537-.507 0-1.015.072-1.506.216l3.17 3.17c.344 1.589-1.959 3.918-3.566 3.567l-3.17-3.17c-.145.492-.217 1-.217 1.509 0 1.347.51 2.691 1.537 3.721 1.135 1.136 2.66 1.646 4.146 1.53.783-.06 1.557.226 2.113.783l11.947 11.944c.468.468 1.103.73 1.763.73 1.368 0 2.494-1.108 2.494-2.494 0-.638-.244-1.276-.73-1.763zm-1.77 2.757c-.553 0-1-.448-1-1s.447-1 1-1 1 .448 1 1-.447 1-1 1zm-8.375-15.753l6.723-6.747 4.152 4.128-6.722 6.771-1.012-1.012 5.488-5.533c.165-.165.165-.435-.001-.602-.166-.165-.436-.165-.601 0l-5.489 5.533-.935-.936 5.495-5.539c.166-.166.166-.437 0-.603-.168-.166-.436-.166-.603.001l-5.494 5.539-1.001-1zm-3.187 9.521l-5.308 5.35c-.166.166-.437.166-.603 0-.165-.166-.166-.436 0-.602l5.308-5.351-.936-.935-5.301 5.343c-.165.168-.435.167-.601.001-.166-.167-.166-.436 0-.602l5.3-5.343-1.004-1.004-5.745 5.787-1.048 5.088 5.203-.937 5.743-5.786-1.008-1.009z"/></svg>
              </div>
              <p>' . implode(", ", $project['tools']) . '</p>
            </div>' : '') . '
            ' . (array_key_exists("extra", $project) ? '<div class="li extra">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21.698 10.658l2.302 1.342-12.002 7-11.998-7 2.301-1.342 9.697 5.658 9.7-5.658zm-9.7 10.657l-9.697-5.658-2.301 1.343 11.998 7 12.002-7-2.302-1.342-9.7 5.657zm12.002-14.315l-12.002-7-11.998 7 11.998 7 12.002-7z"/></svg>
              </div>
              <p>' . $project['extra'] . '</p>
            </div>' : '') . '
            '. ($show_stats ? '<div class="li stats">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7 24h-6v-6h6v6zm8-9h-6v9h6v-9zm8-4h-6v13h6v-13zm0-11l-6 1.221 1.716 1.708-6.85 6.733-3.001-3.002-7.841 7.797 1.41 1.418 6.427-6.39 2.991 2.993 8.28-8.137 1.667 1.66 1.201-6.001z"/></svg>
              </div>
              <p>' . $stats_html . '</p>
            </div>' : '') .'
          </div>
        </div>
        <button class="slide-down">
          <p>About This Project</p>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/></svg>
        </button>
        <ul class="list bullets" style="height: 500px">
          ' . $list_html . '
        </ul>
      </div>
    </div>
  </div>
  ';
}

?>