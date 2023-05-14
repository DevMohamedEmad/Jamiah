@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr my-3"><p class="fw-bold">بيان بالمصوتين للاجتماع :  </div>
                    <div class="col-6">
                        <select id="inputState" class="form-control">
                            @if($meeting != [])
                            <option value="{{ $meeting->id }}">{{ $meeting->name }}</option>
                            @endif
                        </select>
                    </div>
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
                                <th scope="col">المشاركة </th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @if($votes != [])

                                @foreach ($votes as $vote)
                                <tr class="text-center">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $vote->company->name }}</td>
                                    <td>{{ $vote->company->owner_name }}</td>
                                    <td>{{ $vote->company->commercial_number }}</td>
                                    <td>{{ $vote->company->phone }}</td>
                                    <td>{{ $vote->attendance }}</td>
                                </tr>
                                @endforeach
@endif
                            </tbody>
                          </table>
                    </form>

                    <div class="container">
                        {{ $votes->links() }}
                      </div>
                </div>
            </div>
@endsection

