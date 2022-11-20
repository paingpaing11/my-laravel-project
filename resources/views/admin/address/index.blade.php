@extends('admin.address.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Address
                    <a href="{{ route('address.create')}}" class="btn btn-primary float-end">Add </a>
                </h4>
                </div>
                <div class="card-body">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <div class="text-end">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <!-- <th>ProjectID-Number</th> -->
                                <th>City & State</th>
                                <th>Township</th>
                                <th>House No.</th>
                                <th>Street</th>
                                <th>Ward</th>
                                <th>Show</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($address as $item )

                            <tr>
                                <td>{{$item->id}}</td>
                    
                                <td>
                                    @foreach ($cities as $c)
                                        @if($c->id==$item->city_id)
                                            {{$c->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($towns as $t)
                                        @if($t->id==$item->township_id)
                                            {{$t->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$item->hou_no}}</td>
                                <td>{{$item->street}}</td>
                                <td>{{$item->ward}}</td>
                                    <form action="{{ route('address.destroy',$item->id) }}" method="POST">
                                        <td><a class="btn btn-info" href="{{ route('address.show',$item->id) }}"><i class="bi bi-eye-fill"></i></a>
                                        <td><a class="btn btn-primary" href="{{ route('address.edit',$item->id) }}"><i class="bi bi-pencil-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <td><button type="submit" onclick="return confirm('Do you really want to delete address!')" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
