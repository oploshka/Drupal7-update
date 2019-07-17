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

  $(document).on("submit", '#module_update', function (e) {
    e.preventDefault();

    // сохраняем значения формы в переменную.
    var field = $(this).serializeArray();

    var loadFunction = function (name) {

      $.ajax({
        type: "POST",
        url: url,
        dataType : 'json',
        data: {method: 'loadModule', name: name },
        success: function(msg){
          var t = '.checkbox.'+ name +' .text';
          if(msg.error === 'ERROR_NOT'){
            $(t).css('color', 'blue');
            $(t).css('font-weight', '800');
          } else {
            $(t).css('color', 'red');
            $(t).css('font-weight', '800');
          }
        }
      });

    }

    for (var i=0, count=field.length; i<count; i++) {
      loadFunction(field[i].name)
    }

  });

});
