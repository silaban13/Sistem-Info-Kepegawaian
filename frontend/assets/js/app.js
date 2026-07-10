const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";


// Fungsi ambil data API
async function getData(route)
{
    const response = await fetch(API + route);

    const result = await response.json();

    return result;
}


// WhatsApp Form
const waForm = document.getElementById("waForm");

if (waForm) {

    waForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const nama = document.getElementById("nama").value.trim();
        const email = document.getElementById("email").value.trim();
        const pesan = document.getElementById("pesan").value.trim();


        const nomor = "6281375208486";


        const text = `Halo Admin,

Saya ingin menghubungi melalui website.

Nama : ${nama}
Email : ${email}

Pesan :
${pesan}`;


        const url = `https://wa.me/${nomor}?text=${encodeURIComponent(text)}`;

        window.open(url, "_blank");

    });

}