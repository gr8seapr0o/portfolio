<?php
define("DEBUG_MODE", 1);

if(DEBUG_MODE){
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
} else {
    error_reporting();
    ini_set('display_errors', 0);
}

$brand = "Gr8cPr0o LLC";
$menu =[
    "home"=>[
            "icon"=>"fa-home",
            "title"=>"Main page - Home",
            "text"=>"Home",
            "href"=>"",
            "class"=>"nav-item",
        ],
    "projects"=>[
        "icon"=>"fa-file-code-o",
        "title"=>"Projects",
        "text"=>"Projects",
        "href"=>"projects",
        "class"=>"nav-item",
    ],
    "contacts"=>[
        "icon"=>"fa-phone",
        "title"=>"Contacts",
        "text"=>"Contacts",
        "href"=>"contacts",
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

function print_attributes(array $requirement, array $attributes) {
    foreach ($attributes as $key => $attribute) if(in_array($key, $requirement)) {
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
        <title>Gr8cPr0o - Portfolio</title>
        <?=print_components($components)?>
    </head>
    <body>
    <header class="">
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#"><?=$brand?></a>
            <div id="navbarNav" class="collapse navbar-collapse">
                <?=print_menu($menu)?>
            </div>
        </nav>
    </header>
    <div class="container-fluid">
        <article>
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


    <div style="margin: 20px auto; width: 20%;
               border: 1px  dotted #2b669a; padding: 15px;">
        <style>
            label {display: block; font-weight: bold;}
            input {display: block; margin-bottom: 10px;}
            textarea {display: block; width: 90%; height: 50px;}
            input[type=submit] {margin-top: 10px;}
        </style>
        <form method="POST" action="index.php" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <label for="age">Age</label>
            <input type="text" value="" name="age" id="age">
            <label for="text">Text</label>
            <textarea id="text" name="text"></textarea>
            <label for="file">Image</label>
            <input type="file" name="image" id="file">
            <input type="submit" value="send">
        </form>
    </div>
    <?php
    echo "<pre>";
    var_dump($_POST);
    ?>
    </body>
    </html>



