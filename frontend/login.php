<div class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">

        <div class="text-center mb-6">

            <img
                src="/Sistem-Info-Kepegawaian/frontend/assets/images/logo_web.png"
                class="w-20 mx-auto mb-4">

            <h1 class="text-2xl font-bold text-gray-800">
                Login
            </h1>

            <p class="text-gray-500 mt-2">
                Sistem Informasi Kepegawaian
            </p>

        </div>

        <?php if(isset($_SESSION['error'])): ?>

            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">

                <?= $_SESSION['error']; ?>

            </div>

            <?php unset($_SESSION['error']); ?>

        <?php endif; ?>

        <form action="?page=proses_login" method="POST">

            <div class="mb-4">

                <label class="block mb-2 font-semibold">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700">

                Login

            </button>

        </form>

    </div>

</div>