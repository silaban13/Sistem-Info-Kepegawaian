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
        <button class="bg-blue-600 text-white px-5 py-3 rounded"> Update </button>
    </form>
</div>

<script>

    document.getElementById("formEditDivisi")
    .addEventListener("submit", async function(e){
        e.preventDefault();
        const data = new URLSearchParams();
        data.append("id", document.getElementById("id").value );
        data.append("nama_divisi", document.getElementById("nama_divisi").value);
        const response = await fetch(
            "backend/api/index.php?route=divisi",
            {
                method:"PUT",
                body:data
            }
        );

        const result = await response.json();
        alert(result.message);
        window.location.href="?page=divisi";

    });

</script>