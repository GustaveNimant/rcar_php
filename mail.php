<?php

function mail_send_of_subject_of_message ($sub, $mes) {
    $to = "arce@willforge.fr";
    mail ($to, $sub, $mes);
    return;
}



?>