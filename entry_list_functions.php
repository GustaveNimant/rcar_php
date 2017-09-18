<?php
require_once "management_functions.php";
require_once "irp_functions.php";
require_once "common_html_functions.php";
require_once "debug_html_functions.php";

/* Page  Entries */

/* First Section Select an Entry to display its content */
/* Second Section Create_entry */
/* Third Section Select an Entry to be Renamed */

$module = "entry_list_functions";
# entering_in_module ($module);

function entry_list_menuselect_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

/* Improve last_dollar_get_register */

  $select_size = $_SESSION['parameters']['select_size'];
  $nam_ent_a = irp_provide ('entry_name_array', $here);
  $sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

  $html_str  = '';
  $html_str .= '  <select name="entry_name" size="' . $select_size . '" > ' . "\n";
  
  foreach ($nam_ent_a as $nam_ent) {
      $sur_ent = surname_of_name_of_surname_by_name_array ($nam_ent, $sur_by_nam_a);

      $ent_sel = $_SESSION['last_dollar_get_register']['entry_name'];  /* entry already selected */
      if ( (isset ($ent_sel)) && $ent_sel == $nam_ent ) {
          $html_str .= '    <option value="' . $nam_ent . '" selected> ' . $sur_ent . '</option> ' . "\n";
      }else {
          $html_str .= '    <option value="' . $nam_ent . '"> ' . $sur_ent . '</option> ' . "\n";
      }
  }
  
  $html_str .= '  </select> ' . "\n";
  
  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

/* First Section Select an Entry to display its content */

function entry_list_section_select_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'select an existing entry';
  $lan = $_SESSION['parameters']['language'];

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit); 

  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_list_section_select_entry_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $pre_mod = link_previous_module_name_make ();
  $son_mod = 'entry_display';
  $script_action = $son_mod . '.php'; 
  debug_n_check ($here, '$script_action', $script_action);

  $html_str  = '';
  $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= irp_provide ('entry_list_menuselect_entry', $here);
  $html_str .= inputtypesubmit_of_name_of_en_value_of_shift (' ', 'select', ' ');
  $html_str .= '</form> ' .  "\n";
 
  exiting_from_function ($here);
  debug_n_check ($here, '$html_str', $html_str);

  return $html_str;
};

function entry_list_section_select_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('entry_list_section_select_entry_title', $here);
  $html_str .= irp_provide ('entry_list_section_select_entry_action', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/*  Second Section Create_entry */

function entry_list_section_create_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $en_tit = 'create a new entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_list_section_get_entry_newsurname_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $key = str_replace('_build', '', $here);
  father_n_son_stack_entity_push_of_father_of_son ($key, 'BUTTON');

  $lan = $_SESSION['parameters']['language'];

  $pre_mod = link_previous_module_name_make ();
  $son_mod = 'entry_create';
  $script_action = $son_mod . '.php';;

  $html_str  = '';
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= '  <input type="text" size="20" name="entry_newsurname" value="';

  if (isset ($_GET['not_yet_set_entry'])) {
    $html_str .= $_GET['not_yet_set_entry'];
  }

  $html_str .= '"/> ';
  $html_str .= inputtypesubmit_of_name_of_en_value_of_shift (' ', 'create', '  ');
  $html_str .= '    </form> ' .  "\n";

  exiting_from_function ($here);
  return $html_str;
};

function entry_list_section_create_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= irp_provide ('entry_list_section_create_entry_title', $here);
  $html_str .= irp_provide ('entry_list_section_get_entry_newsurname', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Select an Entry to be Renamed */

function entry_list_section_rename_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];

  $en_tit = 'rename an existing entry';

  $la_bub_tit = bubble_bubbled_text_la_of_text_en_of_language ($en_tit, $lan);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $html_str = common_html_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function entry_list_section_rename_entry_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $pre_mod = link_previous_module_name_make ();
  $script_action = 'entry_rename.php';

  $html_str  = '';
  $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= irp_provide ('entry_list_menuselect_entry', $here);
  $html_str .= inputtypesubmit_of_name_of_en_value_of_shift (' ', 'select', '  ');
  $html_str .= '</form> ' .  "\n";
 
  exiting_from_function ($here);
  debug_n_check ($here, '$html_str', $html_str);

  return $html_str;
};

function entry_list_section_rename_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('entry_list_section_rename_entry_title', $here);
  $html_str .= irp_provide ('entry_list_section_rename_entry_action', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Page Entries */

function entry_list_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = "";
  $html_str .= irp_provide ('pervasive_html_initial_section', $here);

  $html_str .= '<center> ';
  $html_str .= irp_provide ('entry_list_section_select_entry', $here);
  $html_str .= irp_provide ('entry_list_section_rename_entry', $here);
  $html_str .= irp_provide ('entry_list_section_create_entry', $here);
  $html_str .= '</center> ';

  $html_str .= irp_provide ('pervasive_html_final_section', $here);

  debug_n_check ($here , '$html_str',  $html_str); 
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);
?>