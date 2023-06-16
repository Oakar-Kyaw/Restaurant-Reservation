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
      
      <!--food table -->
       <div style="position:relative;">
       <table class="text-white" bgcolor="black" border="3px">
          <thead class="text-white">
          <tr>
            <th style="padding:25px">Cutomer Name</th>
            <th style="padding:25px">Email</th>
            <th style="padding:25px">Number of Guests</th>
            <th style="padding:25px">Date</th>
            <th style="padding:25px">Time</th>
            <th style="padding:25px">Message</th>
            <th style="padding:25px">Action2</th>
           </tr>
           </thead>
           @foreach($reservations as $reservation)
          <tbody >
            <tr>
              <th style="padding:25px">{{$reservation->name}}</th>
              <td style="padding:25px">{{$reservation->email}}</td>
              <td style="padding:25px">{{$reservation->numberofguest}}</td>
              <td style="padding:25px">{{$reservation->date}}</td>
              <td style="padding:25px">{{$reservation->time}}</td>
              <td style="padding:25px">{{$reservation->message}}</td>
              <td style="padding:25px"><a href="{{}}" class="text-decoration-none">Delete</a></td>
               
            </tbody>
           @endforeach
          </table>
      </div>
</div>
      
      @include('admin.adminscript')
      </body>
</html>