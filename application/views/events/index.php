<?php $success = $this->session->flashdata('success'); ?>
<div class="container py-1">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h1 class="text-center mb-4">Eventos</h1>
            <?php if(isset($success)): ?>
                <div class="alert alert-success mx-auto" role="alert">
                    <small class="fw-bold"><?php echo $success; ?></small>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
        <?php if (isset($events)): ?>
            <?php foreach ($events as $event): ?>
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
                            <div class="d-flex flex-row">
                                <a class="btn btn-primary" href="<?php echo base_url('events/show/') . $event->id; ?>">Ver detalles</a>
                                <?php if($this->session->userdata('role') == 'admin'): ?>
                                    <a class="btn btn-warning ms-2" href="<?php echo base_url('events/edit/') . $event->id; ?>">Editar</a>
                                    <form action="<?php echo base_url('events/delete/') . $event->id; ?>" method="POST" class="ms-2">
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<script src="<?php echo base_url('assets/js/delete-buttons.js'); ?>"></script>