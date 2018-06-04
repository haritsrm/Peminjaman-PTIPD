@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Data Admin</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Instansi</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
        @if($v->hasRole('admin'))
        <tr>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->alamat }}</td>
            <td>{{ $v->no_tlp }}</td>
            <td>{{ $v->instansi }}</td>
            <td>{{ $v->jabatan }}</td>
            <td><span class="label label-success">Active</span></td>
            <td class="text-center">
                <form method="post" action="{{ route('admin/suspend', $v->id) }}">
                    {{ csrf_field() }}
                    <center><input type="submit" class="btn btn-xs btn-danger" data-toggle="tooltip" value="Suspend Account"/></center>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>

<div class="panel panel-flat">
<h4 class="container">Data Admin Ter-suspend</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Instansi</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($val as $v)
        @if($v->hasRole('suspend'))
        <tr>
            <td>{{ $v->name }}</td>
            <td>{{ $v->email }}</td>
            <td>{{ $v->alamat }}</td>
            <td>{{ $v->no_tlp }}</td>
            <td>{{ $v->instansi }}</td>
            <td>{{ $v->jabatan }}</td>
            <td><span class="label label-success">Active</span></td>
            <td class="text-center">
                <form method="post" action="{{ route('admin/activate', $v->id) }}">
                    {{ csrf_field() }}
                    <center><input type="submit" class="btn btn-xs btn-success" data-toggle="tooltip" value="Activate Account"/></center>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
</div>
@endsection