@extends('layouts.main')

@section('title')
    <title>Welcome</title>
@endsection

@section('body')

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success mt-2" role="alert">
                {{session()->get('success')}}
            </div>
        @endif

    <form method ="post" id="regForm" action="{{ route('post_attend') }}">
        @csrf
      <h1>Register To watch a movie</h1>
      <!-- One "tab" for each step in the form: -->
      <div class="tab">
        <p>
            <label for="1">Event Day</label>
          <!-- <input
            oninput="this.className = ''"
            name="event_day" id="1"/> -->
            <select id="1" name="event_day_id" class="form-select" aria-label="Default select example" required>
                <option value="null">Open this select menu</option>
                    @foreach($event_days as $event_day)
                        <option value="{{$event_day->id}}">{{$event_day->date}}</option>
                    @endforeach
            </select>
        </p>
        <p>
            <label for="2">Show Time</label>
          <!-- <input
            oninput="this.className = ''"
            name="shpw_time" id="2"
          /> -->
          <select id="2" name="show_time_id" class="form-select" aria-label="Default select example" required>
            <option value="null">Open this select menu</option>
                @foreach($show_times as $show_time)
                    <option value="{{$show_time->id}}">{{$show_time->time}}</option>
                @endforeach
        </select>
        </p>
        <p>
            <label for="3">Movies</label>
          <!-- <input
            oninput="this.className = ''"
            name="movie" id="3"
          /> -->
          <select id="3" name="movie" class="form-select" aria-label="Default select example" required>
            <option value="null">Open this select menu</option>
                @foreach($movies as $movie)
                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                @endforeach
        </select>
        </p>
      </div>
      <div class="tab">
        <p>
            <label for="8">Name</label>
          <input id="8" type="text"
            name="name"
          />
        </p>
        <p>
            <!-- placeholder="Phone..."
            oninput="this.className = ''" -->
            <label for="9">Email</label>
          <input id="9"
            type="email"
            name="email"
          />
        </p>
        <p>
            <label for="10">Phone Number</label>
          <input id="10"
          type="tel"
            name="phone_number"
          />
        </p>
      </div>

      <div style="overflow: auto">
        <div style="float: right">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)">
            Previous
          </button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
      </div>
      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align: center; margin-top: 40px">
        <span class="step"></span>
        <span class="step"></span>
      </div>
    </form>


    <script>
  
        console.log("All assets are loaded");

        function showTab(n) {
            // This function will display the specified tab of the form...

            let x = document.getElementsByClassName("tab");

            x[n].style.display = "block";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == x.length - 1) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            console.log("nextPrev()")
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                // alert('form submitted')
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            console.log("validateForm()")
            // This function deals with validation of the form fields
            var x,
                y,
                i,
                valid = true;
            x = document.getElementsByClassName("tab");
            console.log(x);
            // y = x[currentTab].getElementsByTagName("input");
            y = x[currentTab].querySelectorAll('input,select')
            // A loop that checks every input field in the current tab:
            console.log(y);
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                console.log(y[i]);
                if (y[i].value == "" || y[i].value == "null" ) {
                    // add an "invalid" class to the field:
                    console.log("null value")
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className +=
                    " finish";
            }
            // return false;
            return valid; // return the valid status
            
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i,
                x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

  
    </script>
    


@endsection