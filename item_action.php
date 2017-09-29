<?php
include "session.php";
require_once "father_n_son_stack_module_functions.php";

require_once "entry_information_functions.php";
require_once "file_functions.php";

$module = "item_action";
entering_in_module ($module);
father_n_son_stack_entity_push_of_current_entity ($module);

$nam_ent = irp_provide ('entry_name', $module);

$nam_ite = irp_provide ('item_name', $module);
debug_n_check ($module , '$nam_ite', $nam_ite);

/* if (isset ($_GET['item_name'])) { */
/*     $nam_ite = $_GET['item_name']; */
/* } else { */
/*     $nam_ite = irp_provide ('item_name', $module); */
/* } */


$link = irp_provide ('action', $module);
debug_n_check ($module , '$link', $link);

$link_dec = html_entity_decode ($link);
$link_a = explode ('=', $link_dec);

$ite_act = $link_a[1];
debug_n_check ($module , "item action", $ite_act);

$entry_information_a = entry_information_array_en_of_entry_name ($nam_ent);
$block_kind = $entry_information_a['block_kind'];
debug_n_check ($module , "block_kind", $block_kind);

/* $sur_by_nam_a = surname_by_name_array_make (); */
$sur_by_nam_a = irp_provide ('surname_by_name_array', $here);

$sur_ite = $sur_by_nam_a[$nam_ite];
$sur_ent = $sur_by_nam_a[$nam_ent];

$str_get  = '&entry_name=';
$str_get .= $nam_ent;
$str_get .= '&item_name=';
$str_get .= $nam_ite;
$str_get .= '&item_action=';
$str_get .= $ite_act;
$str_get .= '&block_kind=';
$str_get .= $block_kind;
$str_get .= '&item_surname=';
$str_get .= $sur_ite;
$str_get .= '&entry_surname=';
$str_get .= $sur_ent;

debug_n_check ($module , '$str_get', $str_get);

$str_url = 'entry_display.php?entry_name=' . $nam_ent . '&selection_error=true';

if ( $link == 'default' or $nam_ite == '' ) {
  header('Location: ' . $str_url);
  debug_n_check ($module , '$str_url', $str_url);
  exiting_from_module ($module);
  exit;
}

if (isset ( $_GET['action_selected'])) {
  header('Location: ' . $link . $str_get);
  debug_n_check ($module , '$str_get', $str_get);
  exiting_from_module ($module);
  exit;
}else {
  fatal_error ($here, "check");
}
exiting_from_module ($module);
?>