<?php

function get_text_on_willforge_of_wiki_of_pagename ($wiki, $pag_nam) {
    $here = __FUNCTION__;
    
    $full_url  = '';
    $full_url .= 'http://willforge.fr/';
    $full_url .= $wiki;
    $full_url .= '/api.php?action=query&prop=revisions&rvprop=content&titles=';
    $full_url .= $pag_nam;
    $full_url .= '&format=php';
    
    $pag_con = file_content_read_of_fullnameoffile ($full_url);
    $page_con_a = unserialize ($pag_con);
    
    foreach ($page_con_a as $key => $val) {
        foreach ($val as $key2 => $val2) {
            foreach ($val2 as $key3 => $val3) {
                foreach ($val3 as $key4 => $val4) {
                    foreach ($val4 as $key5 => $val5) {
                        $html_str = $val5['*'];
                    }
                }
            }
        }
    }
    
    $html_str = utf8_decode ($html_str);
    return $html_str;
}

print get_text_on_willforge_of_wiki_of_pagename ('wikisys', 'Windows_10');

print '<hr> ';

print get_text_on_willforge_of_wiki_of_pagename ('wikiwil', 'Arce/Présentation');

?>
