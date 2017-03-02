<table>
<thead>
<th>Puesto</th>
<th>Nombre</th>
<th>Puntos</th>
</thead>
<tbody>
<?php 
$num = 1;
foreach ($usuarios as $usuario): ?>
    <tr>
    <td><?php echo $num . 'º'; ?></td>
    <td><?php echo $usuario['nombre']; ?></td>
    <td><?php echo $usuario['puntos']; ?></td>
    </tr>
    
<?php
$num++;
 endforeach; ?>
</tbody>
</table>
<br>
<form action="<?php echo base_url();?>">
	<input class="btn btn-primary" type="submit" value="Volver">
</form>
