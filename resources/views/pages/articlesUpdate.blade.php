@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Masked Input</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px"
                                        src="{{ $article->image1 == '' ? url('no-category-image.jpg') : asset('images/articles/' . $article->image1) }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image1</label>
                                    <input type="file" class="form-control" name="image1" id="image">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px"
                                        src="{{ $article->image2 == '' ? url('no-category-image.jpg') : asset('images/articles/' . $article->image2) }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image2</label>
                                    <input type="file" class="form-control" name="image2" id="image">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px"
                                        src="{{ $article->image3 == '' ? url('no-category-image.jpg') : asset('images/articles/' . $article->image3) }}">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Image3</label>
                                    <input type="file" class="form-control" name="image3    " id="image">
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
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $article->title }}">
                                    </div>
                                </div>
                            </div>
                         
                        
                            <div class="col-xl-6">
                                <div class="mb-5">
                                   <label for="typeId" class="form-label">Type</label>
                <select class="form-control" id="typeId" name="type" required>
                    <option value="" disabled selected>Select a type</option>
                    @foreach ($types as $item)
                        <option value="{{ $item->id }}" >
                            {{ $item->type }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Description</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-format-list-bulleted-type"
                                                id="basic-addon1"></span>
                                        </div>
                                        <textarea rows="5" class="form-control" name="description">{{ $article->description }}</textarea>
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
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
