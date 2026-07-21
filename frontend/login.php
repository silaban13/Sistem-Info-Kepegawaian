<div class="min-h-screen bg-gradient-to-br from-white to-white flex items-center justify-center p-4">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="grid lg:grid-cols-2">
            <div class="hidden lg:flex flex-col justify-center bg-gradient-to-br from-gray-200 to-gray-200 text-white p-12">
                <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png" alt="Logo" class="w-20 h-20 object-contain bg-white rounded-2xl p-2 shadow-lg border border-gray-200">
                <h1 class="text-4xl text-gray-950 font-bold leading-tight"> Sistem Informasi <br> Kepegawaian </h1>
                <p class="mt-6 text-blue-100 leading-8"> Kelola data pegawai, absensi, cuti, divisi, dan jabatan dalam satu sistem yang modern,  cepat, dan aman. </p>
                <div class="mt-10 space-y-4 text-gray-950">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span>Manajemen Pegawai</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span>Absensi Online</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        <span>Pengajuan Cuti</span>
                    </div>
                </div>
            </div>
            <div class="p-8 sm:p-12">
                <div class="lg:hidden text-center mb-8">
                   <img src="/Sistem-Info-Kepegawaian/frontend/assets/images/bank.png" alt="Logo" class="w-20 h-20 object-contain mx-auto bg-white rounded-xl shadow-lg p-2">
                    <h1 class="mt-5 text-2xl font-bold"> Sistem Informasi Kepegawaian </h1>
                </div>
                <h2 class="text-3xl font-bold text-gray-800"> Selamat Datang 👋 </h2>
                <p class="text-gray-500 mt-2"> Silakan login untuk melanjutkan. </p>
                <?php if(isset($_SESSION['error'])): ?>
                <div class="mt-6 bg-red-50 border border-red-300 text-red-600 rounded-xl p-4">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="?page=proses_login" method="POST" class="mt-8 space-y-6">
                    <div>
                        <label class="text-sm font-semibold text-gray-700"> Username </label>
                        <input type="text" name="username" required autocomplete="username" placeholder="Masukkan Username" maxlength="50" class="mt-2 w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700"> Password </label>
                        <div class="relative mt-2">
                            <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan Password" maxlength="100" class="w-full rounded-xl border border-gray-300 px-4 py-3 pr-12 focus:ring-4 focus:ring-blue-100 focus:border-blue-600 outline-none">
                            <button type="button" id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-blue-600"> 👁️ </button>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition"> Login </button>
                    <div class="mt-4 text-center">
                        <a href="?page=home" class="text-blue-600 hover:text-blue-800 hover:underline"> ← Kembali ke Beranda </a>
                    </div>
                </form>
                <div class="mt-8 text-center text-sm text-gray-400">  © <?= date('Y') ?> Sistem Informasi Kepegawaian  </div>
            </div>
        </div>
    </div>
</div>
<script>
    const password = document.getElementById("password");
    const toggle = document.getElementById("togglePassword");
    toggle.addEventListener("click", function () {

        if (password.type === "password") {
            password.type = "text";
            toggle.innerHTML = "🙈";
        } else {
            password.type = "password";
            toggle.innerHTML = "👁️";
        }

    });

</script>