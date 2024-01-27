    @extends('layout.master')
    @section('konten')
        @if (session('message'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    <strong>{{ session('message') }}</strong>
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif











        {{-- Modal Tambah --}}

        <!-- Modal toggle -->
        @if (Auth::user()->role == 'admin')
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="block mb-7 text-white bg-red-500 mt-3  hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Produk
            </button>
        @endif


        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">


                <!-- Modal content -->
                <div class="relative bg-rose-600  rounded-lg shadow dark:bg-gray-700">
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
                        <h3 class="mb-4 text-xl font-medium text-slate-50 dark:text-white">Tambahkan Produk</h3>
                        <form enctype="multipart/form-data" class="space-y-6" action="/produk/storeinput" method="post">
                            @csrf
                            <div>
                                <label for="nama"
                                    class="block mb-2 ms-1  text-sm font-medium text-slate-100 dark:text-white">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="tipe"
                                    class="block mb-2 ms-1  text-sm font-medium text-slate-100 dark:text-white">Tipe</label>
                                <input type="text" name="tipe" id="tipe"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="jenis"
                                    class="block mb-2 ms-1  text-sm font-medium text-slate-100 dark:text-white">Jenis</label>
                                <input type="text" name="jenis" id="jenis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="harga"
                                    class="block mb-2 ms-1  text-sm font-medium text-slate-100 dark:text-white">Harga</label>
                                <input type="number" name="harga" id="harga"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="stok"
                                    class="block mb-2 ms-1  text-sm font-medium text-slate-100 dark:text-white">Stok</label>
                                <input type="number" name="stok" id="stok"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <div>
                                <label for="gambar"
                                    class="block mb-2 ms-1  text-sm font-medium text-gray-900 dark:text-white"> </label>
                                <input type="file" name="gambar" id="gambar"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    required>
                            </div>
                            <button type="submit"
                                class="w-full text-slate-900 bg-slate-50 hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                New Produk </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        {{-- Tabel Biodata --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-rose-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-slate-50">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 text-slate-50">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3 text-slate-50">
                            Tipe
                        </th>
                        <th scope="col" class="px-6 py-3 text-slate-50">
                            Jenis
                        </th>
                        <th scope="col" class="px-6 py-3 text-slate-50">
                            Harga
                        </th>
                        <th scope="col" class="px-10 py-3 text-slate-50">
                            Stok
                        </th>
                        <th scope="col" class="px-10 py-3 text-slate-50">
                            Gambar
                        </th>
                        <th scope="col" class="px-20 py-3  text-slate-50">
                            Option
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $b)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $b->nama }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $b->tipe }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $b->jenis }}
                            </td>
                            <td class="px-8 py-4">
                                {{ $b->harga }}
                            </td>
                            <td class="px-12 py-4">
                                {{ $b->stok }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="/img/{{ $b->gambar }}" alt="" width="100px" height="100px">
                            </td>
                            <td class=" py-4 flex ">
                                <button type="button" data-modal-target="authentication-modal{{ $b->id }}"
                                    data-modal-toggle="authentication-modal{{ $b->id }}"
                                    class="bg-green-600 text-slate-50 font-poppins font-light hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800  rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
                                <form class="inline-block" action="/produk/delete/{{ $b->id }}" method="get">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Apakah Ingin Menghapus')" type="submit"
                                        class="text-white bg-red-700 font-poppins font-light hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800  rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>
                                </form>
                            </td>
                        </tr>



                        {{-- Update --}}

                        <!-- Main modal -->

                        <div id="authentication-modal{{ $b->id }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">

                                <!-- Modal content -->

                                <div class="relative bg-rose-300 rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="authentication-modal{{ $b->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-slate-50 dark:text-white">Update Produk
                                        </h3>
                                        <form class="space-y-6" action="/produk/storeupdate" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $b->id }}">
                                            <div>
                                                <label for="nama"
                                                    class="block mb-2 mt-2 text-sm font-medium text-slate-50 dark:text-white">Nama
                                                </label>
                                                <input type="text" value="{{ $b->nama }}" name="nama"
                                                    id="nama"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="tipe"
                                                    class="block mb-2 mt-2 text-sm font-medium text-slate-50 dark:text-white">Tipe
                                                </label>
                                                <input type="text" value="{{ $b->tipe }}" name="tipe"
                                                    id="tipe"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="jenis"
                                                    class="block mb-2 mt-2 text-sm font-medium text-slate-50 dark:text-white">Jenis
                                                </label>
                                                <input type="text" value="{{ $b->jenis }}" name="jenis"
                                                    id="jenis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="stok"
                                                    class="block mb-2 mt-2 text-sm font-medium text-slate-50 dark:text-white">Stok
                                                </label>
                                                <input type="number" value="{{ $b->stok }}" name="stok"
                                                    id="stok"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="harga"
                                                    class="block mb-2 mt-2 text-sm font-medium text-slate-50 dark:text-white">Harga
                                                </label>
                                                <input type="number" value="{{ $b->harga }}" name="harga"
                                                    id="harga"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="gambar"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3">
                                                </label>
                                                <input type="hidden" value="{{ $b->gambar }}" name="gambar"
                                                    id="gambar"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                                                <button type="submit"
                                                    class="w-full text-slate-800 bg-white hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
        @endforeach
        </tbody>

        </table>
        </div>
    @endsection
