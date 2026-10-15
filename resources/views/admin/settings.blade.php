@extends('layouts.admin')

@section('title', 'Settings | Rolliepods Admin')

@section('panel')
<h3 class="section-title">Account</h3>
<dl class="kv">
    <dt>Username</dt><dd>{{ auth()->user()->name }}</dd>
    <dt>Email</dt><dd>{{ auth()->user()->email }}</dd>
    <dt>Role</dt><dd>{{ ucfirst(auth()->user()->role) }}</dd>
</dl>

<hr class="admin-divider">

<h3 class="section-title">Change password</h3>
<form method="POST" action="{{ route('admin.settings.password') }}" class="narrow-form" novalidate>
    @csrf @method('PUT')
    <div class="form-group"><label for="current_password">Current password</label>
        <input class="admin-input" id="current_password" type="password" name="current_password" autocomplete="current-password"></div>
    <div class="form-group"><label for="password">New password (min 8 characters)</label>
        <input class="admin-input" id="password" type="password" name="password" autocomplete="new-password"></div>
    <div class="form-group"><label for="password_confirmation">Confirm new password</label>
        <input class="admin-input" id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password"></div>
    @if($errors->any())<ul class="form-errors" role="alert">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>@endif
    <button type="submit" class="btn-save">Update password</button>
</form>
@endsection
