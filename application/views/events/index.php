<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 class="custom-h4 text-light-emphasis"><span class="badge bg-dark p-2">Eventos</span></h4>
            <section class="events-grid custom-section fs-6 p-1">
                <?php if(isset($events)): ?>
                    <?php foreach($events as $event): ?>
                        <div class="card mb-3 p-1 shadow-sm border-light">
                            <h3 class="card-header text-body"><?php echo $event->title; ?></h3>
                            <img class="card-img p-2" src="<?php echo base_url($event->picture); ?>" alt="Event image">
                            <div class="card-body fixed-height">
                                <p class="card-text text-body-secondary"><?php echo $event->description; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-body-tertiary"><?php echo 'Ubicación (ID): ' . $event->location_id; ?></li>
                            </ul>
                            <div class="card-body">
                                <a class="btn btn-primary w-100 mt-3" href="<?php echo base_url('events/show/') . $event->id; ?>">Ver detalles</a>
                            </div>
                            <div class="card-footer text-muted">
                                <?php echo 'Publicado el: ' . $event->date; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>