<?php

require_once "management_library.php";

$module = "justification_functions";
entering_in_module ($module);

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
    
    $dir_pat = file_specific_directory_name_of_basic_name_of_name ("hd_php_server", $nam_ent);
 
    $nam_ite_jus = $nam_ite . '.jus';
    $fno = $dir_pat . $nam_ite_jus;
    
    $jus_con = file_content_read_of_fullnameoffile ($fno);

    debug_n_check ($here, '$jus_con', $jus_con);
    exiting_from_function ($here);

    return $jus_con;
}

exiting_from_module ($module)

?>