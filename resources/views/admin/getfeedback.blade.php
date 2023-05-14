@extends('admin.layouts.template')
@section('pagetitle')
Feedback Message
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h4>Feedback Message</h4>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('storefeedback') }}" method="POST">
              @csrf
                <div class="card-body">
                  <input type="hidden" value="{{ $message_info->id }}" name="feedback_id">
                  <input type="hidden" value="{{ $message_info->user_id }}" name="user_id">
                    <div class="form-group">
                      <label for="message">Enter Feedback</label>
                      <textarea 
                      cols="30" rows="10" readonly >{{ $message_info->message }}</textarea>
                      <textarea name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                  <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Answer">
                  </div>
                </div>
            </form>
    </div>
</div>
@endsection