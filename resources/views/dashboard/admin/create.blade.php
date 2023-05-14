@php
use Illuminate\Support\Facades\Auth;

@endphp

@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                    <td>
                        <div class="addr my-3"><p class="fw-bold">إضافة مستخدم جديد  </div>
                    </td>
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
                    <form action="{{ route('store.user') }}" method="POST">
                        @csrf
                        <div class="row py-3">
                            <div class="col-3">
                                <label>الاسم الثلاثي   *  :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="الاسم" name="name">
                            </div>
                            <div class="col-3">
                                <label> لبريد الإلكتروني :</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="الايميل" name="email">
                            </div>
                            <div class="col-3">
                                <label> كلمة المرور :</label>
                                <input type="password" class="form-control" id="inputAddress" placeholder="الرقم السرى" name="password">
                            </div>
                            <div class="col-3">
                                <label> الصلاحيات:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Admin" name="role" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                     Admin
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio"  value="Super-Admin" name="role" id="flexRadioDefault2"
                                    @if (Auth::user()->role != 'Super-Admin') disabled @endif
                                    >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Super-Admin
                                    </label>
                                </div>


                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn bg-c-blue" value="اضافة مستخدم">
                        </div>
                    </form>
                </div>
            </div>
@endsection
