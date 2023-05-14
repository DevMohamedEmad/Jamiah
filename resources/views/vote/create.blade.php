@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3">
                    <p class="fw-bold">التصويت على بنود الاجتماع :</p>
                </div>
 @if ($message != '')
                                  <div class="alert alert-primary" role="alert">
                                          {{$message}}
                                  </div>
                        @endif
                <div class="form1 m-4">
                    {{-- <form> --}}
                        <div class="row py-3">
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
                                        <a href="{{ route('download',$attachment->id) }}" class="text-dark p-1"><button type="button" class="btn bg-c-black btn-sm m-2"> تنزيل</button></a>
                                    </td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info ">
                            <p class="text-center">لايوجد بيانات </p>
                        </div>
                    @endif
                    {{-- </form> --}}
                </div>
            </div>
      @endsection
