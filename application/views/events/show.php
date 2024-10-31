<div class="row mb-5">
    <div class="col-md-8 col-xl-6 text-center mx-auto">
        <h1 class="fw-bold">Detalles del evento</h1>
    </div>
</div>
<div class="container py-5 bg-black-transparent">
    <div data-reflow-type="product" data-bss-dynamic-product data-bss-dynamic-product-param="product" data-reflow-shoppingcart-url="shopping-cart.html">
        <div class="row">
            <div class="col-md-4">
                <div class="ref-media" style="height: 100%;">
                    <div class="ref-preview" style="height: 100%;">
                        <img class="rounded img-fluid shadow w-100 h-100 fit-cover" src="<?php echo base_url($event->picture); ?>" data-reflow-preview-type="image" style="object-fit: cover;" />
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ref-product-data">
                    <h2 class="ref-name"><?php echo $event->title; ?></h2>
                    <div class="ref-description">
                        <p><?php echo $event->description; ?></p>
                        <div class="row">
                            <div class="col-auto">
                                <ul class="list-inline">
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Lugar: </span>
                                        <span class="text-body"><?php echo $event->location_name; ?></span>
                                    </li>
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Fecha: </span>
                                        <span class="text-body"><?php echo $event->date; ?></span>
                                    </li>
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Cupo: </span>
                                        <span class="text-success fw-bold"><?php echo $event->cupo; ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <ul class="list-inline">
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Dirección: </span>
                                        <span class="text-body"><?php echo $event->street . ' ' . $event->number . ', ' . $event->zone_name; ?></span>
                                    </li>
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Hora: </span>
                                        <span class="text-body"><?php echo $event->time; ?></span>
                                    </li>
                                    <li class="">
                                        <span class="badge rounded-pill bg-secondary">Precio: </span>
                                        <span class="text-body fw-bold"><?php echo '$' . number_format($event->price, 2); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <form action="<?php echo base_url('events/buy/' . $event->id); ?>" method="post" onsubmit="calculateTotal(event)">
                        <div class="row">
                            <div class="col-auto">
                                <div class="form-group">
                                    <label for="quantity">Cantidad:</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" max="<?php echo $event->cupo; ?>" onchange="updateTotal()">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="total">Total:</label>
                                    <input type="text" id="total" name="total" class="form-control" value="<?php echo '$' . number_format($event->price, 2); ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="price" name="price" value="<?php echo $event->price; ?>">
                        <div class="reflow-add-to-cart ref-product-controls mt-3">
                            <button type="submit" class="ref-button btn btn-primary">Comprar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/events-calculations.js'); ?>"></script>