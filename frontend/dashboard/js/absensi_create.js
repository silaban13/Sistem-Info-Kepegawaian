document
.getElementById("formAbsensi")
.addEventListener("submit", function(e){

    e.preventDefault();


    let data = new FormData(this);


    fetch("/Sistem-Info-Kepegawaian/backend/api/?route=absensi", {

        method:"POST",
        body:data

    })

    .then(res=>res.text())
    .then(result=>{

        console.log(result);

        let json = JSON.parse(result);

        alert(json.message);

    })

    .catch(error=>{
        console.error(error);
    });

});

async function loadPegawai(){

    const response = await fetch(
        "/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai"
    );

    const result = await response.json();


    let select = document.getElementById("id_pegawai");


    result.data.forEach(pegawai => {

        select.innerHTML += `
            <option value="${pegawai.id}">
                ${pegawai.nama}
            </option>
        `;

    });

}


loadPegawai();