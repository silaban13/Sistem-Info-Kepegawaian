<div class="space-y-6">
    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800"> Data Jabatan </h1>
        <p class="mt-2 text-sm sm:text-base text-gray-600 leading-7"> Kelola informasi jabatan pegawai yang digunakan dalam sistem kepegawaian. Data jabatan membantu menentukan posisi dan tanggung jawab setiap pegawai.</p>
    </div>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h2 class="text-xl font-semibold text-gray-700"> Daftar Jabatan </h2>
        <button id="btnTambahJabatan" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg transition"> + Tambah Jabatan </button>
    </div>
    <div id="modalJabatan" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl w-[95%] sm:w-full max-w-md p-6">
            <h2 class="text-xl font-bold mb-4"> Edit Jabatan </h2>
            <form id="formEditJabatan">
                <input type="hidden" id="edit_id">
                <label class="block mb-2"> Nama Jabatan </label>
                <input id="edit_nama_jabatan" class="w-full border p-2 rounded mb-4" required>
                <label class="block mb-2"> Gaji Pokok </label>
                <input type="number" id="edit_gaji_pokok" class="w-full border p-2 rounded mb-4" required>
                <div class="flex justify-end gap-3">
                    <button type="button" id="closeEdit" class="bg-gray-300 px-4 py-2 rounded"> Batal </button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded"> Update </button>
                </div>
            </form>
        </div>
    </div>
    <div id="modalTambahJabatan" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-xl w-[95%] sm:w-full max-w-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-5"> Tambah Jabatan </h2>
            <form id="formTambahJabatan">
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-gray-700"> Nama Jabatan </label>
                    <input type="text" id="nama_jabatan" placeholder="Masukkan nama jabatan" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required >
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-medium text-gray-700"> Gaji Pokok </label>
                    <input type="number" id="gaji_pokok" placeholder="Masukkan gaji pokok" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500" required >
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" id="closeTambah" class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400"> Batal </button>
                    <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full whitespace-nowrap text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-gray-600">No</th>
                        <th class="px-6 py-3 text-gray-600">Nama Jabatan</th>
                        <th class="px-6 py-3 text-gray-600">Gaji Pokok</th>
                        <th class="px-6 py-3 text-gray-600">Jumlah Pegawai</th>
                        <th class="px-6 py-3 text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody id="jabatanTable"></tbody>
            </table>
        </div>
    </div>
</div>
<script>
    const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";
    async function getData(route) {
        const response = await fetch(API + route);
        return await response.json();
    }

    async function loadJabatan()
    {
        const response = await getData("jabatan");
        let html = "";
        response.data.forEach((jabatan,index)=>{
            html += `
                        <tr class="border-t">
                            <td class="px-6 py-4"> ${index+1} </td>
                            <td class="px-6 py-4 font-medium"> ${jabatan.nama_jabatan} </td>
                            <td class="px-6 py-4"> Rp ${Number(jabatan.gaji_pokok).toLocaleString("id-ID")} </td>
                            <td class="px-6 py-4"> ${jabatan.jumlah_pegawai} Orang </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <button onclick="editJabatan(${jabatan.id})"
                                        class="inline-flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg transition">
                                        <img src="frontend/assets/images/edit.png" class="w-4 h-4" alt="Edit">
                                        <span>Edit</span>
                                    </button>
                                    <button onclick="hapusJabatan(${jabatan.id})"
                                        class="inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition">
                                        <img src="frontend/assets/images/delet.png" class="w-4 h-4" alt="Hapus">
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
            `;
        });

        document.getElementById("jabatanTable").innerHTML = html;

    }

    loadJabatan();

    async function hapusJabatan(id)
    {
        if(!confirm("Hapus jabatan ini?"))
        return;
        const response = await fetch(
            API+"jabatan&id="+id,
            {
                method:"DELETE"
            }
        );

        const result = await response.json();
        alert(result.message);
        loadJabatan();
    }

    async function editJabatan(id)
    {
        const response = await getData("jabatan/show&id=" + id);
        console.log(response);
        const jabatan = response.data;
        document.getElementById("edit_id").value = jabatan.id;
        document.getElementById("edit_nama_jabatan").value = jabatan.nama_jabatan;
        document.getElementById("edit_gaji_pokok").value = jabatan.gaji_pokok;
        document.getElementById("modalJabatan")
        .classList
        .remove("hidden");
    }

    document.getElementById("closeEdit")
    .onclick = function(){
        document
        .getElementById("modalJabatan")
        .classList
        .add("hidden");
    }

    document.getElementById("formEditJabatan")
    .addEventListener("submit", async function(e){
        e.preventDefault();
        const data = new URLSearchParams();
        data.append("id", document.getElementById("edit_id").value);
        data.append("nama_jabatan", document.getElementById("edit_nama_jabatan").value);
        data.append("gaji_pokok", document.getElementById("edit_gaji_pokok").value);
        const response = await fetch(
        API + "jabatan",
        {
            method: "PUT",
            body: data
        }
    );

    const text = await response.text();
    const result = JSON.parse(text);
    console.log(result);
    alert(result.message);
        alert(result.message);
        document.getElementById("modalJabatan")
        .classList
        .add("hidden");
        loadJabatan();
    });

    const btnTambahJabatan = document.getElementById("btnTambahJabatan");
    const modalTambahJabatan = document.getElementById("modalTambahJabatan");
    btnTambahJabatan.onclick = function(){
        modalTambahJabatan.classList.remove("hidden");
    };

    document.getElementById("closeTambah").onclick = function(){
        document.getElementById("modalTambahJabatan")
        .classList
        .add("hidden");
    };


    document.getElementById("formTambahJabatan")
    .addEventListener("submit", async function(e){
        e.preventDefault();
        const data = new URLSearchParams();
        data.append("nama_jabatan", document.getElementById("nama_jabatan").value);
        data.append("gaji_pokok", document.getElementById("gaji_pokok").value);
        const response = await fetch(
            API + "jabatan",
            {
                method:"POST",
                body:data
            }
        );

        const result = await response.json();
        alert(result.message);
        document.getElementById("modalTambahJabatan")
        .classList
        .add("hidden");
        loadJabatan();
    });

</script>