
@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">

        <div class="fo">
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
                <div class="addr my-3">
                     <a href="{{ route('attachment.create' , $meeting->id) }}"  class="btn bg-c-blue">اصافة مرفق جديد</a>
                </div>
                <div class="addr my-3"><p class="fw-bold">مرفقات الاجتماع :
                    <strong>{{ $meeting->name }}</strong>
                </div>

                @if(count($attachments)>0 )
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
                                <a href="{{ route('attachment.edit',$attachment->id) }}" class=" p-1 btn bg-c-green btn-sm m-2">تعديل</a>
                                <form action="{{ route('attachment.delete',$attachment->id)}}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="حذف" class=" p-1 btn bg-c-red btn-sm m-2">
                                </form>
                                <a href="{{ route('download',$attachment->file) }}" class=" p-1 btn bg-c-yellow btn-sm m-2">تنزيل</a>
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
        </div>
    </div>
</div>
</div>
@endsection
