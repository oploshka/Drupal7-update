// load https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js

$(document).ready(function() {
  console.log( "ready!" );
  // кто то клацнул по форме, начинаем работать.
  $('#module_update').submit(function( event ) {
    event.preventDefault();

    // получим адрес формы
    //var url = event.target.action; console.log(url);
    url = $( this ).attr( "action" ) + '?type=clean_install';
    //console.log(url);

    // обьект который будет хранить значения формы
    var values = new Object();
    // сохраняем значения формы в переменную.
    console.log($(this).serializeArray());
    /*$.each($(this).serializeArray(), function(i, field) {
      //values[field.name] = field.value;
      $.ajax({
        type: "POST",
        url: url,
        data: field,
        success: function(msg){
          var t = '.checkbox.'+field.name+' .text';
          if(msg == 'true'){
            $(t).css('color', 'blue');
            $(t).css('font-weight', '800');
          } else {
            $(t).css('color', 'red');
            $(t).css('font-weight', '800');
          }
        }
      });

    });*/
    // Object {views: "on", views2: "on"}
    //console.log(values);
    //alert('Завершено');


    // скачивание и разархивирование модуля по одному на сервере

  });

});