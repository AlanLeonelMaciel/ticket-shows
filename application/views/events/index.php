<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="custom-h4 text-info">EVENTOS</h4>
            <section class="events-grid custom-section fs-6 p-0">
                <?php if(isset($events)): ?>
                    <?php foreach($events as $event): ?>
                        <div class="card mb-3 p-1 shadow-sm border-light">
                            <h3 class="card-header text-primary"><?php echo $event->title; ?></h3>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo 'ID: ' . $event->id; ?></h5>
                                <h6 class="card-subtitle text-muted"><?php echo 'Fecha: ' . $event->date . ' Hora: ' . $event->time; ?></h6>
                            </div>
                            <img class="card-img" src="<?php echo base_url($event->picture); ?>" alt="Event image">
                            <div class="card-body">
                                <p class="card-text text-light"><?php echo $event->description; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo 'Ubicación (ID): ' . $event->location_id; ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="<?php echo base_url('events/show/') . $event->id; ?>" class="card-link">Ver detalles del evento</a>
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

<style>
.custom-h4 {
    line-height: 1.1;
    margin-bottom: 8.5px;
    font-weight: bold;
    font-size: 1.15em !important;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 16px !important;
    padding-right: 16px !important;
    background-color: #e0e0e0 !important;
}
.events-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1rem;
    width: 100%;
    margin: 0 auto;
}
.card-img {
    max-width: 100%;
    max-height: 175px;
    object-fit: cover;
}
</style>