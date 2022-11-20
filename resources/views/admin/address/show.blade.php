@extends('admin.address.layout')
@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h1 class="text-secondary text-center">Address Page</h1>
        </div>
    </div><br/><br/>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>City & State</th>
            <th>Township</th>
            <th>House No.</th>
            <th>Street</th>
            <th>Ward</th>
        </tr>
        
        <tr>
            <td>{{$address->id}}</td>
            
            <td>
                @foreach ($cities as $c)
                    @if($c->id==$address->city_id)
                        {{$c->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($towns as $t)
                    @if($t->id==$address->township_id)
                        {{$t->name}}
                    @endif
                @endforeach
            </td>
            <td>{{$address->hou_no}}</td>
            <td>{{$address->street}}</td>
            <td>{{$address->ward}}</td>
        </tr>
    </table><br/>
    <div class="text-center">
        <a class="btn btn-danger" href="{{ route('address.index') }}"> Back</a>
    </div>
@endsection
