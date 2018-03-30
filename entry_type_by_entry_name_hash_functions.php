<?php
require_once "irp_library.php";
require_once "entry_type_by_entry_name_hash_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is an array equivalent to the surname_catalog";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function entry_type_by_entry_name_hash_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $cat_typ_ent = irp_provide ('entry_type_catalog', $here) ;
  $typ_ent_by_nam_ent_h = entry_type_by_entry_name_hash_of_entry_type_catalog ($cat_typ_ent);

/* update hash if necessary */
  foreach ($typ_ent_by_nam_ent_h as $nam_ent => $typ_ent) {
      
      if ( isset ($_SESSION['entry_current_renamed'][$nam_ent]) ) {
          $new_nam_ent = $_SESSION['entry_current_renamed'][$nam_ent];
          unset ($typ_ent_by_nam_ent_h[$nam_ent]);
          $typ_ent_by_nam_ent_h[$new_nam_ent] = $typ_ent;
          
/* write type_catalog */
          entry_type_catalog_write_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h);
      }
  }
  
  debug_n_check ($here , '$typ_ent_by_nam_ent_h', $typ_ent_by_nam_ent_h);
  exiting_from_function ($here);

  return $typ_ent_by_nam_ent_h;
}

exiting_from_module ($module);

?>