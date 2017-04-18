<?php
$menu = [
  "home" => [
      "icon" => "fa-home",
      "title" => "Main-page Home",
      "text" => "Home",
  ],
   "project" => [
    "icon" => "fa-home-o",
    "title" => "projects",
    "text" => "projects",

],
    "contacts" => [
    "icon" => "fa-fhone",
    "title" => "phone",
    "text" => "phone",
  ],
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body>nav ul {
            list-style: none;
        }
        body>nav li {
            float: left;
            margin-right: 15px;
        }
    </style>
</head>
<body>
<nav>
    <ul>
        <?php foreach ($menu as $key => $value) { ?>
        <li title="<?=  (array_key_exists('title', $value))?$value['title']: "" ?>">
        <?php if(array_key_exists('icon', $value )) { ?>
            <i class="<?=$value['icon']?>"></i>
        <?php } ?>
        <?php if(array_key_exists('text', $value)) { ?>
            <span> <?= $value['text'] ?></span>
        <?php } ?>
        </li>
        <?php } ?>
    </ul>
</nav>

</body>
</html>
