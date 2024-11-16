<?php $errors = $this->session->flashdata('errors'); ?>
<?php $input_data = $this->session->flashdata('input_data'); ?>
<div class="container text-white">
    <h1 class="text-center mb-4">Editar evento #<?php echo $event->id; ?></h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 shadow-sm border-light">
                <form id="update-form" action="<?php echo base_url('events/update/') . $event->id; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control <?php echo isset($errors['title']) ? 'is-invalid' : null ?>" name="title" id="title" placeholder="Ingrese el título" value="<?php echo $input_data['title'] ?? $event->title;  ?>">
                        <?php if(isset($errors['title'])): ?>
                            <small class="text-danger"><?php echo $errors['title']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-5">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : null ?>" name="description" id="description" placeholder="Ingrese la descripción"><?php echo $input_data['description'] ?? $event->description; ?></textarea>
                        <?php if(isset($errors['description'])): ?>
                            <small class="text-danger"><?php echo $errors['description']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" class="form-control <?php echo isset($errors['date']) ? 'is-invalid' : null ?>" name="date" id="date" value="<?php echo $input_data['date'] ?? $event->date; ?>">
                        <?php if(isset($errors['date'])): ?>
                            <small class="text-danger"><?php echo $errors['date']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Hora</label>
                        <input type="time" class="form-control <?php echo isset($errors['time']) ? 'is-invalid' : null ?>" name="time" id="time" value="<?php echo $input_data['time'] ?? $event->time; ?>">
                        <?php if(isset($errors['time'])): ?>
                            <small class="text-danger"><?php echo $errors['time']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : null ?>" name="price" id="price" placeholder="Ingrese el precio" value="<?php echo $input_data['price'] ?? $event->price; ?>">
                        <?php if(isset($errors['price'])): ?>
                            <small class="text-danger"><?php echo $errors['price']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="location-name" class="form-label">Lugar del evento</label>
                        <select class="form-select" name="location-name" id="location-name">
                            <option value="" disabled>Seleccione un lugar</option>
                            <?php if(isset($locations)): ?>
                                <?php foreach($locations as $location): ?>
                                    <option value="<?php echo $location->name; ?>" <?php echo ($input_data['location-name'] ?? $location->name) == $location->name ? 'selected' : null ?>>
                                        <?php echo $location->name; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <?php if(isset($errors['location-name'])): ?>
                            <small class="text-danger"><?php echo $errors['location-name']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <label for="picture" class="form-label">Cambiar foto (opcional)</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                        <?php if(isset($errors['upload_errors'])): ?>
                            <small class="text-danger"><?php echo $errors['upload_errors']; ?></small>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary w-100 mt-3" type="submit">Actualizar datos</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/form-errors.js'); ?>"></script>
