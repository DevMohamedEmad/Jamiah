@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="fo">
                <div class="addr"><p class="fw-bold">تعديل الاجتماع </p>  </div>
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
                <div class="form1 m-4">
                    <div class="row">
                        <div class="addr my-3"><p class="fw-bold">تعديل المرفق : {{$attachment->name }} </p>  </div>
                        <table class="table caption-top">
                            <tbody id="inputs">
                                <form action="{{ route('attachment.update' , $attachment->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <tr class="text-center">
                                        <td>
                                            <input type="text" class="form-control" id="inputAddress" value="{{ $attachment->name }}" name="name">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control"  name="file">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="submit" class="btn bg-c-blue" value="حفظ المرفقات">
                                        </td>
                                    </tr>
                                </form>

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
@endsection
