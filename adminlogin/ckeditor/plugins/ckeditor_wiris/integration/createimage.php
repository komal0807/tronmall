<?php
// ${license.statement}
require_once ('pluginbuilder.php');

$provider = $pluginBuilder->getCustomParamsProvider();

$mml = $provider->getRequiredParameter('mml');
$render = $pluginBuilder->newRender();

$outp = null;

if (get_magic_quotes_gpc() == 1) {
    $PARAMS = array_map('stripslashes', $PARAMS);
}

// Adding - if necessary - CORS headers.
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : "";
$res = new com_wiris_system_service_HttpResponse();
$pluginBuilder->addCorsHeaders($res, $origin);

echo $render->createImage($mml, $provider, $outp);
