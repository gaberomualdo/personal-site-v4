<?php

function generate_on_this_site_block($side_block) {
    $block_class = "block";
    if($side_block) {
        $block_class = "side_block";
    }
    
    return '
    <div class="' . $block_class . ' on_this_site_block">
        <div class="content">
            <h1 class="title">On This Site</h1>
            <ul class="link_list">
                <a href="/about/">About</a>
                <a href="/blog/">Blog</a>
                <a href="/code/">Code</a>
                <a href="/resume/">Résumé</a>
            </ul>
        </div>
    </div>
    ';
}

?>