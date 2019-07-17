<?php

// чистая установка
if (isset($_GET['type']) && $_GET['type']=='clean_install'){
  //проверяем наличие пост запроса.
  //print 'пункт 1';
  if($_SERVER["REQUEST_METHOD"]=='POST') {
    //тут необходимо скачать модуль
    if (!isset($_POST['name'])){ exit ('неверный post запрос');}
    $url = 'http://updates.drupal.org/release-history/'.$_POST['name'].'/7.x';
    $somepage = file_get_contents($url);
    $xml = simplexml_load_string($somepage);

    if (!isset($xml->releases->release[0]->download_link)){
      exit ('неверная стурктура xml');
    }
    // тут уже определяем ссылку для скачивания
    $drupal_download_url = $xml->releases->release[0]->download_link;
    // имя файла
    $drupal_filename  = substr($drupal_download_url, strripos($drupal_download_url, '/') + 1, strlen($drupal_download_url));


    // тут инициализируем переменные
    $drupal_work_dir         = "template";        // временная папка в которую будет все сохранятся template/
    $drupal_template         = "module_download"; // временная папка в которую будет все сохранятся template/temp/
    $drupal_arhive           = "arhive";          // дирректория где будет лежать скаченный архив



    // уточняем рабочую дирректорию template/module_download_XX/
    $drupal_work_dir.="/"; // template/
    $prefix = ""; $id=0;
    //while(file_exists($drupal_work_dir.$drupal_template.$prefix)){ $id++; $prefix = '_'.$id; }
    $drupal_template = $drupal_work_dir.$drupal_template.$prefix.'/'; // template/module_download_XX/


    // куда сохраняем архив template/module_download_XX/arhive/
    $drupal_arhive = $drupal_template.$drupal_arhive.'/';


    // указываем куда сохранять скаченный фаил
    $drupal_save_dir        = $drupal_arhive.$drupal_filename; // куда сохраняем скаченное с именем

    try{
      dir_add($drupal_work_dir);        // template/
      dir_add($drupal_template);        // папка для текущего выполнения скрипта template/module_download_XX/
      dir_add($drupal_arhive);          // папка с архивом template/module_download_XX/arhive/
    } catch (Exception $e) {
      exit("Ошибка создания дирректории : " . $e->getMessage() . "<br>");
    }

    // скачивание файла
    //print "начало скачивания архива $drupal_download_url и сохранение в $drupal_save_dir<br>";
    file_put_contents($drupal_save_dir, file_get_contents($drupal_download_url));

    // распаковываем все это
    // TODO: test
    // if($_POST['name']=='drupal'){$drupal_template = __DIR__;} else {$drupal_template = 'modules_new/';}
    if($_POST['name']=='drupal'){$drupal_template = '/';} else {$drupal_template = '/sites/all/modules/';}
    try {
      $phar = new PharData($drupal_save_dir);
      $phar->extractTo($drupal_template); // extract all files
    } catch (Exception $e) {
      echo "Ошибка разархивации"; //Выводим уведомление об ошибке
      exit('{"error": 1 }');
    }

    exit($_POST['name'].' завершено;');
  }
}