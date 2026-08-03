document.addEventListener("DOMContentLoaded", function(){
    loadDivisi();
    loadJabatan();
    loadUsers();

});

function loadDivisi() {
    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi/all")
    .then(response => response.json())
    .then(result => {

        let select = document.getElementById("id_divisi");

        select.innerHTML = `
            <option value="">Pilih Divisi</option>
        `;

        if(result.status){

            result.data.forEach(item => {
                select.innerHTML += `
                    <option value="${item.id}">
                        ${item.nama_divisi}
                    </option>
                `;
            });

            new TomSelect("#id_divisi", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Cari Divisi..."
            });

        }

    })
    .catch(error => {
        console.error(error);
    });
}

function loadJabatan() {
    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=jabatan")
    .then(response => response.json())
    .then(result => {

        let select = document.getElementById("id_jabatan");

        select.innerHTML = `
            <option value="">Pilih Jabatan</option>
        `;

        if(result.status){

            result.data.forEach(item => {
                select.innerHTML += `
                    <option value="${item.id}">
                        ${item.nama_jabatan}
                    </option>
                `;
            });

            new TomSelect("#id_jabatan", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Cari Jabatan..."
            });

        }

    })
    .catch(error => {
        console.error(error);
    });
}

document.getElementById("formPegawai").addEventListener("submit", function(e){
    e.preventDefault();
    let form = document.getElementById("formPegawai");
    let formData = new FormData(form);

    const nama = form.nama.value.trim();
    if(nama.length < 3){
        alert("Nama minimal 3 karakter");
        return;
    }

    const hp = form.no_hp.value.trim();
    if(!/^08\d{8,11}$/.test(hp)){
        alert("Nomor HP tidak valid");
        return;
    }

    const email = form.email.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
        alert("Email tidak valid");
        return;
    }

    const btn = document.getElementById("btnSimpan");
    btn.disabled = true;

    btn.innerHTML = `
        <span class="flex items-center justify-center gap-2">
            <span class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
            Menyimpan...
        </span>
    `;

    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai", {
        method: "POST",
        body: formData

    })

    .then(async response => {

        if (!response.ok) {
            throw new Error("Server Error");
        }

        const result = await response.json();
        console.log(result);
        if(result.status){
            showAlert(result.message, "success");
            form.reset();

            setTimeout(() => {
                window.location.href = "?page=pegawai";
            }, 2000);

        } else {
            showAlert(result.message, "error");

            btn.disabled = false;
            btn.innerHTML = "Simpan Data";
        }

    })

    .catch(error => {
        console.error(error);

        showAlert("Terjadi kesalahan.", "error");

        btn.disabled = false;
        btn.innerHTML = "Simpan Data";
    });

});

function showAlert(message, type = "success") {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.className = `fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-xl shadow-2xl text-white font-medium ${type === "success" ? "bg-green-600" : "bg-red-600"}`;
    setTimeout(() => {
        toast.classList.add("hidden");
    }, 2000);
}

async function loadUsers() {

    const select = document.getElementById("id_user");

    select.innerHTML = `
        <option value="">Memuat data user...</option>
    `;

    const response = await fetch(
        "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users/available"
    );

    const result = await response.json();

    if(result.status){

        select.innerHTML = `
            <option value="">Pilih User</option>
        `;

        result.data.forEach(user => {
            select.innerHTML += `
                <option value="${user.id}">
                    ${user.username}
                </option>
            `;
        });

        new TomSelect("#id_user", {
            create: false,
            sortField: {
                field: "text",
                direction: "asc"
            },
            placeholder: "Cari User..."
        });

    } else {

        select.innerHTML = `
            <option value="">Data user tidak tersedia</option>
        `;

    }

}