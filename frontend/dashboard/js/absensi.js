async function loadAbsensi(page = 1)
{

    document.getElementById("absensiLoading").classList.remove("hidden");
    document.getElementById("absensiContent").classList.add("hidden");


    const tableAbsensi = document.getElementById("absensiData");
    fetch(`/Sistem-Info-Kepegawaian/backend/api/?route=absensi&page=${page}`)
    .then(response => response.json())
    .then(result => {
        let html = "";
        if(result.data.length == 0){
            html = `
                <tr>
                    <td colspan="6" class="text-center py-5 text-gray-500"> Data absensi belum tersedia </td>
                </tr>
            `;

        } else {
            result.data.forEach((item,index)=>{
                html += `
                    <tr class="border-t">
                        <td class="px-6 py-4">
                            ${((result.page-1)*result.limit)+index+1}
                        </td>
                        <td class="px-6 py-4">${item.nama}</td>
                        <td class="px-6 py-4">${item.tanggal}</td>
                        <td class="px-6 py-4">${item.jam_masuk}</td>
                        <td class="px-6 py-4">${item.jam_keluar ?? '-'}</td>
                        <td class="px-6 py-4">${item.status}</td>
                    </tr>
                `;
            });

        }

        tableAbsensi.innerHTML = html;
        renderPagination(result.page, result.total_page);

        document.getElementById("absensiLoading").classList.add("hidden");
        document.getElementById("absensiContent").classList.remove("hidden");

    })

    .catch(error=>{
        console.error(error);
        tableAbsensi.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-red-500 py-5"> Gagal mengambil data absensi </td>
            </tr>
        `;

        document.getElementById("absensiLoading").classList.add("hidden");
        document.getElementById("absensiContent").classList.remove("hidden");

    });

}

loadAbsensi();

function renderPagination(current,total)
{
    let html = "";
    if(current > 1){
        html += `
            <button onclick="loadAbsensi(${current-1})" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"> Sebelumnya </button>
        `;
    }

    for(let i=1;i<=total;i++){
        html += `
            <button onclick="loadAbsensi(${i})" class="px-4 py-2 rounded-lg ${i==current ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300'}">  ${i}  </button>
        `;
    }

    if(current < total){
        html += `
            <button onclick="loadAbsensi(${current+1})" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300"> Selanjutnya </button>
        `;
    }

    document.getElementById("pagination").innerHTML = html;

}