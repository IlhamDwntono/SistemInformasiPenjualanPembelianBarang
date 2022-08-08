<x-guest-layout>
    <x-profilepage>
        <x-slot name="setting">
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                            Total penjualan Produk</p>
                                        <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="font-bold leading-normal text-size-sm text-emerald-500">+55%</span>
                                            since yesterday
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                        <i class="ni ni-money-coins text-size-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                            Whislist</p>
                                        <h5 class="mb-2 font-bold dark:text-white">2,300</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="font-bold leading-normal text-size-sm text-emerald-500">+3%</span>
                                            since last week
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                        <i class="ni ni-world text-size-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                            Pembelian</p>
                                        <h5 class="mb-2 font-bold dark:text-white">+3,462</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span class="font-bold leading-normal text-red-600 text-size-sm">-2%</span>
                                            since last quarter
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                        <i class="ni ni-paper-diploma text-size-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card4 -->
                <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-size-sm">
                                            Dalam Keranjang</p>
                                        <h5 class="mb-2 font-bold dark:text-white">{{ $jumlah_keranjang }}</h5>
                                        <p class="mb-0 dark:text-white dark:opacity-60">
                                            <span
                                                class="font-bold leading-normal text-size-sm text-emerald-500">+5%</span>
                                            than last month
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div
                                        class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                        <i class="ni ni-cart text-size-lg relative top-3.5 text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($cek_toko->count() > 0)
                @if (session()->has('message'))
                    <x-alert :message="session('message')" />
                @endif'

                <hr class="my-3">
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <div class="px-3 block sm:flex sm:justify-between">
                            <div class=" p-3">
                                <select name="row" wire:model='row'
                                    class=" w-20 px-2 border-none ring-none active:ring-0 rounded-md text-gray-400 text-base">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="">
                                <input type="search" wire:model='search'
                                    class="rounded-lg bg-transparent ring-blue-400 border-blue-400 active:border-blue-500 active:border-spacing-1"
                                    placeholder="Pencarian">
                            </div>

                            <a href="{{ route('Jual-Titip.create') }}">
                                <x-jet-secondary-button type='button'>
                                    Tambah
                                </x-jet-secondary-button>
                            </a>
                            <!-- ====== Modal Section End -->
                        </div>
                        <x-forms.table>
                            <thead class="align-bottom">
                                <tr>
                                    <x-forms.th class="text-xs">
                                        Foto Produk</x-forms.th>
                                    <x-forms.th class="text-xs">
                                        Nama Produk</x-forms.th>
                                    <x-forms.th class="text-xs">
                                        Harga</x-forms.th>
                                    <x-forms.th class="text-xs">
                                        Deskripsi</x-forms.th>
                                    <x-forms.th class="text-xs">
                                        Kategori</x-forms.th>
                                    <x-forms.th class="text-xs">Diskon</x-forms.th>
                                    <x-forms.th class="text-xs"></x-forms.th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Barang as $item)
                                    <tr>
                                        <x-forms.td>
                                            <div class="flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('upload/' . $item->foto_produk) }}"
                                                        class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-in-out text-size-sm h-9 w-9 rounded-xl"
                                                        alt="user1" />
                                                </div>
                                                {{-- <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 leading-normal dark:text-white text-size-sm">John
                                                Michael</h6>
                                            <p
                                                class="mb-0 leading-tight dark:text-white dark:opacity-80 text-xs text-slate-400">
                                                john@creative-tim.com</p>
                                        </div> --}}
                                            </div>
                                        </x-forms.td>
                                        <x-forms.td>
                                            <p
                                                class="mb-0 font-semibold leading-tight dark:text-white dark:opacity-80 text-xs">
                                                {{ $item->nama_produk }}</p>
                                        </x-forms.td>

                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs dark:text-white dark:opacity-80 text-slate-400">
                                                Rp. {{ number_format($item->harga, 0, 2) }}</span>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <span
                                                class="font-semibold leading-tight text-xs dark:text-white dark:opacity-80 text-slate-400">{{ $item->deskripsi }}</span>
                                        </td>
                                        <td
                                            class="p-2 leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 text-size-sm whitespace-nowrap shadow-transparent">
                                            <span
                                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-3 text-xs rounded-md py-2 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $item->category->kategory }}</span>
                                        </td>
                                        <x-forms.td>
                                            <button type="button"
                                                class="ml-5 bg-orange-400 px-4 text-white py-2 rounded-md"
                                                wire:click='Diskon({{ $item->id }})'>Diskon</button>
                                        </x-forms.td>
                                        <x-forms.td>
                                            <a href='{{ route('Jual-Titip.edit', ['Jual_Titip' => $item->id]) }}'
                                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-green-500 rounded-full hover:bg-green-600 md:mx-0">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form
                                                action="{{ route('Jual-Titip.destroy', ['Jual_Titip' => $item->id]) }}"
                                                method="POST"
                                                class="inline-block px-2 py-1 text-sm mx-auto text-white bg-red-600 rounded-full hover:bg-red-700 md:mx-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </x-forms.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-forms.table>

                    </div>
                </div>
            @else
                <div class="w-full flex justify-center h-32 items-center">
                    <div class="p-3 text-black rounded-md shadow-md ">
                        <h3>Maaf Anda Tidak Mempunyai Toko</h3>
                    </div>
                </div>
            @endif
        </x-slot>



    </x-profilepage>
</x-guest-layout>