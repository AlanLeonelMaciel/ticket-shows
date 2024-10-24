const inputs = document.querySelectorAll('input');

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