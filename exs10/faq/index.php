
<?php
$root = "../";
include '../source/config/main.php';
include '../source/view/main.php';


function print_content() {

    if(array_key_exists('email', $_POST) && array_key_exists('message', $_POST) && $_POST['message']!=''){
        $post = [
            'firstname' => '',
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];
        $filenames = "../source/config/faq.php";
        if(array_key_exists('email', $_POST)) $post['firstname'] = $_POST['firstname'];
        ob_start();
        echo "\n".'$faq["'.date("Y-m-d H:i:s").'"] = ';
        var_export($post);
        echo ";";
        $post = ob_get_contents();
        ob_end_clean();
        file_put_contents($filenames, $post, FILE_APPEND);
    }


?>
<h1>FAQ</h1>
<hr>
<article class="">
    <h3>List of questions and answers:</h3>
    <?php
    include '../source/config/faq.php';
    krsort($faq); $i=0; foreach ($faq as $key => $value) { $i++; ?>
        <div class="form-group form-control has-success" style="background-color: #a6d5ec">
            <label><?=$key?>: <b><?=$value['firstname']?></b> <i><?=$value['email']?></i></label>
            <hr>
<?= $value['message']?>
            <?php if(array_key_exists('request', $value) && is_array($value['request'])) foreach ($value['request'] as $date => $request) { ?>
                <br><br>
                <div class="form-group form-control" style="background-color: #e4b9b9">
                    <?=$date?>: <b><?=$request['firstname']?></b>
                    <hr>
                    <?=$request['message']?>
                </div>
            <?php } ?>
        </div>
        <?php if($i>=3) break; } ?>




<article class="form-group">
        <h3>Write us:</h3>
        <div class="form-control">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter your First Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="hidden" name="question" value="1">
                <div class="form-group">
                    <label for="textarea">Message</label>
                    <textarea name="message" class="form-control" id="textarea" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 108px;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </article>


<?php }

?>

