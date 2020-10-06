<?php if(isset($_SESSION['login']) && isset($_SESSION['pass'])):?>
    <p>Приветствую вас <?=$_SESSION['login']?></p>
    <p><a href="#">Личный кабинет</a></p>
<?php else:?>
    <h1>Вход на сайт</h1><hr>
    <?php echo $message?$message:"";?>
    <form method="post">
        <p>Логин: <input type="text" name="login" maxlength="30" placeholder="Введите Логин" autofocus required></p>
        <p>Пароль: <input type="password" minlength="2" name="pass" placeholder="Введите Пароль" required></p>
        <input type="submit" name="enter" value="Войти" ">
    </form>
<?php endif;?>
