document.getElementById('contactForm').addEventListener('submit', function(event) {
    let nombre = document.getElementById('nombre').value;
    let email = document.getElementById('email').value;
    let mensaje = document.getElementById('mensaje').value;

    if (!nombre || !email || !mensaje) {
        alert('Por favor, rellena todos los campos.');
        event.preventDefault();
    }
});
