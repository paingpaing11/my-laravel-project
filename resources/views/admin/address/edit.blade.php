@extends('admin.address.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        @if ($errors->any())
            <div class="alert alert-danger">
            <div class="text-end">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <strong>Whoops!</strong> something we are problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="card">
                <div class="card-header">
                    <h4>Update Info
                    <a href="{{ route('address.index')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('address.update',$address->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="">City</label>
                            <div class="form-group">
                                <select name="city_slug" class="col-sm-2 p-2">
                                    @foreach ($cities as $c)
                                        <option value="{{$c->slug}}"
                                        @if($c->id==$address->city_id)
                                        selected
                                        @endif
                                        >{{$c->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Township</label>
                            <div class="form-group">
                                <select name="town_slug" class="col-sm-2 p-2">
                                    @foreach ($towns as $t)
                                        <option value="{{$t->slug}}"
                                        @if($t->id==$address->township_id)
                                        selected
                                        @endif
                                        >{{$t->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">House No.</label>
                            <input type="text" name="hou_no" value="{{$address->hou_no}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Street</label>
                            <input type="text" name="street" value="{{$address->street}}"  class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Ward</label>
                            <input type="text" name="ward" value="{{$address->ward}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
