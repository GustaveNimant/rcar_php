<?php

require_once "debug_array_library.php";
require_once "entry_name_array_functions.php";
require_once "irp_library.php";

$module = "block_content_linked_by_block_name_hash_functions";

$Documentation[$module]['purpose'] = "to set href links for each word of an block content being an entry_current_surname";
$Documentation[$module]['word'] = " a word of the property content string. Example : en démocratie, la, volonté, ...";
$Documentation[$module]['word_excluded'] = "words excluded are defined in an array";
$Documentation[$module]['word_filtered'] = "a word of the original block content string after exclusion";
$Documentation[$module]['word_cleaned'] = "a word of the original block content string after filtering, removing accents and capitalize. Similar to entry_current_name";


$Documentation[$module]['sentence_original'] = "the current content for an block";
$Documentation[$module]['word_original'] = "a word of the sentence_original";
$Documentation[$module]['sub_sentence'] = "the right part of the sentence_original starting from current word position";
$Documentation[$module]['sub_sentence_matched'] = "the left part of sub_sentence_subright that matches a surname";
$Documentation[$module]['surname_reduced_array'] = "the array of the surnames that match any substring of the sentence_original";
$Documentation[$module]['surname_local_array'] = "the array of the surnames that begins as the current word";

/*
let sub_sentence in their original case

$sen_ori="Toutes les populations ont une Volonté générale et une volonté populaire";
#           0     1       2       3   4    5         6     7  8    9      10  

*/

entering_in_module ($module);

function block_content_linked_by_block_name_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $con_by_nam_ite_a = irp_provide ('block_content_by_block_name_hash', $here);
  /* $sur_by_nam_h = surname_by_name_hash_make (); */
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here); 
  $sur_low_a = lowercase_n_sort_of_string_by_key_array ($sur_by_nam_h);
  $nam_ent_a = irp_provide ('entry_name_array', $here);

  foreach ($con_by_nam_ite_a as $nam_ite => $con_ite) {
      $wor_lin_by_nam_ite_a [$nam_ite] = replace_all_sub_sentence_by_links_of_surname_by_name_hash_of_entry_name_array_of_block_content_of_surname_lowercase_array ($sur_by_nam_h, $nam_ent_a, $con_ite, $sur_low_a);
  }

  # debug ($here, '$wor_lin_by_nam_ite_a', $wor_lin_by_nam_ite_a);
  exiting_from_function ($here);
  
  return $wor_lin_by_nam_ite_a;
}

exiting_from_module ($module);

?>
