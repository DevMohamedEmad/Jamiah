@php

use App\Models\meeting_company;

$mc = meeting_company::where('company_id' , $company->id)->where('meeting_id' , $meeting->id)->first();

@endphp

@extends('layouts.user')


@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3">
                    <p class="fw-bold">التصويت على بنود الاجتماع :</p>
                </div>
                <div class="row"  style="padding:5px;">
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
                <div class="form1">
                    {{-- <form> --}}
                        <h5>المؤسسة : </h5>
                        <div class="row py-1">
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label>اسم المالك / المدير  :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="{{ $company->owner_name }}" disabled>
                            </div>
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label> اسم المنشأة :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="{{ $company->name }}" disabled>
                            </div>
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label> رقم الجوال :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="{{ $company->phone }}" disabled>
                            </div>
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label> رقم السجل التجاري :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="{{ $company->commercial_number}}" disabled>
                            </div>
                        </div>
                        <hr>
                        @if ($attachments != [])
                        <div class="w-50" style="display: inline-block">
                            <h5>اسم الاجتماع : &nbsp; <strong>{{ $meeting->name }}</strong>
                            </h5>

                        </div>
                        <div class="row py-1">
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label> تاريخ الاجتماع  :</label>
                                <input type="text" class="form-control"  placeholder="{{ $meeting->date }}" disabled>
                            </div>
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label>توقيت الاجتماع :</label>
                                <input type="text" class="form-control"  placeholder="{{ $meeting->time}}" disabled>
                            </div>
                            <div class="col-lg-3 col-md-6 pb-2">
                                <label> رابط الحضور:</label>
                                <input type="text" class="form-control"  value="{{ $meeting->link}}" disabled >
                            </div>
                            <div class="col-lg-3 col-md-6  ">
                                                               
                                 <label for="">حالة الحضور</label>
                                @if($mc->attendance == 'لم تحدد')
                                <form  class="text-center p-1" style="background-color: #ccc" action="{{ route('company.attendance',$company->id) }}" method="post">
                                    @csrf
                                    <input type="number" name="meeting" value="{{$meeting->id}}"  hidden>
                                    <input type="submit" name="attendance" value="حاضر" class=" p-1 btn bg-c-red btn-sm m-1">
                                    <input type="submit" name="attendance" value="معتزر" class=" p-1 btn bg-c-blue btn-sm m-1">
                               </form>
                               @else 
                                <input type="text" class="form-control"  value="{{ $mc->attendance}}" disabled >
                               @endif
                        @endif
                            </div>
                        </div>


                    @if($attachments )
                        <table class="table caption-top">
                            <thead class="text-center">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">عنوان المرفق</th>
                                <th scope="col">التصويت</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($attachments as $attachment)
                                <tr class="text-center">
                                    <th scope="row">{{ $counter++ }}</th>
                                    <td>{{ $attachment->name }}</td>
                                    <td>
                                        <form action="{{ route('store.vote') }}" method="post" class="d-inline">
                                       @csrf
                                            <input type="text" hidden name="attachment_id" value="{{ $attachment->id }}">
                                            <input type="text" hidden name="company_id" value="{{ $company->id }}">
                                            <input type="text" hidden name="vote" value="2">
                                            <input type="submit" value="موافق" class=" p-1 btn bg-c-green btn-sm m-2">
                                        </form>
                                        <form action="{{ route('store.vote') }}" method="post" class="d-inline">
                                            @csrf
                                                 <input type="text" hidden name="attachment_id" value="{{ $attachment->id }}">
                                                 <input type="text" hidden name="company_id" value="{{ $company->id }}">
                                                 <input type="text" hidden name="vote" value="1">
                                                 <input type="submit" value="تحفظ" class=" p-1 btn bg-c-yellow btn-sm m-2">
                                        </form>
                                        <form action="{{ route('store.vote') }}" method="post" class="d-inline">
                                                    @csrf
                                                         <input type="text" hidden name="attachment_id" value="{{ $attachment->id }}">
                                                         <input type="text" hidden name="company_id" value="{{ $company->id }}">
                                                         <input type="text" hidden name="vote" value="0">
                                                         <input type="submit" value="رفــض" class=" p-1 btn bg-c-red btn-sm m-2">
                                        </form>
                                        <a href="{{ route('download',$attachment->file) }}" class="text-dark p-1"><button type="button" class="btn bg-c-black btn-sm m-2"> تنزيل</button></a>
                                    </td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info ">
                            <p class="text-center">لا يوجد بيانات </p>
                        </div>
                    @endif
                    {{-- </form> --}}
                    <div class="container">
                        @if (count($attachments) > 0)
                        {{ $attachments->links() }}

                        @endif
                      </div>
                </div>
            </div>
      @endsection
