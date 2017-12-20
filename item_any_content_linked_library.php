<?php

require_once "irp_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";
$Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

/*
let sub_sentence in their original case

$sen_ori="l'objet de la volonté générale est l'intérêt général";
#             0   1   2    3        4     5     6        7      

$sen_ori_rep="l' objet de la volonté générale est l' intérêt général";
#             0   1     2  3     4        5    6  7    8       9    

*/

entering_in_module ($module);

function sub_sentence_linked_of_sub_sentence_matched ($sub_sen_mat){
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sub_sen_mat)");

    $sur_ent = ucfirst ($sub_sen_mat);
    $nam_ent = string_name_of_surname_capitalize ($sur_ent);

    debug_n_check ($here, '$sur_ent', $sur_ent);
    debug_n_check ($here, '$nam_ent', $nam_ent);

    $sub_sen_lin  = '<a href="entry_current_display_script.php?entry_current_name=';
    $sub_sen_lin .= $nam_ent;
    $sub_sen_lin .= '">';
    $sub_sen_lin .= $sub_sen_mat;
    $sub_sen_lin .= '</a>';
    
    debug_n_check ($here, '$sub_sen_lin', $sub_sen_lin);
    exiting_from_function ($here);
    
    return $sub_sen_lin;
}

function is_first_substring_of_substring_off_string ($sub_str, $str) { 
    $here = __FUNCTION__;
    /* entering_in_function ($here . " ($sub_str, $str"); */

/* $sub_str = "souverain" */
/* false = 'La souveraineté du peuple souverain est la souveraineté sur un territoire'; */
/* true = 'souverain est la souveraineté sur un territoire'; */
/* true = 'souverain'; */

    $sub_len = strlen ($sub_str);
    $str_len = strlen ($str);

    if ($str_len == $sub_len) {
        $boo = (substr ($str, 0, $sub_len +1) == $sub_str);
    }
    else {
        $boo = (substr ($str, 0, $sub_len +1) == $sub_str . ' ');
    }

    debug_long ($here, "surname $sub_str sub_sentence $str \$boo >$boo<");
    /* exiting_from_function ($here); */

    return $boo; 
}

function is_surname_included_of_surname_of_sub_sentence_begining ($sur, $sub_sen) {
    $here = __FUNCTION__;
    $boo = (is_first_substring_of_substring_off_string ($sur, $sub_sen)); 
    return $boo;
}

function string_array_extract_of_string_array_of_substring ($sur_a, $sub_sen) {
  $here = __FUNCTION__;
    $ext_a = array ();
    foreach ($sur_a as $sur) {
        if (is_first_substring_of_substring_off_string ($sur, $sub_sen)) { 
            array_push ($ext_a, $sur);
        }
    }
    rsort ($ext_a);

    return $ext_a;
}

function surname_reduced_array_of_surname_by_name_hash_of_entry_name_array_of_surname_lowercase_array_of_full_sentence_original ($sur_by_nam_h, $nam_ent_a, $sur_low_a, $sen_ori) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (\$sur_low_a, $sen_ori)");

/* keeps any surname which is a substring of the full sentence original */
/* supresses duplicated surnames */

    # debug_n_check ($here, '$sur_low_a', $sur_low_a);

    /* $sur_by_nam_h = surname_by_name_hash_make (); */

    $sen_low = strtolower ($sen_ori);

/* reduce surname array $sur_low_a to useful elements */

    $sur_red_a = array ();
    foreach ($sur_low_a as $sur_low){
        /* debug_n_check ($here, 'foreach $sur_low', $sur_low); */
        if (
            (is_substring_of_substring_off_string ($sur_low, $sen_low))
            && 
            (surname_is_entry_of_entry_name_array_of_surname_lowercase_of_surname_by_name_hash ($nam_ent_a, $sur_low, $sur_by_nam_h))
        ) {
            array_push ($sur_red_a, $sur_low);
        }
        
    }
    $sur_red_a = array_unique ($sur_red_a);
    
    # debug ($here, '$sur_red_a', $sur_red_a);
    exiting_from_function ($here);
    
    return $sur_red_a;
}

function surname_local_array_of_surname_reduced_array_of_word_original ($sur_red_a, $wor_ori) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (\$sur_red_a, $wor_ori)");

    #debug ($here, '$sur_red_a', $sur_red_a);

    $sur_loc_a = string_array_extract_of_string_array_of_substring ($sur_red_a, $wor_ori);
 
    # debug ($here, '$sur_loc_a', $sur_loc_a);
    exiting_from_function ($here);

    return $sur_loc_a;
}

function sub_sentence_original_of_word_current_position_of_full_sentence_original_replaced ($wor_pos, $sen_ori) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($wor_pos, $sen_ori)");

    $wor_ori_a = explode (" ", $sen_ori);
    debug_n_check ($here, '$wor_ori_a', $wor_ori_a);

    if ($wor_pos >= count ($wor_ori_a)) {
        print_fatal_error ($here,
        "\$wor_pos = $wor_pos were < " . count ($wor_ori_a) . " in full_sentence_original >$sen_ori<",
        "count (\$wor_ori_a) = " . count ($wor_ori_a),
        "Check"
        );
    }
    
    $wor_ori_cur = $wor_ori_a [$wor_pos];
    debug_long ($here, '$wor_pos >' . $wor_pos . '< $wor_ori_cur >' . $wor_ori_cur . '<');
    
    if ( string_is_empty_of_string ($wor_ori_cur)) {
        print_fatal_error ($here,
        "\$wor_ori_cur for \$wor_pos = >$wor_pos< were NOT empty",
        "\$wor_ori_cur = >$wor_ori_cur<",
        "count (\$wor_ori_a) = " . count ($wor_ori_a)
        );
    }
    
    $sub_wor_ori_a = array_slice ($wor_ori_a, $wor_pos);
    $sub_sen_ori = implode (" ", $sub_wor_ori_a);

    debug_n_check ($here, '$sub_sen_ori', $sub_sen_ori);
    exiting_from_function ($here);

    return $sub_sen_ori;
}

function sub_sentence_original_matched_of_surname_reduced_array_of_sub_sentence_original ($sur_red_a, $sub_sen_ori) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (\$sur_red_a, $sub_sen_ori)");

    # debug ($here, '$sur_red_a', $sur_red_a);

    $sub_sen_low = strtolower($sub_sen_ori);
    $sur_loc_a = array ();
    foreach ($sur_red_a as $sur_low) {
        if (is_first_substring_of_substring_off_string ($sur_low, $sub_sen_low)) { 
            array_push ($sur_loc_a, $sur_low);
        }
    }

    if (array_is_empty_of_array ($sur_loc_a)) {
        $sub_sen_ori_mat = "";
    }
    else {
        rsort ($sur_loc_a);
        $sur_loc_low = $sur_loc_a[0];
        debug_n_check ($here, '$sur_loc_low', $sur_loc_low);

        $sub_sen_ori_mat = substr ($sub_sen_ori, 0, strlen ($sur_loc_low));
    }

    debug_n_check ($here, '$sub_sen_ori_mat', $sub_sen_ori_mat);
    exiting_from_function ($here);

    return $sub_sen_ori_mat;
}

function sub_sentence_original_matched_array_of_surname_by_name_hash_of_entry_name_array_of_full_sentence_original_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $sen_ori, $sur_low_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($sen_ori, \$sur_low_a)");

    $sen_ori_rep = str_replace ('\'', "' ", $sen_ori); 
    debug ($here, '\$sen_ori_rep', $sen_ori_rep);
    $wor_ori_a = explode (" ", $sen_ori_rep);
    debug_n_check ($here, '$wor_ori_a', $wor_ori_a);

    $sur_red_a = surname_reduced_array_of_surname_by_name_hash_of_entry_name_array_of_surname_lowercase_array_of_full_sentence_original ($sur_by_nam_h, $nam_ent_a, $sur_low_a, $sen_ori);
    debug ($here, '$sur_red_a', $sur_red_a);

    $sub_sen_ori_a = array ();
    $max_pos = count ($wor_ori_a) -1;
    $sub_sen_cur = $sen_ori_rep;
    $sen_pos=0;
    $wor_pos=0;
    
    debug_n_check ($here, '$max_pos', $max_pos);

    while ($wor_pos <= $max_pos) {
        
        $wor_ori_cur = $wor_ori_a[$wor_pos]; 
        debug_long ($here, 'while $wor_pos >' . $wor_pos . '< $wor_ori_cur >' . $wor_ori_cur . '<');
        
        $len_cur = strlen ($wor_ori_cur);
        $sub_sen_ori = sub_sentence_original_of_word_current_position_of_full_sentence_original_replaced ($wor_pos, $sen_ori_rep);

        debug_n_check ($here, '$sub_sen_ori', $sub_sen_ori); 

        $sub_sen_ori_mat = sub_sentence_original_matched_of_surname_reduced_array_of_sub_sentence_original ($sur_red_a, $sub_sen_ori);
        debug_n_check ($here, '$sub_sen_ori_mat', $sub_sen_ori_mat);
        
        if ( ! string_is_empty_of_string ($sub_sen_ori_mat) ) {
            
            $sub_sen_ori_a[$sen_pos] = "matched:" . $sub_sen_ori_mat;
            $sen_pos = $sen_pos + 1;

            $wor_sub_ori_a = explode (' ', $sub_sen_ori_mat);
            $wor_pos = $wor_pos + count ($wor_sub_ori_a);
            debug_long ($here, 'if   $wor_pos >' . $wor_pos . '< $sen_pos >' . $sen_pos . '<');
        }
        else {
            $wor_pos = $wor_pos + 1;
            $sub_sen_ori_a[$sen_pos] = $wor_ori_cur;
            $sen_pos = $sen_pos + 1;            
            debug_long ($here, 'else $wor_pos >' . $wor_pos . '< $sen_pos >' . $sen_pos . '<');
        }

    }

    # debug_n_check ($here, '$sub_sen_ori_a', $sub_sen_ori_a);
    exiting_from_function ($here);
    
    return $sub_sen_ori_a;    
}

function replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_item_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite, $sur_low_a) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($con_ite, $sur_low_a[0], ...)");

    $sub_sen_ori_a = sub_sentence_original_matched_array_of_surname_by_name_hash_of_entry_name_array_of_full_sentence_original_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite, $sur_low_a);
    debug_n_check ($here, '$sub_sen_ori_a', $sub_sen_ori_a);

    $con_ite_rep = "";
    foreach ($sub_sen_ori_a as $sub_sen_ori) {

        debug_n_check ($here, 'foreach $sub_sen_ori', $sub_sen_ori);

        if (substr ($sub_sen_ori, 0, strlen ('matched:')) == "matched:") {
            $sub_sen_ori_cut = str_replace ('matched:', '', $sub_sen_ori);
            $sub_sen_ori_rep = sub_sentence_linked_of_sub_sentence_matched ($sub_sen_ori_cut);
            debug_n_check ($here, 'if $sub_sen_ori_rep', $sub_sen_ori_rep);
            $con_ite_rep .= $sub_sen_ori_rep . ' ';
        }
        else {
            $con_ite_rep .= $sub_sen_ori . ' ';
            debug_n_check ($here, 'else empty $sub_sen_ori', $sub_sen_ori);
        }
        debug_n_check ($here, 'foreach $con_ite_rep', $con_ite_rep);
    }
    $con_ite_rep = trim ($con_ite_rep, ' ');
    /* $con_ite_rep = ucfirst ($con_ite_rep); */
    
    debug_n_check ($here, '$con_ite_rep', $con_ite_rep);
    exiting_from_function ($here);

    return $con_ite_rep;
}


exiting_from_module ($module);

?>
