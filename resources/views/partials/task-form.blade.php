<section>
    <form method="post" action="{{ $data ? route('pesanan.update', $data->id) : route('pesanan.store') }}" class="form">
        @csrf
        @if($data)
            @method('PUT')
        @endif
        <div class="flex justify-center">
            <div class="w-full">
                <div>
                    <x-input-label for="produk" :value="__('Produk')" />
                    <select name="produk" id="produk">
                        @if (!$data)
                        <option value="">--  Pilih Produk  --</option>
                        @else
                        @foreach ($data2 as $d)
                            <option value="{{ $d->id }}" {{ ($d->id==$data->produk_id) ? __('selected') : ''}}>{{ $d->nama }} -- {{ $d->keterangan }}</option>
                        @endforeach
                        @endif
                        @foreach ($prod as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }} -- {{ $p->keterangan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-center mt-4">
                    <x-primary-button>{{ $data ? __('Update') : __('Tambah') }}</x-primary-button>
                </div>
            </div>
        </div>
    </form>
</section>
<script type="module">
    $(document).ready(function(){
        $('#produk').select2();
    })
</script>
