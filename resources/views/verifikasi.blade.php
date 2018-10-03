@extends('layouts.app')

@section('content')
<div class="panel panel-flat">
<h4 class="container">Verifikasi Peminjaman</h4>
<form action="{{ route('verifikasi') }}" class="form-horizontal" method="post">
    {{ csrf_field() }}
        <div class="panel-body">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nama Peminjam:</label>
                <div class="col-lg-9">
                    <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Tanggal Pinjam:</label>
                <div class="col-lg-9">
                    <input type="date" name="tgl_pinjam">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Tanggal Kembali:</label>
                <div class="col-lg-9">
                    <input type="date" name="tgl_kembali">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Barang:</label>
                <div class="col-lg-9">
                    <div class="row">
                    {{! $y = count($req->jumlah) }}
                    {{! $j = 1 }}
                    @for($i = 1; $i <= $y; $i++)
                        @if ($req->jumlah[$i] && $req->barang[$i])
						<div class="col-lg-3 col-md-6">
							<div class="panel panel-body">
								<div class="media">
									<div class="media-left">
										<a href="/uploads/{{ App\Barang::find($req->barang[$i])->pict }}" data-popup="lightbox">
											<img src="/uploads/{{ App\Barang::find($req->barang[$i])->pict }}" class="img-circle img-lg" alt="">
										</a>
									</div>
                                    <input type="hidden" name="barang[{{ $j }}]" value="{{ $req->barang[$i] }}">
                                    <input type="hidden" name="jumlah[{{ $j }}]" value="{{ $req->jumlah[$i] }}">
									<div class="media-body">
                                        <h6 class="media-heading">{{ App\Barang::find($req->barang[$i])->name }}</h6>
                                        <span class="text-muted">{{ $req->jumlah[$i] }} Buah</span>
									</div>
								</div>
							</div>
                        </div>
                        {{! $j++ }}
                        @endif
                    @endfor
                    </div>
                    
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
</form>
</div>
@endsection
