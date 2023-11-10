@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Masked Input</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage1" width="100px" src="{{ url('no-category-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image 1</label>
                                    <input  required type="file" class="form-control" name="image1" id="image1">
                                </div>
                            </div>

                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage2" width="100px" src="{{ url('no-category-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image 2</label>
                                    <input required type="file" class="form-control" name="image2" id="image2">
                                </div>
                            </div>

                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img  id="showImage3" width="100px" src="{{ url('no-category-image.jpg') }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image 3</label>
                                    <input required type="file" class="form-control" name="image3" id="image3">
                                </div>
                            </div>
                        </div>



                        <div class="row">


                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-subtitles" id="mdi-account"></span>
                                        </div>
                                        <input required type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">description</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-diamond-stone" id="mdi-account"></span>
                                        </div>
                                        <input required type="text" class="form-control" name="description"
                                            value="{{ old('description') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label for="type" class="form-label">Type</label>
                                    <select class="form-control" id="type" name="type" required>
                                        <option value="" disabled selected>Select a type</option>
                                        @foreach ($types as $item)
                                            <option value="{{ $item->id }}">{{ $item->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="row">
                    <div class="form-footer pt-5 border-top">
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Attach change event to all file inputs
            $('[type="file"]').change(function(e) {
                var reader = new FileReader();
                var imgId = $(this).attr('id').replace('image', 'showImage');

                reader.onload = function(e) {
                    $('#' + imgId).attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
