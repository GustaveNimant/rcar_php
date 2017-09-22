<?php
require_once "file_functions.php";
require_once "session_array_initialize.php";

$module = module_name_of_module_fullnameoffile (__FILE__);

# entering_in_module ($module);

function session_remove () {
  $here = __FUNCTION__;
  entering_in_function ($here);

  $boo = session_destroy ();  

  if (! $boo) {
      $ses_pat = session_save_path ();
      $ses_nam = session_name ();
      $ses_id = session_id ();
      
      print "Name \$ses_nam = $ses_nam<br>";
      print "Session path \$ses_pat = $ses_pat<br>"; 
      print "Session Id \$ses_id  = >$ses_id<<br>";

      print_fatal_error ($here,
      "session $ses_pat/$ses_nam were destroyed",
      "it is NOT",
      "Check");
  }

  exiting_from_function ($here);
  return;
}

function session_obsolete_remove () {
  $here = __FUNCTION__;
  entering_in_function ($here);
  
  $roo_doc = $_SERVER['DOCUMENT_ROOT'];
  $ser_rel_pat = "/arce/server";
  $ser_abs_pat = $roo_doc . $ser_rel_pat;
  $ses_abs_pat = $ser_abs_pat . '/SESSION';
  $fil_a = scandir ($ses_abs_pat);

  foreach ($fil_a as $k => $fil) {

      if (substr ($fil, 0, 5) == 'sess_') {

          $fil_abs_pat =  $ses_abs_pat . '/' . $fil;
          $tim_sec_fil = filemtime ($fil_abs_pat);
          $dat_fil = date ("F d Y H:i:s.", $tim_sec_fil);

          $tim_sec_day = 12 * 3600 ;
          $tim_sec_now = time ();

          $dat_now = date ("F d Y H:i:s.", $tim_sec_now);
          $dat_lim = date ("F d Y H:i:s.", $tim_sec_lim);
          $tim_sec_lim = $tim_sec_now - $tim_sec_day;
          $dat_lim = date ("F d Y H:i:s.", $tim_sec_lim);

          if ($tim_sec_fil < $tim_sec_lim) {
              unlink ($fil_abs_pat);
              $html_log = "$dat_now : Session file $fil_abs_pat has been deleted";
              logfile_html_write ($html_log);
          }
      }
  }

  exiting_from_function ($here);
}

# exiting_from_module ($module);

?>