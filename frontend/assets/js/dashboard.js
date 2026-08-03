const API =
    "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";

async function getData(route) {
    const response = await fetch(API + route);
    return await response.json();
}

async function loadDashboard() {

    const response = await getData("dashboard");

    const totalPegawai = document.getElementById("totalPegawai");
    const totalDepartemen = document.getElementById("totalDepartemen");
    const totalDataTerbaru = document.getElementById("totalDataTerbaru");

    if (!totalPegawai || !totalDepartemen || !totalDataTerbaru) {
        return;
    }

    totalPegawai.textContent = response.data.pegawai;
    totalDepartemen.textContent = response.data.divisi;
    totalDataTerbaru.textContent = response.data.jabatan;
}

async function loadDashboardProfile() {

    try {

        const response = await getData("profile");
        if (!response.status) return;
        const user = response.data;
        const dashboardTitle = document.getElementById("dashboardTitle");
        const welcomeUser = document.getElementById("welcomeUser");
        const roleUser = document.getElementById("roleUser");
        const namaUser = document.getElementById("namaUser");
        const fotoUser = document.getElementById("fotoUser");

        if (dashboardTitle) {
            dashboardTitle.textContent =
                user.role === "admin" ? "Dashboard Admin" : "Dashboard User";
        }

        if (welcomeUser) {
            welcomeUser.textContent = `Hi, Selamat datang, ${user.nama}`;
        }

        if (roleUser) {
            roleUser.textContent =
                user.role === "admin" ? "Administrator" : "User";
        }

        if (namaUser) {
            namaUser.textContent = user.nama;
        }

        if (fotoUser) {

            if (user.foto) {
                fotoUser.src =
                    "/Sistem-Info-Kepegawaian/frontend/assets/uploads/" + user.foto;
                    
            } else {
                fotoUser.src =
                    "/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png";

                    console.log(fotoUser.src);
            }

        }

    } catch (error) {

        console.error("Gagal memuat profile:", error);

    }

}

(async function () {

    document.getElementById("dashboardLoading").classList.remove("hidden");
    document.getElementById("dashboardContent").classList.add("hidden");

    try {

        await loadDashboard();
        await loadDashboardProfile();

    } catch (error) {

        console.error(error);

    } finally {

        document.getElementById("dashboardLoading").classList.add("hidden");
        document.getElementById("dashboardContent").classList.remove("hidden");

    }

})();