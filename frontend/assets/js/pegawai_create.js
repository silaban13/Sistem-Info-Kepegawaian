document.addEventListener("DOMContentLoaded", function(){

    loadDivisi();
    loadJabatan();
    loadUser();

});


function loadDivisi(){

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

function loadJabatan(){

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


function loadUser(){

    fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=users")
    .then(response => response.json())
    .then(result => {

        let select = document.getElementById("id_user");


        if(result.status){

            result.data.forEach(item => {

                select.innerHTML += `
                    <option value="${item.id}">
                        ${item.username}
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
    .then(response => response.json())
    .then(result => {


        let message = document.getElementById("message");


        if(result.status){

            message.innerHTML = `
                <div class="bg-green-100 text-green-700 p-3 rounded">
                    ${result.message}
                </div>
            `;

            form.reset();

        } else {

            message.innerHTML = `
                <div class="bg-red-100 text-red-700 p-3 rounded">
                    ${result.message}
                </div>
            `;

        }


    })
    .catch(error => {

        console.error(error);

    });


});