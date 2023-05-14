@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr"><p class="fw-bold">تعديل الاجتماع </p>  </div>
                    <div class="row"  >
                        @if(count($errors) > 0)
                        @foreach ($errors->all() as $item)
                        <div class="alert alert-primary" role="alert">
                            {{$item}}
                        </div>
                        @endforeach
                        @endif
                        @if ($message = Session::get('success'))
                                  <div class="alert alert-primary" role="alert">
                                          {{$message}}
                                  </div>
                        @endif
                    </div>
                <div class="form1 m-4">
                    <form action="{{ route('update.meeting',$meeting) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="row py-3">
                            <div class="col-4">
                                <label>اسم الاجتماع :</label>
                                <input type="text" class="form-control" id="inputAddress" value="{{ $meeting->name }}" name="name">
                            </div>
                            <div class="col-4">
                                <label> تاريخ الاجتماع :</label>
                                <input type="date" class="form-control" id="inputAddress" value="{{ $meeting->date }}" name="date">
                            </div>
                            <div class="col-4">
                                <label> وقت الاجتماع :</label>
                                <input type="time" class="form-control" id="inputAddress" value="{{ $meeting->time }}" name="time">
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-4">
                                <label>رابط الاجتماع :</label>
                                
                                <input type="longtext" class="form-control" id="inputAddress" value="{{ $meeting->link }}" name="link">
                            </div>
                            <div class="col-4">
                                  <label>تحويل الملف من إلى csv</label>
                                  <br>
                                  <a href="https://cloudconvert.com/xlsx-to-csv" class="btn bg-c-green" target="_blank">تحويل  csv</a>
                            </div>
                            <div class="col-4">
                                <label>المصوتين :  <span class="text-danger fs-6"> *برجاء التاكد ان امتداد الملف.csv</span></label>
                                <input type="file" class="form-control" id="inputAddress" name="companies">
                            </div>
                        </div>
                        <div class="row py-3">
                            <div>
                                <input type="submit" class="btn bg-c-blue" value="تعديل الاجتماع">
                            </div>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>
@endsection
