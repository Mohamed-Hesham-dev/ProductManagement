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
                                        <form action="{{ route('admin.categories.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <fieldset class="form-group">

                                                <div class="col-sm-9">
                                                    @error('name_en')
                                                        {{ $message }}
                                                    @enderror
                                                    <label>Category Name En</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <input class="form-control" type="text" name="name_en">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-sm-9">
                                                    @error('name_ar')
                                                        {{ $message }}
                                                    @enderror
                                                    <label>Category Name Ar</label>
                                                    <div class="position-relative">
                                                        <fieldset class="form-group">
                                                            <input class="form-control" type="text" name="name_ar">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div style="text-align: center;">
                                                <button type="submit" class="btn btn-primary">Add Category</button>
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
