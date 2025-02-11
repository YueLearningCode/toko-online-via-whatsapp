import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Fungsi untuk menampilkan/menghilangkan form edit
function toggleEdit(productId) {
    let form = document.getElementById('edit-form-' + productId);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}

