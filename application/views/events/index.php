<a href="<?php echo base_url('events/create'); ?>">Crear nuevo evento</a>
<br><br><br>
<section class="events-grid custom-section">
    <h4 class="custom-h4 text-info">EVENTOS</h4>
    <?php if(isset($events)): ?>
        <?php foreach($events as $event): ?>
            <div class="card mb-3">
                <h3 class="card-header"><?php echo $event->title; ?></h3>
                <div class="card-body">
                    <h5 class="card-title"><?php echo 'ID: ' . $event->id; ?></h5>
                    <h6 class="card-subtitle text-muted"><?php echo 'Fecha: ' . $event->date . ' Hora: ' . $event->time; ?></h6>
                </div>
                <img class="card-img" src="<?php echo base_url($event->picture); ?>" alt="Event image">
                <div class="card-body">
                    <p class="card-text"><?php echo $event->description; ?></p>
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

<style>
    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1rem;
    }
    .card-img {
        max-width: 100%;
        max-height: 231px;
        object-fit: cover;
    }
    .custom-section {
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        line-height: 1.42857143;
        color: #707173;
        font-weight: 400;
        font-stretch: normal;
        font-size: 13px;
        box-sizing: border-box;
        border-radius: 0;
        font-family: "Open Sans", sans-serif;
        display: block;
        position: relative;
        min-height: 1px;
        padding-right: 8px;
        padding-left: 8px;
        float: left;
        width: 100%;
    }
    .custom-h4 {
        -webkit-text-size-adjust: 100%;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        font-stretch: normal;
        box-sizing: border-box;
        border-radius: 0;
        font-family: inherit;
        line-height: 1.1;
        margin-bottom: 8.5px;
        font-weight: bold;
        text-transform: uppercase;
        position: relative;
        min-height: 1px;
        float: left;
        width: 100%;
        font-size: 1.15em !important;
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 16px !important;
        padding-right: 16px !important;
        margin-top: 0;
        background-color: #e0e0e0 !important;
    }
</style>