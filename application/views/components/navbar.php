<nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">Ticket Shows</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Eventos</a>
                <div class="dropdown-menu">
                    <?php if($this->session->userdata('role') == 'admin'): ?>
                        <a class="dropdown-item" href="<?php echo base_url('events/create'); ?>">Crear evento</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?php echo base_url('events'); ?>">Todos los eventos</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuario</a>
                <div class="dropdown-menu dropdown-menu-end">
                    <?php if($this->session->userdata('logged_in')): ?>
                        <a class="dropdown-item" href="<?php echo base_url('profiles/show/') . $this->session->userdata('profile_id'); ?>">Mi perfil</a>
                        <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                    <?php else: ?>
                        <a class="dropdown-item" href="<?php echo base_url('auth/register_form'); ?>">Registro</a>
                        <a class="dropdown-item" href="<?php echo base_url('auth/login_form'); ?>">Login</a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>
        </div>
    </div>
</nav>