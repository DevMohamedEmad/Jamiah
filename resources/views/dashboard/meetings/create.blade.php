@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3"><p class="fw-bold">إضافة اجتماع   </div>
                    <div class="row"  style="padding:10px;">
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
                    <form action="{{ route('store.meeting') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="row py-3">
                            <div class="col-4">
                                <label>اسم الاجتماع :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="اسم الاجتماع" name="name">
                            </div>
                            <div class="col-4">
                                <label> تاريخ الاجتماع :</label>
                                <input type="date" class="form-control" id="inputAddress" placeholder="تاريخ الاجتماع" name="date">
                            </div>
                            <div class="col-4">
                                <label> وقت الاجتماع :</label>
                                <input type="time" class="form-control" id="inputAddress" placeholder="وقت الاجتماع" name="time">
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-4">
                                <label>رابط الاجتماع :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="رابط الاجتماع " name="link">
                            </div>
                            
                            <div class="col-4">
                                  <label>تحويل الملف من xlsx الى csv</label>
                                  <br>
                                  <a href="https://cloudconvert.com/xlsx-to-csv" class="btn bg-c-green" target="_blank">تحويل  csv</a>
                            </div>
                            <div class="col-4">
                                <label>المصوتين :  <span class="text-danger fs-6"> *برجاء التاكد ان امتداد الملف.csv</span></label>
                                <input type="file" class="form-control" id="inputAddress" name="companies">
                            </div>
                                   
                    
                        </div>
                        <div class="row py-3">
                            <table class="table caption-top">
                                <tbody id="inputs">
                                    <tr class="text-center">
                                        <td scope="row" >
                                            <button id="plus" class="plus-icon ch1 bg-c-blue"><i class=" fa-solid fa-plus"></i></button>  </td>
                                        <td>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="اسم المرفق" name="attachment_name[]">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" id="inputAddress" placeholder="" name="file[]">
                                        </td>
                                    </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="row py-3">
                            <div>
                                <input type="submit" class="btn bg-c-blue" value="إضافة الاجتماع">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
