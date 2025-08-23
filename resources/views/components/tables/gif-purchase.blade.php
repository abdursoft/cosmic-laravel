	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

     {{-- datatable css  --}}
     <link rel="stylesheet" href="{{asset('css/data-table.css')}}">

      <!--Container-->
      <div class="w-full text-slate-800">
        <h2 class="text-xl md:text-3xl my-3">Gif Package List</h2>
			<!--Card-->
			 <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow bg-white">
				<table id="purchase" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
                            <th data-priority="1">Package</th>
							<th data-priority="2">Name</th>
							<th data-priority="3">Price</th>
							<th data-priority="4">Status</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($gifs as $key=>$gif)
                            <tr>
                                <td>{{$gif->packs->title}}</td>
                                <td>{{$gif->users->name}}</td>
                                <td>${{$gif->packs->price}}</td>
                                <td>{{$gif->status}}</td>
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

			var table = $('#purchase').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

        function setUser(name,email,subject,id){
            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#subject').val(subject);
        }

	</script>
