<?php

// print __FILE__;
// print phpinfo();
// Создание дирректории если она не существует
function dir_add($dir_name) {
  if(!file_exists($dir_name)){ // проверка на всякий случай
    mkdir($dir_name);
    //print "Создана папка >> $dir_name<br>";
  } else {
    //print "Папка существует >> $dir_name<br>";
  }
}

// функция копирования файлов
function full_copy($source, $target) {
  if (is_dir($source))  {
    @mkdir($target);
    $d = dir($source);
    while (FALSE !== ($entry = $d->read())) {
      if ($entry == '.' || $entry == '..') continue;
      full_copy("$source/$entry", "$target/$entry");
    }
    $d->close();
  }
  else if (!copy($source, $target)) { echo "<b style='color:red;'>не удалось скопировать $source </b><br>";}
}

// функция удаления папки
function removeDirectory($dir) {
  if ($objs = glob($dir."/*")) {
    foreach($objs as $obj) {
      is_dir($obj) ? removeDirectory($obj) : unlink($obj);
    }
  }
  rmdir($dir);
}
