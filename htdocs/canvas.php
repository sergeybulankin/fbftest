<!doctype html> 
<html>
  <meta charset='utf-8'>
  <head>
    <title>imgExample</title>
  </head>
  <body>
    <canvas id='example' width="695" height="999">Обновите браузер</canvas>
    <script>
      var example = document.getElementById("example"),
        ctx       = example.getContext('2d'), // Контекст
        pic       = new Image();              // "Создаём" изображение
      pic.src    = 'http://fbftest.strbsu.ru/nagradi/diplom.jpg';  // Источник изображения, позаимствовано на хабре
      pic.onload = function() {    // Событие onLoad, ждём момента пока загрузится изображение
        ctx.drawImage(pic, 0, 0);  // Рисуем изображение от точки с координатами 0, 0
		ctx.textBaseline = "top";
		ctx.font = "bold 20px Times New Roman";
		ctx.fillStyle = "#31302cf7";
		ctx.fillText("Байназарова Айгуль Маратовна", 200, 618);
		ctx.fillText("ученица 8 класса МОБУ СОШ с.Талачево", 180, 650);
		ctx.fillText("Султанова Раушания Сагмановна",230, 740);
      }
	  
		

	  
    </script>
  </body>
</html>