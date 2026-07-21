document.addEventListener("DOMContentLoaded", function(){
    loadDivisi();
    loadJabatan();

});

function loadDivisi() {
    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi")
    .then(response => response.json())
    .then(result => {
        let select = document.getElementById("id_divisi");
        if(result.status){
            result.data.forEach(item => {
                select.innerHTML += `
                    <option value="${item.id}">
                        ${item.nama_divisi}
                    </option>
                `;

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
        if(result.status){
            result.data.forEach(item => {
                select.innerHTML += `
                    <option value="${item.id}">
                        ${item.nama_jabatan}
                    </option>
                `;
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
    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai", {
        method: "POST",
        body: formData

    })

    .then(async response => {
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
        }
    })

    .then(result => {
        if(result.status){
            showAlert(result.message, "success");
            form.reset();
            setTimeout(() => {
                window.location.href = "?page=pegawai";
            }, 2000);

        } else {
            showAlert(result.message, "error");
        }
    })

    .catch(error => {
        console.error(error);
    });

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

});

function showAlert(message, type = "success") {
    const toast = document.getElementById("toast");
    toast.textContent = message;
    toast.className = `fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-xl shadow-2xl text-white font-medium ${type === "success" ? "bg-green-600" : "bg-red-600"}`;
    setTimeout(() => {
        toast.classList.add("hidden");
    }, 2000);
}