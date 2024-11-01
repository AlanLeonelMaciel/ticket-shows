<h1 class="text-center mb-4">Detalle de los tickets</h1>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="m-0 fw-bold">Información de Tickets</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-custom table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Evento</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $ticket): ?>
                            <tr>
                                <td><?php echo $ticket->id; ?></td>
                                <td><?php echo $ticket->event_title; ?></td>
                                <td><?php echo date_format(new DateTime($ticket->event_date), 'd F Y'); ?></td>
                                <td><?php echo date('h:i A', strtotime($ticket->event_time)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3">
                <a href="<?php echo base_url('sales'); ?>" class="btn btn-primary">Volver a Ventas</a>
            </div>
        </div>
    </div>
</div>