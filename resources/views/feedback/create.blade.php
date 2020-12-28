@extends('layouts.app')

@section('content')
   <div class="container flex justify-evenly">
      <div>
         <h1 class="mb-2">Please leave some feedback</h1>
         <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <table>
               <tr>
                  <td>
                     Email (optional)<br>
                     <input name="email" type="email" class="text-input focus:outline-none focus:shadow-outline" autofocus placeholder="email">
                  </td>
               </tr>
               <tr>
                  <td>
                     Feedback<br>
                     <textarea
                        name="comment"
                        class="text-input focus:outline-none focus:shadow-outline md:w-full"
                        placeholder="Place your feedback here"
                        rows="4"
                        cols="50"
                        maxlength="255"
                        required="required"
                     ></textarea><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="submit" class="button-primary hover:bg-blue-700 ">
                  </td>
               </tr>
            </table>
         </form>
      </div>
   </div>

@endsection
