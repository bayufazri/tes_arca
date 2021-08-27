@extends('layouts.master')
@section('title','Lihat Bonus Pegawai')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Lihat Data Bonus Pegawai
    <a href={{ route('bonus.index') }} style="float:right;color:white" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></h3>
</div>
   
<div class="panel-body">
    <table>
        <tr>
            <td><h4>Nama</h4></td>
            <td><h4>:</h4></td>
            <td><h4> {{ $bonus->nama }}</h4></td>
        </tr>
        <tr>
            <td><h4>Pembayaran</h4></td>
            <td><h4>:</h4></td>
            <td><h4>{{ $bonus->pembayaran }}</h4></td>
        </tr>
        <tr>
            <td><h4>Bonus</h4></td>
            <td><h4>:</h4></td>
            <td><h4>{{ $bonus->bonus }} %</h4></td>
        </tr>
        <tr>
            <td><h4>Total Bpnus</h4></td>
            <td><h4>:</h4></td>
            <td><h4>{{ $bonus->total_bonus }} </h4></td>
        </tr>
    </table>
</div>


@endsection

