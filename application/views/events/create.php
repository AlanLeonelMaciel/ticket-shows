<?php $errors = $this->session->flashdata('errors'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<?php $input_data = $this->session->flashdata('input_data'); ?>
<h1>Nuevo evento</h1>
<form id="store-form" action="<?php echo base_url('events/store') ?>" method="POST" enctype="multipart/form-data">
    <label for="location-name">Lugar del evento</label>
    <br>
    <select name="location-name" id="location-name">
        <option value="" disabled selected>Seleccione un lugar</option>
        <?php if(isset($locations)): ?>
            <?php foreach($locations as $location): ?>
                <option value="<?php echo $location->name; ?>">
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
    <input type="text" name="title" id="title" placeholder="Ingrese el título" value="<?php echo isset($input_data['title']) ? $input_data['title'] : ''; ?>">
    <br>
    <?php if(isset($errors['title'])): ?>
        <small style="color: red;"><?php echo $errors['title']; ?></small>
        <br>
    <?php endif; ?>
    <label for="description">Descripción</label>
    <br>
    <textarea name="description" id="description" placeholder="Ingrese la descripción" style="resize: none; height: 100px;"><?php echo isset($input_data['description']) ? $input_data['description'] : ''; ?></textarea>
    <br>
    <?php if(isset($errors['description'])): ?>
        <small style="color: red;"><?php echo $errors['description']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <label for="date">Fecha</label>
    <br>
    <input type="date" name="date" id="date" value="<?php echo isset($input_data['date']) ? $input_data['date'] : ''; ?>">
    <br>
    <?php if(isset($errors['date'])): ?>
        <small style="color: red;"><?php echo $errors['date']; ?></small>
        <br>
    <?php endif; ?>
    <label for="time">Hora</label>
    <br>
    <input type="time" name="time" id="time" value="<?php echo isset($input_data['time']) ? $input_data['time'] : ''; ?>">
    <br>
    <?php if(isset($errors['time'])): ?>
        <small style="color: red;"><?php echo $errors['time']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <label for="picture">Foto</label>
    <br>
    <input type="file" name="picture" id="picture">
    <br>
    <?php if(isset($errors['upload_errors'])): ?>
        <small style="color: red;"><?php echo $errors['upload_errors']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <button type="submit">Crear evento</button>
</form>
<?php if(isset($success)): ?>
    <br>
    <small style="color: green;"><?php echo $success; ?></small>
<?php endif; ?>
