@extends('admin.layout.master')
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">

                <section class="file-browser">

                    <div class="row match-height">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">

                                <div class="card-block">
                                    <div class="card-body">
                                        <form action="{{ route('profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <fieldset class="form-group">

                                                <div class="col-sm-9">
                                                    <label>الاسم</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <input class="form-control" type="text" name="name"
                                                                value="{{ Auth::guard('admin')->user()->name }}">
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9">
                                                    <label>البريد الإليكتروني</label>
                                                    <div class="position-relative has-icon-left">
                                                        <input class="form-control" type="email" id="inputEmail1"
                                                            placeholder="john@example.com" name="email"
                                                            value="{{ Auth::guard('admin')->user()->email }}">
                                                        <div class="form-control-position pl-1"><i
                                                                class="la la-envelope-o"></i></div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-sm-9">
                                                    <label>كلمة المرور</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <input class="form-control" type="password" name="password">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    <label>صورة الملف الشخصي</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <div class="custom-file">
                                                                <input class="custom-file-input" type="file" name="image">
                                                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                          </fieldset>
                                                        <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="avatar"
                                                        width="200px" height="200px">
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </fieldset>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-primary">تعديل الملف الشخصي</button>
                                            </div>
                                            <form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
