@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Masked Input</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="mb-5">
                                    <img id="showImage" width="100px"
                                        src="{{ $user->image ? asset('images/users/' . $user->image) : url('no-image.png') }}"
                                        alt="User Image">
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $user->name }}"
                                            placeholder="{{ $user->name == '' ? 'No data inserted here' : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                        </div>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}"
                                            placeholder="{{ $user->email == '' ? 'No data inserted here' : '' }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Phone Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $user->phone }}"
                                            placeholder="{{ $user->phone == '' ? 'No data inserted here' : '' }}">
                                    </div>
                                </div>
                            </div>
     <!-- Your other form fields -->

                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="CV" class="form-label">CV</label>
                                    <input type="file" class="form-control-file" id="CV" name="CV" accept="file/*">
                                    @if ($user->CV)
                                        <span>Current CV: {{ $user->CV }}</span>
                                    @endif
                                    @error('CV')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
