@extends('layouts.layout')
@section('content')

    <section class="account-option">
        <div class="container" style="text-align: center;">
            <div class="inner-box">
                <div class="text-box" style="position: relative;">
                    <h4 style="display: inline-block; font-size: 24px;">Admin login</h4>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="resum-form padd-tb">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="card mb-5">
                <div class="card-header">
                    <h2></h2>
                </div>
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="inner-box" style="text-align: center;">
                            <div class="text-box" style="position: relative;">
                                <h5 class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</h5>
                                @php
                                    Session::forget('status');
                                    Session::forget('message');
                                @endphp
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('adminPostLogin') }}" method="POST" id="admin-login-form" data-parsley-validate="">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <label for="email" class="label-with-star">ইমেইল <span class="star text-danger">
                                        *</span></label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="" required
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text text-danger">{{ $errors->first('email') }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <label for="password" class="label-with-star">পাসওয়ার্ড <span class="star text-danger">
                                        *</span></label>
                                <input name="password" type="password" class="form-control" placeholder="" required
                                    value="{{ old('password') }}">
                                @error('password')
                                    <span class="text text-danger">{{ $errors->first('password') }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="btn-col">
                                    <input type="submit" value="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </section>
@endsection
