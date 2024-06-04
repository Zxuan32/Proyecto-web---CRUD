const archivo = document.getElementById('foto_usuario');
const imagen = document.getElementById('foto');
archivo.addEventListener('change', e => {
    if (e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagen.src = e.target.result;
        }
        reader.readAsDataURL(e.target.files[0]);
    } else {

    }
});