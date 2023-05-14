@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="fo">
            <div class="addr my-3"><p class="fw-bold">بيان بالمصوتين :  </div>
                <div class="col-6">
                    <label> اختر الاجتماع *  :</label>
                    <select id="inputState" class="form-control">
                        @if ($meeting != [])
                        <option value="{{ $meeting->id }}">{{ $meeting->name }} </option>
                        @endif
                    </select>
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
                            $counter = 0;
                            @endphp
                            @foreach ($votes as $vote)
                            <tr class="text-center">
                                <th scope="row">{{$counter++}}</th>
                                <td>{{ $vote->company->name }}</td>
                                <td> {{ $vote->company->owner_name }}</td>
                                <td>{{ $vote->company->commercial_number }}</td>
                                <td>{{ $vote->company->phone }}</td>
                               </tr>
                            @endforeach

                        </tbody>
                      </table>
                </form>
            </div>
            <div class="addr my-3">
                                  <a href="{{ route('create.meeting') }}"><button onclick="window.print()" type="button" class="btn bg-c">طباعة</button></a>
                              </div>
        </div>
@endsection
