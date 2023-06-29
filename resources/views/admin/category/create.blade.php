<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <strong>Category</strong>
               <a href="{{route('category.index')}}">Show Categories</a>
            </div>
            <div class="card-body">
                <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="description">Category Description{*optional}</label>
                    <textarea id="description" class="form-control summernote" name="description" rows="3">{{old('description')}}</textarea>
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

