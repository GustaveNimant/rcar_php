<?php

require_once "block_functions.php";
require_once "irp_functions.php";

$module = module_name (__FILE__);

# entering_in_module ($module);

function block_next_save_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $nam_ent = irp_provide ('entry_name', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);
  $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

  $nam_blo_cur = irp_provide ('block_current_name', $here);
  $con_blo_nex = irp_provide ('block_next_content', $here);

  debug_n_check ($here, '$nam_ent', $nam_ent);

  block_content_write ($nam_ent, $nam_blo_cur, $con_blo_nex);

  $nof_mod = 'entry_display.php';
 
  $html_str = '';
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);
  $html_str .= irp_provide ('git_command_n_commit_html', $here);
  $html_str .= link_to_return_of_entry_name_of_entry_surname_of_module_nameoffile_of_language ($nam_ent, $sur_ent, $nof_mod, $lan);
  $html_str .= irp_provide ('pervasive_html_final_section', $here);
  
  debug_n_check ($here , '$html_str', $html_str);
  exiting_from_function ($here);
  
  return $html_str;
};

# exiting_from_module ($module);

?>