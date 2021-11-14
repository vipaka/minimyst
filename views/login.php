<div id="login">
    <?php 
        include_once('./controllers/UsersController.php');

        $usersController = new UsersController();

        if (isset($_POST['name'])){
            $registeredUser = $usersController->loginOrSignup($_POST['name']);
            setcookie('minimyst_user_id', (int) $registeredUser['user_id'], time()+60*60*24*60);
        }
        $users = $usersController->getData();
        $loggedIn = isset($_COOKIE['minimyst_user_id']);
    
        if ($loggedIn || isset($_POST['name'])){  ?>
            <p>You are successfully logged in!</p>
        <?php }else{ ?>
            <p>Please log in or sign up to use Minimyst!</p>
            <form id="login" method="post" action="/minimyst/login">
                <fieldset>
                    <input type="text" name="name" />
                    <input type="submit" value="Login!" />
                </fieldset>
            </form>
    <?php } ?>
</div>
