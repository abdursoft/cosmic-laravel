	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

     {{-- datatable css  --}}
     <link rel="stylesheet" href="{{asset('css/data-table.css')}}">

      <!--Container-->
      <div class="w-full text-slate-800">
        <h2 class="text-xl md:text-3xl my-3">Gif Package Overview</h2>
			<!--Card-->
			 <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow bg-white">
				<table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
					<thead>
						<tr>
                            <th data-priority="1">SL. no</th>
							<th data-priority="2">Name</th>
							<th data-priority="3">Price</th>
							<th data-priority="4">Status</th>
							<th data-priority="5">Action</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($gifs as $key=>$gif)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$gif->packs->title}}</td>
                                <td>${{$gif->price}}</td>
                                <td>{{$gif->status}}</td>
                                <td>
                                    <div class="flex items-center gap-3 {{ $gif->status != 'active' ? 'hidden' : 'block' }}">
                                        <a href="{{ route('user.gif-pack.download',$gif->id) }}" class="p-2 bg-red-600 text-white rounded-md">Download</a>
                                    </div>
                                </td>
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

        function setUser(name,email,subject,id){
            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#subject').val(subject);
        }

	</script>
