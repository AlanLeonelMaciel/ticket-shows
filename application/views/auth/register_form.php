<?php $errors = $this->session->flashdata('errors'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<h1>Registro</h1>
<form action="<?php echo base_url('auth/register'); ?>" method="POST">
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email">
    <br>
    <?php if(isset($errors['email'])): ?>
        <small style="color: red;"><?php echo $errors['email']; ?></small>
        <br>
    <?php endif; ?>
    <label for="password">Password</label>
    <br>
    <input type="password" name="password" id="password">
    <br>
    <?php if(isset($errors['password'])): ?>
        <small style="color: red;"><?php echo $errors['password']; ?></small>
        <br>
    <?php endif; ?>
    <label for="confirm-password">Repetir Password</label>
    <br>
    <input type="password" name="confirm-password" id="confirm-password">
    <br>
    <?php if(isset($errors['confirm-password'])): ?>
        <small style="color: red;"><?php echo $errors['confirm-password']; ?></small>
        <br>
    <?php endif; ?>
    <br>
    <button type="submit">Registrarse</button>
</form>
<?php if(isset($success)): ?>
    <br>
    <small style="color: green;"><?php echo $success; ?></small>
<?php endif; ?>