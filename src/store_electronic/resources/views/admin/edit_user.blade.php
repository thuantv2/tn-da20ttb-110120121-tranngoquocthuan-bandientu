@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        Sửa thông tin người dùng
    </div>
    <div class="panel-body">
        @foreach ($edit_user as $user)
            <form action="{{ URL::to('laravel/php/update-user/'.$user->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên người dùng</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới (nếu muốn thay đổi)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        @endforeach
    </div>
</div>
@endsection
