@php
use App\Models\meeting;

    $meetings = meeting::all()
@endphp

@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3">
                    <p class="fw-bold">

                    مرحبا بك
                    في نظام التصويت للجمعية العمومية بغرفة بيشة  </p>      <p class="text-danger">التصويت مغلق</p>
                    <div class="row"  style="padding:10px;">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                            {{session('error')}}
                    </div>
                    @endif
                    @if(session('success'))
                <div class="alert alert-success alert-dismissible">
               <p>{{session('success')}}</p>
                </div>
                @endif
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
                    <form action="{{ route('getCompany') }}" method="POST">
                        @csrf
                        <div class="row pb-3">
                            <div class="col-lg-4 col-md-6">
                                <label>  رقم السجل التجاري :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="585xxxxxxx " name="commercial_number" >
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label for=""></label>
                                <select class="form-select" aria-label="Default select example" name="meeting">
                                    <option selected>اختار الاجتماع :</option>
                                    @foreach ($meetings as $meeting)
                                    <option value="{{ $meeting->id }}">{{ $meeting->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn bg-c-blue" value="التالي">
                        </div>
                    </form>
                </div>
            </div>
@endsection
