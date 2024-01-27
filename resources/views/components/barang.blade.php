@extends('layout.main')
@section('container')
    <div class=" mt-5 h-screen  rounded-md w-full ">
        <div class="grid grid-cols-2 md:grid-cols-4 p-4 gap-5">
            @foreach ($produk as $b)
                <div
                    class="w-72 max-w-sm top-0 rounded-2xl  bg-transparent  border  border-rose-600   shadow-xl shadow-rose-600/50 dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 w-72 h-72  mx-auto object-cover rounded-t-lg"
                            style="filter: drop-shadow(0px 0px 3px #000)" src="/img/{{ $b->gambar }}" alt="product image" />
                    </a>
                    <div class="px-10 py-7">
                        <a href="#">
                            <h5 class="text-md ms-14 font-bold tracking-tight  text-rose-600 dark:text-white">
                                {{ $b->nama }}</h5>
                        </a>
                        <div class="flex ms-12 pt-2 items-center justify-between">
                            <span class="text-l font-bold text-rose-600 dark:text-white">Rp.{{ $b->harga }}</span>
                        </div>
                        @if (Auth::check())
                            @if (Auth::user()->role != 'admin')
                                <button type="button" data-modal-target="defaultModal{{ $b->id }}"
                                    data-modal-toggle="defaultModal{{ $b->id }}"
                                    class="text-slate-50 font-poppins font-bold ms-16 mt-5 bg-rose-600  focus:ring-4 focus:ring-slate-50  rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Beli</button>
                            @endif
                        @endif
                    </div>
                </div>



                <!-- Main modal -->
                <div id="defaultModal{{ $b->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-slate-100 py-10 px-3  rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-rose-600 dark:text-white">
                                    Deskripsi
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="defaultModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->

                            <div
                                class="max-w-sm ms-36 mt-4 bg-white border border-rose-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="/img/{{ $b->gambar }}" alt="" />
                                </a>
                                <h5 class="text-lg mt-3 mb-2 font-poppins ms-4 text-slate-700">{{ $b->nama }}</h5>
                                <h5 class="text-lg mb-3 ms-4 font-poppins text-slate-700">Harga : Rp.{{ $b->harga }}
                                </h5>

                                <form action="/pembelian/storeinput" method="POST">
                                    @csrf
                                    <input type="hidden" name="printer_id" value="{{ $b->id }}" id="">
                                    <input type="hidden" name="kodeproduk" value="{{ $b->id }}">
                                    <input type="hidden" name="harga" value="{{ $b->harga }}">
                                    <div>
                                        <label for="banyak"
                                            class="block ms-3 mb-2 text-sm  font-poppins font-medium text-gray-900 dark:text-white">
                                            Banyak</label>
                                        <input type="number" name="banyak"
                                            class="bg-gray-50 border mx-0 mt-2 mb-3 border-gray-300 text-gray-900 text-sm rounded-md focus:ring-rose-500 focus:border-rose-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="defaultModal" type="submit"
                                            class="text-white bg-rose-700 hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Beli</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
