<?php

$includeFileList = [
  __DIR__ . '/src/code/function.php',
  __DIR__ . '/src/code/getPage.php',
  __DIR__ . '/src/code/getModuleInfo.php',
  __DIR__ . '/src/code/loadModule.php',
  __DIR__ . '/src/code/rout.php',
];


$code = '<?php
define("ROOT_DIR_MODULE_UPDATE", __DIR__);';

foreach ($includeFileList as $includeFile){
  $res = file_get_contents($includeFile);
  $code .= "\r\n" . ltrim($res, '<?php');
}

$style  = '<style>' . file_get_contents(__DIR__ . '/src/style/style.css') . '</style>';
$code = str_replace ( '<link rel="stylesheet" href="/src/style/style.css">', $style , $code);

$script = '<script>' . file_get_contents(__DIR__ . '/src/script/script.js') . '</script>';
$code = str_replace ( '<script type="text/javascript" src="/src/script/script.js"></script>', $script , $code);

file_put_contents(__DIR__ . '/build/module_update.php', $code);

echo 'success build';