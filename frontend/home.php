<section class="py-8 lg:py-12 bg-white dark:bg-gray-950 transition-colors duration-300">
    <div class="px-2 sm:px-4 lg:px-10 xl:px-8">
        <div class="overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-[60%_40%] items-center">
                <div class="text-gray-900 dark:text-white p-6 md:p-10">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold leading-tight text-gray-900 dark:text-white"> Selamat Datang di Sistem <br> Informasi Kepegawaian </h1>
                    <p class="mt-6 text-base md:text-lg leading-7 md:leading-8 text-gray-600 dark:text-gray-300">
                        Sistem Informasi Kepegawaian merupakan aplikasi berbasis web
                        yang dirancang untuk membantu perusahaan mengelola data pegawai,
                        absensi, cuti, divisi, dan jabatan secara cepat, aman, serta efisien.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                       <a href="?page=login" class="inline-flex items-center justify-center gap-2 bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-md hover:bg-blue-800 hover:shadow-lg transition-all duration-300"> Login
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="?page=about" class="inline-flex items-center justify-center px-6 py-3 border border-blue-700 text-blue-700 dark:border-blue-400 dark:text-blue-400 font-semibold rounded-xl transition hover:bg-blue-700 hover:text-white dark:hover:bg-blue-500 dark:hover:border-blue-500"> Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="flex justify-end">
                    <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/gambar_kantor.jpg" class="w-full h-72 lg:h-[500px] object-cover rounded-r-xl dark:brightness-90 transition duration-300">
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-10 mt-16">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a8.97 8.97 0 0 0-6-2.22 8.97 8.97 0 0 0-6 2.22m12 0a9 9 0 1 0-12 0m12 0A9 9 0 0 1 12 21a9 9 0 0 1-6-2.28M15 9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                    </div>
                </div>
                <h2 id="totalPegawai" class="text-3xl font-bold text-blue-600 text-center"> 0 </h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300 text-center"> Data Pegawai </p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-2xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-green-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M5.25 21V6.75A.75.75 0 0 1 6 6h4.5a.75.75 0 0 1 .75.75V21m0-9h6.75a.75.75 0 0 1 .75.75V21M9 9h.008v.008H9V9Zm0 3h.008v.008H9V12Zm0 3h.008v.008H9V15Zm3-6h.008v.008H12V9Zm0 3h.008v.008H12V12Zm0 3h.008v.008H12V15Z"/>
                        </svg>
                    </div>
                </div>
                <h2 id="totalDivisi" class="text-3xl font-bold text-green-600 text-center"> 0 </h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300 text-center"> Divisi </p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-2xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511V6.75A2.25 2.25 0 0 0 18 4.5h-3.75V3.75A2.25 2.25 0 0 0 12 1.5H9.75A2.25 2.25 0 0 0 7.5 3.75V4.5H3.75A2.25 2.25 0 0 0 1.5 6.75v11.25A2.25 2.25 0 0 0 3.75 20.25H18A2.25 2.25 0 0 0 20.25 18V8.511ZM9 4.5V3.75a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 .75.75V4.5H9Z"/>
                        </svg>
                    </div>
                </div>
                <h2 id="totalJabatan" class="text-3xl font-bold text-orange-500 text-center"> 0 </h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300 text-center"> Jabatan </p>
            </div>
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-2xl p-6 shadow-sm hover:shadow-lg transition duration-300">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-2xl bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M4.5 6.75h15A2.25 2.25 0 0 1 21.75 9v9.75A2.25 2.25 0 0 1 19.5 21H4.5A2.25 2.25 0 0 1 2.25 18.75V9A2.25 2.25 0 0 1 4.5 6.75Zm4.5 7.5 2.25 2.25L15 12"/>
                        </svg>
                    </div>
                </div>
                <h2 id="tingkatKehadiran" class="text-3xl font-bold text-red-500 text-center"> 0%</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300 text-center"> Tingkat Kehadiran </p>
            </div>
        </div>
    </div>
    <section class="mt-16">
        <h2 data-aos="fade-up" data-aos-duration="800" class="text-3xl font-bold text-center mb-10 text-gray-900 dark:text-white"> Fitur Utama </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <div data-aos="fade-up" data-aos-duration="800" class="bg-white dark:bg-gray-900 rounded-xl shadow-md dark:shadow-gray-950/50 p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-center mb-5">
                    <div class="w-14 h-14 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M5.25 21V6.75A.75.75 0 0 1 6 6h4.5a.75.75 0 0 1 .75.75V21m0-9h6.75a.75.75 0 0 1 .75.75V21M9 9h.008v.008H9V9Zm0 3h.008v.008H9V12Zm0 3h.008v.008H9V15Zm3-6h.008v.008H12V9Zm0 3h.008v.008H12V12Zm0 3h.008v.008H12V15Z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center text-gray-900 dark:text-white"> Manajemen Pegawai </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-7 text-center"> Mengelola data pegawai lengkap mulai dari biodata, divisi, jabatan hingga akun pengguna. </p>
            </div>
            <div data-aos="fade-up" data-aos-delay="150" data-aos-duration="800" class="bg-white dark:bg-gray-900 rounded-xl shadow-md dark:shadow-gray-950/50 p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-center mb-5">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-purple-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M4.5 6.75h15A2.25 2.25 0 0 1 21.75 9v9.75A2.25 2.25 0 0 1 19.5 21H4.5A2.25 2.25 0 0 1 2.25 18.75V9A2.25 2.25 0 0 1 4.5 6.75Zm4.5 7.5 2.25 2.25L15 12"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center text-gray-900 dark:text-white"> Absensi </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-7 text-center"> Mencatat kehadiran pegawai setiap hari dengan informasi jam masuk, jam keluar, dan status kehadiran.</p>
            </div>
            <div data-aos="fade-up" data-aos-delay="300" data-aos-duration="800" class="bg-white dark:bg-gray-900 rounded-xl shadow-md dark:shadow-gray-950/50 p-6 hover:-translate-y-2 hover:shadow-xl transition">
                <div class="flex justify-center mb-5">
                    <div class="w-14 h-14 rounded-2xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-7 h-7 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75H8.25A2.25 2.25 0 0 0 6 6v12a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 18V5.25A1.5 1.5 0 0 0 16.5 3.75ZM9 8.25h6M9 12h6m-6 3.75h3"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-center text-gray-900 dark:text-white"> Pengajuan Cuti </h3>
                <p class="text-gray-600 dark:text-gray-300 leading-7 text-center"> Pegawai dapat mengajukan cuti dan admin dapat menyetujui ataupun menolak pengajuan secara online. </p>
            </div>
        </div>
    </section>
    <section class="mt-20 bg-white dark:bg-gray-900 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm dark:shadow-gray-950/50 p-8 md:p-12">
        <div class="max-w-3xl">
            <span class="text-blue-700 dark:text-blue-400 font-semibold uppercase tracking-wider text-sm"> Tentang Aplikasi </span>
            <h2 class="mt-2 text-3xl md:text-4xl font-bold text-gray-900 dark:text-white"> Solusi Modern untuk Pengelolaan Data Kepegawaian </h2>
            <p class="mt-6 text-gray-600 dark:text-gray-300 leading-8 text-justify">
                Sistem Informasi Kepegawaian merupakan aplikasi berbasis web yang
                dikembangkan menggunakan <strong>Native PHP</strong> dengan arsitektur
                <strong>MVC</strong> dan <strong>REST API</strong>. Aplikasi ini
                membantu perusahaan dalam mengelola data pegawai, divisi, jabatan,
                absensi, serta cuti secara terpusat sehingga proses administrasi
                menjadi lebih cepat, akurat, dan efisien.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-blue-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a8.97 8.97 0 0 0-6-2.22 8.97 8.97 0 0 0-6 2.22m12 0a9 9 0 1 0-12 0m12 0A9 9 0 0 1 12 21a9 9 0 0 1-6-2.28M15 9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Manajemen Pegawai</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-1"> Mengelola data pegawai secara terstruktur dan mudah. </p>
            </div>
        </div>
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-purple-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M4.5 6.75h15A2.25 2.25 0 0 1 21.75 9v9.75A2.25 2.25 0 0 1 19.5 21H4.5A2.25 2.25 0 0 1 2.25 18.75V9A2.25 2.25 0 0 1 4.5 6.75Zm4.5 7.5 2.25 2.25L15 12"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Absensi Digital</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-1">
                    Mencatat kehadiran pegawai dengan cepat dan akurat.
                </p>
            </div>
        </div>
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M5.25 21V6.75A.75.75 0 0 1 6 6h4.5a.75.75 0 0 1 .75.75V21m0-9h6.75a.75.75 0 0 1 .75.75V21M9 9h.008v.008H9V9Zm0 3h.008v.008H9V12Zm0 3h.008v.008H9V15Zm3-6h.008v.008H12V9Zm0 3h.008v.008H12V12Zm0 3h.008v.008H12V15Z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Divisi & Jabatan</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-1"> Mengatur struktur organisasi perusahaan secara terintegrasi. </p>
            </div>
        </div>
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-100 dark:bg-red-900/30 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75H8.25A2.25 2.25 0 0 0 6 6v12a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 18V5.25A1.5 1.5 0 0 0 16.5 3.75ZM9 8.25h6M9 12h6m-6 3.75h3"/>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-lg text-gray-900 dark:text-white">Manajemen Cuti</h3>
                <p class="text-gray-600 dark:text-gray-300 mt-1"> Pengajuan dan persetujuan cuti dilakukan secara online. </p>
            </div>
        </div>
    </section>
</section>
<script>

    const API = "http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=";

    async function loadDashboard() {
        const response = await fetch(API + "dashboard");
        const result = await response.json();
        animateValue("totalPegawai", 0, result.data.pegawai, 1200);
        animateValue("totalDivisi", 0, result.data.divisi, 1200);
        animateValue("totalJabatan", 0, result.data.jabatan, 1200);
        animateValue("tingkatKehadiran", 0, result.data.kehadiran, 1500, "%");
    }

    function animateValue(id, start, end, duration, suffix = "") {
        const element = document.getElementById(id);
        if (!element) return
        let startTime = null;
        function animate(currentTime) {
            if (!startTime) startTime = currentTime;
            const progress = Math.min((currentTime - startTime) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value + suffix;
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }

        requestAnimationFrame(animate);

    }

    loadDashboard();

</script>
