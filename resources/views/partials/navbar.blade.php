<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/image/jkt48.png" class="h-20" alt="Flowbite Logo" />
            <span class="self-center text-2xl text-rose-600 font-semibold whitespace-nowrap dark:text-white">JKT48</span>
        </a>
        @if (!Auth::check())
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <button type="button" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                    <a href="#" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Login</a>
                </button>
                <a href="#" class="text-sm  text-blue-600 dark:text-white hover:underline">/</a>
                <a href="/register" class="text-sm  text-blue-600 dark:text-white hover:underline">Register</a>
            </div>
        @else
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                </svg>
                <h1 class="text-green-600">{{ auth()->user()->email }}</h1>
            </div>
        @endif
    </div>
</nav>
<nav class="bg-rose-600 h-16 dark:bg-gray-700 overflow-hidden">
    <div class="max-w-screen-xl px-4 py-1 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row ms-20 font-medium mt-3 rtl:space-x-reverse text-sm">
                <li
                    class="relative w-32 text-center before:absolute before:content-[''] before:-top-10 before:left-0 before:border-x  before:h-32">
                    <a href="/"
                        class="text-slate-50 text-lg font-poppins  font-semibold dark:text-white hover:underline"
                        aria-current="page">Home</a>
                </li>
                <li
                    class="relative w-32  text-center before:absolute before:content-[''] before:-top-10 before:left-0 before:border-s  before:h-32">
                    <a href="/barang"
                        class="text-slate-50 text-lg font-poppins font-semibold dark:text-white hover:underline"
                        aria-current="page">Produk</a>
                </li>
                <li
                    class="relative w-32  text-center before:absolute before:content-[''] before:-top-10 before:left-0 before:border-r  before:h-32">
                    <a href="#"
                        class="text-slate-50 text-lg font-poppins font-semibold dark:text-white hover:underline"
                        aria-current="page">Gallery</a>
                </li>
                <li
                    class="relative w-32  text-center before:absolute before:content-[''] before:-top-10 before:left-0 before:border-s  before:h-32">
                    <a href="#"
                        class="text-slate-50 text-lg font-poppins font-semibold dark:text-white hover:underline"
                        aria-current="page">Contact</a>
                </li>
                <li
                    class="relative w-32  text-center before:absolute before:content-[''] before:-top-10 before:left-0 before:border-s  before:h-32">
                </li>

            </ul>
        </div>
    </div>
</nav>
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white border-4 border-rose-600 rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  text-rose-500 dark:text-white">Silahkan Login</h3>
                @if (session('error'))
                    <div class="alert alert-danger"> <b>Opps!</b> {{ session('error') }} </div>
                @endif
                <form action="{{ route('actionlogin') }}" class="space-y-6" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Masukan
                            Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-rose-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@email.com" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Masukan
                            Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-rose-700 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full text-slate-50 bg-rose-700 hover:bg-slate-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                        to your account</button>
                    <div class="text-sm font-medium text-slate-900 dark:text-gray-300">
                        Belum Punya Akun? <a href="/register"
                            class="text-red-600 hover:underline dark:text-blue-500">buat akun</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
