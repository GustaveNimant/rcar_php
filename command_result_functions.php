<?php

require_once "irp_library.php";
require_once "command_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function command_result_page_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'page for displaying the result of the execution of command'; 

  $en_com_act = irp_provide ('command_action', $here);
  $la_com_act = language_translate_of_en_string ($en_com_act);

  $la_bub_tit  = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_bub_Tit  = string_html_capitalized_of_string ($la_bub_tit);
  $la_bub_Tit .= " <b><i>$la_com_act</i></b>";

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>' . "\n";
  $html_str .= common_html_div_background_color_of_html ($la_bub_Tit);
  $html_str .= '</center>' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);
  
  return $html_str;
}

function command_html_result_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $com_act = irp_provide ('command_action', $here);
  $com_arg = irp_provide ('command_argument', $here);
  
  switch ($com_act) {
  case 'debug' :
      break;
  case 'display' :
      if (irp_is_providable_of_irp_key ($com_arg) ) {
          $com_res = irp_provide ($com_arg, $here);
      }
      else {
          $com_res = command_display ($com_arg);
      }
      break;
  case 'load' :
      $com_res = command_load ($com_arg);
      break;
  case 'read' :
      $com_res = command_read ($com_arg);
      break;
  case 'remove' :
      $com_res = command_remove ($com_arg);
      break;
  case 'set' :
     $com_res =  command_set ($com_arg);
      break;         
  case 'unset' :
      $com_res = command_unset ($com_arg);
      break;         
  case 'write' :
      $com_res = command_write ($com_arg);
      break;         
  default:  
      $com_res;
  }

  debug_n_check ($here , '$com_res', $com_res);
  $html_str = string_html_of_variable ($com_res);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function command_result_link_to_return_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_to_return = 'command_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<center>';
  $html_str .= link_to_return_of_script_to_return ($script_to_return);
  $html_str .= '</center>';
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function command_result_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('command_result_page_title', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('command_html_result', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('command_result_link_to_return', $here);
  $html_str .= '<br><br>' . "\n";

  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here); 

  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>
