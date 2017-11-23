<?php
require_once "irp_library.php";

/* Page  Entries */

/* First Section Select an Entry to display its content */
/* Second Section Create_entry */
/* Third Section Select an Entry to be Renamed */

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function arce_menuselect_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_ent_a = irp_provide ('entry_name_array', $here);
  $sur_by_nam_h = irp_provide ('surname_by_name_hash', $here);

  $html_str  = '';
  $html_str .= '  <select name="entry_current_name"> ' . "\n";
  
  foreach ($nam_ent_a as $nam_ent) {
      $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent, $sur_by_nam_h);

      $ent_sel = $_SESSION['get_value_by_get_key_hash']['entry_current_name'];  /* entry already selected */
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

function arce_section_select_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'select an existing entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit); 

  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function arce_section_select_entry_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  

  $pre_mod = link_previous_module_name_make ();
  $script_action = script_array_retrieve_module_of_function ($here);
  $son_mod = str_replace ('.php', "", $script_action);
  irp_father_of_module_of_son ($pre_mod, $son_mod);

  $en_val_but = 'select';

  $html_str  = '';
  $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= irp_provide ('arce_menuselect_entry', $here);
  $html_str .= inputtypesubmit_of_en_action_name ($en_val_but);
  $html_str .= '</form> ' .  "\n";
 
  exiting_from_function ($here);
  debug_n_check ($here, '$html_str', $html_str);

  return $html_str;
};

function arce_section_select_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('arce_section_select_entry_title', $here);
  $html_str .= irp_provide ('arce_section_select_entry_action', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/*  Second Section Create_entry */

function arce_section_create_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_tit = 'create a new entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function arce_section_create_entry_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $pre_mod = link_previous_module_name_make ();
  $script_action = script_array_retrieve_module_of_function ($here);
  $son_mod = str_replace ('.php', "", $script_action);
  irp_father_of_module_of_son ($pre_mod, $son_mod);

  $en_val_but = 'create';

  $html_str  = '';
  $html_str .= '<form action="'. $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= '  <input type="text" size="20" name="entry_current_surnamenew" value="';

  if (isset ($_GET['not_yet_set_entry'])) {
    $html_str .= $_GET['not_yet_set_entry'];
  }

  $html_str .= '"/> ';
  $html_str .= inputtypesubmit_of_en_action_name ($en_val_but);
  $html_str .= '    </form> ' .  "\n";


  exiting_from_function ($here);

  return $html_str;
};

function arce_section_create_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str = '';
  $html_str .= irp_provide ('arce_section_create_entry_title', $here);
  $html_str .= irp_provide ('arce_section_create_entry_action', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Third Section Select an Entry to be Renamed */

function arce_section_rename_entry_title_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $en_tit = 'rename an existing entry';

  $la_bub_tit = bubble_bubbled_la_text_of_en_text ($en_tit);
  $la_Tit = string_html_capitalized_of_string ($la_bub_tit);
  $html_str = common_html_div_background_color_of_html ($la_Tit);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

function arce_section_rename_entry_action_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);


  $pre_mod = link_previous_module_name_make ();
  $script_action = script_array_retrieve_module_of_function ($here);
  $son_mod = str_replace ('.php', "", $script_action);
  irp_father_of_module_of_son ($pre_mod, $son_mod);

  $en_val_but = 'select';

  $html_str  = '';
  $html_str .= '<form action="' . $script_action .'" method="get"> ' . "\n";
  $html_str .= '<br> ';
  $html_str .= irp_provide ('arce_menuselect_entry', $here);
  $html_str .= inputtypesubmit_of_en_action_name ($en_val_but);
  $html_str .= '</form> ' .  "\n";
 
  exiting_from_function ($here);
  debug_n_check ($here, '$html_str', $html_str);

  return $html_str;
};

function arce_section_rename_entry_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = '';
  $html_str .= irp_provide ('arce_section_rename_entry_title', $here);
  $html_str .= irp_provide ('arce_section_rename_entry_action', $here);

  debug_n_check ($here , '$html_str',  $html_str);

  exiting_from_function ($here);

  return $html_str;
}

/* Page Entries */

function arce_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $html_str  = "";
  $html_str .= irp_provide ('pervasive_page_header', $here);

  $html_str .= '<center> ';
  $html_str .= irp_provide ('arce_section_select_entry', $here);
  $html_str .= irp_provide ('arce_section_rename_entry', $here);
  $html_str .= irp_provide ('arce_section_create_entry', $here);
  $html_str .= '</center> ';

  $html_str .= irp_provide ('pervasive_page_footer', $here);

  debug_n_check ($here , '$html_str',  $html_str); 
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);
?>