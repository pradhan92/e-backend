<x-app-layout>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
               <strong>Orders</strong>
            </div>
            <div class="card-body">
                <table class="table" >
                    <thead>
                        <tr class="border border-1">
                            <th class="border border-1">Order No</th>
                            <th class="border border-1">Customer</th>
                            <th class="border border-1">Address</th>
                            <th class="border border-1">Contact</th>
                            <th class="border border-1">Total</th>
                            <th class="border border-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                          <tr class="border border-1">
                            <td class="border border-1">{{$order->id}}</td>
                            <td class="border border-1">{{$order->customer->name}}</td>
                            <td class="border border-1">{{$order->customer->address}}</td>
                            <td class="border border-1">{{$order->customer->mobile}}</td>
                            <td class="border border-1">{{$order->total}}</td>
                              <td> <form action="#" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('order.edit',$order->id)}}" class="btn btn-success">Edit</a>
                                    <a href="{{route('order.show',$order->id)}}" class="btn btn-warning">View</a>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </x-app-layout>
