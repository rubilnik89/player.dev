<?php

require_once('WebToPay.php');

function get_self_url()
{
    $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
        strpos($_SERVER['SERVER_PROTOCOL'], '/'));

    if (!empty($_SERVER["HTTPS"])) {
        $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
    }

    $s .= '://' . $_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
        $s .= ':' . $_SERVER['SERVER_PORT'];
    }

    $s .= dirname($_SERVER['SCRIPT_NAME']);

    return $s;
}

try {
    $self_url = get_self_url();

    $request = WebToPay::redirectToPayment(array(
        'projectid' => 5320836,
        'sign_password' => 'RIgo1312SPace',
        'orderid' => 12345,
        'lang' => 'RUS',//(LIT, LAV, EST, RUS, ENG, GER, POL).
        'amount' => 1000,//сумма в центах
        'currency' => 'EUR',//(USD, EUR)
        'paytext' => 'Комментарий от Романа',
        'p_email' => 'test@test.test',//почта пользователя
        'accepturl' => $self_url . '/accept.php',
        'cancelurl' => $self_url . '/cancel.php',
        'callbackurl' => $self_url . '/callback.php',
        'test' => 0,
    ));
} catch (WebToPayException $e) {
    // handle exception
}