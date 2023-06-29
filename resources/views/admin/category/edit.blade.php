<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <strong>Category</strong>
               <a href="{{route('category.index')}}">Show Categories</a>
            </div>
            <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{$category->name}}">
                    @error('name')
                       <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                <div class="form-group">
                    <label for="description">Category Description{*optional}</label>
                    <textarea id="description" class="form-control summernote" name="description" rows="3">{{$category->description}}</textarea>
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
                <div>
                    <img src="{{asset($category->image)}}" width="60" alt="">
                </div>
                <button type="submit" class="btn btn-success">Update Record</button>
                </form>
            </div>
        </div>
    </div>
    </x-app-layout>

