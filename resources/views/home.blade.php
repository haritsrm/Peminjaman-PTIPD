@extends('layouts.app')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Data Barang</h4>
<form action="{{ route('pinjam') }}" method="post">
{{ csrf_field() }}
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {{! $i = 1 }}
        @foreach($val as $v)
        @if($v->type = "barang" && $v->stock != 0)
        <tr>
            <td><img src="/uploads/{{ $v->pict }}" style="width:150px" /></td>
            <td>{{ $v->name }}</td>
            <td>{{ $v->description }}</td>
            <td>{{ $v->stock }}</td>
            <td><span class="label label-success">Active</span></td>
            <td class="text-center">
                <div class="checkbox checkbox-right">
                    <label>
                        <input type="checkbox" name="barang[{{ $i }}]" id="check{{ $i }}" onclick="field()" value="{{ $v->id }}" class="styled">
                        <input type="number" name="jumlah[{{ $i }}]" id="jumlah{{ $i }}" min=1 max={{ $v->stock }} style="display:none">
                    </label>
                </div>
            </td>
        </tr>
        {{! $i++ }}
        @endif
        @endforeach
    </tbody>
</table>
<div class="text-right" style="margin-right:45%">
    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10">Pinjam!</button>
</div>
</form>
</div>
@endsection
