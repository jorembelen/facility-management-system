<div class="row">
    <div class="col-md-3 sm-3"></div>
    <div class="col-md-3 sm-3">
        <form action="{{ route('schedules.get') }}" method="get">
        <input type="text" id="datepicker" name="start_date" class="form-control" value="{{ request('start_date') }}">
    </div>
    <div class="col-md-3 sm-3">
        <input type="text" id="datepicker2" name="end_date" class="form-control" value="{{ request('end_date') }}">  
    </div>
    <div class="col-md-3 sm-3">
        <button class="btn btn-primary"><i class="fas fa-fw fa-filter"></i> </button>
        <button type="submit" class="btn btn-success" id="reset-button3" onclick="myFunction()"><i class="fas fa-fw fa-redo"></i> </button>
       
    </div>
</div>
</form>

<script src="/assets/plugins/flatpickr/flatpickr.js"></script>
<script>
    var f2 = flatpickr(document.getElementById('datepicker'), {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
    var f2 = flatpickr(document.getElementById('datepicker2'), {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
    </script>
    <script>
        function myFunction(){
       document.getElementById("datepicker").value = "";
       document.getElementById("datepicker2").value = "";
    }
    </script>