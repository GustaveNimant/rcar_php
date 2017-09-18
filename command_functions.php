<?php

require_once "array_functions.php";
require_once "irp_functions.php";
require_once "management_functions.php";
require_once "entry_information_functions.php";
require_once "bubble_functions.php";
require_once "entry_display_functions.php";
require_once "surname_by_name_array_functions.php";
require_once "block_kind_functions.php";
require_once "tools_functions.php";

$module = "command_functions";
# entering_in_module ($module);

function command_action_of_action_name_of_argument ($nam_act, $str_arg) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_act, $str_arg)");

  switch ($nam_act) {
      case 'debug' :
          break;
      case 'delete' :
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
          $lan = $_SESSION['parameters']['language'];
          $en_mes = "no action is defined. Using <i>display</i> as default";
          $la_mes = language_translate_of_en_string_of_language ($en_mes, $lan); 
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
  father_n_son_stack_entity_push_of_father_of_son ($key, 'BUTTON');

  $lan = $_SESSION['parameters']['language'];

  $action_a = array ('debug', 'delete', 'display', 'load', 'read', 'remove', 'set', 'unset', 'write');

  $html_str  = '';
  $html_str .= '<select name="command_action"> ' . "\n";
  $html_str .= '  <option value="default"> ';
  $html_str .= string_html_capitalized_of_string (language_translate_of_en_string_of_language ('actions', $lan));
  $html_str .= '  </option> ' . "\n";

  foreach ($action_a as $act) {
      $html_str .= '<option value="' . $act . '"> ' . "\n";
      $html_str .= ucfirst (language_translate_of_en_string_of_language ($act, $lan));
      $html_str .= '</option> ' . "\n";
  }

  $html_str .= '</select> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_selection_argument_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $key = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($key, 'BUTTON');

  $html_str  = '';
  $html_str .= '<input type="text" name="command_argument"> ';

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_button_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $script_action = 'command.php';
  $en_val_but = 'go';

  $html_str  = '';
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= irp_provide ('command_selection_action', $here);
  $html_str .= irp_provide ('command_selection_argument', $here);
  $html_str .= inputtypesubmit_of_name_of_en_value_of_shift ($en_val_but, $lan);
  $html_str .= '</form> ' .  "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

function command_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('command_button', $here);

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Page Debug Menu */

function command_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('command_section', $here);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  exiting_from_function ($here);
  return $html_str;
}

# exiting_from_module ($module);

?>
