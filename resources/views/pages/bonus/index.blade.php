@extends('layouts.master')
@section('title','Data Bonus Pegawai')
@section('content')

<div class="panel-heading">
    <h3 class="panel-title">Data Bonus Pegawai</h3>
       @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
</div>

<a href="{{ route('bonus.create') }}" class="btn btn-success" style="margin-left:25px;margin-bottom:20px;"><i class="fa fa-plus" style="margin-right:10px; "></i>Tambah Data</a>
<div class="panel-body">
    <div class="panel-body no-padding">
        <table class="table table-bordered"  id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pegawai</th>
                    <th>Pembayaran</th>
                    <th>Bonus dalam Persen (%)</th>
                    <th>Jumlah Bonus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bonus as $bonus)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $bonus->nama }}</td>
                    <td>{{ $bonus->pembayaran }}</td>
                    <td>{{ $bonus->bonus }}</td>
                    <td>{{ $bonus->total_bonus }}</td>
                    <td>
                        <form action="{{ route('bonus.destroy', $bonus->id) }}" method="POST">
                           <a class="btn btn-primary btn-action" href="{{ route('bonus.show',$bonus->id) }}"><i class="fa fa-eye"></i></a>
                           <a class="btn btn-info btn-action" href="{{ route('bonus.edit',$bonus->id) }}"><i class="fa fa-pencil"></i></a>
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action" onclick="return confirm('Anda Yakin ?')"><i class="fa fa-trash"></i></button>
                        </form>
                   </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">Data Tidak Tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


@endsection