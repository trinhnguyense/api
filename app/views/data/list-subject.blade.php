@extends('data.layout')

@section('content')
	<div class="col-md-12">
		<h4>Khóa học: {{ $course->type }} ({{ $course->name }})</h4>
		@if (Session::has('error'))
			<div class="alert alert-danger">			
				<strong>Lỗi!</strong> {{ Session::get('error') }}
			</div>
		@endif

		@if (Session::has('notify'))
			<div class="alert alert-success">			
				<strong>Thông báo!</strong> {{ Session::get('notify') }}
			</div>
		@endif
	</div>	

	<div class="list-subject col-md-12">
		<div class="col-md-6">
			<div class="table-responsive">
				<p class="bg-primary title">Data cũ</p>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên khóa học</th>
							<th>Số từ</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listSubject as $key=>$value)						
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->total }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<div class="table-responsive">
				<p class="bg-danger title">Data mới</p>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Tên khóa học</th>
							<th>Số từ</th>
						</tr>
					</thead>
					<tbody>
						@foreach($listSubjectSort as $key=>$value)						
						<tr 
						class="@if ($value['total'] != $listSubject[$key]->total) bg-info @endif">
							<td>{{ $key + 1 }}</td>
							<td>{{ $value['name'] }}</td>
							<td>{{ $value['total'] }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<a class="btn btn-success btn-export" href="{{ Asset('xuat-du-lieu-json') . '/' . $course->id }}">
		Xuất dữ liệu
	</a>
@endsection