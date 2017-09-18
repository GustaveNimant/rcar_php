<?php
/* Page */

require_once "management_functions.php";
require_once "irp_functions.php";

$module = "entry_rename_functions";
# entering_in_module ($module);

function entry_rename_display_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $lan = $_SESSION['parameters']['language'];  
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);
  $en_tit = 'entry';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $html_str = '';
  $html_str .= '<span class="my-fieldset"><center> ' . "\n";
  $html_str .= '&nbsp;&nbsp;';
  $html_str .= $la_Tit;

  $html_str .= '<input type="hidden" name="entry_name" value="' . $nam_ent  . '" /> ' . "\n";
  $html_str .= " ";
  $html_str .= $sur_ent;
  $html_str .= '</center></span> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_rename_modify_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];  

  $en_tit = 'change the name of the entry';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $nam_get = 'entry_newsurname';

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $html_str = '';
  $html_str .= '<span class="my-fieldset"> ' . "\n";
  $html_str .= '  <legend> ' . "\n";
  $html_str .= '    &nbsp;&nbsp;';
  $html_str .= $la_Tit;
  $html_str .= '&nbsp;&nbsp;' . "\n";
  $html_str .= '  </legend> ' . "\n";
  $html_str .= '<input type="text" ';
  $html_str .= ' name="' . $nam_get . '"'; 
  $html_str .= ' value="' . $sur_ent . '"'; 
  $html_str .= ' size="100"> ';
  $html_str .= "\n";
  $html_str .= '</span> ';

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_rename_justification_section_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'justify below your change';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $html_str = '';
  $html_str .= '<span class="my-fieldset"> ' . "\n";
  $html_str .= '  <legend> ' . "\n";
  $html_str .= '    &nbsp;&nbsp;';
  $html_str .= $la_Tit;
  $html_str .= '&nbsp;&nbsp;' . "\n";
  $html_str .= '  </legend> ' . "\n";
  $html_str .= '  <textarea name="entry_newname_justification" rows="2" cols="100" /> ';
  $html_str .= '</textarea> ' . "\n";
  $html_str .= '</span> ';

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);
  return $html_str;
}

function entry_rename_final_section_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'save';
  $la_tit = language_translate_of_en_string_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_tit);

  $html_str = '';
  $html_str .= '      <center> ';
  $html_str .= '        <input type="submit" value="';
  $html_str .= $la_Tit;
  $html_str .= '" name="submitme"> ' . "\n";
  $html_str .= '      </center> ' . "\n";

  debug_n_check ($here , '$html_str', $html_str);

  exiting_from_function ($here);

  return $html_str;

}

function entry_rename_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $script_action = 'entry_rename_save.php';
  debug_n_check ($here , "script_action", $script_action);

  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= '    <form action="' . $script_action. '" method="get"> ' . "\n";
  $html_str .= irp_provide ('entry_rename_display_section', $here);
  $html_str .= irp_provide ('entry_rename_modify_section', $here);
  $html_str .= '<br><br>';
  $html_str .= irp_provide ('entry_rename_justification_section', $here);

  $nof_mod = 'entry_list.php';
  $nam_ent = array_dollar_get_retrieve_value_of_key ('entry_name', $here);
  debug_n_check ($here, '$nam_ent', $nam_ent);

  $html_str .= irp_provide ('entry_rename_final_section', $here);
  $html_str .= '    </form> ' . "\n";
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_return_module_nameoffile ($nam_ent, $sur_ent, $nof_mod, $lan); 
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($here , '$html_str', $html_str);
  
  exiting_from_function ($here);

  return $html_str;

}

# exiting_from_module ($module);

?>