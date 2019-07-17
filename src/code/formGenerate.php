<form id="module_update" action="/module_update.php" method="post">
<?php
$form = [];
// выводим форму.
foreach ($form as $value){
  print '<div class="group '.$value['group_class'].'">';
  print '<div class="title">'.$value['group_name'].'</div>';
  print '<div class="group_checkbox">';
  foreach ($value['modules'] as $value2){
    print '<div class="checkbox '.$value2['sistem_name'].'">';
    print '<input type="checkbox" name="'.$value2['sistem_name'].'">';
    print '<div class="info"><div class="help">?</div><div class="description">'.$value2['description'].'</div></div><div class="text">'.$value2['name'].'</div>';
    print '</div>';
  }
  print '</div>';
  print '</div>';
}
?>
  <br><br><input type="submit" value="Начать скачивание">
</form>