<x-app-layout>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
           <strong>product</strong>
           <a href="{{route('product.create')}}">Add product</a>
        </div>
        <div class="card-body">
            <table class="table" >
                {{-- search box --}}
                {{-- <table class="table" id="table-2"> --}}
                <thead>
                    <tr class="border border-1">
                        <th class="border border-1">SN</th>
                        <th class="border border-1">Image</th>
                        <th class="border border-1">Name</th>
                        <th class="border border-1">Price</th>
                        <th class="border border-1">Dis(%)</th>
                        <th class="border border-1">Selling Price</th>
                        <th class="border border-1">Category</th>
                        <th class="border border-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                      <tr class="border border-1">
                        <td class="border border-1">{{++$index}}</td>
                        <td class="border border-1"><img src="{{asset($product->image)}}" width="60" alt=""></td>
                        <td class="border border-1">{{$product->name}}</td>
                        <td class="border border-1">{{$product->price}}</td>
                        <td class="border border-1">{{$product->discount_percent}}</td>
                        <td class="border border-1">{{$product->sale_price}}</td>
                        <td class="border border-1"><span class="badge badge-light">{{$product->category->name}}</span></td>
                        <td class="border border-1">
                           <form action="{{route('product.destroy',$product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{route('product.edit',$product->id)}}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- for pagination --}}
            {{$products->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
</x-app-layout>
