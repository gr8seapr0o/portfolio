
<?php
$root = "../";
include '../source/config/main.php';
include '../source/view/main.php';
function print_content() {
?>

<article class="form-group">
        <h3>Write us:</h3>
        <div class="form-control">
            <form action="<?=$GLOBALS['baseLink']?>faq/" method="POST">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Enter your First Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
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