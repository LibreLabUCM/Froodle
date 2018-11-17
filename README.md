# Froodle
¿Cómo usar el backend?:

introducir un titulo en su casilla, a continuacion elegir una fecha y una hora y darle a add date
Repetir el proceso con cuantas fechas se quiera, manteniendo el mismo titulo claro, se puede mantener tambien opcionalmente la misma fecha cambiando solo la hora
<br>
Cuando hemos introducido todas las fechas que queremos (sería bueno mostrar las fechas que llevamos :) ), pulsar createFroodle
<br>
Ahora ya tendremos las dechas seleccionadas, pero nos falta meter las opciones de cada usuario, para lo que ne nos redirige a una página donde podremos elegir un nombre de usuario y las opciones. Cuando hemos elegido nuestras opciones, pulsamos en Submit options y se nos redirige a una página donde se nos dice que nuestra informacion se ha añadido.
<br>
Al usuario de momento no se le muestra la encuesta entera, pero si miramos la tabla en la consola de mongo veremos que si que están las opciones correctamente insertadas
<br>
Ahora ya queda hacerlo bonito y mostrar más cosas...
<br>
Tambien hay que tener en cuenta que no deberia haber 2 froodles con el mismo titulo asi que...eso deberiamos manejarlo...


## Workspace
```sh
$ composer require mongodb/mongodb
```
