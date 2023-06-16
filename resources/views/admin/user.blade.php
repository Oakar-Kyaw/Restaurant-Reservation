<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.nav')
      <div style="position:relative; top:30px; right:-150px;">
       <table class="text-white" bgcolor="grey" border="3px">
          <thead class="text-white">
          <tr style="padding:30px">
            <th style="padding:30px">Id</th>
            <th style="padding:30px">Name</th>
            <th style="padding:30px">Email</th>
            <th style="padding:30px">User Type</th>
            <th style="padding:30px">Action</th>
           </tr>
           </thead>
           @foreach($users as $user)
          <tbody >
            <tr>
              <th style="padding:30px">{{$user->id}}</th>
              <td style="padding:30px">{{$user->name}}</td>
              <td style="padding:30px">{{$user->email}}</td>
               <td style="padding:30px">{{$user->user_type}}</td>
               @if($user->user_type=='customer')
               <td style="padding:30px"><a href="{{url('delete',$user->id)}}" class="text-decoration-none">delete</a></td>
               @else
               <td style="padding:30px">Not Allowed</td>
               @endif
              </tr>

            </tbody>
            @endforeach
          </table>
      </div>
      
    </div>
      
      @include('admin.adminscript');
      </body>
</html>