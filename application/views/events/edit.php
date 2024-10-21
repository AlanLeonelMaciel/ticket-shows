<?php $errors = $this->session->flashdata('errors'); ?>
<?php $input_data = $this->session->flashdata('input_data'); ?>
<h1>Editar evento #<?php echo $event->id; ?></h1>
<form id="store-form" action="<?php echo base_url('events/update/') . $event->id; ?>" method="POST" enctype="multipart/form-data">
    <label for="location-name">Lugar del evento</label>
    <br>
    <select name="location-name" id="location-name">
        <option value="" disabled>Seleccione un lugar</option>
        <?php if(isset($locations)): ?>
            <?php foreach($locations as $location): ?>
                <option value="<?php echo $location->name; ?>" <?php echo isset($input_data['location-name']) ? ($input_data['location-name'] == $location->name ? 'selected' : null) : ($event->location_id == $location->id ? 'selected' : null); ?>>
                    <?php echo $location->name; ?>
                </option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <a href="#">Dar de alta un nuevo lugar</a>
    <br>
    <?php if(isset($errors['location-name'])): ?>
        <small style="color: red;"><?php echo $errors['location-name']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <label for="title">Título</label>
    <br>
    <input type="text" name="title" id="title" placeholder="Ingrese el título" value="<?php echo isset($input_data['title']) ? $input_data['title'] : $event->title; ?>">
    <br>
    <?php if(isset($errors['title'])): ?>
        <small style="color: red;"><?php echo $errors['title']; ?></small>
        <br>
    <?php endif; ?>
    <label for="description">Descripción</label>
    <br>
    <textarea name="description" id="description" placeholder="Ingrese la descripción" style="resize: none; height: 100px;"><?php echo isset($input_data['description']) ? $input_data['description'] : $event->description; ?></textarea>
    <br>
    <?php if(isset($errors['description'])): ?>
        <small style="color: red;"><?php echo $errors['description']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <label for="date">Fecha</label>
    <br>
    <input type="date" name="date" id="date" value="<?php echo isset($input_data['date']) ? $input_data['date'] : $event->date; ?>">
    <br>
    <?php if(isset($errors['date'])): ?>
        <small style="color: red;"><?php echo $errors['date']; ?></small>
        <br>
    <?php endif; ?>
    <label for="time">Hora</label>
    <br>
    <input type="time" name="time" id="time" value="<?php echo isset($input_data['time']) ? $input_data['time'] : $event->time; ?>">
    <br>
    <?php if(isset($errors['time'])): ?>
        <small style="color: red;"><?php echo $errors['time']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <label for="picture">Cambiar foto (opcional)</label>
    <br>
    <input type="file" name="picture" id="picture">
    <br>
    <?php if(isset($errors['upload_errors'])): ?>
        <small style="color: red;"><?php echo $errors['upload_errors']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <button type="submit">Actualizar evento</button>
</form>
<br>
