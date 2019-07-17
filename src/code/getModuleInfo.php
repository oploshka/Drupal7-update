<?php

/*
 * Не обработанные модули
 *
https://www.drupal.org/project/mailsystem
https://www.drupal.org/project/diff
https://www.drupal.org/project/smtp
https://www.drupal.org/project/insert
https://www.drupal.org/project/mimemail
https://www.drupal.org/project/file_entity
https://www.drupal.org/project/quicktabs
https://www.drupal.org/project/mollom
https://www.drupal.org/project/logintoboggan
https://www.drupal.org/project/simplenews
https://www.drupal.org/files/images/content_access.png
https://www.drupal.org/project/admin_views
https://www.drupal.org/project/flexslider
https://www.drupal.org/project/jcarousel
https://www.drupal.org/project/scheduler
https://www.drupal.org/project/votingapi
https://www.drupal.org/project/plupload
https://www.drupal.org/project/search_api
https://www.drupal.org/project/views_php
https://www.drupal.org/project/special_menu_items
https://www.drupal.org/project/oauth
https://www.drupal.org/project/location
Views Bulk Operations (VBO)<br>
Nice Menus - nice_menus<br>
colorbox<br>
Media<br>
Job Scheduler<br>
site_map - Site map<br>
https://www.drupal.org/project/imce_mkdir

https://www.drupal.org/project/views_field_view views field view - позволяет использовать одни вьюсы в качестве полей у других вьюсов
https://www.drupal.org/project/eva eva - плагин для модуля views создающий дисплей для присоединения других сущностей

http://it-cat.biz/ru/internet-saytostroenie-drupal-7/poleznye-moduli-dlya-drupal-7
http://drunkcat.ru/content/список-полезных-модулей-для-drupal-7-про-которые-не-стоит-забывать

модулей для работы с картами и геоданными http://xandeadx.ru/blog/drupal/604
 *
 * */

function getModuleInfo()
{

  /*
   * Structure:
  [
    'group_name'=>'QQQQQQQQQ',
    'modules'=>[
      ['sistem_name'=>'QQQQQQQQQ', 'name'=>'QQQQQQQQQ', 'description'=>'QQQQQQQQQ' ],
    ],
  ],
  */
  return [
    [
      'group_name' => 'Ядро',
      'modules' => [
        ['sistem_name' => 'drupal', 'name' => 'DRUPAL 7', 'description' => 'Ядро'],
      ],
    ],
    [
      'group_name' => 'Администрирование',
      'modules' => [
        ['sistem_name' => 'admin_menu', 'name' => 'Administration menu', 'description' => 'удобное выпадающее меню администратора, заменяет стандартное'],
        ['sistem_name' => 'backup_migrate', 'name' => 'Backup and Migrate', 'description' => 'Модуль делает резервные копии БД, возможно функционал шире'],
        ['sistem_name' => 'module_filter', 'name' => 'Module Filter', 'description' => 'Расширяет функционал страницы с модулями Drupal\'a.<br>На любителя'],
      ],
    ],
    [
      'group_name' => 'Блоки',
      'modules' => [
        ['sistem_name' => 'block_class', 'name' => 'Block Class', 'description' => 'Добавляет возможность добавить класс блокам'],
        ['sistem_name' => 'imageblock', 'name' => 'Image Block', 'description' => 'Позволяет выводить в блоке изображение'],
        ['sistem_name' => 'menu_block', 'name' => 'Menu block', 'description' => 'Добавляет возможность вывести меню с любого пункта в виде блока'],
        ['sistem_name' => 'blockgroup', 'name' => 'Block Group', 'description' => 'Позволяет группировать блоки'],
      ],
    ],
    [
      'group_name' => 'Веб форма',
      'group_class' => 'webform',
      'modules' => [
        ['sistem_name' => 'webform', 'name' => 'Webform', 'description' => 'Модуль Webform позволяет создавать формы с различными типами полей: дата, текстовое поле, файл и т.д. Кроме добавления неограниченного количества разнообразных полей в форму, модуль Webform позволяет создавать пошаговые формы.'],
        ['sistem_name' => 'webform_ajax', 'name' => 'Webform Ajax', 'description' => 'Модуль Webform Ajax добавляет веб-формам поддержку техники AJAX. Установив этот модуль, с использованием AJAX можно отправлять веб-формы и перемещаться между страницами по веб-форме, которая использует несколько шагов. Всё это улучшает эргономику, делает форму более быстрой (передаётся меньшее количество данных) и снижает нагрузку на сервер.'],
        ['sistem_name' => 'webform_validation', 'name' => 'Webform Validation', 'description' => 'Модуль Webform Validation добавляет в документ веб-формы вкладку, которая позволяет задать правила проверки используемых веб-формой компонентов.'],
        ['sistem_name' => 'webform_mysql_views', 'name' => 'Webform MySQL Views', 'description' => 'Модуль Webform MySQL Views позволяет выводить в видах данные, которые были получены модулем Webform. Эти виды могут быть удобны в том случае, когда вы нуждаетесь в автоматическом доступе к этим данных из внешних приложений без экспорта, импорта или используете АПИ на основе веба.'],
        ['sistem_name' => 'webform_report', 'name' => 'Webform Report', 'description' => 'Модуль Webform Report позволяет создавать простые, динамические отчёты на основе данных собранных модулем Webform. Он добавляет новый тип документов, который содержит критерии отчёта, а показываемые данные обновляются автоматически, сразу после отправки веб-формы. Данные отчёта могут быть отсортированы в зависимости от предпочтений читающего этот отчёт человека, без изменения критериев составления отчёта.'],
        ['sistem_name' => 'webform_rules', 'name' => 'Webform Rules', 'description' => 'Модуль Webform Rules добавляет правила для работы с веб-формами. Если вы когда-нибудь искали правило, которое должно выполняться после отправки веб-формы и не могли найти его, попробуйте поставить этот модуль, возможно он решит эту проблему.'],
      ],],
    [
      'group_name' => 'Дополнительные',
      'modules' => [
        ['sistem_name' => 'ctools', 'name' => 'Chaos tool suite (ctools)', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'token', 'name' => 'Token', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'libraries', 'name' => 'Libraries API', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'entity', 'name' => 'Entity API', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'jquery_update', 'name' => 'jQuery Update', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'cck', 'name' => 'Content Construction Kit (CCK)', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'entityreference', 'name' => 'Entity reference', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'transliteration', 'name' => 'Transliteration', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'variable', 'name' => 'Variable', 'description' => 'описание отсутствует'],
      ],
    ],
    [
      'group_name' => 'Карты и геоданные',
      'modules' => [
        ['sistem_name' => 'location', 'name' => 'Location', 'description' => 'Поле для хранения геокоординат. Виджет позволяет вводить как адрес, так и широту/долготу. В составе есть геокодер. Имеется интеграцию с Views. Форматер для вывода данных на карте отсутствует, поэтому модуль используется в основном в связке с GMap Module.'],
        ['sistem_name' => 'gmap', 'name' => 'GMap Module', 'description' => 'Предоставляет интерфейс для работы с Google Maps API 2. Модуль имеет интеграцию с Location и позволяет указывать координаты с помощью клика на карте виджета. Доступен форматтер для вывода маркеров на карте. Имеет интеграцию с Views и может выводить несколько точек на одной карте по данным из поля Location.'],
        ['sistem_name' => 'getlocations', 'name' => 'Get Locations', 'description' => 'Поле для хранения геокоординат и форматтер для их вывода на картах Google с помощью Google Maps API 3. Модуль позиционируется как современная альтернатива связке Location и GMap Module. Это делается либо с помощью геокодирования введённого адреса, либо с помощью перетаскивания дефолтной метки. Есть интеграция с Views.'],
        ['sistem_name' => 'geofield', 'name' => 'Geofield', 'description' => 'Поле для хранения геоданных (точки, линии, полигоны и т.д.) и форматтер для их вывода на Google Map или любой карте, поддерживаемой OpenLayers. Из виджетов доступны: Well Known Text (WKT], Latitude / Longitude, GeoJSON, Bounds. Виджет с визуальным добавлением данных доступен с помощью модулей Leaflet Widget или Geofield Gmap. Встроенного геокодера нет, но есть интеграция с модулем Geocoder. Интеграция с Views с помощью подмодуля Geofield Map.'],
        ['sistem_name' => 'geofield_ymap', 'name' => 'Geofield Yandex Maps', 'description' => 'Виджет, форматтер и views хэндлер для Geofield позволяющий вводить и выводить гео-объекты (точки, линии, полигоны) на Яндекс.Картах 2.1. Модуль так же позволяет использовать карты в своих формах и динамически генерировать карты с помощью PHP, HTML или Javascript.'],
        ['sistem_name' => 'geolocation', 'name' => 'Geolocation Field', 'description' => 'Поле для хранения геокоординат и форматтер для их вывода на карте Google. Вводить координаты можно как кликом на карте виджета, так и с помощью поиска. Интеграция с Views пока только в виде отдельного модуля.'],
        ['sistem_name' => 'yamaps', 'name' => 'Yandex.Maps', 'description' => 'Поле для хранения геоданных (точки, линии, полигоны, дороги], виджет для визуального добавления данных и форматтер для их вывода на карте Яндекс. Модуль довольно странный, например для ввода точки надо кликнуть на карте, в появившейся форме ввести заголовок маркера, текст балуна, выбрать цвет и нажать кнопку Save (скриншот). Пользователю доступны сразу все инструменты для ввода данных, без ограничения. Количество данных так же не ограничено. Хранятся все данные в формате json в одной единственной колонке, поэтому об Views можно даже не думать.'],
        ['sistem_name' => 'gm3', 'name' => 'Google Maps API V3', 'description' => 'Набор полей для хранения геоданных (точки, полигоны, линии, области], виджет для визуального добавления данных с помощью карт Google (скриншот) и форматтер для вывода данных на карте. Модуль крайне сырой.'],
        ['sistem_name' => 'openlayers', 'name' => 'OpenLayers', 'description' => 'Набор модулей для интеграции Drupal с одноимённой javascript библиотекой. Библиотека представляет из себя мощный, но довольно сложный инструмент для работы с картами. В качестве карт можно использовать OpenStreetMap, Google Maps, Yahoo Maps и другие. Есть интеграция с Views.'],
        ['sistem_name' => 'leaflet', 'name' => 'Leaflet', 'description' => 'Интеграция молодой javascript библиотеки для работы с картами — Leaflet. Модуль представляет из себя форматтер полей Geofield, выводящий данные на карте. Виджет для визуального ввода доступен в виде отдельного модуля. Есть интеграция с Views и возможность вывести несколько точек на одной карте. По умолчанию из карт доступна только OSM Mapnik, но есть возможность прикрутить Google Maps и Yandex Maps. Есть PHP API для лёгкого вывода карт.'],
        ['sistem_name' => 'locationmap', 'name' => 'Location Map', 'description' => 'Небольшой модуль, создающий страницу с картой Google, на которой можно вывести информацию о расположении одного единственного объекта (скриншот). В настройках можно указать заголовок страницы, координаты объекта и его описание '],
        ['sistem_name' => 'simple_gmap', 'name' => 'Simple Google Maps', 'description' => 'Форматтер для текстовых полей, позволяющий выводить карту Google с маркером по адресу, указанному в поле.'],
      ],
    ],
    [
      'group_name' => 'Меню',
      'modules' => [
        ['sistem_name' => 'menu_attributes', 'name' => 'Menu attributes', 'description' => 'Добавляет возможность добавления разных атрибутов для пунктов меню'],
        ['sistem_name' => 'taxonomy_menu', 'name' => 'Taxonomy menu', 'description' => 'Позволяет вывести термины таксономии в качестве пунктов меню'],
      ],
    ],
    [
      'group_name' => 'Поля',
      'modules' => [
        ['sistem_name' => 'date', 'name' => 'Date', 'description' => 'поле даты'],
        ['sistem_name' => 'link', 'name' => 'Link', 'description' => 'поле ссылка'],
        ['sistem_name' => 'email', 'name' => 'Email Field', 'description' => 'поле email'],
        ['sistem_name' => 'addressfield', 'name' => 'Address Field', 'description' => 'поле для ввода адреса'],
        ['sistem_name' => 'field_collection', 'name' => 'Field collection', 'description' => 'поле коллекция полей'],
        ['sistem_name' => 'references', 'name' => 'References (Node, User)', 'description' => 'поле ссылки на другой материал, пользователя'],
        ['sistem_name' => 'autocreate', 'name' => 'Autocreate Node Reference', 'description' => 'расширяет модуль References<br> автоматическое создание материала если он до этого небыл создан<br> описание возможно не корректное'],
        ['sistem_name' => 'noderefcreate', 'name' => 'Node Reference Create', 'description' => 'расширяет модуль References<br> автоматическое создание материала если он до этого небыл создан<br> описание возможно не корректное'],
        ['sistem_name' => 'url', 'name' => 'URL', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'image_url_formatter', 'name' => 'Image URL Formatter', 'description' => 'вывод изображения в виде ссылки'],
        ['sistem_name' => 'fancybox', 'name' => 'fancyBox', 'description' => 'Попап фансибокс, добавляет формат вывода для изображений и другое'],
        ['sistem_name' => 'field_group', 'name' => 'Field Group', 'description' => 'группировка полей'],
        ['sistem_name' => 'hierarchical_select', 'name' => 'Hierarchical Select', 'description' => 'Добавляет возможности к полям таксономии при добавлении/редактировании материала'],
        ['sistem_name' => 'multiupload_filefield_widget', 'name' => 'Multiupload Filefield Widget', 'description' => 'мультизагрузка файлов'],
        ['sistem_name' => 'multiupload_imagefield_widget', 'name' => 'Multiupload Imagefield Widget', 'description' => 'мультизагрузка изображений'],
        ['sistem_name' => 'filefield', 'name' => 'FileField', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'lightbox2', 'name' => 'Lightbox2', 'description' => 'описание отсутствует'],
      ],
    ],
    [
      'group_name' => 'Перевод',
      'modules' => [
        ['sistem_name' => 'l10n_client', 'name' => 'Localization client', 'description' => 'удобный интерфейс перевода Drupal'],
        ['sistem_name' => 'l10n_update', 'name' => 'Localization update', 'description' => 'автоматическое скачивание переводов модулей'],
      ],
    ],
    [
      'group_name' => 'Представление',
      'modules' => [
        ['sistem_name' => 'views', 'name' => 'Views', 'description' => 'модуль Views'],
        ['sistem_name' => 'views_slideshow', 'name' => 'Views Slideshow', 'description' => 'добавляет возможность создавать слайдшоу во Views'],
        ['sistem_name' => 'better_exposed_filters', 'name' => 'Better Exposed Filters', 'description' => 'расширяет функционал фильтров Views'],
        ['sistem_name' => 'draggableviews', 'name' => 'Draggableviews', 'description' => 'добавляет возможность упорядочить вывод Views как хочет пользователь'],
        ['sistem_name' => 'views_dependent_filters', 'name' => 'Views Dependent Filters', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'views_nivo_slider', 'name' => 'Views Nivo Slider', 'description' => 'описание отсутствует'],
      ],
    ],
    [
      'group_name' => 'Разное',
      'modules' => [
        ['sistem_name' => 'rules', 'name' => 'Rules', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'panels', 'name' => 'Panels', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'similarterms', 'name' => 'Similar By Terms', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'auto_nodetitle', 'name' => 'Automatic Nodetitles', 'description' => 'Автоматически создается заголовок материала, возможно необходимо повторное сохранение в некоторых случаях'],
        ['sistem_name' => 'i18n', 'name' => 'Internationalization', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'context', 'name' => 'Context', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'page_title', 'name' => 'Page Title', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'ds', 'name' => 'Display Suite', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'strongarm', 'name' => 'Strongarm', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'superfish', 'name' => 'Superfish', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'calendar', 'name' => 'Calendar', 'description' => 'Календарь, функционал не изучен до конца'],
        ['sistem_name' => 'imagecache_actions', 'name' => 'ImageCache Actions', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'feeds', 'name' => 'Feeds', 'description' => 'модуль ипорта материалов'],
        ['sistem_name' => 'media_youtube', 'name' => 'Media: YouTube', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'node_clone', 'name' => 'Node clone', 'description' => 'Позволяет создать копию материала, может не совсем корректно работать с модулем коллекция полей'],
        ['sistem_name' => 'print', 'name' => 'Printe', 'description' => 'Позволяет создать страницы для печати'],
        ['sistem_name' => 'modal_forms', 'name' => 'Modal forms (with ctools)', 'description' => 'описание отсутствует'],
      ],
    ],
    [
      'group_name' => 'Тектсовые редакторы',
      'modules' => [
        ['sistem_name' => 'wysiwyg', 'name' => 'Wysiwyg', 'description' => 'продвинутый WYSIWYG редактор, удобен для копирования уже отформатированных текстов из офисных программ (типа Word или OpenOffice)'],
        ['sistem_name' => 'ckeditor', 'name' => 'CKEditor', 'description' => 'Тектсовый редактор'],
        ['sistem_name' => 'imce_wysiwyg', 'name' => 'IMCE Wysiwyg bridge', 'description' => 'Тектсовый редактор'],
        ['sistem_name' => 'geshifilter', 'name' => 'GeSHi Filter', 'description' => 'Подсветка синтаксиса'],
        ['sistem_name' => 'bueditor', 'name' => 'bueditor', 'description' => 'простой WYSIWYG редактор, подойдет для большинства сайтов'],
      ],
    ],
    [
      'group_name' => 'Хлебные крошки',
      'modules' => [['sistem_name' => 'path_breadcrumbs', 'name' => 'Path Breadcrumbs', 'description' => 'модуль, который умеет строить хлебные крошки для абсолютно любых страниц (как статичных, так и динамичных). Удобный интерфейс (частично слизан с page manager\'a) позволяет быстро и красиво строить навигационную линейку по крошкам. Модуль позволяет заменить все остальные для построения хлебных крошек.'],
        ['sistem_name' => 'custom_breadcrumbs', 'name' => 'Custom Breadcrumbs', 'description' => 'Хлебные крошки'],
        ['sistem_name' => 'panels_breadcrumbs', 'name' => 'Panel Breadcrumbs', 'description' => 'Хлебные крошки'],
        ['sistem_name' => 'hansel', 'name' => 'Hansel breadcrumbs', 'description' => 'Хлебные крошки'],
      ],
    ],
    [
      'group_name' => 'SEO',
      'modules' => [
        ['sistem_name' => 'pathauto', 'name' => 'Pathauto', 'description' => 'создает правила для синонимов ссылок'],
        ['sistem_name' => 'metatag', 'name' => 'Metatag', 'description' => 'добавляет метатеги и позволяет их настроить'],
        ['sistem_name' => 'xmlsitemap', 'name' => 'XML sitemap', 'description' => 'создает карту сайта XML'],
        ['sistem_name' => 'redirect', 'name' => 'Redirect', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'globalredirect', 'name' => 'Global Redirect', 'description' => 'описание отсутствует'],
      ],
    ],
    [
      'group_name' => 'Интернет магазин',
      'modules' => [
        ['sistem_name' => 'ubercart', 'name' => 'Ubercart', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'uc_ajax_cart', 'name' => 'Ubercart AJAX Cart', 'description' => 'описание отсутствует'],
        ['sistem_name' => 'uc_optional_checkout_review', 'name' => 'Ubercart Optional Checkout Review', 'description' => 'описание отсутствует'],
      ],
    ],
  ];
}