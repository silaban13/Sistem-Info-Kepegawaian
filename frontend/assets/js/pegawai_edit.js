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
    loadDivisi(data.id_divisi);
    loadJabatan(data.id_jabatan);
});

document.getElementById("formEditPegawai")
.addEventListener("submit",function(e){
    e.preventDefault();
    const data = new URLSearchParams({
        id: document.getElementById("id").value,
        nama: document.getElementById("nama").value,
        jenis_kelamin: document.getElementById("jenis_kelamin").value,
        alamat: document.getElementById("alamat").value,
        email: document.getElementById("email").value,
        no_hp: document.getElementById("no_hp").value,
        status: document.getElementById("status").value,
        id_divisi: document.getElementById("id_divisi").value,
        id_jabatan: document.getElementById("id_jabatan").value
    });

    fetch(API + "pegawai", {
        method: "PUT",
        body: data
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
    const result = await getData("divisi");
    const select = document.getElementById("id_divisi");
    select.innerHTML = '<option value="">Pilih Divisi</option>';
    result.data.forEach(divisi => {
        const option = document.createElement("option");
        option.value = divisi.id;
        option.textContent = divisi.nama_divisi;
        select.appendChild(option);
    });

    select.value = selected;
}

async function loadJabatan(selected = "") {
    const result = await getData("jabatan");
    const select = document.getElementById("id_jabatan");
    select.innerHTML = '<option value="">Pilih Jabatan</option>';
    result.data.forEach(jabatan => {
        const option = document.createElement("option");
        option.value = jabatan.id;
        option.textContent = jabatan.nama_jabatan;
        select.appendChild(option);
    });

    select.value = selected;
}