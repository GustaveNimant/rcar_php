<?php

require_once "irp_library.php";
require_once "entry_information_functions.php";
require_once "tools_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function command_action_of_action_name_of_argument ($nam_act, $str_arg) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_act, $str_arg)");

  switch ($nam_act) {
      case 'debug' :
          break;
      case 'remove' :
          tools_remove ($str_arg);
          break;
      case 'display' :
          tools_display ($str_arg);
          break;
      case 'load' :
          tools_load ($str_arg);
          break;
      case 'read' :
          tools_read ($str_arg);
          break;
      case 'remove' :
          tools_remove ($str_arg);
          break;
      case 'set' :
          tools_set ($str_arg);
          break;         
      case 'unset' :
          tools_unset ($str_arg);
          break;         
      case 'write' :
          tools_write ($str_arg);
          break;         
      default:  
          $en_mes = "no action is defined. Using action <i>display</i> as default";
          $la_mes = language_translate_of_en_string ($en_mes); 
          $la_Mes = string_html_capitalized_of_string ($la_mes);
          warning ($here, $la_Mes);
          tools_display ($str_arg);
      }
  
  exiting_from_function ($here);

  return;
}

function command_selection_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $key = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");


  $action_a = array ('debug', 'remove', 'display', 'load', 'read', 'set', 'unset', 'write');

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<select name="command_action"> ' . "\n";
  $html_str .= '  <option value="default"> ';
  $html_str .= string_html_capitalized_of_string (language_translate_of_en_string ('actions'));
  $html_str .= '  </option> ' . "\n";

  foreach ($action_a as $act) {
      $html_str .= '<option value="' . $act . '"> ' . "\n";
      $html_str .= string_html_capitalized_of_string (ucfirst (language_translate_of_en_string ($act)));
      $html_str .= '</option> ' . "\n";
  }

  $html_str .= '</select> ' . "\n";
  $html_str  = comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_selection_argument_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $key = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($key, "BUTTON_$key");

  $html_str  = '';
  $html_str .= '<input type="text" name="command_argument"> ';

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_button_form_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $script_action = 'command_script.php';

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= irp_provide ('command_selection_action', $here);
  $html_str .= irp_provide ('command_selection_argument', $here);
  $html_str .= inputtypesubmit_of_en_action_name ('go');
  $html_str .= '</form> ' .  "\n";
  $html_str .= comment_exiting_of_function_name ($here); 

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= irp_provide ('pervasive_page_header', $here);
  $html_str .= irp_provide ('command_button_form', $here);
  $html_str .= irp_provide ('pervasive_page_footer', $here);
  $html_str .= comment_exiting_of_function_name ($here); 

  exiting_from_function ($here);
  return $html_str;
}

exiting_from_module ($module);

?>
