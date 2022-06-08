@extends('auth.layouts.main')
@section('clientHome')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
          <div class="card">
             <div class="card-header">Client home</div>
             <div class="card-body">
                <table>
                   <tr>
                      <th>
                         Name
                      </th>
                      <td>: {{ $user->name }}</td>
                   </tr>
                   <tr>
                      <th>
                         Email
                      </th>
                      <td>: {{ $user->email }}</td>
                   </tr>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
