<?php

// test
// $_POST['name'] = 'admin_menu';
// $error      = 'ERROR_NOT';
// $returnData = [];
// loadModule($error, $returnData);
// exit();

// роут на коленке
if($_SERVER["REQUEST_METHOD"]=='GET') {
  echo getPage();
}
if($_SERVER["REQUEST_METHOD"]=='POST') {
  $error      = 'ERROR_NOT';
  $returnData = [];
  switch($_POST['method']){
    case 'getModuleInfo': getModuleInfo($error, $returnData); break;
    case 'loadModule'   : loadModule($error, $returnData);    break;
    default: $error = 'ERROR_NOT_CORRECT_METHOD_NAME'; $returnData = []; break;
  }

  echo json_encode(['error'=> $error, 'data' => $returnData ]);
}
