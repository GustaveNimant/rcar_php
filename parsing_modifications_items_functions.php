<?php

require_once "common_html_functions.php";
require_once "management_functions.php";
require_once "debug_functions.php";
require_once "file_functions.php";

/* Improve names FCC 28 February 2016 */

function entries_n_item_sequence_string_list_build () {
 $here = __FUNCTION__;
  entering_in_function ($here);

  $pro_a = array ();
  
  $nam_ent_a = irp_provide ('entry_name_array', $here);
  $hpse_dir = basic_directory_of_name ("hd_php_server");

  foreach ( $name_ent_a as $key => $val ) {

    $fil_a = scandir ($hpse_dir . "/" . $val);
      
    array_shift ($fil_a);
    array_shift ($fil_a);

    $pro_a[$val] = $fil_a;

  }
  
  exiting_from_function ($here);
  return $pro_a;
}

function content_of_files_of_entries () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ent_fil_a = irp_provide ('entries_n_item_sequence_string_list', $here);
  $hpse_dir = basic_directory_of_name ("hd_php_server");
  $con_fil_a = array ();

  foreach ($ent_fil_a as $ent => $key) {
    foreach ($key as $fil) {
      $con = file_content_read ($hpse_dir . '/' . $ent . '/' . $fil);
      $con_fil_a[$ent][$fil] = $con;
    }
  }
  

 exiting_from_function ($here);
 return $con_fil_a;
}

function git_diff_item_name () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $ext = $_SESSION['parameters']['block_filename_extension'];
  $con_fil_a = content_of_files_of_entries ();

  foreach ($con_fil_a as $ent => $pro){
    
    $pro_fil = array_flip ($pro);
    $nam_ite = array_slice ($pro_fil, -3, 3);
    
    foreach ($nam_ite as $key => $val){
      /* if ($val == strpbrk ($val, $ext)){ */
	print "<br>$val";
      }
  
    /* $nam_ite = array_slice ($nam_ite); */
    /* print_r ($nam_ite); */
	   }

  exiting_from_function ($here);
}

?>