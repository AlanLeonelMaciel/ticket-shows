<?php $errors = $this->session->flashdata('errors'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<?php $input_data = $this->session->flashdata('input_data'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm border-light">
                <h1 class="text-center mb-4">Registro</h1>
                <form action="<?php echo base_url('auth/register'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : null ?>" name="email" id="email" placeholder="Ingrese su email" value="<?php echo isset($input_data['email']) ? $input_data['email'] : ''; ?>">
                        <?php if(isset($errors['email'])): ?>
                            <small class="text-danger"><?php echo $errors['email']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : null ?>" name="password" id="password" placeholder="Ingrese su contraseña" autocomplete="off">
                        <?php if(isset($errors['password'])): ?>
                            <small class="text-danger"><?php echo $errors['password']; ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Repetir Password</label>
                        <input type="password" class="form-control <?php echo isset($errors['confirm-password']) ? 'is-invalid' : null ?>" name="confirm-password" id="confirm-password" placeholder="Repita su contraseña" autocomplete="off">
                        <?php if(isset($errors['confirm-password'])): ?>
                            <small class="text-danger"><?php echo $errors['confirm-password']; ?></small>
                        <?php endif; ?>
                    </div>
                    <button class="btn btn-primary w-100 mt-3" type="submit">Registrarse</button>
                </form>
                <?php if(isset($success)): ?>
                    <br>
                    <small class="text-success text-center"><?php echo $success; ?></small>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/form-errors.js'); ?>"></script>