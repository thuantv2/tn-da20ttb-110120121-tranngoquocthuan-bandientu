@extends('admin_layout')
@section('admin_content')
<div class="card">
    <div class="card-header">
        Chỉnh sửa quản trị viên
    </div>
    <div class="card-body">
        <form action="{{ URL::to('/laravel/php/update-admin/'.$edit_admin->admin_id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên quản trị viên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $edit_admin->admin_name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $edit_admin->admin_email }}">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $edit_admin->admin_phone }}">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu mới (nếu thay đổi)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</div>
@endsection
