@extends('layouts.default')

@section('content')

<div class="orders">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="box-title">daftar transaksi masuk</h4>
				</div>
				<div class="card-body--">
					<div class="table-stats order-table ov-h">
						<table class="table">
							<thead>
								<tr>
									<th>#</th>
									<th>nama</th>
									<th>email</th>
									<th>nomor</th>
									<th>total transaksi</th>
									<th>status</th>
									<th>action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($items as $item)
								<tr>
									<td>{{$item -> id}}</td>
									<td>{{$item -> nama}}</td>
									<td>{{$item -> email}}</td>
									<td>{{$item -> number}}</td>
									<td>${{$item -> transaction_total}}</td>
									<td>
										@if($item->transaction_status == 'pending')
											<span class="badge badge-info">
										@elseif($item->transaction_status == 'success')
											<span class="badge badge-success">
										@elseif($item->transaction_status == 'failed')
											<span class="badge badge-danger">
										@else
											<span>
										@endif
											{{$item->transaction_status}}
											</span>
											
									</td>
									<td>
										@if($item->transaction_status == 'pending')

										 <a href="{{route('transactions.status',$item->id)}}?status=seccess" class="btn btn-success btn-sm">
											<i class="fa fa-check"></i>
										</a>

										<a href="{{route('transactions.status',$item->id)}}?status=failed" class="btn btn-warning btn-sm">
											<i class="fa fa-times"></i>
										</a>

										@endif
										<!-- modal ada di includes/script/ pojok bawah -->
										<!-- data remote, data akan di kirim ke folder transaction dengan file show
										data titel berarti titel di dalam modal -->
										<a 
											href="#mymodal"
											data-remote="{{ route('transaction.show', $item->id) }}"
											data-toggle="modal"
											data-target="#mymodal"
											data-title="Detail Transaction {{ $item->uuid}}"
											class="btn btn-primary btn-sm">
											
											<i class="fa fa-eye"></i>
										</a>
										<a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-primary btn-sm">
											<i class="fa fa-pencil"></i>
										</a>
										<form action="{{ route('transaction.destroy', $item->id) }}" method="post" class="d-inline">
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