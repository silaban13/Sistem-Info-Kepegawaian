async function loadDashboard()
{

    const response = await getData("dashboard");


    document.getElementById("totalPegawai").innerHTML =
    response.data.pegawai;


    document.getElementById("totalDepartemen").innerHTML =
    response.data.divisi;


    document.getElementById("totalDataTerbaru").innerHTML =
    response.data.jabatan;


}


loadDashboard();