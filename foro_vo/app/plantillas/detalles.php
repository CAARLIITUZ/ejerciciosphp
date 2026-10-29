<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= mb_strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= numPalabras($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= letraMasRepetida($_REQUEST['comentario']) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= palabraMasRepetida($_REQUEST['comentario']) ?></td></tr>
</table>
</div>

