<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
</head>
<body>
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

    <?php echo form_open('profile/update'); ?>
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo set_value('name', isset($input_data['name']) ? $input_data['name'] : $profile->name); ?>"><br>
                
        <label for="surname">Surname</label>
        <input type="text" name="surname" value="<?php echo set_value('surname', isset($input_data['surname']) ? $input_data['surname'] : $profile->surname); ?>"><br>

        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo set_value('phone', isset($input_data['phone']) ? $input_data['phone'] : $profile->phone); ?>"><br>

        <label for="dni">DNI</label>
        <input type="text" name="dni" value="<?php echo set_value('dni', isset($input_data['dni']) ? $input_data['dni'] : $profile->dni); ?>"><br>

        <label for="picture">Picture</label>
        <input type="text" name="picture" value="<?php echo set_value('picture', isset($input_data['picture']) ? $input_data['picture'] : $profile->picture); ?>"><br>

        <label for="street">Street</label>
        <input type="text" name="street" value="<?php echo set_value('street', isset($input_data['street']) ? $input_data['street'] : ($address ? $address->street : '')); ?>"><br>

        <label for="number">Number</label>
        <input type="text" name="number" value="<?php echo set_value('number', isset($input_data['number']) ? $input_data['number'] : ($address ? $address->number : '')); ?>"><br>
        
        <label for="zone_id">Zone</label>
        <select name="zone_id">
            <option value="">Seleccione una zona</option> <!-- Opción por defecto vacía -->
            <?php foreach ($zones as $zone): ?>
                <option value="<?php echo $zone->id; ?>" <?php echo set_select('zone_id', $zone->id, isset($input_data['zone_id']) ? $input_data['zone_id'] == $zone->id : ($address && $address->zone_id == $zone->id)); ?>>
                    <?php echo $zone->name; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="submit" value="Update Profile">
    <?php echo form_close(); ?>
</body>
</html>