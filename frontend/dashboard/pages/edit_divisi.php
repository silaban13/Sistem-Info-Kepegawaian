<?php
    $id = $_GET['id'] ?? '';
    $json = file_get_contents( "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=divisi/show&id=".$id);
    $result = json_decode($json,true);
    $divisi = $result['data'] ?? [];
?>

<div class="max-w-xl mx-auto">
    <h1 class="text-3xl font-bold mb-6"> Edit Divisi </h1>
    <form id="formEditDivisi" class="bg-white p-6 rounded-xl shadow">
        <input type="hidden" id="id" value="<?= $divisi['id'] ?>">
        <label class="block mb-2"> Nama Divisi </label>
        <input id="nama_divisi" value="<?= htmlspecialchars($divisi['nama_divisi']) ?>" class="w-full border p-3 rounded mb-5" required>

         <label class="block mb-2 font-medium">
            Deskripsi Divisi
        </label>

        <textarea
            id="deskripsi"
            rows="4"
            class="w-full border rounded-lg p-3 mb-5"
            placeholder="Masukkan deskripsi divisi..."
        ><?= htmlspecialchars($divisi['deskripsi']) ?></textarea>

        <div class="flex justify-end gap-4 mt-8">
            <a href="?page=divisi" class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400 transition"> Batal </a>
            <button type="submit" class="px-6 py-3 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition"> Update </button>
        </div>
    </form>
</div>
<script>

document.getElementById("formEditDivisi")
.addEventListener("submit", async function(e){

    e.preventDefault();

    const data = new URLSearchParams();

    data.append(
        "id",
        document.getElementById("id").value
    );

    data.append(
        "nama_divisi",
        document.getElementById("nama_divisi").value
    );

    data.append(
        "deskripsi",
        document.getElementById("deskripsi").value
    );

    const response = await fetch(
        "backend/api/index.php?route=divisi",
        {
            method: "PUT",
            body: data
        }
    );

    const result = await response.json();

    alert(result.message);

    if(result.status){
        window.location.href = "?page=divisi";
    }

});

</script>