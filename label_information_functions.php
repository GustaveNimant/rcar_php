<?php

require_once "array_functions.php";
require_once "file_functions.php";
require_once "debug_functions.php";
require_once "button_submit_functions.php";
require_once "irp_functions.php";
require_once "bubble_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

function label_information_array_en_of_label ($nam_lab) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab)");

  check_label_name ($nam_lab);
  debug_n_check ($here , '$nam_lab', $nam_lab);

  switch ($nam_lab) {
      
/* Pure labels */
      
  case 'command' :
      $label_information = 
          array (
              'label_kind' => 'href',
              'block_kind' => 'undefined',
              'url_relative' => 'command.php',
              'bubble_href' => 'select and execute a command',
              'title' => 'command',
              'title_href' => 'command page',
          );
      break;
      
  case 'entries' :
      $label_information = 
          array (
              'label_kind' => 'href',
              'url_relative' => 'entry_list_display.php',
              'block_kind' => 'undefined',
              'kind_justification' => 'justification',
              'bubble_href' => 'list of entries',
              'title' => 'entries',
              'title_href' => 'list of entries',
          );
      break;
      
  case 'apropos' :
      $label_information = 
          array (
              'label_kind' => 'apropos',
              'block_kind' => 'undefined',
              'kind_justification' => 'justification',
              'url_relative' => 'apropos.php',
              'bubble_href' => 'ARCE Version',
              'title' => 'apropos',
          );
      break;
      
  case 'home':
      $label_information = 
          array (
              'label_kind' => 'text',
              'block_kind' => 'paragraph',
              'kind_justification' => 'justification',
              'url_relative' => 'home.php',
              'bubble_href' => 'home',
              'title' => 'home',
              'title_href' => 'home',
          );
      break;
      
  case 'language' :
      $label_information = 
          array (
              'label_kind' => 'constant',
              'block_kind' => 'undefined',
              'kind_justification' => 'justification',
              'url_relative' => 'language_selection.php',
              'bubble_href' => 'modify the language',
              'title' => 'language',
          );
      break;
      
  default : 
      fatal_error ($here, "label >$nam_lab< is unknown");
  }
  

  debug_n_check ($here , '$label_information', $label_information);
  exiting_from_function ($here);

  return $label_information;
};

function label_information_array_lan_of_label ($nam_lab) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_lab)");

  include "language_translate_register.php";
  $lan = $_SESSION['parameters']['language'];

  $ent_inf_lan_a = array ();
  switch ($lan) {
  case 'en' :
      $ent_inf_lan_a = label_information_array_en_of_label ($nam_lab);
      break;
  case 'fr' :
      $ent_inf_en_a = label_information_array_en_of_label ($nam_lab);

      foreach ($ent_inf_en_a as $key => $wor_en) {
	
	if (($key == 'directory') 
	    || ($key == 'label_kind') 
	    || ($key == 'url_relative') ) {
	  $ent_inf_lan_a[$key] = $wor_en;
	} else
	  {
	    if (is_array ($wor_en)) {
	      $woren_a = $wor_en;
	      
	      $worlan_a = array ();   
	      foreach ($woren_a as $k => $w_en) {
              $worlan = language_translate_of_en_string ($w_en);
              $worlan_a[$k] = $worlan;
	      }
	      $wor_lan = $worlan_a;
	    }
	    else {
            $wor_lan = language_translate_of_en_string ($wor_en);
	    }
	    $ent_inf_lan_a[$key] = $wor_lan;
	  }
      }
      break;
  default :
    fatal_error ($here, "language name >$lan< is unknown");
  }
  
  # debug_n_check ($here , "output label_information array in $lan", $ent_inf_lan_a);
  exiting_from_function ($here);
  
  return $ent_inf_lan_a;
}

# exiting_from_module ($module);

?>