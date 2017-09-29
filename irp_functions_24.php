<?php

require_once "error_functions.php";

require_once "block_content_by_block_name_array_functions.php";
require_once "block_content_linked_by_block_name_array_functions.php";

require_once "block_current_delete_functions.php";
require_once "block_current_display_actions_functions.php";
require_once "block_current_display_functions.php";
require_once "block_current_functions.php";
require_once "block_current_name_functions.php";
require_once "block_current_rename_display_functions.php";
require_once "block_current_rename_form_functions.php";
require_once "block_current_rename_display_page_title_functions.php";
require_once "block_current_rename_justification_functions.php";
require_once "block_current_rename_justification_textarea_functions.php"; 
require_once "block_current_rename_newname_surname_functions.php";
require_once "block_current_rename_save_functions.php";

require_once "block_list_neworder_functions.php";

require_once "block_name_array_functions.php";

require_once "block_new_content_functions.php";
require_once "block_new_create_block_list_functions.php";
require_once "block_new_create_button_save_functions.php";
require_once "block_new_create_content_functions.php";
require_once "block_new_create_content_textarea_functions.php";
require_once "block_new_create_content_title_n_help_functions.php";
require_once "block_new_create_form_functions.php";
require_once "block_new_create_form_page_title_functions.php";
require_once "block_new_create_save_functions.php";
require_once "block_new_create_surname_functions.php";
require_once "block_new_create_surname_inputtypetext_functions.php";
require_once "block_new_create_surname_title_n_help_functions.php";
require_once "block_new_name_functions.php";

require_once "block_next_content_functions.php";

require_once "block_rename_functions.php";
require_once "block_surname_functions.php";

require_once "entry_create_functions.php";
require_once "entry_display_functions.php";
require_once "entry_list_display_functions.php";
require_once "entry_name_array_functions.php";
require_once "entry_name_functions.php";
require_once "father_n_son_stack_entity_functions.php";
require_once "father_n_son_stack_module_functions.php";
require_once "git_command_functions.php";

require_once "irp_path_functions.php";

require_once "item_current_modify_display_functions.php";
require_once "item_current_content_display_functions.php";
require_once "item_current_content_linked_by_item_name_array_functions.php";
require_once "item_current_justification_display_functions.php";

require_once "item_current_modify_form_current_content_functions.php";
require_once "item_current_modify_form_functions.php";
require_once "item_current_modify_form_new_create_content_functions.php";
require_once "item_current_modify_form_new_create_justification_functions.php";
require_once "item_current_modify_form_page_title_functions.php";

require_once "item_new_content_functions.php"; 

require_once "item_new_create_content_form_functions.php"; 
require_once "item_new_create_content_form_textarea_functions.php";
require_once "item_new_create_content_form_title_n_help_functions.php";
require_once "item_new_create_justification_functions.php"; 
require_once "item_new_create_justification_textarea_functions.php";
require_once "item_new_create_justification_title_n_help_functions.php";
require_once "item_new_name_functions.php"; 

require_once "item_previous_content_display_functions.php";

require_once "label_functions.php";
require_once "language_functions.php";
require_once "language_selection_functions.php";
require_once "pervasive_html_functions.php";
require_once "quit_functions.php";
require_once "surname_by_name_array_functions.php";
require_once "user_information_functions.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

$Documentation[$module]['irp_stack'] = "stacks all \$irp_key. When retrieved (\$irp_val) is added"; 

function irp_is_stored_of_irp_key ($irp_key) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key)");

  if (isset ($_SESSION['irp_register']) ) {
      $irp_reg_a = $_SESSION['irp_register'];
      if ( ! is_array ($irp_reg_a) ) {
          exiting_from_function ($here . " with irp_key >" . $irp_key . "<");
          include 'index.php';
          exit;
      }
  }

  $bol = FALSE;
  $str_bol="FALSE";

  switch ($irp_key) {
      case 'quit' :
          break;
      default:
          if (array_key_exists ($irp_key, $irp_reg_a)){
              $mes = " for key >$irp_key< already stored\n";
              trace ($here, $mes);
              $bol = TRUE;
              $str_bol="TRUE";
          }
  };

  /* debug_n_check ($here , "is_stored", $str_bol); */
  /* debug ($here , "irp_register", $_SESSION['irp_register']);  */

  exiting_from_function ($here . " with " . $irp_key . " = " . $str_bol);

  return $bol;
}

function irp_store ($irp_key, $irp_val) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, ...)");

  if (empty ($irp_val)) {  
    fatal_error ($here, "value is empty for irp_key >$irp_key<");
  }
  if (empty($irp_key)) {
    fatal_error ($here, "irp_key is empty");
  }

  if (irp_is_stored_of_irp_key ($irp_key)) {
    /* debug ($here , "irp_register",  $_SESSION['irp_register']); */
    $old_value = $_SESSION['irp_register'][$irp_key];
     
    if ($irp_val == $old_value) {
      print "$here: Warning irp_key >$irp_key< is already stored with the same value";
    }
    else {
      debug ($here , "already stored irp_key", $irp_key);
      debug ($here , "old value",  $old_value);
      debug ($here , "new value",  $irp_val);
      fatal_error ($here, "irp_key >$irp_key< is already stored with another value:");
    }
  }

  if (empty ($irp_val)) {
    debug ($here , "irp_register", $_SESSION['irp_register']);
    fatal_error ($here, "value for irp_key >$irp_key< is empty");
  }

  if (
      ($irp_key == "git_command") 
      ||  
      ($irp_key == "git_command_commit") 
      ||  
      ($irp_key == "git_command_n_commit_html") 
      ||  
      ($irp_key == "user_information")
  ) {
      trace ($here, "value >$irp_val< storage skipped for key >$irp_key<" );
      
  }
  else {
      $_SESSION['irp_register'][$irp_key] = $irp_val;

      if (is_array ($irp_val)) {
          $irp_val_ser = array_serialize_of_separator_of_array_by_key (':', $irp_val);
          trace ($here, "serialized value >$irp_val_ser< stored for key >$irp_key<" );
      }
      else {
          trace ($here, "value >$irp_val< stored for key >$irp_key<" );
      }
  }
  
  /* debug ($here , "irp_register", $_SESSION['irp_register']); */
  exiting_from_function ($here);
  return;
}

function irp_store_force ($irp_key, $irp_val, $irp_fat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, ..., $irp_fat)");

  if ($irp_val == "") {
    fatal_error ($here, "value is empty for irp_key >$irp_key<");
  }
  if ($irp_key == "") {
    fatal_error ($here, "irp_key is empty");
  }

  irp_path_clean_register_of_top_key_of_bottom_key ($irp_fat, $irp_key);
  trace ($here, "Bottom key >$irp_key< cleaning done Up to >$irp_fat<");
  unset ($_SESSION['irp_register'][$irp_key]);
  irp_store ($irp_key, $irp_val);

  trace ($here, "value >$irp_val< stored for key >$irp_key<" );

  exiting_from_function ($here);
  return;
}

function irp_store_from_get ($get_key, $module) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($get_key)");

  $get_val = array_dollar_get_retrieve_value_of_key ($get_key, $module);
  /* debug ($here , "get_key",  $get_key); */
  /* debug ($here , "get_val",  $get_val); */

  irp_store ($get_key, $get_val);
  
  exiting_from_function ($here);
}

function irp_stack_path_of_key ($irp_key) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key)");

  $irp_sta_a = $_SESSION['irp_stack'];
  # debug ($here, '$irp_sta_a', $irp_sta_a);

  $idx_key = array_retrieve_key_of_value ($irp_key, $irp_sta_a, $here);
  while ($idx_key) {
      $irp_sta_b = array_slice ($irp_sta_a, $idx_key +1);
      $idx_key = array_search ($irp_key, $irp_sta_b);
  }

  debug ($here, '$irp_sta_b', $irp_sta_b);
  exiting_from_function ($here);

  return $irp_sta_b ;
}

function irp_retrieve ($irp_key) {
  $here = __FUNCTION__;
  entering_in_function ($here . " $irp_key");

  /* debug_n_check ($here , "input irp_key",  $irp_key); */
  $irp_reg = $_SESSION['irp_register'];

  /* print_html_array ($here, "irp_reg", $irp_reg); */
  
  if (irp_is_stored_of_irp_key ($irp_key)) {
      
      $irp_val = $_SESSION['irp_register'][$irp_key];
      /* debug ($here , "irp_val",  $irp_val); */
      
      if (is_empty_of_string ($irp_val)) {
          $mest = "Irp Value is empty in function irp_retrieve for Irp Key $irp_key";
          #      exiting_from_function ($here . ' with ' . $mest);
          throw new Exception ($mest);
      }
  
/* obtain path for a stored module */

#      $irp_pat_a = irp_stack_path_of_key ($irp_key);
#      # debug ($here ,'$irp_pat_a',  $irp_pat_a);

      if (is_array ($irp_val)) {
          $irp_val_ser = array_serialize_of_separator_of_array_by_key (':', $irp_val);
          array_push ($_SESSION['irp_stack'], $irp_key . " ($irp_val_ser)");
          trace ($here, ">$irp_key< pushed in irp_stack already stored with (serialized value) >$irp_val_ser<");
      }
      else {
          array_push ($_SESSION['irp_stack'], $irp_key . " ($irp_val)");
          trace ($here, ">$irp_key< pushed in irp_stack already stored with >$irp_val<");
      }

      /* print_html_scalar ($here, "irp_key", $irp_key); */
      /* print_html_array ($here, "irp_val", $irp_val); */
      
      /* debug_n_check ($here , "output value",  $irp_val); */
#      exiting_from_function ($here);
      return $irp_val;
  }
  else {
      debug ($here , "irp_register",  $_SESSION['irp_register']);
      fatal_error ($here, "irp_key >$irp_key< is not stored");
  }
  return; 
}

function irp_remove_off_irp_register_of_irp_key ($key, $her) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($key, $her)");

  $log_str = "$her : irp_register[$key] cleaned";

  if ($key == "all"){
      unset ($_SESSION['irp_register']);
  }
  else {
      unset ($_SESSION['irp_register'][$key]);
  }

  file_log_write ($here, $log_str);
  
  exiting_from_function ($here);
  return;
}

function irp_clean_value_of_irp_key ($irp_key, $irp_val_sal) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, $irp_val_sal)");

  switch ($irp_key) {
  /* case 'item_name' : */
  /*   $irp_val = word_name_capitalized_of_string_surname ($irp_val_sal); */
  /*   break; */
  case 'item_newname' :
    $irp_val = word_name_capitalized_of_string_surname ($irp_val_sal);
    break;
  case 'entry_name' :
    $irp_val = word_name_capitalized_of_string_surname ($irp_val_sal);
    break;
  default :
    $irp_val = $irp_val_sal;
  }
 
  /* debug_n_check ($here , "irp_val cleaned as",  $irp_val); */
  exiting_from_function ($here);

  return $irp_val;

}

function irp_build_n_store ($irp_key, $nam_fat) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($irp_key, $nam_fat)");
  
  $irp_build = $irp_key . "_build";

  if (function_exists ($irp_build)) {

    $irp_fat = preg_replace ('/_build/', '', $nam_fat); 
    if ($irp_fat != $irp_key) {
        array_push ($_SESSION['irp_stack'], $irp_key);
        trace ($here, ">$irp_key< pushed in irp_stack built by >$irp_fat<");

        $nam_son = $irp_key;
        father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son);
    }
    else {
        trace ($here, "skip irp_father[$irp_key] = $irp_fat");
    }

    $error = eval ('$irp_val = (' . $irp_build . ' ());');

  }
  else {
/* $_GET */
      check_is_empty_of_array ('$_GET', $_GET, $here);

      $irp_fat = "GET";  /* Improve true ??? */
      trace ($here, "function >$irp_build< does not exist");
/* Improve entry_display is not correct */
      print_html_array ($here, '$_GET', $_GET);

      irp_path_clean_register_of_top_key_of_bottom_key ('entry_display', $irp_key);
      trace ($here, "\$_GET['$irp_key'] path has been cleaned");
      
      $irp_val_sal = array_dollar_get_retrieve_value_of_key ($irp_key, $here);
      $irp_val = irp_clean_value_of_irp_key ($irp_key, $irp_val_sal);
      
/* father_n_son_stack_entity */
      /* father_n_son_stack_entity_push_of_father_of_son ($irp_key, 'GET'); */
      /* father_n_son_stack_entity_push_of_current_entity ($irp_key);  */
      
      array_push ($_SESSION['irp_stack'], $irp_key);
      trace ($here , ">$irp_key< pushed in irp_stack built by >$irp_fat< with value >$irp_val<");
  }
  
  if (empty ($irp_val)) {
      print_fatal_error ($here, 
      "value for irp_key >$irp_key< were NOT empty",
      "it is EMPTY",
      "Check"
      );
  }
  
  irp_store ($irp_key, $irp_val);

    exiting_from_function ($here);
  
  return $irp_val;
}

function irp_provide ($irp_key, $cal_fun) {
  $here = __FUNCTION__;

#  array_push ($_SESSION['parameters']['stack_function_level_array'], $cal_fun);
  entering_in_function ($here . " ($irp_key, $cal_fun)");

  if ( ! ( 
      (is_substring_of_substring_off_string ("_build", $cal_fun)) 
      || (is_substring_of_substring_off_string ("_display", $cal_fun))
      || (is_substring_of_substring_off_string ("_write", $cal_fun)) 
  ))
      { 
          print_fatal_error ($here, 
          "the name of the current function contains \"_build\" as it uses an <b>irp_provide</b>",
          "<i>$cal_fun</i> as current function name",
          "Please take out all the <b>irp_provide</b>"
          );
      }

  $irp_fat = preg_replace ('/_build/', '', $cal_fun); 
  if (irp_is_stored_of_irp_key ($irp_key)) {
      $irp_val = irp_retrieve ($irp_key);
      $nam_son = $irp_key;
      $nam_fat = $irp_fat;  
      father_n_son_stack_entity_push_of_father_of_son ($nam_fat, $nam_son); /* may be not useful */
  }
  else {
      $irp_val = irp_build_n_store ($irp_key, $irp_fat);
  }

  if (empty ($irp_val)) {
      print_fatal_error ($here, 
      "value for \$irp_key >$irp_key< were NOT empty",
      "it was empty",
      "Check"
      );
  }

  $_SESSION['count_entity'] = $_SESSION['count_entity'] +1;

  exiting_from_function ($here . " ($irp_key, $cal_fun)");

  return $irp_val;
}

function irp_father_as_current_module_of_href_link_son ($nam_hre) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_hre)");

  $current_module = basename( $_SERVER[SCRIPT_NAME], ".php") ;
  debug_n_check ($here, '$current_module', $current_module);

  $_SESSION['irp_father'][$nam_hre] = $current_module;

  exiting_from_function ($here);

  return ;

}

function irp_father_of_module_of_son__XX ($nam_fat, $nam_son) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_fat, $nam_son)");

  debug_n_check ($here, '$nam_fat', $nam_fat);
  debug_n_check ($here, '$nam_son', $nam_son);

  if ( ! (link_is_ok_of_module_name ($nam_fat) ) ) {
      print_fatal_error ($here,
      "\$nam_fat = $nam_fat were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( ! (link_is_ok_of_module_name ($nam_son) ) ) {
      print_fatal_error ($here,
      "\$nam_son = $nam_son were a correct module name",
      "it is NOT",
      "Check");
  }

  if ( $nam_son != $nam_fat) {
      $_SESSION['irp_father'][$nam_son] = $nam_fat;
  }
  
  exiting_from_function ($here);

  return ;

}

# exiting_from_module ($module);

?>