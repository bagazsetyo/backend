@extends('layouts.default')

@section('content')

<div class="orders">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="box-title">daftar foto barang <SMALL>{{ $product -> name }}</SMALL></h4>
				</div>
				<div class="card-body--">
					<div class="table-stats order-table ov-h">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>name barang</th>
									<th>foto</th>
									<th>default</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($items as $item)
								<tr>
									<td>{{$item -> id}}</td>
									<!-- karena relasi dengan product ,maka panggil nama tabel relasinya selanjutnya baru nama fildnya -->
									<td>{{$item ->product->name}}</td>
									<td>
										<img src="{{url($item->photo)}}" />
									</td>
									<td>{{$item ->is_default ? 'ya' : 'tidak'}}</td>
									<td>
										<form action="{{ route('products-galleries.destroy', $item->id) }}" method="post" class="d-inline">
											@csrf
											<!-- mengunakan delet dari bawan laravel -->
											@method('delete')
											<button class="btn btn-danger btn-sm">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
								@empty
									<tr>
										<td colspan="6" class="text-center p-5">
											data tidak tersedia
										</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection