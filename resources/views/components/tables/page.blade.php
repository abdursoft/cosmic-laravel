@section('styles')
	 <!--Regular Datatables CSS-->
	 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

     {{-- datatable css  --}}
     <link rel="stylesheet" href="{{asset('css/data-table.css')}}">
@endSection

 <!--Container-->
 <div class="w-full text-slate-800">
     <h2 class="text-xl md:text-3xl my-3">Dynamic pages</h2>
     <!--Card-->
     <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow bg-white">
         <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
             <thead>
                 <tr>
                     <th data-priority="1">ID</th>
                     <th data-priority="2">Name</th>
                     <th data-priority="3">Slug</th>
                     <th data-priority="4">Status</th>
                     <th data-priority="5">Action</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($pages as $key => $page)
                     <tr>
                         <td>{{ $page->id }}</td>
                         <td>{{ $page->title }}</td>
                         <td>{{ $page->slug }}</td>
                         <td>{{ $page->status }}</td>
                         <td>
                             <div class="flex items-center gap-3">
                                 <a href="{{ route('admin.pages.edit', $page->id) }}"
                                     class="p-2 rounded-md bg-green-600 text-white">Edit</a>

                                 <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="inline">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="text-white bg-red-400 p-2 rounded-md cursor-pointer ml-2"
                                         onclick="return confirm('Are you sure?')">
                                         Delete
                                     </button>
                                 </form>
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

@section('scripts')
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
@endsection
