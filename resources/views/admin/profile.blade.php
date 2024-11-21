@extends('admin.layouts.master')
@section('title', 'Profile')
@section('content')
    <x-admin.layout.breadcrumb title="Profile"/>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="m-t-30 text-center">
                        <h4 class="card-title m-t-10">
                            {{ $user->name }}
                        </h4>
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <div class="card-body">
                    <small class="text-muted d-inline-block my-2">
                        @lang('Email address')
                    </small>
                    <h6>
                        {{ $user->email }}
                    </h6>
                    <small class="text-muted d-inline-block my-2">
                        @lang('Phone number')
                    </small>
                    <h6>
                        {{ $user->phone }}
                    </h6>
                    <small class="text-muted d-inline-block my-2">
                        @lang('WhatsApp')
                    </small>
                    <h6>
                        {{ $user->whatsapp }}
                    </h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-normal">
                        @lang('Update Information')
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name" class="col-md-12 mb-1">
                                Ad
                            </label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Name" name="name" required autofocus maxlength="255"
                                       autocomplete="name" value="{{ old('name', $user->name) }}" id="name"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->get('name')])/>
                            </div>
                            @error('name')
                            <div class="text-danger font-weight-bold mt-1" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-md-12 mb-1">
                                Phone number
                            </label>
                            <div class="col-md-12">
                                <input type="tel" placeholder="Phone number" name="phone" id="phone" required
                                       autocomplete="phone" value="{{ old('name', $user->phone) }}" maxlength="255"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->get('phone')])/>
                            </div>
                            @error('phone')
                            <div class="text-danger font-weight-bold mt-1" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="whatsapp" class="col-md-12 mb-1">
                                WhatsApp
                            </label>
                            <div class="col-md-12">
                                <input type="tel" placeholder="WhatsApp" name="whatsapp" id="whatsapp"
                                       autocomplete="phone" value="{{ old('name', $user->whatsapp) }}" maxlength="255"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->get('whatsapp')])/>
                            </div>
                            @error('whatsapp')
                            <div class="text-danger font-weight-bold mt-1" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-12 mb-1">
                                E-mail
                            </label>
                            <div class="col-md-12">
                                <input type="email" placeholder="Email" name="email" id="email" autocomplete="email"
                                       value="{{ old('name', $user->email) }}" maxlength="255" required
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->get('email')])/>
                            </div>
                            @error('email')
                            <div class="text-danger font-weight-bold mt-1" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary text-white">
                                    @lang('Save changes')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-normal">
                        @lang('Change Password')
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="current_password" class="col-md-12 mb-1">
                                Current Password
                            </label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Current Password" name="current_password"
                                       autocomplete="current-password" id="current_password" maxlength="255"
                                       minlength="8"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->updatePassword->get('current_password')])/>
                            </div>
                            @if($errors->updatePassword->get('current_password'))
                                @foreach($errors->updatePassword->get('current_password') as $message)
                                    <div class="text-danger font-weight-bold mt-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-12 mb-1">
                                New Password
                            </label>
                            <div class="col-md-12">
                                <input type="password" placeholder="New Password" name="password" id="password"
                                       autocomplete="new-password" maxlength="255" required minlength="8"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->updatePassword->get('password')])/>
                            </div>
                            @if($errors->updatePassword->get('password'))
                                @foreach($errors->updatePassword->get('password') as $message)
                                    <div class="text-danger font-weight-bold mt-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-12 mb-1">
                                Confirm Password
                            </label>
                            <div class="col-md-12">
                                <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                       id="password_confirmation" maxlength="255" required autocomplete="new-password"
                                       minlength="8"
                                    @class(['form-control form-control-line', 'is-invalid' => $errors->updatePassword->get('password_confirmation')])/>
                            </div>
                            @if($errors->updatePassword->get('password_confirmation'))
                                @foreach($errors->updatePassword->get('password_confirmation') as $message)
                                    <div class="text-danger font-weight-bold mt-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary text-white">
                                    @lang('Save changes')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-normal">
                        @lang('Delete Account')
                    </h4>
                </div>
                <form class="card-body" action="{{ route('admin.profile.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="form-group">
                        <label for="password" class="col-md-12 mb-1">
                            Password
                        </label>
                        <div class="col-md-12 mt-3">
                            <input type="password" placeholder="Password" name="password" required maxlength="255"
                                   autocomplete="password" id="password" minlength="8"
                                @class(['form-control form-control-line', 'is-invalid' => $errors->userDeletion->get('password')])/>
                        </div>
                        @if($errors->userDeletion->get('password'))
                            @foreach($errors->userDeletion->get('password') as $message)
                                <div class="text-danger font-weight-bold mt-1" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn btn-danger w-100">
                        @lang('Delete Account')
                    </button>
                </form>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
