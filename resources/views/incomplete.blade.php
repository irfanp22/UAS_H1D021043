<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Incomplete') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4 class="font-semibold text-xl text-center">Pesanan Belum Dibayar</h4>
                    <div class="px-4 py-2">
                        <div class="flex justify-end">
                            <a href="{{ route('pesanan.create') }}"><x-button>{{ __('Tambah') }}</x-button></a>
                        </div>
                        <div class="p-4">
                            <div class="border border-gray-200 rounded-lg">
                                <div class="bg-white px-4 py-3">
                                    <table id="pesanan" class="w-full border-collapse text-gray-900">
                                        <thead>
                                            <tr>
                                                <th class="py-2">No</th>
                                                <th class="py-2">Nama</th>
                                                <th class="py-2">Keterangan</th>
                                                <th class="py-2 w-1/6">Pembayaran</th>
                                                <th class="py-2 w-1/6">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td class="py-2">{{ $no++ }}</td>
                                                    <td class="py-2">{{ $d->produk->nama }}</td>
                                                    <td class="py-2">{{ $d->produk->keterangan }}</td>
                                                    <td class="py-2">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium text-white 
                                                            {{ $d->pembayaran->status == 1 ? 'bg-green-500' : 'bg-yellow-500' }} ">
                                                            @if ($d->pembayaran->status == 1)
                                                                Dibayar
                                                            @else
                                                                Belum Dibayar
                                                            @endif
                                                        </span>
                                                        @if ($d->pembayaran->status == 1)
                                                            <a href="{{ route('completed') }}"><i class="fa-solid fa-circle-info"></i></a>
                                                        @else
                                                            <a href="{{ route('incomplete') }}"><i class="fa-solid fa-circle-info"></i></a>
                                                        @endif
                                                    </td>
                                                    <td class="py-2">
                                                        <div class="flex items-center">
                                                            <form action="{{ $d->id }}/status" method="post" class="form">
                                                                @csrf
                                                                @method('put')
                                                                @if ($d->pembayaran->status == 1)
                                                                    <x-primary-button><i class="fa-solid fa-xmark fa-xl"></i></x-primary-button>
                                                                @else
                                                                    <x-primary-button><i class="fa-solid fa-check fa-xl"></i></x-primary-button>
                                                                @endif
                                                            </form>
                                                            |
                                                            <form action="pesanan/{{ $d->id }}/edit" method="get" class="form">
                                                                <x-primary-button><i class="fa-regular fa-pen-to-square fa-xl"></i></x-primary-button>
                                                            </form>
                                                            |
                                                            <form action="pesanan/{{ $d->id }}" method="post" class="form">
                                                                @csrf
                                                                @method('delete')
                                                                <x-primary-button><i class="fa-solid fa-trash-can fa-xl"></i></x-primary-button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script type="module">
$(document).ready(function(){
    $('#pesanan').DataTable({
        order: [],
        columnDefs: [
        { targets: [0], orderable: false, searchable: false, orderFixed: true}
        ]
    })
    window.styling();
    $('#pesanan_filter input[type="search"]').on('input', function(){
        window.styling();
    })
})
</script>