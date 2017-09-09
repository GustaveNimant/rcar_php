<?php
require_once "management_functions.php";
require_once "irp_functions.php";
require_once "session_functions.php";

$module = "quit_functions";
# entering_in_module ($module);

function button_close_window ($lan) {
    $here = __FUNCTION__;
    entering_in_function ($here . " ($lan)");
    
    $script_action = "close.php";
    
    $html_str  = '';
    $html_str .= '     <form action="' . $script_action. '" method="get"> ' . "\n";
    $html_str .= '       <center><input type="submit" value="';
    $html_str .= ucfirst (language_translate_of_en_string_of_language ('close up', $lan));
    $html_str .= '" title = "';
    $html_str .= ucfirst (language_translate_of_en_string_of_language ('close the window', $lan));
    $html_str .= '"> ';
    $html_str .= '       </center> ';
    $html_str .= '     </form> ';
    
    exiting_from_function ($here);
    
    return $html_str;
}

function quit_build () {
  $here = __FUNCTION__;
  entering_in_function ($here);
 
  $lan = $_SESSION['parameters']['language'];

  $leg = ucfirst (language_translate_of_en_string_of_language ('navigation data was deleted', $lan));

  $html_str  = '';
  $html_str .= irp_provide ('common_html_page_head', $here);
  $html_str .= '<span class="my-fieldset"><center><b> ';
  $html_str .= $leg; 
  $html_str .= '</b></center></span> ';
  $html_str .= button_close_window ($lan);
 
#  debug_n_check ($here , '$html_str', $html_str);

  $time_here = microtime(true);
  $time = $time_here - $_SESSION['time_start'];

#  print_html_scalar ($here, ' total cpu time = ' . $time * 0.000001 . ' seconds' ,"");

  session_remove ();
  
  exiting_from_function ($here);
  
  unlink ('debug');

  return $html_str;
}

# exiting_from_module ($module);

?>