<?php

require_once "common_html_functions.php";
require_once "entry_display_functions.php";
require_once "management_functions.php";
require_once "entry_information_functions.php";
require_once "bubble_text_en_by_key_array_functions.php";

$module = "bubble_functions";
# entering_in_module ($module);

function bubble_bubbled_text_of_text_of_bubble_text_array ($inp_txt, $bub_txt_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($inp_txt, $bub_txt_a)");

  if ( is_empty_of_array ($bub_txt_a) ){
      $out_txt = $inp_txt;
  }
  else {
      # debug_n_check ($here, '$bub_txt_a', $bub_txt_a);
      $bub_key_a = array_keys ($bub_txt_a);
      # debug_n_check ($here, '$bub_key_a', $bub_key_a);
      
      $inp_txt_exp = str_replace ("squo;", "squo; ", $inp_txt);
      $inp_txt_a = explode (' ', $inp_txt_exp);
      
      debug_n_check ($here, '$inp_txt', $inp_txt);
      # debug_n_check ($here, '$inp_txt_a', $inp_txt_a);
      
      $out_txt_a = array ();
      
      $count=0; /* Improve */
      foreach ($inp_txt_a as $key_inp => $wor) {
          $count++;
          if ( in_array ($wor, $bub_key_a)) {
              $bubble_text  = $bub_txt_a[$wor];
              $bubble_html  = '<span title="' . $bubble_text . '">';
              $bubble_html .= '<u>' ;
              if ($count == 1) {
                  $bubble_html .= string_html_capitalized_of_string ($wor); 
              }
              else {
                  $bubble_html .= $wor; 
              }
              $bubble_html .= '</u>';
              $bubble_html .= '</span>';
              $out_txt_a[$key_inp] = $bubble_html;
          }
          else {
              $out_txt_a[$key_inp] = $wor;
          }
      }
      
      $out_txt_exp = implode (' ', $out_txt_a);
      $out_txt = str_replace ("squo; ", "squo;", $out_txt_exp);
  }
  
  debug ($here, '$out_txt', $out_txt);
  
  exiting_from_function ($here);
  return $out_txt;
}

function bubble_text_la_by_key_array_make_of_text_la_of_language ($la_txt, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($la_txt, $lan)");

  $bubble_text_la_by_key_array = bubble_text_la_by_key_array_make_of_language ($lan);

  $la_txt = str_replace ("squo;", "squo; ", $la_txt);
  $la_wor_a = explode (' ', $la_txt);

  # debug_n_check ($here , '$la_wor_a', $la_wor_a);

  foreach ($la_wor_a as $k => $la_wor) {
      if (array_key_exists ($la_wor, $bubble_text_la_by_key_array)){
          $la_bub_txt_a [$la_wor] = $bubble_text_la_by_key_array[$la_wor];
      } 
  }

  # debug ($here , '$la_bub_txt_a', $la_bub_txt_a);

  exiting_from_function ($here);
  return $la_bub_txt_a;
}

function bubble_bubbled_text_la_of_text_en_of_language ($en_txt, $lan) {
  $here = __FUNCTION__;
  entering_in_function ($here . "($en_txt, $lan)");

  $la_txt = language_translate_of_en_string_of_language ($en_txt, $lan);
  $la_bub_txt_a = bubble_text_la_by_key_array_make_of_text_la_of_language ($la_txt, $lan);
  $la_bub_txt  = bubble_bubbled_text_of_text_of_bubble_text_array ($la_txt, $la_bub_txt_a);

  debug_n_check ($here , '$la_txt', $la_txt);
  debug_n_check ($here , '$la_bub_txt', $la_bub_txt);

  exiting_from_function ($here);
  return $la_bub_txt;
}

# exiting_from_module ($module);

?>
