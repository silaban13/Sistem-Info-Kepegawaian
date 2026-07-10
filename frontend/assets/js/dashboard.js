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

async function loadDashboardProfile()
{
    const response = await getData("profile");

    const user = response.data;


    let title = "";

    if(user.role == "admin"){
        title = "Dashboard Admin";
    }else{
        title = "Dashboard User";
    }


    document.getElementById("dashboardTitle").innerHTML = title;


    document.getElementById("welcomeUser").innerHTML =
        `Selamat datang, ${user.nama}`;
}


loadDashboardProfile();