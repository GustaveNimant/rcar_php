<?php
require_once "irp_library.php";

$module = "entry_information_functions";

entering_in_module ($module);

$Documentation[$module]['path'] = "http://path.module.php?get_arguments";
$Documentation[$module]['url_absolute'] = "http://path.module.php?get_arguments";
$Documentation[$module]['url_relative'] = "module.php?get_arguments";
$Documentation[$module]['url_relative'] = "<a href=url>label<a>";

function entry_information_array_en_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  if (! ucfirst ($nam_ent)) {
      print_fatal_error (
          $here,
          "entry name were Capitalized",
          $nam_ent,
          "Check");
  }

  switch ($nam_ent) {

/* Entry label */
      
  case 'Faq' :
      $_SESSION['is_label_entity_name'][$nam_ent] = TRUE;
      $entry_information_a =
          array (
              'bubble_href' => 'frequently asked questions',
              'block_kind' => 'question',
              'kind_justification' => 'answer',
              'entry_kind' => 'faq',
              'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
              'title' => 'faq',
              'title_href' => 'list of questions for label',
          );
      break;
      
  case 'Presentation' :
      $_SESSION['is_label_entity_name'][$nam_ent] = TRUE;
      $entry_information_a = 
          array (
              'bubble_href' => 'introduction to ARCE',
              'block_kind' => 'paragraph',
              'kind_justification' => 'justification',
              'entry_kind' => 'text',
              'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
              'title' => 'introduction',
              'title_href' => 'list of paragraphs for label',
          );
      break;
      
  case 'Editing_rules' :
  case 'Regles_de_redaction' :
      $_SESSION['is_label_entity_name'][$nam_ent] = TRUE;
      $entry_information_a = 
          array (
              'bubble_href' => 'these rules need to be followed when editing',
              'block_kind' => 'rule',
              'kind_justification' => 'justification',
              'entry_kind' => 'rule list',
              'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
              'title' => 'editing rules',
              'title_href' => 'editing rules',
          );
      break;
      
  case 'Property_rules' :
  case 'Regles_des_proprietes' :
      $_SESSION['is_label_entity_name'][$nam_ent] = TRUE;
      $entry_information_a = 
          array (
              'bubble_href' => 'these rules need to be followed when editing any property',
              'block_kind' => 'rule',
              'kind_justification' => 'justification',
              'entry_kind' => 'rule list',
              'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
              'title' => 'property rules',
              'title_href' => 'property rules',
      );
      break;
      
  case 'Usage' :
  case 'Utilisation' :
      $_SESSION['is_label_entity_name'][$nam_ent] = TRUE;
      $entry_information_a = 
          array (
              'bubble_href' => 'bubble text for',
              'block_kind' => 'paragraph',
              'kind_justification' => 'justification',
              'entry_kind' => 'help',
              'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
              'title' => 'usage',
              'title_href' => 'usage',
          );
      break;

  default : /* All non-href Entry */
      if (is_substring_of_substring_off_string ("_texte", $nam_ent)) {
          $entry_information_a = 
              array (
                  'entry_kind' => 'texte',
                  'block_kind' => 'paragraph',
                  'kind_justification' => 'justification',
                  'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
                  'bubble_href' => 'paragraph',
                  'title' =>  'list of paragraphs for entry',
                  'title_href' => 'list of paragraphs for entry',
              );
          
      }
      else {
          $entry_information_a = 
              array (
                  'entry_kind' => 'concept',
                  'block_kind' => 'property',
                  'kind_justification' => 'justification',
                  'bubble_href' => 'none',
                  'url_relative' => "entry_current_display_script.php?entry_current_name=$nam_ent",
                  'title' =>  'list of properties for entry',
                  'title_href' => 'list of properties for entry',
              );
      }
  }
  
  # debug_n_check ($here , '$entry_information_a', $entry_information_a);
  exiting_from_function ($here);
  
  return $entry_information_a;
};

function entry_information_array_lan_of_entry_name ($nam_ent) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($nam_ent)");

  $lan = $_SESSION['parameters']['language'];

  include "language_translate_register.php";

  $ent_inf_lan_a = array ();
  switch ($lan) {
  case 'en' :
      $ent_inf_lan_a = entry_information_array_en_of_entry_name ($nam_ent);
      break;
  case 'fr' :
      $ent_inf_en_a = entry_information_array_en_of_entry_name ($nam_ent);

      foreach ($ent_inf_en_a as $key => $wor_en) {
          
          if (($key == 'directory') 
          || ($key == 'entry_kind') 
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
  
# debug_n_check ($here , '$ent_inf_lan_a', $ent_inf_lan_a);
  exiting_from_function ($here);
  
  return $ent_inf_lan_a;
}

/* function text_language_of_entry_name_of_english_text ($nam_ent, $txt_en) { */

/*   $inf_ent_en_a = entry_information_array_en_of_entry_name ($nam_ent); */
/*   $kin_blo_en = $inf_ent_en_a['block_kind'];  */
/*   $legend_en =  $txt_en. ' ' . $kin_blo_en;  */
/*   $legend_la = language_translate_of_en_string ($legend_en); */

/*   $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent); */
/*   $legend_la = str_replace ($nam_ent, $sur_ent, $legend_la); */

/*   return $legend_la; */
/* } */

/* function text_language_of_entry_name_of_two_english_texts ($nam_ent, $tx1_en, $tx2_en) { */

/*   $inf_ent_en_a = entry_information_array_en_of_entry_name ($nam_ent); */
/*   $kin_blo_en = $inf_ent_en_a['block_kind'];  */
/*   $legend_en =  $tx1_en . ' ' . $kin_blo_en . ' ' . $tx2_en;  */
/*   $legend_la = language_translate_of_en_string ($legend_en); */

/*   $sur_ent = surname_of_name_of_surname_by_name_hash ($nam_ent); */
/*   $legend_la = str_replace ($nam_ent, $sur_ent, $legend_la); */

/*   return $legend_la; */
/* } */

function entry_block_kind_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $nam_mod_cur = module_name_of_module_fullnameoffile (__FILE__);  
/* Improve getting DATA $get_val */
  $get_key = 'entry_current_name';
  $nam_ent_cur = irp_data_value_retrieve_and_store_of_get_key_of_module_name_of_where ($get_key, $nam_mod_cur, $here); 
  
  $inf_ent_a = entry_information_array_en_of_entry_name ($nam_ent_cur);
  $kin_blo = $inf_ent_a['block_kind'];

  debug_n_check ($here , '$kin_blo',  $kin_blo); 
  exiting_from_function ($here);

  return $kin_blo;
}

exiting_from_module ($module);

?>