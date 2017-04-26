<?php
/**
* Режим отладки
* 
* Если равен 1, при переводе текста выполняется проверка 
* отсутствующих переводов и их запись в базу
*/
define("DEBUG_MODE", 1);
/**
 * Вывод текста ошибок и исключений при выполнении кода когда DEBUG_MODE = 1
 */
if(DEBUG_MODE){
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);
} else {
    error_reporting();
    ini_set('display_errors', 0);
}

$brand = "Gr8cPr0o";
$menu = [
    "home"=>[
        "icon"=>"fa-home",
        "title"=>"Main page - Home",
        "text"=>"Home",
        "href"=>"index.php",
        "class"=>"nav-item",
    ],
    "projects"=>[
        "icon"=>"fa-file-code-o",
        "title"=>"Projects",
        "text"=>"Projects",
        "href"=>"projects.php",
        "class"=>"nav-item",
    ],
    "contacts"=>[
        "icon"=>"fa-phone",
        "title"=>"Contacts",
        "text"=>"Contacts",
        "href"=>"contacts.php",
        "class"=>"nav-item",
    ],
];
$components = [
    "css"=>[
        [
            "title"=>"Bootstrap",
            "link"=>"https://v4-alpha.getbootstrap.com/components/navbar/",
            "href"=>"css/bootstrap.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
        [
            "title"=>"Font Awesome",
            "link"=>"http://fontawesome.io/icons/",
            "href"=>"css/font-awesome.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
    ],
    "js"=>[
        [
            "title"=>"JQuery",
            "link"=>"http://jquery.com/",
            "src"=>"js/jquery-3.1.1.js",
        ],
        [
            "title"=>"Tether",
            "link"=>"http://tether.io/",
            "src"=>"js/tether.min.js",
        ],
        [
            "title"=>"Bootstrap",
            "link"=>"https://v4-alpha.getbootstrap.com/components/navbar/",
            "src"=>"js/bootstrap.js",
        ],
    ]
];
/**
 * Печать атрибутов в тегах HTML
 * 
 * @param array $requirement Перечень имен требуемых атрибутов
 * @param array $attributes Асоциативный масив атрибутов, где ключ - название, а значение - содержание атрибута
 */
function print_attributes(array $requirement, array $attributes){
    foreach ($attributes as $key => $attribute) if(in_array($key, $requirement)){
        echo " {$key}=\"{$attribute}\"";
    }
}
/**
 * Печать подключаемых компонентов (скрипты стили)
 * 
 * @param array $components Многомерный асрциативный массив компонентов
 */
function print_components(array $components){
    foreach($components as $type=>$item) if(is_array($item)){
        switch($type){
            case 'css':
                foreach($item as $component) if(is_array($component) && array_key_exists('href', $component)){ ?>
                    <link<?=print_attributes(['href', 'type', 'media', 'rel'], $component)?>>
                <?php }
            break;
            case 'js':
                foreach($item as $component) if(is_array($component) && array_key_exists('src', $component)){ ?>
                    <script<?=print_attributes(['src'], $component)?>></script>
                <?php }
            break;
        }
    }
}
/**
 * Печать пунктов меню
 * 
 * @param array $menu Многомерный асрциативный массив - перечень пунктов меню
 */
function print_menu(array $menu){ ?>
    <ul class="navbar-nav mr-auto">
        <?php foreach ($menu as $key => $item) if(is_array($item) && (array_key_exists('icon',$item) || array_key_exists('text',$item))) { ?>
        <li<?=print_attributes(['class','title'], $item)?>>
            <a class="nav-link"<?=print_attributes(['href'], $item)?>>
                <?php if(array_key_exists('icon', $item)){ ?>
                <i class="fa <?=$item['icon']?>"></i>
                <?php } ?>
                <?php if(array_key_exists('text', $item)){ ?>
                <span><?=$item['text']?></span>
                <?php } ?>
            </a>
        </li>
        <?php } ?>
    </ul>
<?php } ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gr8cPr0o</title>
        <?=print_components($components)?>
    </head>
    <body>
        <header class="navbar navbar-toggleable-md navbar-light bg-faded">
            <link rel="stylesheet" href="my.css">
            <nav class="container" style="min-width: 250px;">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?=$brand?></a>
                <div id="navbarNav" class="collapse navbar-collapse ">
                    <?=print_menu($menu)?>
                </div>
            </nav>
        </header>
        <div class="container">
            <article>
                <h1>Welcome!</h1>
                <h3>Used components:</h3>
                <?php foreach ($components as $key => $value) { ?>
                <h4><?= strtoupper($key)?></h4>
                <ul>
                    <?php foreach ($value as $index => $item) { ?>
                    <li><a href="<?=$item['link']?>"><?=$item['title']?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </article>
        </div>
    </body>
</html>