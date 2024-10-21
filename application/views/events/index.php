<a href="<?php echo base_url('events/create'); ?>">Crear nuevo evento</a>
<br><br><br>
<?php if(isset($events)): ?>
    <?php foreach($events as $event): ?>
        <pre><?php echo 'ID: ' . $event->id; ?></pre>
        <pre><?php echo 'Título: ' . $event->title; ?></pre>
        <pre><?php echo 'Descripción: ' . $event->description; ?></pre>
        <pre><?php echo 'Fecha: ' . $event->date; ?></pre>
        <pre><?php echo 'Hora: ' . $event->time; ?></pre>
        <pre>Foto:</pre>
        <img style="max-width: 300px;" src="<?php echo base_url($event->picture); ?>">
        <pre><?php echo 'Ubicación (ID): ' . $event->location_id; ?></pre>
        <a href="<?php echo base_url('events/show/') . $event->id; ?>">Ver detalles del evento</a>
        <br>
        <br>
        <br>
        <br>
    <?php endforeach; ?>
<?php endif; ?>