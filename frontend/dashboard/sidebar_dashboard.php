<aside
id="sidebar"
class="
w-64
min-h-screen
bg-slate-900
text-white
transform
transition-transform
duration-300
-translate-x-full
lg:translate-x-0
lg:static
">

    <div class="p-6 border-b border-slate-700">

        <h2 class="text-2xl font-bold">
            Dashboard
        </h2>

        <p class="text-sm text-slate-400">
            Sistem Informasi Kepegawaian
        </p>


        <button
            id="closeSidebar"
            class="lg:hidden text-2xl mt-4">

            ✕

        </button>

    </div>


    <nav class="mt-6">

        <ul class="space-y-2 px-4">

            <li>
                <a href="?page=dashboard"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    🏠 Dashboard
                </a>
            </li>

            <li>
                <a href="?page=pegawai"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    👨‍💼 Pegawai
                </a>
            </li>

            <li>
                <a href="?page=divisi"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    🏢 Divisi
                </a>
            </li>

            <li>
                <a href="?page=jabatan"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    💼 Jabatan
                </a>
            </li>

            <li>
                <a href="?page=absensi"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    📅 Absensi
                </a>
            </li>

            <li>
                <a href="?page=cuti"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    📝 Cuti
                </a>
            </li>


            <?php if($_SESSION['role'] == 'admin'): ?>

            <li>
                <a href="?page=user"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition">
                    👤 User
                </a>
            </li>

            <?php endif; ?>


        </ul>


        <hr class="my-6 border-slate-700">


        <ul class="px-4">

            <li>
                <a href="?page=logout"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg text-red-300 hover:bg-red-600 hover:text-white transition">
                    🚪 Logout
                </a>
            </li>

        </ul>


    </nav>

</aside>