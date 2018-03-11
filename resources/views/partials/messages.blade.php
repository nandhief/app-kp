 @if (Session::has('message'))
    <div class="note note-info">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif
@if ($errors->count() > 0)
    <div class="note note-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Request::is('categories') OR Request::is('products') OR Request::is('warehouses'))
    @if (count(\App\Warehouse::where('quantity', '<=', 10)->get()) > 0 )
        <div class="note note-danger">
            <ul class="list-unstyled">
                @foreach(\App\Warehouse::where('quantity', '<=', 10)->get() as $data)
                    <li><strong>{{ $data->product->category->kode . '-' . $data->product->kode . ' ' . ucwords($data->product->name) }}</strong> : {{ $data->quantity === 0 ? 'Stok kosong' : 'Stok menipis' }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
