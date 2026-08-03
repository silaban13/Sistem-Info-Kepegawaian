document
.getElementById("formAbsensi")
.addEventListener("submit", function(e){
    e.preventDefault();
    let data = new FormData(this);
    fetch("/Sistem-Info-Kepegawaian/backend/api/?route=absensi", {
        method:"POST",
        body:data
    })

    .then(res => res.json())
    .then(result => {
        alert(result.message);
        if(result.status){
            window.location.href = "index.php?page=absensi";
        }
    })

    .catch(error=>{
        console.error(error);
    });

});

async function loadPegawai() {

    const select = document.getElementById("id_pegawai");

    select.innerHTML = `
        <option value="">Memuat data pegawai...</option>
    `;

    try {

        const response = await fetch(
            "/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai/all"
        );

        const result = await response.json();

        if(result.status){

            select.innerHTML = `
                <option value="">Pilih Pegawai</option>
            `;

            result.data.forEach(pegawai => {

                select.innerHTML += `
                    <option value="${pegawai.id}">
                        ${pegawai.nama}
                    </option>
                `;

            });

            new TomSelect("#id_pegawai", {
                create: false,
                sortField: {
                    field: "text",
                    direction: "asc"
                },
                placeholder: "Cari Pegawai..."
            });

        } else {

            select.innerHTML = `
                <option value="">Data pegawai tidak tersedia</option>
            `;

        }

    } catch(error){

        console.error(error);

        select.innerHTML = `
            <option value="">Gagal memuat data</option>
        `;

    }

}

loadPegawai();