<section class="max-w-7xl mx-auto px-0.5 sm:px-4 lg:px-10 py-8 lg:py-12">
    <div class="mt-8 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold text-gray-800 mb-3"> Kirim Pesan </h2>
    <p class="text-gray-600 leading-relaxed mb-8">
        Jika Anda memiliki pertanyaan, saran, atau membutuhkan informasi
        lebih lanjut mengenai Sistem Informasi Kepegawaian, silakan
        hubungi kami melalui kontak berikut.
    </p>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="border rounded-lg p-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-2"> Alamat </h2>
                <p class="text-gray-600"> Kantor Sistem Informasi Kepegawaian<br> Indonesia </p>
            </div>
            <div class="border rounded-lg p-5">
                <h2 class="text-xl font-semibold text-gray-800 mb-2"> Kontak </h2>
                <p class="text-gray-600"> Email: info@kepegawaian.com </p>
                <p class="text-gray-600"> Telepon: +62 812-3456-7890 </p>
            </div>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-3"> Kirim Pesan </h2>
            <form  id="waForm" class="space-y-4">
                <input type="text" id="nama" placeholder="Nama" required class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="email" id="email" placeholder="Email" required class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" >
                <textarea rows="4" id="pesan" placeholder="Pesan" required class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700"> Kirim Pesan </button>
            </form>
        </div>
    </div>
</section>
<script>
    const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";

async function getData(route)
{
    const response = await fetch(API + route);
    const result = await response.json();
    return result;
}

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
                        Pesan : ${pesan}`; 
                        const url = `https://wa.me/${nomor}?text=${encodeURIComponent(text)}`;
                        window.open(url, "_blank");
    });

}

function hapusPegawai(id){
    if(confirm("Yakin ingin menghapus data pegawai ini?")){
        fetch(`http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai&id=${id}`, {
            method: "DELETE"
        })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            if(result.status){
                location.reload();
            }

        })
        .catch(error => {
            console.error(error);
        });

    }

}

window.editPegawai = function(id){
    window.location.href =
    `index.php?page=pegawai_edit&id=${id}`;

}


</script>