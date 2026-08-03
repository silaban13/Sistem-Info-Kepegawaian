<?php
    if ($_SESSION['role'] != 'admin') {
        header("Location: index.php?page=dashboard");
        exit;
    }
?>
<?php

    $url = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai";
    $response = file_get_contents($url);
    $result = json_decode($response, true);
    $pegawai = $result["data"] ?? [];

?>
<div id="pegawaiLoading" class="flex justify-center items-center py-20">
    <div class="flex flex-col items-center gap-3">
        <div class="w-12 h-12 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
        <p class="text-gray-500">Memuat data pegawai...</p>
    </div>
</div>
<div id="pegawaiContent" class="hidden">
    <div class="space-y-6">
        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800"> Status Pegawai </h1>
        </div>
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800"> Daftar Pegawai </h2>
                <p class="mt-1 text-sm text-gray-500"> Geser tabel ke samping apabila seluruh data belum terlihat. </p>
            </div>
            <a id="btnTambahPegawai" href="?page=tambah_pegawai" class="w-full sm:w-auto rounded-lg bg-blue-600 px-5 py-2.5 text-center text-white transition hover:bg-blue-700"> + Tambah Pegawai</a>
        </div>
        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-[700px] w-full">
                    <thead class="bg-gray-100">
                        <tr class="border-t hover:bg-gray-50 transition">
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama Pegawai</th>
                            <th class="px-4 py-3 text-left">Jabatan</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pegawaiTable">
                        <?php if(count($pegawai) > 0): ?>
                            <?php $no=1; ?>
                            <?php foreach($pegawai as $row): ?>
                            <tr class="border-t">
                                <td class="px-4 py-4"><?= $no++ ?></td>
                                <td class="px-4 py-4"> <?= htmlspecialchars($row["nama"]) ?> </td>
                                <td class="px-4 py-4"> <?= htmlspecialchars($row["nama_jabatan"]) ?> </td>
                                <td class="px-4 py-4"> <?= htmlspecialchars($row["email"]) ?> </td>
                                <td class="px-4 py-4">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm"> <?= htmlspecialchars($row["status"]) ?> </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-10 text-gray-500"> Belum ada data pegawai </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-between items-center p-4">
            <button id="prevBtn" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"> Prev </button>
            <span id="pageInfo" class="text-sm text-gray-600"> Halaman 1 </span>
            <button id="nextBtn" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700"> Next </button>
        </div>
    </div>
</div>
<script>
    const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";
    async function getData(route) {
        const response = await fetch(API + route);
        return await response.json();
    }

    async function checkRole() {
        const response = await getData("profile");
        if(response.data.role !== "admin"){
            document.getElementById("btnTambahPegawai").style.display = "none";
        }
    }

    checkRole();

    let currentPage = 1;
    let limit = 5;
    function loadPegawai(){
        document.getElementById("pegawaiLoading").classList.remove("hidden");
        document.getElementById("pegawaiContent").classList.add("hidden");
        fetch( `backend/api/index.php?route=pegawai&page=${currentPage}&limit=${limit}`)
        .then(res=>res.json())
        .then(data=>{
            let tbody = document.getElementById("pegawaiTable");
            tbody.innerHTML="";
            if(data.data.length > 0){
                data.data.forEach((row,index)=>{
                    tbody.innerHTML += `
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-4"> ${(currentPage-1)*limit + index+1} </td>
                            <td class="px-4 py-4"> ${row.nama} </td>
                            <td class="px-4 py-4"> ${row.nama_jabatan} </td>
                            <td class="px-4 py-4"> ${row.email} </td>
                            <td class="px-4 py-4">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full"> ${row.status} </span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <button onclick="editPegawai(${row.id})" class="inline-flex items-center justify-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg transition">
                                        <img src="frontend/assets/images/edit.png" class="w-4 h-4" alt="Edit"><span>Edit</span>
                                    </button>
                                    <button onclick="hapusPegawai(${row.id})" class="inline-flex items-center justify-center gap-2 bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg transition">
                                        <img src="frontend/assets/images/delet.png" class="w-4 h-4" alt="Hapus"><span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                });

            } else {
                tbody.innerHTML=`
                    <tr>
                        <td colspan="6" class="text-center py-10"> Belum ada data </td>
                    </tr>
                `;
            }

            document.getElementById("pageInfo").innerHTML = `Halaman ${currentPage} dari ${data.total_page}`;
            document.getElementById("prevBtn").disabled = currentPage <= 1;
            document.getElementById("nextBtn").disabled = currentPage >= data.total_page;
            document.getElementById("pegawaiLoading").classList.add("hidden");
            document.getElementById("pegawaiContent").classList.remove("hidden");
        }) .catch(error => {

            console.error(error);
            document.getElementById("pegawaiLoading").classList.add("hidden");
            document.getElementById("pegawaiContent").classList.remove("hidden");
            alert("Gagal mengambil data pegawai.");

        });
    }

        document.getElementById("prevBtn")
        .onclick=function(){
            if(currentPage>1){
                currentPage--;
                loadPegawai();
            }
        };

        document.getElementById("nextBtn")
        .onclick=function(){
            currentPage++;
            loadPegawai();

        };

    loadPegawai();

    function editPegawai(id) {
        window.location.href = `index.php?page=pegawai_edit&id=${id}`;
    }

    function hapusPegawai(id) {
        if (confirm("Yakin ingin menghapus data pegawai ini?")) {
            fetch(`http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=pegawai&id=${id}`, {
                method: "DELETE"
            })
            .then(response => response.json())
            .then(result => {
                alert(result.message);
                if (result.status) {
                    loadPegawai(); 
                }
            })
            .catch(error => console.error(error));
        }
    }
    
</script>