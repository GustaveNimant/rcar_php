<?php
include "session.php";
require_once "irp_library.php";
require_once "session_library.php";
require_once "html_tools_functions.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

entering_in_module ($module);

function button_close_window () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    

    $scr_act = 'close_script.php';
    $en_bub = 'close the window';
    $en_nam_act = 'leave';
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<form action="' . $scr_act. '" method="get"> ' . "\n";
    $html_str .= '<center>' . "\n";
    $html_str .= inputtypesubmit_of_en_action_name_of_en_bubble ($en_nam_act, $en_bub);
    $html_str .= '</center>' . "\n";
    $html_str .= '</form>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    
    return $html_str;
}

function quit_build () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $en_txt = 'navigation data have been removed';
    $la_Leg = ucfirst (language_translate_of_en_string ($en_txt));
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= irp_provide ('common_html_page_head', $here);
    $html_str .= '<span class="my-fieldset">' . "\n";
    $html_str .= '<center><b>';
    $html_str .= $la_Leg; 
    $html_str .= '</b></center>' . "\n";
    $html_str .= button_close_window ();
    $html_str .= '</span>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    #  debug_n_check ($here , '$html_str', $html_str);
    
    $time_here = microtime(true);
    $time = $time_here - $_SESSION['time_start'];
    
    #  print_html_scalar ($here, ' total cpu time = ' . $time * 0.000001 . ' seconds' ,"");
    
    session_remove ();
    
    exiting_from_function ($here);

    $nof_deb = $_SESSION['debug_nameoffile'];
    unlink ($nof_deb);

    return $html_str;
}

exiting_from_module ($module);

?>