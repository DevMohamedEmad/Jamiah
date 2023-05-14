@php
 use App\Models\meeting_company;
 use App\Models\vote;
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3"><p class="fw-bold">بيان بالمصوتين للاجتماع :  </div>
                        <div class="addr my-3">
                                  <a href=""><button onclick="window.print()" type="button" class="btn bg-c">طباعة</button></a>
                              </div>
                <div class="form1 m-4">
                    <form>
                        <table class="table caption-top">
                            <thead class="text-center">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم المنشأة</th>
                                <th scope="col">اسم المصوت</th>
                                <th scope="col">رقم السجل التجاري</th>
                                <th scope="col">رقم الجوال</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                              
                                <tr class="text-center">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->owner_name }}</td>
                                    <td>{{ $company->commercial_number }}</td>
                                    <td>{{ $company->phone }}</td>
                                </tr>
                            </tbody>
                          </table>
                    </form>
                </div>
                    <div class="col-6">
                        <h4>الاجتماعات</h4>
                    </div>  
                <div class="form1 m-4">
                    <form>
                        <table class="table caption-top">
                            <thead class="text-center">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم الاجتماع</th>
                                <th scope="col">تاريخ الجتماع</th>
                                <th scope="col">معاد الاجتماع  </th>
                                <th scope="col">المشاركة </th>
                                <th scope="col">عدد التصويتات </th>

                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                             @foreach($company->meetings as $meeting)
                             @php
                             $flag = 0;
                               $mc = meeting_company::where('company_id' , $company->id)->where('meeting_id' , $meeting->id)->first();
                               $mas = $meeting->attachments;
                               $cvs = vote::where('company_id',$company->id)->get();
                               if($cvs == [] || $mas==[]){
                                 $flag = 0;
                               }else{
                                 foreach($cvs as $vote){
                                   if($vote->attachment->meeting_id == $meeting->id){
                                   $flag++;
                                   }
                                 }
                               }
                             @endphp
                                <tr class="text-center">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $meeting->name }}</td>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->time }}</td>
                                    <td>{{ $mc->attendance }}</td>
                                    <td>{{ $flag }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                    </form>
                </div>
              
            </div>
@endsection

