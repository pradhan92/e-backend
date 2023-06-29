<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <strong>Product</strong>
               <a href="{{route('product.index')}}">Show Products</a>
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Product Price(Rs.)</label>
                    <input id="price" class="form-control" type="text" name="price" value="{{old('price')}}" onchange="calculate()">
                    @error('price')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discount_percent">Discount(%)</label>
                    <input id="discount_percent" class="form-control" type="text" name="discount_percent" value="{{old('discount_percent') ?? 0}}" onchange="calculate()">
                    @error('discount_percent')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sale_price"> Selling_price</label>
                    <input id="sale_price" class="form-control" type="text" name="sale_price" value="{{old('sale_price')}}" >
                    @error('sale_price')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="description">Product Description{*optional}</label>
                    <textarea id="description" class="form-control summernote" name="description" rows="3">{{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id"> Categories</label>
                    <select id="category_id" class="form-control" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="text-danger">
                     {{$message}}
                 </div>
                 @enderror
                </div>
                <div class="form-group">
                    <label for="image">UpLoad Image</label>
                    <input id="image" class="form-control-file" type="file" name="image">
                    @error('image')
                    <div class="text-danger">
                     {{$message}}
                 </div>
                 @enderror
                </div>
                <button type="submit" class="">Save Record</button>
                </form>
            </div>
        </div>
    </div>
    </x-app-layout>

