@extends('layout')
  
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Start Affiliations</h2>
                <h5>Click the bellow button to start affiliate</h5>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-4">
        <a class="btn btn-info" href="{{ route('affiliate') }}">Start affiliate</a>  
    </div>
</div>
@endsection