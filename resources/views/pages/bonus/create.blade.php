@extends('layouts.master')
@section('title','Tambah Bonus Pegawai')
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
    <form action="{{ route('bonus.store') }}" method="POST">
      @csrf
    <div class="form-row">
        <div class="form-group col-md-12">
            <label>Pembayaran</label>
            <input type="text" name="pembayaran[]" class="form-control" placeholder="Dalam Rupiah" id="pembayaran1" required>
        </div>
            <input type="hidden" name="pembayaran[]" class="form-control" placeholder="Dalam Rupiah" id="pembayaran2" readonly>
            <input type="hidden" name="pembayaran[]" class="form-control" placeholder="Dalam Rupiah" id="pembayaran3" readonly>
	</div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nama Pegawai</label>
            <input type="text" name="nama[]" class="form-control" id="nama" required>
        </div>
        <div class="form-group col-md-4">
            <label>Bonus dalam persen (%)</label>
            <input type="number" name="bonus[]" class="bonus form-control" id="bonus1" required>
        </div>
        <div class="form-group col-md-4">
            <label>Total Bonus dalam Rupiah</label>
            <input type="text" name="total_bonus[]" class="total_bonus form-control" id="total_bonus1" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nama Pegawai</label>
            <input type="text" name="nama[]" class="form-control" id="nama" required>
        </div>
        <div class="form-group col-md-4">
            <label>Bonus dalam persen (%)</label>
            <input type="number" name="bonus[]" class="bonus form-control" id="bonus2" required>
        </div>
        <div class="form-group col-md-4">
            <label>Total Bonus dalam Rupiah</label>
            <input type="text" name="total_bonus[]" class="total_bonus form-control" id="total_bonus2" readonly required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nama Pegawai</label>
            <input type="text" name="nama[]" class="form-control" id="nama" required>
        </div>
        <div class="form-group col-md-4">
            <label>Bonus dalam persen (%)</label>
            <input type="number" name="bonus[]" class="bonus form-control" id="bonus3" required>
        </div>
        <div class="form-group col-md-4">
            <label>Total Bonus dalam Rupiah</label>
            <input type="text" name="total_bonus[]" class="total_bonus form-control" id="total_bonus3" readonly required>
        </div>
        {{-- <div class="form-group col-md-1">
            <label></label><br>
            <button type="button" class="addbonus btn btn-success"><i class="fa fa-plus"></i></button>
        </div> --}}
	</div>

    <div class="bonus"></div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <button class="btn btn-primary" style="margin-top:25px; " type="submit" id="btnClick"><i class="fa fa-save"></i> Simpan</button>
        </div>
	</div>
</div>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
	$('.addbonus').on('click', function(){
		addbonus();
	});
	function addbonus(){
		var bonus = '<div class="form-row"><div class="form-group col-md-4"><label>Nama Pegawai</label><input type="text" name="nama" class="form-control"></div><div class="form-group col-md-3"><label>Bonus dalam persen (%)</label><input type="number" name="bonus" id="bonus1" class="bonus form-control"></div><div class="form-group col-md-4"><label>Total Bonus dalam Rupiah</label><input type="text" name="total_bonus" id="total_bonus1" class="total_bonus form-control"></div><div class="form-group col-md-1"><label></label><br><button type="button" class="remove btn btn-danger"><i class="fa fa-remove"></i></button></div></div>';
		$('.bonus').append(bonus);
	};
	$('.remove').live('click', function(){
		$(this).parent().parent().parent().remove();
	});
</script> --}}
     
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        $("#pembayaran1,#pembayaran2,#pembayaran3,#bonus1, #bonus2, #bonus3").change(function() {
            var pembayaran1  = $("#pembayaran1").val();
            var bonus1 = $("#bonus1").val();
            var bonus2 = $("#bonus2").val();
            var bonus3 = $("#bonus3").val();


            var total_bonus1 = parseInt(bonus1) * parseInt(pembayaran1) / 100;
            var total_bonus2 = parseInt(bonus2) * parseInt(pembayaran1) / 100;
            var total_bonus3 = parseInt(bonus3) * parseInt(pembayaran1) / 100;
            var pembayaran2 = parseInt(pembayaran1);
            var pembayaran3 = parseInt(pembayaran1);
            var jumlah = parseInt(bonus1) + parseInt(bonus2) + parseInt(bonus3);
			var button = document.getElementById('btnClick');

            $("#total_bonus1").val(total_bonus1);
            $("#total_bonus2").val(total_bonus2);
            $("#total_bonus3").val(total_bonus3);
			$("#pembayaran2").val(pembayaran2);
            $("#pembayaran3").val(pembayaran3);

            if(jumlah > 100 || jumlah != 100){
			    button.disabled = true;
			    alert('Pembagian Bonus Masih Salah');
			}else{
			button.disabled = false;
			}
        });
    });
</script>


@endsection

