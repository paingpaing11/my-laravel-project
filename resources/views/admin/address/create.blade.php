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
                <strong>Whoops!</strong> something we are problems with your input.<br/><br/>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add Info
                    <a href="{{route('address.index')}}" class="btn btn-danger float-end">Back</a>
                </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="">City</label>
                            <div class="form-group">
                                <select name="city_slug" class="col-sm-2 p-2">
                                    @foreach ($cities as $c)
                                        <option value="{{$c->slug}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Township</label>
                            <div class="form-group">
                                <select name="town_slug" class="col-sm-2 p-2">
                                    @foreach ($towns as $t)
                                        <option value="{{$t->slug}}">{{$t->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">House No.</label>
                            <input type="text" name="hou_no"  class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Street</label>
                            <input type="text" name="street"  class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Ward</label>
                            <input type="text" name="ward"  class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Info</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
