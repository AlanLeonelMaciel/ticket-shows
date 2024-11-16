<?php $input_data = $this->session->flashdata('input_data'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<?php $errors = $this->session->flashdata('errors'); ?>
<div class="container text-white">
    <h1 class="text-center mb-4">Editar perfil</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm border-light">
                <form action="<?php echo base_url('profiles/update/')  . $profile->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : null ?>" name="name" id="name" placeholder="Ingrese su nombre" value="<?php echo isset($input_data['name']) ? $input_data['name'] : (isset($profile->name) ? $profile->name : ''); ?>">
                        <?php if(isset($errors['name'])): ?>
                            <small class="text-danger"><?php echo $errors['name']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellido</label>
                        <input type="text" class="form-control <?php echo isset($errors['surname']) ? 'is-invalid' : null ?>" name="surname" id="surname" placeholder="Ingrese su apellido" value="<?php echo isset($input_data['surname']) ? $input_data['surname'] : (isset($profile->surname) ? $profile->surname : ''); ?>">
                        <?php if(isset($errors['surname'])): ?>
                            <small class="text-danger"><?php echo $errors['surname']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : null ?>" name="phone" id="phone" placeholder="Ingrese su teléfono" value="<?php echo isset($input_data['phone']) ? $input_data['phone'] : (isset($profile->phone) ? $profile->phone : ''); ?>">
                        <?php if(isset($errors['phone'])): ?>
                            <small class="text-danger"><?php echo $errors['phone']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-5">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control <?php echo isset($errors['dni']) ? 'is-invalid' : null ?>" name="dni" id="dni" placeholder="Ingrese su DNI" value="<?php echo isset($input_data['dni']) ? $input_data['dni'] : (isset($profile->dni) ? $profile->dni : ''); ?>">
                        <?php if(isset($errors['dni'])): ?>
                            <small class="text-danger"><?php echo $errors['dni']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Calle</label>
                        <input type="text" class="form-control <?php echo isset($errors['street']) ? 'is-invalid' : null ?>" name="street" id="street" placeholder="Ingrese la calle" value="<?php echo isset($input_data['street']) ? $input_data['street'] : (isset($address->street) ? $address->street : ''); ?>">
                        <?php if(isset($errors['street'])): ?>
                            <small class="text-danger"><?php echo $errors['street']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Número</label>
                        <input type="text" class="form-control <?php echo isset($errors['number']) ? 'is-invalid' : null ?>" name="number" id="number" placeholder="Ingrese el número" value="<?php echo isset($input_data['number']) ? $input_data['number'] : (isset($address->number) ? $address->number : ''); ?>">
                        <?php if(isset($errors['number'])): ?>
                            <small class="text-danger"><?php echo $errors['number']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="zone_id">Zona</label>
                        <select class="form-select" name="zone_id">
                            <option value="" disabled <?php echo !$address ? 'selected' : null; ?>>Seleccione una zona</option> <!-- Opción por defecto vacía -->
                            <?php foreach ($zones as $zone): ?>
                                <option value="<?php echo $zone->id; ?>" <?php echo isset($input_data['zone_id']) ? ($input_data['zone_id'] == $zone->id ? 'selected' : '') : (isset($address->zone_id) && $address->zone_id == $zone->id ? 'selected' : ''); ?>>
                                    <?php echo $zone->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($errors['zone_id'])): ?>
                            <small style="color: red;"><?php echo $errors['zone_id']; ?></small>
                            <br>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary w-100 mt-3" type="submit">Actualizar datos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/form-errors.js'); ?>"></script>
