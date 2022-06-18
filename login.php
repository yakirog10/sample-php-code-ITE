<div>
    <div class="w3-card-4 w3-margin">
        <div class="w3-container w3-brown">
            <h1 class="w3-center">Login Page</h1>
        </div>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" 
        class="w3-container w3-padding">
            <p>
                username:
                <input type="text" name="login_username" class="w3-input">
            </p>
            <p>
                password:
                <input type="text" name="password" class="w3-input">
            </p>
            <input type="submit" class="w3-btn w3-brown">
        </form>
    </div>
</div>