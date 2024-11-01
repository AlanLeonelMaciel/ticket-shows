    <h1 class="text-center mb-4">Lista de Ventas</h1>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="m-0 fw-bold">Información de Ventas</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <label class="form-label">Mostrar
                            <select id="rowsPerPage" class="d-inline-block form-select form-select-sm" onchange="updateTable()">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end">
                            <label class="form-label">
                                <input id="searchInput" class="form-control form-control-sm" type="search" placeholder="Buscar" onkeyup="updateTable()" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mt-2">
                    <table id="salesTable" class="table table-custom table-striped table-hover table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 20%;">Comprador</th>
                                <th style="width: 15%;">Monto</th>
                                <th style="width: 25%;">Fecha de venta</th>
                                <th style="width: 10%;" class="text-center">Acciones</th> <!-- Centrar encabezado -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                                <tr>
                                    <td><?php echo $sale->id; ?></td>
                                    <td><?php echo $sale->user_email; ?></td>
                                    <td><?php echo '$' . number_format($sale->amount, 2); ?></td>
                                    <td><?php echo date_format(new DateTime($sale->date), 'd F Y'); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('sales/view_tickets/' . $sale->id); ?>" class="btn btn-primary btn-sm">Ver Tickets</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="tableInfo" class="dataTables_info" role="status" aria-live="polite"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/table.js'); ?>"></script>