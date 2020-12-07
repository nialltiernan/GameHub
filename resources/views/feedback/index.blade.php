@extends('layouts.app')

@section('content')
   <div class="container mx-auto px-8">
      <h1 class="text-blue-500 uppercase tracking-wide font-semibold mb-4">Feedback</h1>

      @foreach($feedbacks as $feedback)
         <x-feedback :comment="$feedback['comment']" :email="$feedback['email']" />
      @endforeach
   </div>
@endsection
