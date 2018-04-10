<?php

require_once "management_library.php";

function justification_check ($jus_ite) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here , "input justification", $jus_ite);

  if ($jus_ite == '') {
    die ('$here :<br><span class="my-fieldset"><center><b>Indiquez une justification pour votre modify</b></center></span> ');
  }
  
  exiting_from_function ($here);
  return;
}

function check_justification_content ($jus_con) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  debug_n_check ($here, "justification", $jus_con);

  $prohibited_words = 'enfoiré|connard|merde|salaud|enculé';

  $stars='*****';

  $count=0;
  $bad_words_replaced = preg_replace('`\b('. $prohibited_words .')[sx]?\b`si', $stars, $jus_con, -1, $count);

  $avertissement = "Veuillez utiliser des termes corrects s'il vous plaît<br>";

  debug_n_check ($here, "count", $count);

  if ($count < 1){
    print "<br>". $jus_con;
  }
  else {
    print "<br>" . $avertissement;
  };

  print "<br>" . $bad_words_replaced;
  exiting_from_function ($here);
  return;
};


function check_justification_count ($jus_con) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    $str_a = explode (' ', $jus_con);
    
    # debug_n_check ($here , "string array", $str_a);
    
    array_filter ();
    $count = count ($str_a);
    debug_n_check ($here, "count", $count);
    
    if ($count < 3){
        print "<br>Entrez une justification<br>";
    }
    exiting_from_function ($here);
    return;
};

function justification_get_content_of_item_name_of_entry_name ($nam_ite, $nam_ent) {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $hdir = $_SESSION['parameters']['absolute_path_server'];
    $fnd_ent = $hdir . '/' . $nam_ent;
    debug_n_check ($here , '$fnd_ent', $fnd_ent);

    $nam_ite_jus = $nam_ite . '.jus';
    $fno = $fnd_ent . '/' . $nam_ite_jus;
    
    $jus_con = file_content_read_of_fullnameoffile ($fno);

    debug_n_check ($here, '$jus_con', $jus_con);
    exiting_from_function ($here);

    return $jus_con;
}

function justification_select_of_justification_name_array ($nam_jus_a) {
    $here = __FUNCTION__;
    entering_in_function ($here);

    debug_n_check ($here, '$nam_jus_a', $nam_jus_a);

    $en_tit = 'select a justification';
    $la_tit = language_translate_of_en_string ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_tit);

    $get_key_sel = 'justification_name';

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="' . $get_key_sel . '">' . "\n";
    $html_str .= '<option selected>' . $la_Tit . '</option>';

    foreach ($nam_jus_a as $key => $en_nam_jus) {
        $la_nam_jus = language_translate_of_en_string ($en_nam_jus);
        $html_str .= '<option>' . $la_nam_jus . '</option>' . "\n";
    }

    $html_str .= '</select>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here, '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;
}

function justification_select_n_textarea_of_justification_name_array_of_entity_textarea ($nam_jus_a, $entity_textarea) {
    $here = __FUNCTION__;
    entering_in_function ($here . " (..., $entity_textarea)");

    debug_n_check ($here, '$nam_jus_a', $nam_jus_a);

    $row_hta = $_SESSION['parameters']['html_textarea_rows'];
    $col_hta = $_SESSION['parameters']['html_textarea_cols'];

    $en_tit = 'select a justification';
    $la_tit = language_translate_of_en_string ($en_tit);
    $la_Tit = string_html_capitalized_of_string ($la_tit);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<select name="justification_select">' . "\n";
    $html_str .= '<option selected>' . $la_Tit . '</option>';

    foreach ($nam_jus_a as $key => $nam_jus) {
        $html_str .= '<option>' . $nam_jus . '</option>' . "\n";
    }

    $html_str .= '</select>' . "\n";
    $html_str .= '<br>';
    
    $html_str .= '<textarea name="' . $entity_textarea; 
    $html_str .= '" rows="' . $row_hta .'" cols="' .$col_hta;
    $html_str .= '"/>';
    $html_str .= '</textarea> ' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    debug_n_check ($here, '$html_str', $html_str);
    exiting_from_function ($here);

    return $html_str;
}


?>