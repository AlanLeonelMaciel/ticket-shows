<div class="d-flex flex-column align-items-center pb-5">
    <h1>¡Bienvenido a Ticket Shows!</h1>
    <h4 class="text-center custom-mw-500px mt-3">Compra entradas para tus shows y eventos favoritos. Desde conciertos hasta obras de teatro, ¡tenemos algo para todos!</h4>
</div>
<div class="carousel slide text-truncate d-lg-flex align-items-lg-center" data-bs-ride="carousel" id="carousel-1" style="height: 408px;">
    <div class="carousel-inner">
        <!-- //solo se muestran los dos primeros eventos -->
        <?php foreach (array_slice($events, 0, 2) as $index => $event): ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <a href="<?php echo base_url('events/show/') . $event->id; ?>">
                    <img class="w-100 d-block" src="<?php echo base_url($event->picture); ?>" alt="<?php echo $event->title; ?>">
                </a>
                </div>
        <?php endforeach; ?>
    </div>
    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
    <div class="carousel-indicators"><button type="button" data-bs-target="#carousel-1" data-bs-slide-to="0"></button> <button type="button" data-bs-target="#carousel-1" data-bs-slide-to="1" class="active"></button></div>
</div>
<div class="container py-4 py-xl-5" style="border-radius: 4px;border-width: 0px;border-style: solid;">
    <h2 style="text-align: left;margin-bottom: 31px;margin-top: 10px;">Destacados</h2>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <!-- Se muestran los restantes 3  en las cards -->
        <?php foreach (array_slice($events, 2, 6) as $event): ?>
            <div class="col mb-4">
                <div>
                    <a href="<?php echo base_url('events/show/') . $event->id; ?>">
                        <img class="rounded img-fluid shadow w-100 fit-cover" src="<?php echo base_url($event->picture); ?>" style="height: 250px;">
                    </a>
                    <div class="py-4">
                        <h4 class="fw-bold"><?php echo $event->title; ?></h4>
                        <p class="text-muted"><?php echo $event->description; ?></p>
                        <ul class="list-inline">
                            <li>
                                <span class="badge bg-secondary">Lugar: </span>
                                <span class="text-body-secondary fw-bold"><?php echo $event->location_name; ?></span>

                            </li>
                            <li>
                                <span class="badge bg-secondary">Dirección: </span>
                                <span class="text-body-secondary fw-bold"><?php echo $event->street . ' ' . $event->number . ', ' . $event->zone_name; ?></span>
                            </li>
                        </ul>
                        <a class="btn btn-primary" href="<?php echo base_url('events/show/') . $event->id; ?>">Ver detalles</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<div class="col" style="text-align: center; margin-bottom: 150px;">
    <a class="btn btn-outline-light" href="<?php echo base_url('events'); ?>">Ver más eventos</a>
</div>
<div class="container py-4 py-xl-5">
    <div class="row gy-4 row-cols-2 row-cols-md-4">
        <div class="col">
            <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cash-coin">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"></path>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"></path>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                    </svg></div>
                <div class="px-3">
                    <p class="mb-0">Transacciones seguras</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-file-person">
                        <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"></path>
                        <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                    </svg></div>
                <div class="px-3">
                    <p class="mb-0">Cuentas de&nbsp; usuarios</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chat-fill">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"></path>
                    </svg></div>
                <div class="px-3">
                    <p class="mb-0">La mejor atencion</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="text-center d-flex flex-column justify-content-center align-items-center py-3">
                <div class="bs-icon-xl bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon lg"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-ticket-perferated">
                        <path fill-rule="evenodd" d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Zm3 .35v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"></path>
                    </svg></div>
                <div class="px-3">
                    <p class="mb-0">Tickets a la venta</p>
                </div>
            </div>
        </div>
    </div>
    <?php if (!$this->session->userdata('logged_in')): ?>
        <section class="py-4 py-xl-5" style="margin-top: 100px;">
            <div class="container">
                <div class="text-center p-4 p-lg-5">
                    <p class="fw-bold text-primary mb-2">Regístrate o inicia sesion</p>
                    <h1 class="fw-bold mb-4">Disfruta de los mejores eventos, no esperes mas</h1>
                    <a class="btn btn-primary fs-5 me-2 py-2 px-4" href="<?php echo base_url('auth/register_form/') ?>">Registrarme</a>
                    <a class="btn btn-light fs-5 py-2 px-4" href="<?php echo base_url('auth/login_form') ?>">Iniciar sesion</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>