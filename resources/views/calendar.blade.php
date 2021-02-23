<div class="modal" id ="bookingForm"tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #f8f9fa">
        <h5 class="modal-title">Booking form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br style="margin-bottom:240px;"/>
      <div class="container">
      <form method="post" action="{{ route('bookings.store') }}">
        @csrf
        <div class="form-group">
          
          <select class="form-select" name = "service" id = "service" aria-label="Default select example">
            <option selected>Select service</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="datetime-local" name = "start" class="form-control"  id = "start" placeholder="Start">
          @error('Start')
              <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="datetime-local" name = "end" class="form-control" id = "end"  placeholder="End">
          @error('End')
          <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="text" name= "name" class="form-control" id="name"  placeholder="Name">
          @error('Name')
              <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="text" name= "phone" class="form-control" id="phone"  placeholder="Phone">
          @error('Phone')
              <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="text" name= "email" class="form-control" id="email"  placeholder="Email">
          @error('Email')
              <p class="text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
        
        </div>
        <br style="margin-bottom:240px;"/>
      <div class="modal-footer" style="background-color: #f8f9fa">
        <button type="submit" value="submit" class="btn btn-primary">Confirm appointment</button>
      </div>
    </div>
  </div>
</div>
</form>

<!DOCTYPE html>
<html>
<head>
    <title>Callendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <!--Bootsrap JS-->  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin
     ="anonymous"></script>
    <!--aJax-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />-->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   <!--Full Calendar-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.css" 
    integrity="sha256-uq9PNlMzB+1h01Ij9cx7zeE2OR2pLAfRw3uUUOOPKdA=" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js" 
    integrity="sha256-rPPF6R+AH/Gilj2aC00ZAuB2EKmnEjXlEWx5MkAp7bw=" crossorigin="anonymous"></script>
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    
  </head>
<body>
  
<div class="container">
    <h1></h1>
    <div id='calendar'></div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var timesClicked  = 0;

  var calendar = new FullCalendar.Calendar(calendarEl, {
    selectable: true,
    nowIndicator: true,
    headerToolbar: {
      center: '',
      left:'title',
      right: 'dayGridMonth timeGridWeek timeGridDay today prev,next'
    },
    events: "{{ route('allBookings') }}",
      
        dateClick: function (info){
          
          if (timesClicked == 0) {
            calendar.changeView('timeGridDay');
					  calendar.gotoDate(info.date);
            timesClicked++;
            $('#bookingForm').modal('show');
            timesClicked--; 
                  
            } 
            },

            

            
        
  });
  calendar.render();
   });
  </script>

</body>
</html>
