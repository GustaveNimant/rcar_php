<?php

require_once "irp_library.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

$Documentation[$module]['entry_current_type'] = "is a string stored in Entry_type_catalog.cat";

entering_in_module ($module);

function entry_current_type_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $nam_ent_cur = irp_provide ('entry_current_name', $here);
  $typ_ent_by_nam_ent_h = irp_provide ('entry_type_by_entry_name_hash', $here);
  debug_n_check ($here, '$typ_ent_by_nam_ent_h',  $typ_ent_by_nam_ent_h);
 
  if ( isset ($typ_ent_by_nam_ent_h[$nam_ent_cur]) ) {
      $typ_ent_cur = $typ_ent_by_nam_ent_h[$nam_ent_cur];
  }
  else {
      print_html_array ($here, '$typ_ent_by_nam_ent_h',  $typ_ent_by_nam_ent_h);
      print_fatal_error ($here,
      "Entry name >$nam_ent_cur< were a defined key of hash entry_type_by_entry_name_hash",
      "it is NOT",
      "Check hash upper"
      );
  }  

  exiting_from_function ($here . " with \$typ_ent_cur >$typ_ent_cur<");
  return $typ_ent_cur;
}

exiting_from_module ($module);

?>
