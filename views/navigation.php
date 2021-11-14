<nav id="menu">
	<a href="./home">Home</a>
    <?php if (!$loggedIn) { ?>
    	<a href="./login">Login</a>
    <?php } ?>
    <a href="./yourPage">Your Page</a>
</nav>    