<?php

function loadModule(&$error, &$returnData) {

  $fileLoadFormat = 'ZIP';
  if (!isset($_POST['archive']) && $_POST['archive'] == 'gz') { $fileLoadFormat = 'QZ'; }

  if (!isset($_POST['name'])) {
    $error = 'ERROR_NOT_MODULE_NAME';
    return;
  }

  $url = 'http://updates.drupal.org/release-history/' . $_POST['name'] . '/7.x';
  $somepage = file_get_contents($url);
  $xml = simplexml_load_string($somepage);

  if (!isset($xml->releases->release[0]->download_link)) {
    $error = 'ERROR_NOT_CORRECT_XML_STRUCTURE';
    return;
  }

  if($fileLoadFormat === 'ZIP'){
    $drupal_download_url = $xml->releases->release[0]->files->file[1]->url;
    // https://ftp.drupal.org/files/projects/admin_menu-7.x-3.0-rc6.zip
  } else {
    $drupal_download_url = $xml->releases->release[0]->download_link;
    // https://ftp.drupal.org/files/projects/admin_menu-7.x-3.0-rc6.tar.gz
  }

  // имя файла
  $drupal_filename = substr($drupal_download_url, strripos($drupal_download_url, '/') + 1, strlen($drupal_download_url));

  // тут инициализируем переменные
  $drupal_work_dir = ROOT_DIR_MODULE_UPDATE . '/temp/';     // временная папка в которую будет все сохранятся ../***/
  $drupal_template = $drupal_work_dir . 'module_download/'; // временная папка в которую будет все сохранятся ../temp/.../
  $drupal_arhive   = $drupal_work_dir . 'arhive/';          // дирректория где будет лежать скаченный архив

  // todo
  // $drupal_template = "module_download"; // временная папка в которую будет все сохранятся template/temp/
  // // уточняем рабочую дирректорию template/module_download_XX/
  // $prefix = "";
  // $id = 0;
  // //while(file_exists($drupal_work_dir.$drupal_template.$prefix)){ $id++; $prefix = '_'.$id; }
  // $drupal_template = $drupal_work_dir . $drupal_template . $prefix . '/'; // template/module_download_XX/
  // // куда сохраняем архив template/module_download_XX/arhive/
  // $drupal_arhive = $drupal_template . $drupal_arhive . '/';


  // указываем куда сохранять скаченный фаил
  $drupal_save_dir = $drupal_arhive . $drupal_filename; // куда сохраняем скаченное с именем

  try {
    dir_add($drupal_work_dir);        // template/
    dir_add($drupal_template);        // папка для текущего выполнения скрипта template/module_download_XX/
    dir_add($drupal_arhive);          // папка с архивом template/module_download_XX/arhive/
  } catch (Exception $e) {
    $error = 'ERROR_WORK_DIRECTORY_NOT_CREATE';
    $returnData = ['message' => "Ошибка создания дирректории : " . $e->getMessage()];
    return;
  }

  // скачивание файла
  file_put_contents($drupal_save_dir, file_get_contents($drupal_download_url));

  // распаковываем все это
  if ($_POST['name'] == 'drupal') {
    $drupal_template = ROOT_DIR_MODULE_UPDATE . '/';
  } else {
    $drupal_template = ROOT_DIR_MODULE_UPDATE . '/sites/all/modules/';
  }

  if($fileLoadFormat === 'ZIP'){
    // распаковываем все это
    $zip = new ZipArchive(); // Создаём объект для работы с ZIP-архивами
    // Открываем архив и делаем проверку успешности открытия
    if ($zip->open($drupal_save_dir) === true) {
      $zip->extractTo($drupal_template); //Извлекаем файлы в указанную директорию
      $zip->close(); //Завершаем работу с архивом
    } else {
      $error = 'ERROR_ZIP_ARCHIVE_OPEN';
      return;
    }
  } else {
    try {
      $phar = new PharData($drupal_save_dir);
      $phar->extractTo($drupal_template); // extract all files
    } catch (Exception $e) {
      $error = 'ERROR_GZ_ARCHIVE_OPEN';
      return;
    }
  }

}
