
<style>
    label {display: block; font-weight: bold;}
    input {display: block; margin-bottom: 10px;}
    textarea {display: block; width: 90%; height: 50px;}
    input[type=submit] {margin-top: 10px;}
</style>
<div style="margin: 20px auto; width: 20%;
               border: 1px  dotted #2b669a; padding: 15px;">
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
var_dump($_FILES);
die();
?>