@extends('layouts.app')
@section('title', 'Topics List')
@section('content')

<div class="row mb-5">
  <div class="col-lg-9 col-md-9 topic-list">
    <div class="card ">

      <div class="card-header bg-transparent">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#">Last Reply</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Latest Publish</a></li>
        </ul>
      </div>

      <div class="card-body">
        {{-- Topics List--}}
        @include('topics._topic_list', ['topics' => $topics])
        {{-- Paginator --}}
        <div class="mt-5">
          {!! $topics->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('topics._sidebar')
  </div>
</div>
@endsection