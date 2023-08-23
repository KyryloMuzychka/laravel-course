@extends('./layouts/app')

@section('title-block')
Update the data of one
@endsection

@section('content')
<h1>Update the data of one</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe eos sequi dignissimos totam minus possimus laudantium reiciendis, recusandae dolore ab ipsam ipsum ratione modi pariatur quis ullam qui quod neque.</p>
<form action="{{ route('contact-update-submit', $data->id) }}" method="post">

  @csrf

  <div class="form-group">
    <label for="name">Enter the name</label>
    <input type="text" name="name" value="{{$data->name}}" placeholder="Enter the name" id="name" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Enter the email</label>
    <input type="text" name="email" value="{{$data->email}}" placeholder="Enter the email" id="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="subject">Enter the subject</label>
    <input type="text" name="subject" value="{{$data->subject}}" placeholder="Enter the subject" id="subject" class="form-control">
  </div>
  <div class="form-group">
    <label for="message">Enter the message</label>
    <textarea name="message" id="message" class="form-control" placeholder="Enter the message">{{$data->message}}</textarea>
  </div>
  <button type="submit" class="btn btn-success mt-2">Update</button>
</form>
@endsection