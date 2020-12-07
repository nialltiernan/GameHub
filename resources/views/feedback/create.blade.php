@extends('layouts.app')

@section('content')
   <div class="container flex justify-evenly">
      <div>
         <h1 class="text-blue-500 uppercase tracking-wide font-semibold mb-2">Please leave some feedback</h1>
         <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <table>
               <tr>
                  <td>
                     Email (optional)<br>
                     <input name="email" type="email" class="text-black" autofocus placeholder=" email">
                  </td>
               </tr>
               <tr>
                  <td>
                     Feedback<br>
                     <textarea
                        name="comment"
                        class="text-black rounded"
                        placeholder=" Place your feedback here"
                        rows="4"
                        cols="50"
                        maxlength="255"
                        required="required"
                     ></textarea><br>
                  </td>
               </tr>
               <tr>
                  <td>
                     <input type="submit" class="bg-blue-500 text-white font-semibold px-2 py-2 hover:bg-blue-600 rounded">
                  </td>
               </tr>
            </table>
         </form>
      </div>
   </div>

@endsection
