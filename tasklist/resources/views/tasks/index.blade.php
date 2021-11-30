@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					新規タスク
				</div>

				@include('common.errors')

				<div class="panel-body">
					<!-- 新規タスク入力フォーム -->
					<form method="POST" action="/tasks" class="form-horizontal">
						{{csrf_field()}}

						<!-- 内容入力エリア -->
						<div class="form-group">
							<label for="task" class="col-sm-8 control-label">内容を入力してください</label>
							<div class="col-sm-6">
								<input type="text" name="title" id="task-name" class="form-control">
							</div>
						</div>

						<!-- タスク追加ボタン -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-8">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-plus"></i>タスクを追加
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- 登録済みタスク一覧 -->
			@if(count($tasks) > 0)
			<div class="panel panel-default">
				<div class="panel-heading">
					現在のタスク
				</div>

				<div class="panel-body">
					<table class="table table-striped task-table">
						<thead>
							<th>Task</th>
							<th>&nbsp;</th>
						</thead>

						<tbody>
							@foreach($tasks as $task)
							<tr>
								<!-- タスク名 -->
								<td class="table-text">
									<div>{{$task->title}}</div>
								</td>
								<td>
									<!-- 削除ボタン -->
									<form method="POST" action="/tasks/{{$task->id}}">
										{{method_field('DELETE')}}
										{{csrf_field()}}
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-trash"></i>削除
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@endif

		</div>
	</div>

@endsection