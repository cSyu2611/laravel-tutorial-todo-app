@extends('layout')
@section('styles')
@endsection

@section('content')
<div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
          <div class="panel-body">
            <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            <!-- view('tasks/index', { 'folders' => $folders, 'current_folder_id' => $id })で呼ばれるので -->
            @foreach($folders as $f)
              <a href="{{ route('tasks.index', ['folder' => $f]) }}" class="list-group-item {{ $current_folder_id === $f->id ? 'active' : '' }}">
                {{ $f->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
      <div class="panel panel-default">
  <div class="panel-heading">タスク</div>
  <div class="panel-body">
    <div class="text-right">
      <a href="{{ route('tasks.create', ['folder' => $folder ]) }}" class="btn btn-default btn-block">
        タスクを追加する
      </a>
    </div>
  </div>
  <table class="table">
    <thead>
    <tr>
      <th>タイトル</th>
      <th>状態</th>
      <th>期限</th>
      <th></th>
    </tr>
    </thead>
    <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>{{ $task->title }}</td>
          <td>
            <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
          </td>
          <td>{{ $task->formatted_due_date }}</td>
          <td>
          <a href="{{ route('tasks.edit', ['folder' => $folder, 'task' => $task]) }}">
  編集
</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@endsection