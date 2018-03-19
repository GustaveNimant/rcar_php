<?php

$module = module_name_of_module_fullnameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is a string as a list of name:entry_type separated by \\n";
$Documentation[$module]['what for'] = "to fill file Entry_Type_catalog.cat";

function entry_type_catalog_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$typ_ent_by_nam_ent_h, ...");

  $cat_typ_ent = '';
  foreach ($typ_ent_by_nam_ent_h as $nam_ent => $typ_ent) {
      $cat_typ_ent .= $nam_ent . " : " . $typ_ent . "\n";
  }

  debug_n_check ($here , '$cat_typ_ent', $cat_typ_ent);
  exiting_from_function ($here);

  return $cat_typ_ent;
}

function entry_type_catalog_write_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h) {
  $here = __FUNCTION__;
  entering_in_function ($here . " (\$typ_ent_by_nam_ent_h [...])");
    
  $cat_typ_ent = entry_type_catalog_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h);
  $fno_typ_ent = entry_type_catalog_fullnameoffile_build ();
  file_string_write ($fno_typ_ent, $cat_typ_ent);

  exiting_from_function ($here);

  return;
}


?>