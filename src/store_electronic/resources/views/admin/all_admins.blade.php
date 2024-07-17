
@extends('admin_layout')
@section('admin_content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_admins as $admin)
        <tr>
            <td>{{ $admin->admin_id }}</td>
            <td>{{ $admin->admin_name }}</td>
            <td>{{ $admin->admin_email }}</td>
            <td>{{ $admin->admin_phone }}</td>
            <td>
                <a href="{{ URL::to('/laravel/php/edit-admin/'.$admin->admin_id) }}" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                <a href="{{ URL::to('/laravel/php/delete-admin/'.$admin->admin_id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa quản trị viên này không?')">Xóa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
