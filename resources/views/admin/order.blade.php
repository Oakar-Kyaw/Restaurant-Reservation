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
         <div class="w-100">
           <h4 >Customer Order</h4>
           <form action="/search" method='get'>
            <div class="d-flex">
              <input type="text" name="search" id="" style="color:black">
              <button class="btn btn-success">Search</button>  
            </div>
          </form>
         </div>
        
    </div>
      
      <!--food table -->
     
       <div style="position:relative; right:-220px; ">
       <table class="text-white" bgcolor="black" border="3px">
          <thead class="text-white">
          <tr style="padding:30px">
            <th style="padding:30px">Name</th>
            <th style="padding:30px">Food Name</th>
            <th style="padding:30px">Quantity</th>
            <th style="padding:30px">Price</th>
            <th style="padding:30px">Phone Number</th>
            <th style="padding:30px">Address</th>
           </tr>
           </thead>
           @foreach($orders as $order)
          <tbody >
            <tr>
              <th style="padding:30px">{{$order->name}}</th>
              <td style="padding:30px">{{$order->foodname}}</td>
              <td style="padding:30px">{{$order->quantity}}</td>
              <td style="padding:30px">{{$order->price}}</td>
              <td style="padding:30px">{{$order->phonenumber}}</td>
              <td style="padding:30px">{{$order->address}}</td>
              </tr>

            </tbody>
           @endforeach
          </table>
    

</div>
</div>
      @include('admin.adminscript')
      </body>
</html>