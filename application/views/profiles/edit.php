<h1>Edit Profile</h1>
<?php if($this->session->flashdata('errors')): ?>
    <div style="color: red;">
        <?php foreach($this->session->flashdata('errors') as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
$input_data = $this->session->flashdata('input_data');
?>

<?php echo form_open('profiles/update'); ?>
<label for="name">Name</label>
<input type="text" name="name" value="<?php echo isset($input_data['name']) ? $input_data['name'] : (isset($profile->name) ? $profile->name : ''); ?>"><br>

<label for="surname">Surname</label>
<input type="text" name="surname" value="<?php echo isset($input_data['surname']) ? $input_data['surname'] : (isset($profile->surname) ? $profile->surname : ''); ?>"><br>

<label for="phone">Phone</label>
<input type="text" name="phone" value="<?php echo isset($input_data['phone']) ? $input_data['phone'] : (isset($profile->phone) ? $profile->phone : ''); ?>"><br>

<label for="dni">DNI</label>
<input type="text" name="dni" value="<?php echo isset($input_data['dni']) ? $input_data['dni'] : (isset($profile->dni) ? $profile->dni : ''); ?>"><br>

<label for="picture">Picture</label>
<input type="text" name="picture" value="<?php echo isset($input_data['picture']) ? $input_data['picture'] : (isset($profile->picture) ? $profile->picture : ''); ?>"><br>

<label for="street">Street</label>
<input type="text" name="street" value="<?php echo isset($input_data['street']) ? $input_data['street'] : (isset($address->street) ? $address->street : ''); ?>"><br>

<label for="number">Number</label>
<input type="text" name="number" value="<?php echo isset($input_data['number']) ? $input_data['number'] : (isset($address->number) ? $address->number : ''); ?>"><br>

<label for="zone_id">Zone</label>
<select name="zone_id">
    <option value="">Seleccione una zona</option> <!-- Opción por defecto vacía -->
    <?php foreach ($zones as $zone): ?>
        <option value="<?php echo $zone->id; ?>" <?php echo isset($input_data['zone_id']) ? ($input_data['zone_id'] == $zone->id ? 'selected' : '') : (isset($address->zone_id) && $address->zone_id == $zone->id ? 'selected' : ''); ?>>
            <?php echo $zone->name; ?>
        </option>
    <?php endforeach; ?>
</select><br>

<input type="submit" name="submit" value="Update Profile">
<?php echo form_close(); ?>