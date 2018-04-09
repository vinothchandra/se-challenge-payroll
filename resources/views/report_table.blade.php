<table id="report-table" class="display" width="100%">
    <thead>
        <tr>
            <th> Report ID </th>
            <th> Employee ID </th>
            <th> Pay Period </th>
            <th> Amount Paid </th>
        </tr>
    </thead>
    <tbody>
         @foreach($reports as $report)
          <tr>
			<td> <a href= "/report/{{$report->report_id}}" class="glyphicon glyphicon-link"> {{$report->report_id}} </a> </td>
			<td> <a href= "/employee/{{$report->employee_id}}" class="glyphicon glyphicon-link"> {{$report->employee_id}} </a> </td>			      	  	
			<td> {{$report->period_start}} - {{$report->period_end}}  </td>
			<td> {{$report->sum}} </td>
          </tr>
         @endforeach
    </tbody>
</table>

@section('page-scripts')
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css" rel="stylesheet">

<!-- <script src="https://cdn.datatables.net/1.10.16/js/dataTables.jqueryui.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $( document ).ready(function() {
    $('#report-table').dataTable();
  });
</script>
@endsection