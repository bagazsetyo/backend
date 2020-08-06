<table class="table table-bordered">
		<tr>
			<th>nama</th>
			<td>{{ $item->nama }}</td>
		</tr>
		<tr>
			<th>email</th>
			<td>{{$item->email}}</td>
		</tr>
		<tr>
			<th>nomor</th>
			<td>{{$item->number}}</td>
		</tr>
		<tr>
			<th>alamat</th>
			<td>{{$item->address}}</td>
		</tr>
		<tr>
			<th>transaksi total</th>
			<td>{{$item->transaction_total}}</td>
		</tr>
		<tr>
			<th>status transaksi</th>
			<td>{{$item->transaction_status}}</td>
		</tr>
		<tr>
			<th>pembelian product</th>
			<td>
				<table class="tabble table-bordered w-100">
					<tr>
						<th>Nama</th>
						<th>tipe</th>
						<th>harga</th>
					</tr>
					@foreach($item->details as $detail)
						<tr>
							<td>{{$detail->product->name}}</td>
							<td>{{$detail->product->type}}</td>
							<td>${{$detail->product->price}}</td>
						</tr>
					@endforeach
				</table>
			</td>
		</tr>
</table>
<div class="row">
	<div class="col-4">
		<a href="{{route('transactions.status', $item->id)}}?status=success" class="btn btn-success btn-block">
			<i class="fa fa-check"></i>set success
		</a>
	</div>
	<div class="col-4">
		<a href="{{route('transactions.status', $item->id)}}?status=pending" class="btn btn-info btn-block">
			<i class="fa fa-spinner"></i>set pending
		</a>
	</div>
	<div class="col-4">
		<a href="{{route('transactions.status', $item->id)}}?status=failed" class="btn btn-danger btn-block">
			<i class="fa fa-times"></i>set failde
		</a>
	</div>
</div>