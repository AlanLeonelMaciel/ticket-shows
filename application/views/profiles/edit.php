<h1>Edit Profile</h1>
<?php if ($this->session->flashdata('errors')): ?>
    <div style="color: red;">
        <?php foreach ($this->session->flashdata('errors') as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
$input_data = $this->session->flashdata('input_data');
?>

<?php echo form_open_multipart('profiles/update/' . $profile->id); ?>
<label for="name">Nombre</label>
<input type="text" name="name" value="<?php echo isset($input_data['name']) ? $input_data['name'] : (isset($profile->name) ? $profile->name : ''); ?>"><br>

<label for="surname">Apellidos</label>
<input type="text" name="surname" value="<?php echo isset($input_data['surname']) ? $input_data['surname'] : (isset($profile->surname) ? $profile->surname : ''); ?>"><br>

<label for="phone">Telefono</label>
<input type="text" name="phone" value="<?php echo isset($input_data['phone']) ? $input_data['phone'] : (isset($profile->phone) ? $profile->phone : ''); ?>"><br>

<label for="dni">DNI</label>
<input type="text" name="dni" value="<?php echo isset($input_data['dni']) ? $input_data['dni'] : (isset($profile->dni) ? $profile->dni : ''); ?>"><br>

<label for="picture">Foto</label>
<br>
<input type="file" name="picture" id="picture">
<br>
<?php if (isset($errors['upload_errors'])): ?>
    <small style="color: red;"><?php echo $errors['upload_errors']; ?></small>
    <br>
<?php endif; ?>
<br>

<label for="street">Calle</label>
<input type="text" name="street" value="<?php echo isset($input_data['street']) ? $input_data['street'] : (isset($address->street) ? $address->street : ''); ?>"><br>

<label for="number">Numero</label>
<input type="text" name="number" value="<?php echo isset($input_data['number']) ? $input_data['number'] : (isset($address->number) ? $address->number : ''); ?>"><br>

<label for="zone_id">Zona</label>
<select name="zone_id">
    <option value="">Seleccione una zona</option> <!-- Opción por defecto vacía -->
    <?php foreach ($zones as $zone): ?>
        <option value="<?php echo $zone->id; ?>" <?php echo isset($input_data['zone_id']) ? ($input_data['zone_id'] == $zone->id ? 'selected' : '') : (isset($address->zone_id) && $address->zone_id == $zone->id ? 'selected' : ''); ?>>
            <?php echo $zone->name; ?>
        </option>
    <?php endforeach; ?>
</select><br>

<input type="submit" name="submit" value="Actualizar perfil">
<?php echo form_close(); ?>