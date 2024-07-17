@extends('admin_layout')
@section('admin_content')
<div class="panel panel-default">
    <div class="panel-heading">
        Danh sách người dùng
    </div>
    <div class="panel-body">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
                {{ Session::forget('message') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <a href="{{ URL::to('laravel/php/edit-user/'.$user->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="{{ URL::to('laravel/php/delete-user/'.$user->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa người dùng này không?')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{ $all_users->links() }}
        </div>
    </div>
</div>
@endsection
