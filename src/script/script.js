$(document).ready(function() {
  console.log( "ready!" );
  // кто то клацнул по форме, начинаем работать.
  $('#module_update').submit(function( event ) {
    event.preventDefault();

    // получим адрес формы
    //var url = event.target.action; console.log(url);

    // TODO type=module or clean_install fix
    //  url = $( this ).attr( "action" ) + '?type=module';
    url = $( this ).attr( "action" ) + '?type=clean_install';
    //console.log(url);

    // обьект который будет хранить значения формы
    var values = new Object();
    // сохраняем значения формы в переменную.
    var field = $(this).serializeArray();
    console.log(field);

    for (var i=0, count=field.length; i<count; i++) {

      console.log(field[i]);

      $.ajax({
        type: "POST",
        url: url,
        data: field[i],
        success: function(msg){

          console.log(msg);
          var t = '.checkbox.'+ msg +' .text';
          if(msg == 'true'){
            $(t).css('color', 'blue');
            $(t).css('font-weight', '800');
          } else {
            $(t).css('color', 'red');
            $(t).css('font-weight', '800');
          }
        }
      });
    }

    // Object {views: "on", views2: "on"}
    //console.log(values);
    //alert('Завершено');


    // скачивание и разархивирование модуля по одному на сервере

  });

});
