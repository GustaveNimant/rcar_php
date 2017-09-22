<?php

require_once "array_functions.php";
require_once "date_n_time_functions.php";

# To be continued

$Documentation[$module]['what is it'] = "a file where every side effect is written on disk";
$Documentation[$module]['how is it done'] = "a side effect function returns a \$html_log";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

function logfile_informations_en_of_action ($get_act) {
  $here = __FUNCTION__;
  entering_in_function ($here);

  if ($_COOKIE['connect'] <> 'ok') {
    $nam_ite = irp_provide ('item_name', $here);
    $nam_ent = irp_provide ('entry_name', $here);
    $act_ite = irp_provide ('item_action', $here);
    $ite_act = irp_provide ($act_ite, $here);
    $old_con = irp_provide ('item_content_previous', $here);
    $lan_act = language_translate_of_en_string ($act_ite); 
  }else {
    unset ($_COOKIE);
  }

  $ip_act = $_SERVER['REMOTE_ADDR'];
  date_default_timezone_set ("Europe/Paris");
  $dat_act = date("j F Y/G\hi");
  
  $con_pro =language_translate_of_en_string ('content of the property');
  $con_pro = html_entity_decode ($con_pro);
  $ent_nam =language_translate_of_en_string ('in entry name');
  $ent_nam = html_entity_decode ($ent_nam);
  $in =language_translate_of_en_string ('in');
  
  $fno_con  = '';
  
  switch ($get_act) {
  case 'modify' :
    $fno_con .= $dat_act . ' - ';
    $fno_con .= $ip_act . ' ';
    $fno_con .= $con_pro . ' ';
    $fno_con .= $nam_ite . ' ';
    $fno_con .=  $ent_nam . ' ' . $nam_ent;
    $fno_con .= ' : ' . $old_con . ' ' . $in . ' ' . $ite_act;
    $fno_con .= "\n";
    break;
  case 'rename' :
    $new_nam = irp_provide ('item_newname', $here);
    $fno_con .= $dat_act . ' - ';
    $fno_con .= $ip_act . ' ';
    $fno_con .= $lan_act . ' ';
    $fno_con .= $nam_ite . ' ';
    $fno_con .= $in . ' ';
    $fno_con .= $new_name . ' ';
    $fno_con .= 'in entry ' . $nam_ent;
    $fno_con .= "\n";
    break;
  case 'justify' :
    $fno_con .= $dat_act . ' - ';
    $fno_con .= $ip_act . ' ';
    $fno_con .= $lan_act . ' ';
    $fno_con .= $nam_ite . ' ';
    $fno_con .= 'in entry ' . $nam_ent;
    $fno_con .= ' : ' . $ite_act;
    $fno_con .= "\n";
    break;
  case 'delete' :
    $fno_con .= $dat_act . ' - ';
    $fno_con .= $ip_act . ' ';
    $fno_con .= $lan_act . ' ';
    $fno_con .= $nam_ite . ' ';
    $fno_con .= 'in entry ' . $nam_ent;
    $fno_con .= ' : ' . $ite_act;
    $fno_con .= "\n";
    break;
  default :
    $fno_con .= $dat_act . ' - ';
    $fno_con .= $ip_act;
    $fno_con .= "\n";
 }

  exiting_from_function ($here . " ($fno_con)");

  return $fno_con;

}

function logfile_create_of_action () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $dir_nam = specific_directory_name_of_basic_name_of_name ('hd_php', 'LOGS');
    
    $ext_log = $_SESSION['parameters']['extension_action_log_filename'];
 
    if ($_COOKIE['connect'] == 'ok') {
        $fno = 'connexion' . '.' . $ext_log;
        
    }else {
        $ite_act = irp_provide ('item_action', $here);
        $fno = $ite_act . '.' . $ext_log;
    }
    $fno_path = $dir_nam . $fno;
    debug_n_check ($here , "nof_path", $fno_path);
    
    $fno_con =  logfile_informations_en_of_action ();
    
    if (! file_exists ($fno_path)) {
        $output = shell_exec ('touch ' . $fno_path);
        #  debug_n_check ($here , "nof_path", $fno_path);
    }
    
    $fil_ope = fopen ($fno_path, 'r+');
    debug_n_check ($here , "fil_ope", $fil_ope);
 
    $int_wri = fwrite ($fil_ope, $fno_con);
    debug_n_check ($here , "int_wri", $int_wri);
    

    fclose ($fil_ope);
    
    exiting_from_function ($here);
    return;
}


function logfile_html_write ($htm_log) {
  $here = __FUNCTION__;
  entering_in_function ($here . " ($htm_log)");

  $nam_pro = $_SESSION['parameters']['program_name'];
  $Nam_pro = ucfirst ($nam_pro);
  $ext_log = $_SESSION['parameters']['extension_action_log_filename'];

  $nof_log = "$Nam_pro.$ext_log";

  $now_tim = now();
  $txt_log = $now_tim . ': ' . $htm_log;
  file_content_append ($nof_log, $txt_log . "\n");

  exiting_from_function ($here);
  return;
};

# exiting_from_module ($module);

?>