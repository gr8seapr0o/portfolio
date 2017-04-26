<?php
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
            /*"title"=>"Bootstrap",
            "link"=>"https://v4-alpha.getbootstrap.com/components/navbar/",*/
            "href"=>"css/bootstrap.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
        [
            /*"title"=>"Font Awesome",
            "link"=>"http://fontawesome.io/icons/",*/
            "href"=>"css/font-awesome.css",
            "type"=>"text/css",
            "media"=>"all",
            "rel"=>"stylesheet",
        ],
    ],
    "js"=>[
        [
            /*"title"=>"JQuery",
            "link"=>"http://jquery.com/",*/
            "src"=>"js/jquery-3.1.1.js",
        ],
        [
            /* "title"=>"Tether",
             "link"=>"http://tether.io/",*/
            "src"=>"js/tether.min.js",
        ],
        [
            /* "title"=>"Bootstrap",
             "link"=>"https://v4-alpha.getbootstrap.com/components/navbar/",*/
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
    <h1>Contacts</h1>
    <article class="form-group">
        <h2>Main office:</h2>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Name</b>:
                <span>Gr8cpr0o</span>
            </li>
            <li class="list-group-item">
                <b>Address</b>:
                <span>Bila Tserkva</span>
            </li>
            <li class="list-group-item">
                <b>E-mail</b>:
                <span>Gr8cpr0o@mail</span>
            </li>
            <li class="list-group-item">
                <b>www</b>:
                <span>Gr8cpr0o.com</span>
            </li>
        </ul>
    </article>
    <article class="form-group">
        <h3>Post data:</h3>
        <div class="form-control">
          <?php
          if(isset($_POST)) {


          print_r($_POST);
           }?>
        </div>
    </article>
    <article class="form-group">

        <h2>Write us:</h2>
        <div class="form-control">
            <form action="contacts.php" method="post">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Enter your First Name">

                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <br>
                <label for="textarea">Message</label>
                <textarea name="textarea" class="form-control" id="textarea" rows="4"
                          style="margin-top: 0px; margin-bottom: 0px; height: 108px;">
        </textarea>
                <button type="submit" class="btn btn-primary" style="margin-top: 20px">Submit</button>
            </form>
        </div>
    </article>
