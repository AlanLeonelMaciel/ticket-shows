<pre><?php echo 'ID: ' . $event->id; ?></pre>
<pre><?php echo 'Título: ' . $event->title; ?></pre>
<pre><?php echo 'Descripción: ' . $event->description; ?></pre>
<pre><?php echo 'Fecha: ' . $event->date; ?></pre>
<pre><?php echo 'Hora: ' . $event->time; ?></pre>
<pre>Foto:</pre>
<img style="max-width: 300px;" src="<?php echo base_url($event->picture); ?>">
<pre><?php echo 'Ubicación (ID): ' . $event->location_id; ?></pre>
<br>
<a href="<?php echo base_url('events/edit/') . $event->id; ?>">Editar evento</a>
<br>
<br>
<form action="<?php echo base_url('events/delete/') . $event->id; ?>" method="post">
    <button type="submit">Borrar evento</button>
</form>