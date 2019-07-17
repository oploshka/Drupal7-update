$(document).ready(function() {
  console.log( "ready!" );

  var url = '/module_update.php';

  var getModuleInfoSuccess = function(data){
    var formHtml = '';

    formHtml += '<form id="module_update">';

    for(var i = 0; i < data.length; i++){
      var group = data[i];
      formHtml += '  <div class="group ' + group.group_class + '">';
      formHtml += '    <div class="title">' + group.group_name + '</div>';
      formHtml += '    <div class="group_checkbox">';

      for(var j = 0; j < group.modules.length; j++){
        var module = group.modules[j];
        formHtml += '      <div class="checkbox ' + module.sistem_name + '">';
        formHtml += '        <input type="checkbox" name="' + module.sistem_name + '">';
        formHtml += '        <div class="info">' +
                    '          <div class="help">?</div>' +
                    '          <div class="description">' + module.description + '</div>' +
                    '        </div>' +
                    '        <div class="text">' + module.name + '</div>' +
                    '      </div>';
      }

      formHtml += '    </div>';
      formHtml += '  </div>';
    }

    formHtml += '<br><br><input type="submit" value="Начать скачивание">';
    formHtml += '</form>';
console.log(formHtml);
    $('#content').append( $(formHtml) );
  }
  var getModuleInfoError = function(data){
    var formHtml = '<h2>Не удалось получить информацию по модулям</h2>';
    $('#content').append( $(formHtml) );
  }

  $.ajax({
    type: "POST",
    url: url,
    dataType : 'json',
    data: {method: 'getModuleInfo'},
    success: function(msg){
      console.log(msg);
      if(msg.error !== 'ERROR_NOT'){
        getModuleInfoError();
        return;
      }
      getModuleInfoSuccess(msg.data);
    },
    error: function (err) {
      console.log(err);
      getModuleInfoError();
    }
  });



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
