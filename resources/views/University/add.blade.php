@extends('layouts.app')

@section('content')



<div class="container" style="padding-top:50px">

        <form method="POST" action="adduniversity">
                @csrf

                <label for="uniNmae">University Name: </label>
                <input type="text" name="uniNmae">

                
                <label for="intro">University intro: </label>
                <input type="text" name="intro">


                <button type="submit">Submit</button>
        </form>

</div>

@endsection
