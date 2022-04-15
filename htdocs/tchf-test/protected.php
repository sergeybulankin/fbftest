<?php
    session_start();
	if (!isset($_SESSION['login'])) header("Location: index.php");

    if (isset($_SESSION['login'])) :
?>
<html>
     <head>
	 <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <title>Башҡорт теленән республика Интернет-олимпиадаһы</title>
	 <base href="/tchf-test/">
	 <link href='new_style.css' rel='stylesheet' type="text/css" />
	 <script src="/tchf-test/js/jquery-3.3.1.min.js"></script>
	 <script src="/tchf-test/js/script.js"></script>
	 </head>
     <body>
	 
	 <div class="main">
         <div class="header">
            Башҡорт1 теленән республика Интернет-олимпиадаһы
         </div>
        <img src="images/ornam_lv.png" />
        <img src="images/ornam_pv.png" style="float:right;"/>

		<?php include '../functions.php';
            if (!has_answer()) : ?>
                <div class="hello_block">
                    <h1>Хөрмәтле олимпиадала ҡатнашыусы!</h1>
                    <p>Һеҙгә бөтә һорауҙарға яуап бирергә кәрәк. Дүрт яуаптың береһе генә дөрөҫ.</p>
                    <p>Ваҡыт бөткәс йәки “Тесты тамамларға” тигән кнопканы баҫҡас, бөтә яуаптарығыҙ һаҡланасаҡ.</p>
                    <p>Уңыштар теләйбеҙ!</p>
                    <h1>Уважаемый участник <br>Республиканской Интернет-олимпиады!</h1>
                    <p>Вам нужно ответить на все тестовые вопросы. Из предложенных вариантов ответов только один ответ верный.</p>
                    <p>После окончания времени или нажатия вами кнопки "Закрыть тестирование", все ваши ответы будут сохранены.</p>
                    <p>Желаем удачи!</p>

                    <div type='submit' name='nach' class='push_button red' style="left: 50%;position: absolute; margin-left: -100px;">
                        тесты башларға
                    </div>
                </div>
            <?php endif; ?>

            <?php if (has_answer()) : ?>
                <div class="hello_block">
                    <h1>Уважаемый участник,<br><?=$_SESSION['fam'].' '.$_SESSION['name'].' '.$_SESSION['otch'];?>
                        <br>Вы уже прошли тестирование!
                    </h1>
                    <?php
                        session_unset();
                        session_destroy();
                    ?>
                </div>
            <?php endif; ?>

            <div class="footer">
                <img src="images/ornam_ln.png" style="float:left;margin-top:-100px;"/>
                <img src="images/ornam_pn.png" style="float:right;margin-top:-100px;"/>

                &copy; <?=date('Y');?> Стерлитамакский филиал БашГУ, все права защищены
            </div>
	 </div>
</body>
</html>
<?php endif; ?>