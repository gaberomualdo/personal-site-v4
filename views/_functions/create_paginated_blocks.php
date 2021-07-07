<?php

function create_paginated_blocks($blocks, $block_type, $perpage, $currentpage) {
  global $filename;

  function create_block($block, $type) {
    if($type == "blog") {
      echo generate_blog_block($block);
    } else if ($type == "code") {
      echo generate_code_block($block);
    } else if ($type == "projects") {
      echo generate_projects_block($block);
    }
  }

  $blocks_count = count($blocks);
  
  if($blocks_count <= $perpage) {
    foreach($blocks as $block) {
      create_block($block, $block_type);
    }
  } else {
    $page_count = ceil($blocks_count / $perpage);
    
    if($currentpage < 1 || $currentpage > $page_count) {
      // current page isn't valid; resort to first page
      $currentpage = 1;
    }

    // create pagination select component HTML
    $page_links_html = "";
    for($x = 1; $x <= $page_count; $x++){
      $page_links_html .= "<a aria-label='Page " . $x . "' href='?page=" . $x . "' class='" . ($currentpage == $x ? 'active' : '') . "'>" . $x . "</a>";
    }

    $pagination_inner_html = '
      <div class="inner">        
        <a aria-label="Previous Page" class="back ' . ($currentpage > 1 ? '' : 'disabled') . '" ' . ($currentpage > 1 ? 'href="?page=' . ($currentpage - 1) . '"' : '') . '>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
        </a>
        ' . $page_links_html . '
        <a aria-label="Next Page" class="next ' . ($currentpage < $page_count ? '' : 'disabled') . '" ' . ($currentpage < $page_count ? 'href="?page=' . ($currentpage + 1) . '"' : '') . '>
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
        </a>
      </div>
    ';

    // create blocks
    $start_block_idx = $perpage * ($currentpage - 1);
    $end_block_idx = $perpage * ($currentpage);
    for($i = $start_block_idx; $i < $end_block_idx; $i++) {
      if($i < $blocks_count) { // last page may not be of $perpage length
        create_block($blocks[$i], $block_type);
      }
    }

    // show pagination at the end
    echo '<div class="pagination">' . $pagination_inner_html . '</div>';


    // don't display first card if not first page
    if($currentpage != 1) {
      if($filename == 'home') {
        echo "<style>body>div.container>div.block_list>.block.welcome, body>div.container>div.block_list>.block.welcome+.block_row{display:none;}</style>";
      } else {
        // this line works, but I'm not ready to push just yet because small UI edits are needed on the projects page
        // echo "<style>body>div.container>div.block_list>.block.intro{display:none;}</style>";
      }
    }
  }
}

?>