
@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">
        <div class="fo">
                <div class="addr my-3">
                    <a href="{{ route('create.meeting') }}" type="button" class="p-1 btn bg-c-blue btn-sm m-2">اصافة اجتماع جديد</a>
                </div>
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
                <div class="addr my-3"><p class="fw-bold">إحصائيات الاجتماع :
                    <table class="table table-hover">
                        <thead>
                          <tr align="center">
                            <th scope="col">#</th>
                            <th scope="col">اسم الاجتماع</th>
                            <th scope="col">اجمالى عدد المرفقات</th>
                            <th scope="col">اجمالى عدد التصويتات</th>
                            <th scope="col">تاريخ الاجتماع</th>
                            <th scope="col">وقت الاجتماع </th>
                            <th scope="col">التحكم</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($meetings as $meeting)
                            <tr align="center">
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $meeting->name }}</td>
                                <td>{{ count($meeting->attachments) }}</td>
                                <td>{{ $meeting->count_votes }}</td>
                                <td >{{ $meeting->date }}</td>
                                <td>{{ $meeting->time }}</td>
                                <td>
                                    @if (auth()->user()->role == 'Super-Admin')
                                    <a href="{{ route('delete.meeting',$meeting->id) }}" class=" p-1 btn bg-c-yellow btn-sm m-2">حذف</a>
                                    @endif
                                    <a href="{{ route('edit.meeting',$meeting->id) }}" class=" p-1 btn bg-c-red btn-sm m-2">تعديل</a>
                                    <a href="{{ route('show.meeting',$meeting->id) }}" class=" p-1 btn bg-c-blue btn-sm m-2">عرض</a>
                                    <a href="{{ route('attachments',$meeting->id) }}" class=" p-1 btn bg-c-yellow btn-sm m-2">المرفقات</a>
                                    <a  href="{{ route('download',$meeting->file) }}" class=" p-1 btn bg-c-green btn-sm m-2">تنزيل</a>
                                    <a href="{{ route('vote.meeting',$meeting->id) }}" class=" p-1 btn bg-c-blue btn-sm m-2">المؤسسات</a>
                                </td>
                              </tr>
                            @endforeach

                        </tbody>
                      </table>
                      <div class="container">
                        {{ $meetings->links() }}
                      </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
