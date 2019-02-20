@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <div class=" container" style="text-align: center">
        <h1>
            <i class="fa fa-unlock" aria-hidden="true"></i>
            You are an Admin
        </h1>
        <br>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-4" >

            
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">

                        <div class="col-1">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </div>

                        <div class="col-10" style="text-align: center">
                            Add university
                        </div>

                    </div>
                </div>

                <div class="container" style="padding-top: 10px">
                    <div class="card-body" style="text-align: center">
                            <h1><a href="admin/adduniversity"> add university</a></h1>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>


        </div>
    </div>
</div>



@endsection
