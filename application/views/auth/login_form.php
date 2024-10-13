<?php $errors = $this->session->flashdata('errors'); ?>
<?php $success = $this->session->flashdata('success'); ?>
<?php $input_data = $this->session->flashdata('input_data'); ?>
<h1>Login</h1>
<form action="<?php echo base_url('auth/login'); ?>" method="POST">
    <label for="email">Email</label>
    <br>
    <input type="email" name="email" id="email" value="<?php echo isset($input_data['email']) ? $input_data['email'] : null; ?>">
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
    <br>
    <button type="submit">Login</button>
</form>
<?php if(isset($errors['login_error'])): ?>
    <small style="color: red;"><?php echo $errors['login_error']; ?></small>
    <br>
<?php endif; ?>