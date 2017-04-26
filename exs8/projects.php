<?php
/**
 * Created by PhpStorm.
 * User: SuperUser
 * Date: 25.04.2017
 * Time: 22:39
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

            "href"=>"css/bootstrap.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
        [

            "href"=>"css/font-awesome.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
    ],
    "js"=>[
        [
            "src"=>"js/jquery-3.1.1.js",
        ],
        [

            "src"=>"js/tether.min.js",
        ],
        [

            "src"=>"js/bootstrap.js",
        ],
    ]
];
function print_attributes(array $requirement, array $attributes){
    foreach ($attributes as $key => $attribute) if(in_array($key, $requirement)){
        echo " {$key}=\"{$attribute}\"";
    }
}
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
        <h2>Projects</h2>
        <h3>Complete Projects</h3>

    <div class="list-group">
        <a target="_blank" href="http://www.isscctv.com.ua/" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">ISS Ukraine</h5>
                <small class="text-muted">2012</small>
            </div>
            <p class="mb-1">Intelegent security systems</p>
            <small class="text-muted">http://www.isscctv.com.ua/</small>
        </a>
        <a target="_blank" href="http://lompier.com/" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Lompier</h5>
                <small class="text-muted">2014</small>
            </div>
            <p class="mb-1">Interior design bureau</p>
            <small class="text-muted">http://lompier.com/</small>
        </a>
        <a target="_blank" href="http://worklay.biz/" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Worklay</h5>
                <small class="text-muted">2015</small>
            </div>
            <p class="mb-1">Automation event and wedding business</p>
            <small class="text-muted">http://worklay.biz/</small>
        </a>

        </div>
    </article>
    <article class="form-group">
        <h3>Current projects</h3>
        <div class="list-group">

            <a target="_blank" href="http://bmu.intellectual.systems/" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">BMU</h5>
                    <small class="text-muted">2016</small>
                </div>
                <p class="mb-1">Construction and assembly department</p>
                <small class="text-muted">http://bmu.intellectual.systems/</small>
            </a>

            <a target="_blank" href="http://portfolio.intellectual.systems/" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Self Portfolio</h5>
                    <small class="text-muted">2017</small>
                </div>
                <p class="mb-1">Self test portfolio site</p>
                <small class="text-muted">http://portfolio.intellectual.systems/</small>
            </a>
        </div>
    </article>
</div>
</body>
</html>