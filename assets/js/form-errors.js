const inputs = document.querySelectorAll('input');
const textareas = document.querySelectorAll('textarea');
const selects = document.querySelectorAll('select');

inputs.forEach((input) => {
    input.addEventListener('input', () => {

        if(input.classList.contains('is-invalid')) {
            input.classList.remove('is-invalid');
        }

        const errorMessage = input.nextElementSibling;

        if(errorMessage && errorMessage.classList.contains('text-danger')) {
            errorMessage.textContent = '';
        }
    });
});

textareas.forEach((textarea) => {
    textarea.addEventListener('input', () => {

        if(textarea.classList.contains('is-invalid')) {
            textarea.classList.remove('is-invalid');
        }

        const errorMessage = textarea.nextElementSibling;

        if(errorMessage && errorMessage.classList.contains('text-danger')) {
            errorMessage.textContent = '';
        }
    });
});

selects.forEach((select) => {
    select.addEventListener('change', () => {

        if(select.classList.contains('is-invalid')) {
            select.classList.remove('is-invalid');
        }

        const errorMessage = select.nextElementSibling;

        if(errorMessage && errorMessage.classList.contains('text-danger')) {
            errorMessage.textContent = '';
        }
    });
});