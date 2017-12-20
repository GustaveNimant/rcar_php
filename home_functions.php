<?php
require_once "irp_library.php";
require_once "home_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function home_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  
  $lan = $_SESSION['parameters']['language'];
  
  switch ($lan) {
  case 'en' :
      $html_str .= arce_home_header_en ();
      $html_str .= arce_home_text_en ();
      break;
  case 'fr' :
      $str = arce_home_header_accent_fr ();
      $html_str .= string_replace_accents_to_html_code ($str);
      
      $str = arce_home_text_accent_fr ();
      $html_str .= string_replace_accents_to_html_code ($str);
      break;
  default:
      print_fatal_error ($here, 
      "language were defined as en|fr",
      ">$lan<",
      "Please set it to en of fr"
      );
  }
  $html_str .= comment_exiting_of_function_name ($here);

  $html_str .= irp_provide ('pervasive_page_footer', $here);

  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>