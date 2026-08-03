<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-2"> Tambah User </h1>
        <p class="text-gray-600 mb-8"> Tambahkan akun baru yang dapat mengakses Sistem Informasi Kepegawaian. </p>
        <div id="toast" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 hidden z-50 px-6 py-4 rounded-xl shadow-2xl text-white font-medium"></div>
        <form id="formUser">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2"> Username </label>
                <input type="text" name="username" placeholder="Masukkan username" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2"> Password </label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-blue-600">
                        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12S5.25 5.25 12 5.25 21.75 12 21.75 12 18.75 18.75 12 18.75 2.25 12 2.25 12Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.75A3.75 3.75 0 1 0 12 8.25a3.75 3.75 0 0 0 0 7.5Z" />
                        </svg>
                        <svg id="eyeClose" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 hidden">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18M10.73 5.08A10.45 10.45 0 0 1 12 5.25c6.75 0 9.75 6.75 9.75 6.75a16.54 16.54 0 0 1-4.2 5.19M6.53 6.53A16.48 16.48 0 0 0 2.25 12S5.25 18.75 12 18.75a10.5 10.5 0 0 0 5.47-1.53M14.12 14.12A3 3 0 0 1 9.88 9.88" />
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2"> Role </label>
                <select name="role" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
            <div class="flex gap-3 pt-4">
                <button id="btnSimpan" type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition"> Simpan User </button>
                <a href="?page=user" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-3 rounded-lg transition"> Batal </a>
            </div>
        </form>
    </div>
</div>
<script>
    const passwordInput = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");
    const eyeOpen = document.getElementById("eyeOpen");
    const eyeClose = document.getElementById("eyeClose");

    togglePassword.addEventListener("click", () => {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeOpen.classList.add("hidden");
            eyeClose.classList.remove("hidden");
        } else {
            passwordInput.type = "password";
            eyeOpen.classList.remove("hidden");
            eyeClose.classList.add("hidden");
        }
    });

    const form = document.getElementById("formUser");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        const username = form.username.value.trim();
        const password = form.password.value.trim();
        const role = form.role.value;

        if (username.length < 3) {
            showToast("Username minimal 3 karakter", "error");
            return;
        }

        if (password.length < 6) {
            showToast("Password minimal 6 karakter", "error");
            return;
        }

        if (role === "") {
            showToast("Pilih role terlebih dahulu", "error");
            return;
        }

        const btn = document.getElementById("btnSimpan");
        btn.disabled = true;
        btn.innerHTML = `
            <span class="flex items-center justify-center gap-2">
                <span class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></span>
                Menyimpan...
            </span>
        `;

        fetch("http://localhost:8080/Sistem-Info-Kepegawaian/backend/api/index.php?route=register", {
            method: "POST",
            body: formData
        })

        .then(async response => {
            const result = await response.json();
            if (!response.ok) {
                showToast(result.message, "error");
                btn.disabled = false;
                btn.innerHTML = "Simpan User";
                return;
            }

            showToast(result.message, "success");
            form.reset();
            setTimeout(() => {
                window.location.href = "?page=user";
            }, 1500);

        })

        .catch(error => {
            console.error(error);
            showToast("Terjadi kesalahan.", "error");
            btn.disabled = false;
            btn.innerHTML = "Simpan User";
        });

    });

    function showToast(message, type = "success") {
        const toast = document.getElementById("toast");
        toast.textContent = message;

        toast.className =
            `fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50
            px-6 py-4 rounded-xl shadow-2xl text-white font-medium
            ${type === "success" ? "bg-green-600" : "bg-red-600"}`;

        toast.classList.remove("hidden");

        setTimeout(() => {
            toast.classList.add("hidden");
        }, 2000);

    }

</script>