function updateTotal() {
    var quantity = document.getElementById('quantity').value;
    var price = parseFloat(document.getElementById('price').value);
    var total = quantity * price;
    document.getElementById('total').value = '$' + total.toFixed(2);
}

function calculateTotal(event) {
    var quantity = document.getElementById('quantity').value;
    var price = parseFloat(document.getElementById('price').value);
    var total = quantity * price;
    document.getElementById('total').value = total.toFixed(2);
}