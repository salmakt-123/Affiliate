@extends('layout')
  
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users List</h2>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
     <tr>
       <th>No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Total Point</th>
       <th width="280px">Action</th>
     </tr>
     @foreach ($data as $key => $user)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!is_null($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
            <label class="badge badge-success">{{ $user->totalPoint() }}</label>
        </td>
        <td>
           <a class="btn btn-info" href="{{ route('roles.index') }}/{{$user->id}}">Manage role</a>
           <!-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!} -->
        </td>
      </tr>
     @endforeach
    </table>
</div>
@endsection