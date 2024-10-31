<?php $errors = $this->session->flashdata('errors'); ?>
<div class="container text-white">
    <h1 class="text-center mb-4">Mi Perfil</h1>
    <div class="d-flex flex-column justify-content-center align-items-center mx-auto mb-4">
        <div class="rounded-circle d-flex flex-column justify-content-center align-items-center position-relative mx-auto custom-mw-150px custom-mh-150px">
            <img id="profile-image" class="img-fluid rounded-circle border border-light" src="<?php echo base_url($profile->picture ?: 'assets/img/profiles/empty.png'); ?>" >
        </div>
        <small class="text-white mt-2 text-uppercase font-weight-bold" style="letter-spacing: 1px;"><?php echo $this->session->userdata('role') == 'admin' ? 'Admin' : 'Comprador'; ?></small>
    </div>
    <form id="upload-form" method="POST" action="<?php echo base_url('profiles/update_picture'); ?>" enctype="multipart/form-data">
        <input type="file" id="profile-image-input" name="picture">
    </form>
    <?php if ($errors['upload_errors']): ?>
        <div class="alert alert-danger custom-mw-500px mx-auto" role="alert">
            <small><?php echo $errors['upload_errors']; ?></small>
        </div>
    <?php endif; ?>
    <div class="card bg-dark text-white mb-4 custom-mw-500px mx-auto">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <p class="card-text">Email: <?php echo $this->session->userdata('email'); ?></p>
            <p class="card-text">Nombre/s: <?php echo $profile->name; ?></p>
            <p class="card-text">Apellido/s: <?php echo $profile->surname; ?></p>
            <p class="card-text">Teléfono: <?php echo $profile->phone; ?></p>
            <p class="card-text">DNI: <?php echo $profile->dni; ?></p>
            <p class="card-text">Domicilio: <?php echo ($address && $zone) ? "$address->street $address->number, $zone->name" : null; ?></p>
        </div>
    </div>
    <div class="text-center">
        <a href="<?php echo base_url('profiles/edit/') . $profile->id; ?>" class="btn btn-primary">Editar perfil</a>
    </div>
</div>
<script src="<?php echo base_url('assets/js/handle-profile-image.js'); ?>"></script>

