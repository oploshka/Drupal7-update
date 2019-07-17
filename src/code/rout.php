<?php
// роут на коленке
if($_SERVER["REQUEST_METHOD"]=='GET') {
  echo getPage();
}
if($_SERVER["REQUEST_METHOD"]=='POST') {
  $returnData = [];
  switch($_POST['method']){
    case 'getModuleInfo': $returnData = getModuleInfo(); break;
    default: $returnData = []; break;
  }

  echo json_encode(['error'=> 'ERROR_NOT', 'data' => $returnData ]);
}
