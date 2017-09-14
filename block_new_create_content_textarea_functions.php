<?php

require_once "irp_functions.php";

$module = module_name (__FILE__);

$Documentation[$module]['what is it'] = "??? "; 
$Documentation[$module]['what for'] = "to build the ???"; 

# entering_in_module ($module);

function block_new_create_content_textarea_build (){
  $here = __FUNCTION__;
  entering_in_function ($here);

  $lan = $_SESSION['parameters']['language'];
  $kin_ite = irp_provide ('entry_item_kind', $here);
  $en_pla = 'enter the text of the ' . $kin_ite;
  
  $html_str  = textarea_of_name_of_en_placeholder ('block_new_content', $en_pla);
  /* $html_str .= '<textarea ' . "\n";  */
  /* $html_str  = '&nbsp;&nbsp;'; */
  /* $html_str .= 'name="block_new_content" '; */
  /* $html_str .= ' rows="2" cols="100" '; */
  /* $html_str .= 'placeholder="'; */
  /* $html_str .= $la_con; */
  /* $html_str .= '">'; */
  /* $html_str .= '</textarea> ' . "\n"; */

  debug_n_check ($here , '$html_str',  $html_str);
  exiting_from_function ($here);

  return $html_str;
}

# exiting_from_module ($module);

?>