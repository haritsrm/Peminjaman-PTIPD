@extends('layouts.admin-layout')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Daftar Peminjaman</h4>
<table class="table datatable-basic">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Status</th>
            @if (Request::is('admina/verifikasipeminjaman'))
                <th>Action</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @if (Request::is('admina/verifikasipeminjaman'))
            @foreach($val as $v)
                @if ($v->activate == 0)
                <tr>
                    <td><a href="#" data-toggle="modal" data-target="#modal{{ $v->kode }}">{{ $v->kode }}</a></td>
                    <td>
                        @if($v->activate == 0)
                            <span class="label label-primary">Pending</span>
                        @elseif($v->activate == 1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Blocked</span>
                        @endif
                    </td>
                        <td class="row">
                            <form action="/admina/acc/{{ $v->id }}" method="post" class="col-md-2">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success"><i class="icon-checkmark"></i> Acc</button>
                            </form>
                            <form action="/admina/block/{{ $v->id }}" method="post" class="col-md-2">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger"><i class="icon-blocked"></i> Block</button>
                            </form>
                        </td>
                </tr>
                <div id="modal{{ $v->kode }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Detail Peminjaman</h5>
                            </div>
                            {{! $x = App\Peminjaman::where('kode', $v->kode)->first() }}
                            <div class="form-horizontal">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama Peminjam:</label>
                                        <div class="col-lg-9">
                                            <label class="control-label">{{ App\User::find($x->user_id)->name }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal Pinjam:</label>
                                        <div class="col-lg-9">
                                            <input type="date" value="{{ $x->tgl_pinjam }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal Kembali:</label>
                                        <div class="col-lg-9">
                                            <input type="date" value="{{ $x->tgl_kembali }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Barang:</label>
                                        <div class="col-lg-9">
                                            <div class="row">
                                            {{! $barang = App\Peminjaman::where('kode', $v->kode)->get() }}
                                            @foreach($barang as $b)
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" data-popup="lightbox">
                                                                    <img src="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="media-heading">{{ App\Barang::find($b->barang_id)->name }}</h6>
                                                                <span class="text-muted">{{ $b->jumlah }} Buah</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            @foreach($val as $v)
                <tr>
                    <td><a href="#" data-toggle="modal" data-target="#modal{{ $v->kode }}">{{ $v->kode }}</a></td>
                    <td>
                        @if($v->activate == 0)
                            <span class="label label-primary">Pending</span>
                        @elseif($v->activate == 1)
                            <span class="label label-success">Active</span>
                        @else
                            <span class="label label-danger">Blocked</span>
                        @endif
                    </td>
                </tr>
                <div id="modal{{ $v->kode }}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">Detail Peminjaman</h5>
                            </div>
                            {{! $x = App\Peminjaman::where('kode', $v->kode)->first() }}
                            <div class="form-horizontal">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Nama Peminjam:</label>
                                        <div class="col-lg-9">
                                            <label class="control-label">{{ App\User::find($x->user_id)->name }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal Pinjam:</label>
                                        <div class="col-lg-9">
                                            <input type="date" value="{{ $x->tgl_pinjam }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Tanggal Kembali:</label>
                                        <div class="col-lg-9">
                                            <input type="date" value="{{ $x->tgl_kembali }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Barang:</label>
                                        <div class="col-lg-9">
                                            <div class="row">
                                            {{! $barang = App\Peminjaman::where('kode', $v->kode)->get() }}
                                            @foreach($barang as $b)
                                                <div class="col-lg-5 col-md-6">
                                                    <div class="panel panel-body">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a href="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" data-popup="lightbox">
                                                                    <img src="/uploads/{{ App\Barang::find($b->barang_id)->pict }}" class="img-circle img-lg" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="media-body">
                                                                <h6 class="media-heading">{{ App\Barang::find($b->barang_id)->name }}</h6>
                                                                <span class="text-muted">{{ $b->jumlah }} Buah</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </tbody>
</table>
</div>
@endsection