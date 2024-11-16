const deleteButtons = document.querySelectorAll('.btn.btn-danger');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        if(!confirm('¿Estás seguro de que deseas borrar este elemento?')) {
            event.preventDefault();
        }
    });
});
