@extends('layouts.default')

@section('content')

<div class="card">
	<div class="card-header">
		<strong>ubah transaction</strong>
		<small>{{$item->uuid}}</small>
	</div>
	<div class="card-body card-block">
		<form action="{{ route('transaction.update', $item->id) }}" method="post">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="nama" class="form-control-label">nama pemesan</label>
				<!-- di value old(name) di gunakan agar jika data error maka user tidak harus memmasukkan data yang sama 
					di calss untuk memberikan notifikasi jika datanya error setelah di input
					di bawah input error untuk memberitahu jika inputan error setelah di input
					old (name) ? old (name) : $item ,jika tidak ada data old maka di ambil data dari database
				-->
				<input type="text" name="nama" value="{{old('nama') ? old('nama') : $item->nama }}" class="form-control @error('nama') is-invalid @enderror" />
				@error('name')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="email" class="form-control-label">email</label>
				<input type="text" name="email" value="{{old('email') ? old('email') : $item->email}}" class="form-control @error('email') is-invalid @enderror" />
				@error('email')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="number" class="form-control-label">nomor HP</label>
				<input type="text" name="number" value="{{old('number')  ? old('number') : $item->number}}" class="form-control @error('number') is-invalid @enderror" />
				@error('number')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="address" class="form-control-label">alamat</label>
				<input type="text" name="address" value="{{old('address') ? old('address') : $item->address}}" class="form-control @error('address') is-invalid @enderror" />
				@error('address')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit">Update transaksi</button>
			</div>
		</form>
	</div>
</div>

@endsection