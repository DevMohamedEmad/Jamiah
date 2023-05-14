@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3">
                    <p class="fw-bold">
                    مرحبا بك
                    في نظام التصويت للجمعية العمومية بغرفة بيشة  </p>
                    <p class="text-danger"> تم إرسال كود التحقق إلى الرقم : {{ $company->phone }}</p>
                    <div class="row"  style="padding:10px;">
                        @if(count($errors) > 0)
                        @foreach ($errors->all() as $item)
                        <div class="alert alert-warning" role="alert">
كود التفعيل مطلوب

@endforeach
                        @endif
                        @if ($message = Session::get('success'))
                                  <div class="alert alert-success" role="alert">
{{ $message }}
                                </div>
                        @endif
                    </div>
                </div>
                <div class="form1 m-4">
                    <form action="{{ route('verifyMessage' , $company) }}" method="POST">
                        @csrf
                        <div class="row pb-3">
                            <div class="col-lg-4 col-md-6">
                                <label>رقم التحقق :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="xxxx" name="number" >
                            </div>
                            <input type="text" class="form-control" id="inputAddress" value="{{ $meeting->id }}" name="meeting" hidden >

                        </div>
                        <div>
                            <input type="submit" class="btn bg-c-green" value="تم">
                        </div>
                    </form>
                </div>
            </div>
@endsection
