<div>
    <form action="" method="post">
        Username: <input  type="text" name="user_name"/>
        Password: <input type="text" name="user_pass">
        Password again <input type="text" name="user_pass_check">
        E-mail: <input type="text" name="user_email">
        <input type="submit" value="Create user">
    </form>

</div>
<?php
    include './connect.php';
    include './header.php';


    echo '<h3>Sign uo</h3>';

    if ($_SERVER['RWQUEST_METHOD'] != 'POST') {

        echo '
        <form action="" method="post">
            Username: <input  type="text" name="user_name"/>
            Password: <input type="text" name="user_pass">
            Password again <input type="text" name="user_pass_check">
            E-mail: <input type="text" name="user_email">
            <input type="submit" value="Create user">
        </form>
        ';
    }

    else {
        $errors =array();

        if (isset($_POST['user_name'])) {
            if (!ctype_alnum($_POST['user_name'])) {
                $errors[] = 'The username can only contain letters and digits';
            }
            if (strlen($_POST['user_name']) > 30) {
                $errors[] = 'The username cannot be longer than 30 characters';
            }
        }
        else {
            $$errors[] = 'The username field must not be empty';
        }

        if (isset($_POST['user_pass'])) {
            if ($post['user_pass'] !== $_POST['user_pass_check']) {
                $errors[] = 'The two passwords did not match';
            }
        }
        else {
            $errors[]= 'The password field cannot be empty';
        }
        if (!empty($errors)) {
            echo 'Uh-oh.... ';

        }
    }


    include './footer.php';
?>