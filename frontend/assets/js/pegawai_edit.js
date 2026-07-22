const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";

const params = new URLSearchParams(window.location.search);
const id = params.get("id");

fetch(`${API}pegawai/show&id=${id}`)
.then(res => res.json())
.then(result=>{
    const data = result.data;
    document.getElementById("id").value = data.id;
    document.getElementById("nama").value = data.nama;
    document.getElementById("email").value = data.email;
    document.getElementById("no_hp").value = data.no_hp;
    document.getElementById("status").value = data.status;
    document.getElementById("alamat").value = data.alamat;
    document.getElementById("jenis_kelamin").value = data.jenis_kelamin;

    document.getElementById("previewFoto").src = "/Sistem-Info-Kepegawaian/frontend/assets/uploads/" + data.foto;

    loadDivisi(data.id_divisi);
    loadJabatan(data.id_jabatan);
});

document.getElementById("formEditPegawai")
.addEventListener("submit",function(e){
    e.preventDefault();

   const formData = new FormData();

formData.append("id", document.getElementById("id").value);
formData.append("nama", document.getElementById("nama").value);
formData.append("jenis_kelamin", document.getElementById("jenis_kelamin").value);
formData.append("alamat", document.getElementById("alamat").value);
formData.append("email", document.getElementById("email").value);
formData.append("no_hp", document.getElementById("no_hp").value);
formData.append("status", document.getElementById("status").value);
formData.append("id_divisi", document.getElementById("id_divisi").value);
formData.append("id_jabatan", document.getElementById("id_jabatan").value);

const foto = document.getElementById("foto").files[0];

if (foto) {
    formData.append("foto", foto);
}

fetch(API + "pegawai/update", {
    method: "POST",
    body: formData
})

    .then(res => res.json())
    .then(result => {
        alert(result.message);
        if (result.status) {
            window.location.href = "index.php?page=pegawai";
        }

    })

    .catch(error => {
        console.error(error);
    });

});

async function loadDivisi(selected = "") {

    const response = await fetch(API + "divisi");
    const result = await response.json();

    const select = document.getElementById("id_divisi");

    select.innerHTML = '<option value="">Pilih Divisi</option>';

    result.data.forEach(divisi => {
        select.innerHTML += `
            <option value="${divisi.id}">
                ${divisi.nama_divisi}
            </option>
        `;
    });

    select.value = selected;
}

async function loadJabatan(selected = "") {

    const response = await fetch(API + "jabatan");
    const result = await response.json();

    const select = document.getElementById("id_jabatan");

    select.innerHTML = '<option value="">Pilih Jabatan</option>';

    result.data.forEach(jabatan => {
        select.innerHTML += `
            <option value="${jabatan.id}">
                ${jabatan.nama_jabatan}
            </option>
        `;
    });

    select.value = selected;
}

document
.getElementById("foto")
.addEventListener("change", function(){

    const file = this.files[0];

    if(file){

        document
        .getElementById("previewFoto")
        .src = URL.createObjectURL(file);

    }

});