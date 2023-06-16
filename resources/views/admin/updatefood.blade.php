<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
      @include('admin.admincss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.nav')
      <div style="width:100%">
    
       <form action="{{url('/updatefood',$updatefoods->id)}}" method='post' enctype='multipart/form-data'>
        @csrf
        
         <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$updatefoods->title}}" id="" placeholder='Title' style="color:blue;">
         </div>
         <div>
            <img src="foodmenu/{{$updatefoods->image}}" alt="" style="height:100px;width:100px;">
            <label for="image">Image</label>
            <input type="file" name="image" id="" placeholder='Image' style="color:blue;">
         </div>
         <div>
            <label for="price">Price</label>
            <input type="number" name="price" value="{{$updatefoods->price}}" id="" placeholder='Price' style="color:blue;">
         </div>
         <div>
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="5" style="color:blue;">{{$updatefoods->description}}</textarea>
         </div>
         <div>
           <button>Update</button>
         </div>
         
      </form>
      
       </div>
       </div>
    
      
      @include('admin.adminscript')
      </body>
</html>