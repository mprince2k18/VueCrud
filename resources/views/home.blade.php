@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                  <post-component></post-component>
                  <get-component></get-component>
                  <delete-component></delete-component>
                  <edit-component></edit-component>

            </div>
        </div>
    </div>
</div>
@endsection
