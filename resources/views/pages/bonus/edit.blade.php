@extends('layouts.master')
@section('title','Edit Bonus Pegawai')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Tambah Bonus Pegawai
    <a href={{ route('bonus.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
    
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi Kesalahan pada saat penginputan<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
   
<div class="panel-body">
    <form action="{{ route('bonus.update',$bonus->id) }}" method="POST">
        @method('PUT')
      @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" id="nama" value="{{ $bonus->nama }}">
        </div>
        <div class="form-group col-md-6">
            <label>Pembayaran</label>
            <input type="text" name="pembayaran" class="form-control" placeholder="Dalam Rupiah" id="pembayaran" value="{{ $bonus->pembayaran }}">
        </div>
	</div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Bonus dalam persen (%)</label>
            <input type="number" name="bonus" class="bonus form-control" id="bonus" value="{{ $bonus->bonus }}">
        </div>
        <div class="form-group col-md-6">
            <label>Total Bonus dalam Rupiah</label>
            <input type="text" name="total_bonus" class="total_bonus form-control" id="total_bonus" value="{{ $bonus->total_bonus }}" readonly>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <button class="btn btn-primary" style="margin-top:25px; " type="submit" id="btnClick"><i class="fa fa-save"></i> Update</button>
        </div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $("#pembayaran,#bonus").keyup(function() {
            var pembayaran  = $("#pembayaran").val();
            var bonus = $("#bonus").val();
            var total_bonus = parseInt(bonus) * parseInt(pembayaran) / 100;
			var button = document.getElementById('btnClick');

            $("#total_bonus").val(total_bonus);
        });
    });
</script>

@endsection

