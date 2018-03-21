<?php
require_once "comment_library.php";

$module = module_name_of_module_nameoffile (__FILE__);

$Documentation[$module]['what is it'] = "it is ...";
$Documentation[$module]['what for'] = "to ...";

function arce_home_header_en () {
    $here = __FUNCTION__; 
    entering_in_function ($here);

    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= "<center>";
    $html_str .= "<i>This site is a prototype implementing a method for <b>auto-regulated collaborative editing</b>.<br/>";
    $html_str .= "It can be applied to a <b>wide</b> collectivity of connected people.<br/>";
    $html_str .= 'See <a href="entry_current_display_script.php?entry_current_name=Faq">Faq</a></i>.';
    $html_str .= "</center>";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    return $html_str;
}

function arce_home_text_en () {
    $here = __FUNCTION__; 
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= "<br />";
    $html_str .= "<b>ARCE</b> fonctionnalities :<br /><br />";
    $html_str .= "<li>";
    $html_str .= "<b>Entries :</b> allows to select any Entry to display or rename it or allows to create a new entry.";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Language :</b> allows to change the language";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Command :</b> allows to execute a command";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Editing rules :</b> allows to access to eponymous entry";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Faq :</b> allows to access to eponymous entry";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Property rules :</b> allows to access to eponymous entry";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Presentation :</b> allows to access to the text of the website presentation";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "<li>";
    $html_str .= "<b>Usage :</b> the website manual";
    $html_str .= "</li>";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    return $html_str;
}

function arce_home_header_accent_fr () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= '<center>'  . "\n";
    $html_str .= '<i>' . "\n";
    $html_str .= 'Ce site est un prototype implémentant une méthode de ';
    $html_str .= '<a href="http://willforge.fr/wikiwil/index.php?title=Pr%C3%A9sentation_de_la_m%C3%A9thode_de_r%C3%A9daction_collaborative_auto-r%C3%A9gul%C3%A9e" target="blank">';
    $html_str .= '<b>rédaction collaborative auto-régulée</b>.</a>';
    $html_str .= '<br/>' . "\n";

    $html_str .= 'Pour le moment elle est limitée à l\'énoncé d\'assertions définissant des concepts (entrées) comme la <b>volonté générale</b>.' . "\n";

    $html_str .= '<br/>' . "\n";

    $html_str .= "Elle est applicable à une <b>vaste</b> collectivité d'internautes.<br/>\n";
    $html_str .= 'Voir la <a href="entry_current_display_script.php?entry_current_name=Faq">Faq</a>.' . "\n";
    $html_str .= '</i>' . "\n";
    $html_str .= '</center>' . "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    return $html_str;
}

function arce_home_text_accent_fr () {
    $here = __FUNCTION__;
    entering_in_function ($here);
    
    $nam_pro = $_SESSION['parameters']['program_name'];
    $NAM_PRO = strtoupper ($nam_pro);
    
    $html_str  = comment_entering_of_function_name ($here);
    $html_str .= "<br />";
    $html_str .= "Fonctionnalités de <b>$NAM_PRO</b> :";
    $html_str .= "<br /><br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Entrées :</b> permet l'accès aux Entrées ou la création d'une nouvelle entrée.";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Commande :</b> permet d'exécuter une commande";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Règles de rédaction :</b> permet d'accéder à l'entrée éponyme";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Faq :</b> permet d'accéder à l'entrée éponyme";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Règles des propriétés :</b> permet d'accéder à l'entrée éponyme";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Présentation :</b> permet d'accéder au texte de la présentation du site";
    $html_str .= "</li>";
    $html_str .= "<br />";
    $html_str .= "\n";
    $html_str .= "<li>";
    $html_str .= "<b>Utilisation :</b> manuel d'utilisation du site";
    $html_str .= "</li>";
    $html_str .= "\n";
    $html_str .= comment_exiting_of_function_name ($here);
    
    exiting_from_function ($here);
    return $html_str;
}

?>