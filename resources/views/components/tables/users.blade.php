	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

     {{-- datatable css  --}}
     <link rel="stylesheet" href="{{asset('css/data-table.css')}}">

      <!--Container-->
      <div class="w-full text-slate-800">
        <h2 class="text-xl md:text-3xl my-3">User List</h2>
			<!--Card-->
			 <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow bg-white">
				<table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
                            <th data-priority="1">SL. no</th>
							<th data-priority="2">Name</th>
							<th data-priority="3">Email</th>
							<th data-priority="4">Phone</th>
							<th data-priority="6">Created at</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{date('Y-m-d', strtotime($user->created_at))}}</td>
                            </tr>
                        @endforeach
					</tbody>
				</table>
			</div>
			<!--/Card-->
      </div>
      <!--/container-->

	<!-- jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

	</script>
