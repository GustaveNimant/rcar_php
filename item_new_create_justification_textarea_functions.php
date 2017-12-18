<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "the html textarea to get new item justification"; 
$Documentation[$module]['what for'] = "to set it into \$_GET"; 

entering_in_module ($module);

function item_new_create_justification_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $en_pla = 'enter your justification';
  $la_Pla = ucfirst (language_translate_of_en_string ($en_pla));

  debug_n_check ($here , '$la_Pla',  $la_Pla);  
  $entity_textarea = 'item_new_justification';
  
  $row_hta = $_SESSION['parameters']['html_textarea_rows'];
  $col_hta = $_SESSION['parameters']['html_textarea_cols'];
  
  $html_str  = comment_entering_of_function_name ($here);
  $html_str .= '<textarea name="' . $entity_textarea . '" ';
  $html_str .= 'placeholder="';
  $html_str .= $la_Pla;
  $html_str .= '" ';
  $html_str .= 'rows="' . $row_hta . '" cols="' .$col_hta . '">';
  $html_str .= '</textarea> ' . "\n";
  $html_str .= comment_exiting_of_function_name ($here);

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

exiting_from_module ($module);

?>