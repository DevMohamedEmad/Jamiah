@extends('layouts.main')
@section('content')
<div class="container">
        <div class="row">
            <div class="fo">
                    <td>
                        <div class="addr my-3"><p class="fw-bold">مستخدمين النظام  </div>
                        <a href="{{ route('create.user') }}" class="text-dark p-1"><button type="button" class="btn bg-c-green btn-sm"> إضافة مستخدم</button></a>
                    </td>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                   <p>{{session('success')}}</p>
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
          @if(count($errors) > 0)
          @foreach ($errors->all() as $item)
          <div class="alert alert-primary" role="alert">
              {{$item}}
          </div>
          @endforeach
          @endif
                <div class="form1 m-4">
                    <form>
                        <table class="table caption-top">
                            <thead class="text-center">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم الموظف</th>
                                <th scope="col">البريد الإلكتروني</th>
                                <th scope="col">إجراءات</th>
                              </tr>

                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="text-center">
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (auth()->user()->role == 'Super-Admin')
                                        <a href="{{ route('delete.user' ,$user->id ) }}" class="text-dark p-1"><button type="button" class="btn bg-c-red btn-sm"> حذف</button></a>
                                        <a href="{{ route('edit.user' ,$user->id ) }}" class="text-dark p-1"><button type="button" class="btn bg-c-yellow btn-sm"> ترقية الموظف</button></a>
                                        @else
                                        <h6>ليس لديك صلاحيات التعديل أو الحذف </h6>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                        </tbody>

                    </table>
                    </form>
                    <div class="container">
                        {{ $users->links() }}
                      </div>
                </div>

            </div>

@endsection

