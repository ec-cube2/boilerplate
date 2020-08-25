<?php

$vendorEccube2Dir = __DIR__ . '/../vendor/ec-cube2/ec-cube2';
$requireFile = realpath(__DIR__ . '/../html/require.php');

// set tests/require.php
$requireDummy = <<< EOT
<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
require_once '$requireFile';
EOT;
file_put_contents($vendorEccube2Dir . '/tests/require.php', $requireDummy);
