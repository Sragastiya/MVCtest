<?php

// Use the current Apache path on Windows or Linux, unless explicitly overridden.
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/index.php')), '/');
define('BASEURL', getenv('MVC_BASEURL') ?: $basePath);
