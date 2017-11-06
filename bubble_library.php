<?php

require_once "common_html_library.php";
require_once "bubble_en_text_by_key_hash_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "functions to make bubbles";
$Documentation[$module]['what for'] = "to bubble a sentence divided into words";

entering_in_module ($module);

function bubble_bubbled_text_of_text_of_bubble_text ($txt, $bub_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($txt, $bub_txt)");

  $html_str  = '<span title="' . $bub_txt . '">';
  $html_str .= '<u>' . $txt . '</u>';
  $html_str .= '</span>';

  exiting_from_function ($here . " with >$html_str<");

  return $html_str;
}

function bubble_bubbled_text_of_text_of_bubble_text_array ($inp_txt, $bub_txt_a) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($inp_txt, \$bub_txt_a)");

  if ( array_is_empty_of_array ($bub_txt_a) ){
      $html_str = $inp_txt;
  }
  else {
#      debug_n_check ($here, '$bub_txt_a', $bub_txt_a);

      $bub_key_a = array_keys ($bub_txt_a);
      $inp_txt_exp = str_replace ("squo;", "squo; ", $inp_txt);
      $inp_txt_a = explode (' ', $inp_txt_exp);
      
      debug_n_check ($here, '$inp_txt_a', $inp_txt_a);

      $html_str_a = array ();
      $count=0; /* Improve */
      $bubble_html  = '';

      foreach ($inp_txt_a as $key_inp => $wor) {
          $count++;
          if ( in_array ($wor, $bub_key_a)) {
#              debug_n_check ($here, '$key_inp', $key_inp);
#              debug_n_check ($here, '$wor', $wor);

              $bubble_text  = $bub_txt_a[$wor];
#              debug_n_check ($here, '$bubble_text', $bubble_text);

              if ($count == 1) {
                  $wor = string_html_capitalized_of_string ($wor); 
              }

              $str = bubble_bubbled_text_of_text_of_bubble_text ($wor, $bubble_text);
              $html_str_a[$key_inp] = $str;
          }
          else {
              $html_str_a[$key_inp] = $wor;
          }
      }
      
      $html_str_exp = implode (' ', $html_str_a);
      $html_str = str_replace ("squo; ", "squo;", $html_str_exp);
  }
  
  exiting_from_function ($here . ' with >' . $html_str . '<');

  return $html_str;
}

function bubble_la_text_by_key_array_make_of_la_text ($la_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($la_txt)");

  $bubble_la_text_by_key_array = bubble_la_text_by_key_array_make ();

#  debug_n_check ($here , '$bubble_la_text_by_key_array', $bubble_la_text_by_key_array);

  $la_txt = str_replace ("squo;", "squo; ", $la_txt);
  $la_wor_a = explode (' ', $la_txt);

#  debug_n_check ($here , '$la_wor_a', $la_wor_a);
  
  $la_bub_txt_a = array ();
  foreach ($la_wor_a as $k => $la_wor) {
      if (array_key_exists ($la_wor, $bubble_la_text_by_key_array)){
          /* $la_wor is a bubbled word */
          $la_bub_txt = $bubble_la_text_by_key_array[$la_wor];
          $la_bub_txt_a [$la_wor] = $la_bub_txt;
#          debug_n_check ($here , '$la_wor', $la_wor);
#          debug_n_check ($here , '$la_bub_txt', $la_bub_txt);
      } 
  }
  
  debug ($here , '$la_bub_txt_a', $la_bub_txt_a);

  exiting_from_function ($here . " ($la_txt)");
  return $la_bub_txt_a;
}

function bubble_bubbled_la_text_of_en_text ($en_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_txt)");

  $la_txt = language_translate_of_en_string ($en_txt);
  $la_bub_txt_a = bubble_la_text_by_key_array_make_of_la_text ($la_txt);
  $la_bub_txt = bubble_bubbled_text_of_text_of_bubble_text_array ($la_txt, $la_bub_txt_a);

  exiting_from_function ($here . " with >$la_bub_txt<");

  return $la_bub_txt;
}

function bubble_bubbled_capitalized_la_text_of_en_text ($en_bub_txt) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($en_bub_txt)");

  $la_bub_txt = bubble_bubbled_la_text_of_en_text ($en_bub_txt);

  $html_str  = "\n" . comment_entering_of_function_name ($here);
  $html_str .= string_html_capitalized_of_string ($la_bub_txt); 
  $html_str .= "\n" . comment_exiting_of_function_name ($here);

  exiting_from_function ($here . ' with >' . $html_str . '<');

  return $html_str;
}

exiting_from_module ($module);

?>
