@extends('layout')
  
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Start Affiliations</h2>
                <h5>You can share this link to start affiliate</h5>
            </div>
        </div>
    </div>
    <div class="alert alert-success mt-4" role="alert">
        {{$link}}
    </div>
</div>
@endsection