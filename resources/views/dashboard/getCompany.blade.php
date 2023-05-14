@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3">
                    <p class="fw-bold">
                    <div class="row"  style="padding:10px;">

                </div>
                    <div class="row"  style="padding:10px;">
                        @if(count($errors) > 0)
                        @foreach ($errors->all() as $item)
                        <div class="alert alert-warning" role="alert">
                            {{$item}}
                         </div>    
                        @endforeach
                        @endif
                   
                </div>
                <div class="form1 m-4">
                    <form action="{{ route('company.get')}}" method="GET">
                        @csrf
                        <div class="row pb-3">
                            <div class="col-lg-4 col-md-6">
                                <label>  رقم السجل التجاري :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="585xxxxxxx " name="commercial_number" >
                            </div>

                           
                        </div>
                        <div>
                            <input type="submit" class="btn bg-c-blue" value="التالي">
                        </div>
                    </form>
                </div>
            </div>
@endsection
