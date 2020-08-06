@extends('layouts.default')

@section('content')

<div class="card">
	<div class="card-header">
		<strong>ubah barang</strong>
		<small>{{$item->name}}</small>
	</div>
	<div class="card-body card-block">
		<form action="{{ route('products.update', $item->id) }}" method="post">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="name" class="form-control-label">nama barang</label>
				<!-- di value old(name) di gunakan agar jika data error maka user tidak harus memmasukkan data yang sama 
					di calss untuk memberikan notifikasi jika datanya error setelah di input
					di bawah input error untuk memberitahu jika inputan error setelah di input
					old (name) ? old (name) : $item ,jika tidak ada data old maka di ambil data dari database
				-->
				<input type="text" name="name" value="{{old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror" />
				@error('name')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="type" class="form-control-label">type barang</label>
				<input type="text" name="type" value="{{old('type') ? old('type') : $item->type}}" class="form-control @error('type') is-invalid @enderror" />
				@error('type')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="price" class="form-control-label">price barang</label>
				<input type="number" name="price" value="{{old('price')  ? old('price') : $item->price}}" class="form-control @error('price') is-invalid @enderror" />
				@error('price')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<label for="quantity" class="form-control-label">quantity barang</label>
				<input type="number" name="quantity" value="{{old('quantity') ? old('quantity') : $item->quantity}}" class="form-control @error('quantity') is-invalid @enderror" />
				@error('quantity')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<!-- class -> ck editor scripnya ada di view/includes/script -->
			<div class="form-group">
				<label for="description" class="form-control-label">deskripsi barang</label>
				<textarea name="description" class="form-control @error('description') is-invalid @enderror ckeditor">{{old('description') ? old('description') : $item->description}}</textarea>
				@error('description')<div class="text-muted">{{ $massage }}</div> @enderror
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit">Update barang</button>
			</div>
		</form>
	</div>
</div>

@endsection