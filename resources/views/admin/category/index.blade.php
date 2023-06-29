<x-app-layout>
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
           <strong>Category</strong>
           <a href="{{route('category.create')}}">Add Category</a>
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
                        <th class="border border-1">Slug</th>
                        <th class="border border-1">Description</th>
                        <th class="border border-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                      <tr class="border border-1">
                        <td class="border border-1">{{++$index}}</td>
                        <td class="border border-1"><img src="{{asset($category->image)}}" width="60" alt=""></td>
                        <td class="border border-1">{{$category->name}}</td>
                        <td class="border border-1">{{$category->slug}}</td>
                        <td class="border border-1">{{$category->description}}</td>
                        <td class="border border-1">
                           <form action="{{route('category.destroy',$category->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- for pagination --}}
            {{$categories->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>
</x-app-layout>
