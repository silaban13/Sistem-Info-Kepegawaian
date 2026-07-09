const tableAbsensi = document.getElementById("absensiData");


fetch("/Sistem-Info-Kepegawaian/backend/api/?route=absensi")
    .then(response => response.json())
    .then(result => {

        let html = "";

        if (result.data.length === 0) {
            html = `
                <tr>
                    <td colspan="6" class="text-center py-5 text-gray-500">
                        Data absensi belum tersedia
                    </td>
                </tr>
            `;
        } else {

            result.data.forEach((item, index) => {

                html += `
                    <tr class="border-t">

                        <td class="px-6 py-4">
                            ${index + 1}
                        </td>

                        <td class="px-6 py-4">
                            ${item.id_pegawai}
                        </td>

                        <td class="px-6 py-4">
                            ${item.tanggal}
                        </td>

                        <td class="px-6 py-4">
                            ${item.jam_masuk}
                        </td>

                        <td class="px-6 py-4">
                            ${item.jam_keluar ?? '-'}
                        </td>

                        <td class="px-6 py-4">
                            ${item.status}
                        </td>

                    </tr>
                `;

            });

        }


        tableAbsensi.innerHTML = html;


    })
    .catch(error => {
        console.error(error);

        tableAbsensi.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-red-500 py-5">
                    Gagal mengambil data absensi
                </td>
            </tr>
        `;
    });