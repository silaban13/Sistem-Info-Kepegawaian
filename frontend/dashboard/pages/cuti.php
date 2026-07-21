<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800"> Data Cuti Pegawai </h1>
        <p class="mt-2 text-gray-600"> Kelola pengajuan cuti pegawai, melihat status persetujuan, dan memantau riwayat cuti dalam sistem kepegawaian.
        </p>
    </div>
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-700"> Daftar Pengajuan Cuti </h2>
        <button id="btnAjukanCuti" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"> + Ajukan Cuti </button>
    </div>
    <div id="modalCuti" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <div class="bg-white rounded-xl p-6 w-full max-w-md">
            <h2 class="text-xl font-bold mb-4"> Ajukan Cuti </h2>
            <form id="formCuti">
                <div class="mb-4">
                    <label class="block mb-2 font-medium"> Pengaju Cuti </label>
                    <div id="namaPengaju" class="bg-gray-100 px-4 py-3 rounded-lg"> Memuat... </div>
                </div>
                <label class="block mb-2"> Tanggal Mulai </label>
                <input type="date" id="tanggal_mulai" class="w-full border rounded-lg p-2 mb-4" required>
                <label class="block mb-2"> Tanggal Selesai </label>
                <input type="date" id="tanggal_selesai" class="w-full border rounded-lg p-2 mb-4" required>
                <label class="block mb-2"> Alasan </label>
                <textarea id="alasan" class="w-full border rounded-lg p-2 mb-4" required></textarea>
                <div class="flex justify-end gap-3">
                    <button type="button" id="closeModal" class="px-4 py-2 bg-gray-300 rounded-lg"> Batal </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm"> Menunggu Persetujuan </p>
            <h3 id="pendingCount" class="text-3xl font-bold text-yellow-500 mt-2"> 0 </h3>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm"> Cuti Disetujui </p>
            <h3 id="approvedCount" class="text-3xl font-bold text-green-600 mt-2"> 0 </h3>
        </div>
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-gray-500 text-sm"> Cuti Ditolak </p>
            <h3 id="rejectedCount" class="text-3xl font-bold text-red-600 mt-2">  0  </h3>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full whitespace-nowrap text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-gray-600">No</th>
                        <th class="px-6 py-3 text-gray-600">Nama Pegawai</th>
                        <th class="px-6 py-3 text-gray-600">Alasan</th>
                        <th class="px-6 py-3 text-gray-600">Tanggal</th>
                        <th class="px-6 py-3 text-gray-600">Status</th>
                        <th class="px-6 py-3 text-gray-600">Aksi</th>
                    </tr>
                </thead>
                <tbody id="cutiTable"></tbody>
            </table>
        </div>
    </div>
    <div id="modalAlasan" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold"> Detail Alasan Cuti </h2>
                <button onclick="tutupAlasan()" class="text-gray-500 hover:text-red-500 text-2xl"> &times; </button>
            </div>
            <div id="isiAlasan" class="bg-gray-50 rounded-lg p-4 text-gray-700 leading-7 whitespace-pre-line"></div>
        </div>
    </div>
</div>
<script>
  const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";
    async function getData(route) {
        const response = await fetch(API + route);
        return await response.json();
    }

    async function loadCuti()
    {
        const response = await getData("cuti");
        let html = "";
        let pending = 0;
        let approved = 0;
        let rejected = 0;

        response.data.forEach((cuti, index) => {
            let badge;
            if (cuti.status == "Pending") {
                pending++;
                badge = `<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Menunggu</span>`;
            } else if (cuti.status == "Disetujui") {
                approved++;
                badge = `<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Disetujui</span>`;
            } else if (cuti.status == "Ditolak") {
                rejected++;
                badge = `<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Ditolak</span>`;
            } else if (cuti.status == "Dibatalkan") {
                badge = `<span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">Dibatalkan</span>`;
            }
                html += `
                    <tr class="border-t">
                        <td class="px-6 py-4"> ${index+1} </td>
                        <td class="px-6 py-4"> ${cuti.nama} </td>
                        <td class="px-6 py-4">
                            <button
                                onclick='lihatAlasan(${JSON.stringify(cuti.alasan)})'
                                class="text-blue-600 hover:text-blue-800 underline">
                                Lihat Detail
                            </button>
                        </td>
                        <td class="px-6 py-4"> ${cuti.tanggal_mulai} - ${cuti.tanggal_selesai} </td>
                        <td class="px-6 py-4"> ${badge} </td>
                        <td class="px-6 py-4"> 
                            ${
                                role == "admin" && cuti.status == "Pending"
                                    ?
                                    `
                                        <button onclick="updateStatus(${cuti.id}, 'Disetujui')"
                                            class="bg-green-600 text-white px-3 py-1 rounded">
                                            Setujui
                                        </button>
                                        <button onclick="updateStatus(${cuti.id}, 'Ditolak')"
                                            class="bg-red-600 text-white px-3 py-1 rounded">
                                            Tolak
                                        </button>
                                    `
                                    :
                                    role == "pegawai" && cuti.status == "Pending" && cuti.id_pegawai == profile.id_pegawai
                                        ?
                                        `
                                            <button onclick="batalkanCuti(${cuti.id})"
                                                class="bg-gray-600 text-white px-3 py-1 rounded hover:bg-gray-700">
                                                Batalkan
                                            </button>
                                        `
                                    :
                                    "-"
                            }
                        </td>
                    </tr>
            `;
        });

        document.getElementById("cutiTable").innerHTML = html;
        document.getElementById("pendingCount").innerHTML = pending;
        document.getElementById("approvedCount").innerHTML = approved;
        document.getElementById("rejectedCount").innerHTML = rejected;

    }

    const btn = document.getElementById("btnAjukanCuti");
    const modal = document.getElementById("modalCuti");
    const close = document.getElementById("closeModal");
    btn.onclick = function(){
        modal.classList.remove("hidden");
    }

    close.onclick = function(){
        modal.classList.add("hidden");
    }   

    let profile = null;
    let role = null;
    async function loadProfile()
    {
        const response = await getData("profile");
        profile = response.data;
        role = profile.role;
        document.getElementById("namaPengaju").innerHTML = profile.nama;
        if(profile.role == "admin"){
            document.getElementById("btnAjukanCuti").style.display = "none";
        }
    }

    document.getElementById("formCuti")
    .addEventListener("submit", async function(e){
        e.preventDefault();
        const data = {
            id_pegawai: profile.id_pegawai,
            tanggal_mulai: document.getElementById("tanggal_mulai").value,
            tanggal_selesai: document.getElementById("tanggal_selesai").value,
            alasan: document.getElementById("alasan").value,
            status: "Pending"
        };

        console.log(data);
        const response = await fetch(
            API + "cuti",
            {
                method:"POST",
                headers:{
                    "Content-Type":"application/json"
                },
                body:JSON.stringify(data)
            }
        );

        let result;

        try {
            const text = await response.text();

            console.log("Response server:", text);

            result = JSON.parse(text);

        } catch(error){
            console.error("Gagal parse JSON:", error);
            alert("Terjadi kesalahan server");
            return;
        }

        alert(result.message);
        modal.classList.add("hidden");
        loadCuti();
    });

    async function updateStatus(id,status)
    {
        const response = await fetch(
            API+"cuti/status",
            {
                method:"PUT",
                headers:{
                    "Content-Type":"application/json"
                },
                body:JSON.stringify({
                    id:id,
                    status:status
                })
            }
        );

        const result = await response.json();
        alert(result.message);
        loadCuti();
    }

    (async function () {
        await loadProfile();
        await loadCuti();
    })();

    function lihatAlasan(alasan) {
        document.getElementById("isiAlasan").textContent = alasan;
        document.getElementById("modalAlasan")
        .classList.remove("hidden");
    }

    function tutupAlasan() {
        document.getElementById("modalAlasan")
        .classList.add("hidden");
    }

    async function batalkanCuti(id)
    {
        if(!confirm("Yakin ingin membatalkan pengajuan cuti?")){
            return;
        }

        const response = await fetch(
            API + "cuti/cancel",
            {
                method: "PUT",
                headers:{
                    "Content-Type":"application/json"
                },
                body: JSON.stringify({
                    id:id
                })
            }
        );

        const result = await response.json();
        alert(result.message);
        loadCuti();
    }



</script>


