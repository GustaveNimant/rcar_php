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

/* Type is missing for some entry names */
  $nam_ent_a = irp_provide ('entry_name_array', $here);
  debug_n_check ($here, '$nam_ent_a', $nam_ent_a);

  foreach ($nam_ent_a as $k => $nam_ent) {
      if (!isset ($typ_ent_by_nam_ent_h [$nam_ent])) {
          $typ_ent_by_nam_ent_h [$nam_ent] = 'undefined';
      }
  }
  ksort ($typ_ent_by_nam_ent_h);
  debug_n_check ($here, ' 1 $typ_ent_by_nam_ent_h', $typ_ent_by_nam_ent_h);

/* rename hash entry if necessary */
  foreach ($typ_ent_by_nam_ent_h as $nam_ent => $typ_ent) {
      
      if ( isset ($_SESSION['entry_current_renamed'][$nam_ent]) ) {
          $new_nam_ent = $_SESSION['entry_current_renamed'][$nam_ent];
          unset ($typ_ent_by_nam_ent_h[$nam_ent]);
          $typ_ent_by_nam_ent_h[$new_nam_ent] = $typ_ent;
          $entity_renamed = entity_name_of_build_function_name ($here);
          father_n_son_stack_entity_push_of_father_of_son ("RENAMING_$entity_renamed", $entity_renamed);          

/* write type_catalog */
          entry_type_catalog_write_of_entry_type_by_entry_name_hash ($typ_ent_by_nam_ent_h);
          father_n_son_stack_entity_push_of_father_of_son ("WRITE_$entity_renamed", $entity_renamed);          
      }
  }
  
  debug_n_check ($here , '2 $typ_ent_by_nam_ent_h', $typ_ent_by_nam_ent_h);
  exiting_from_function ($here);

  return $typ_ent_by_nam_ent_h;
}

exiting_from_module ($module);

?>