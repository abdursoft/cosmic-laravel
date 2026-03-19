 <!--Container-->
 <div class="w-full">
     <h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100">Dynamic pages</h2>
     <!--Card-->
     <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
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
                         <td>{{ ucfirst($page->status) }}</td>
                         <td>
                             <div class="flex items-center gap-3">
                                 <a href="{{ route('admin.pages.edit', $page->id) }}"
                                     class="rounded-[16px] px-2 py-1 text-sm bg-green-600 text-white">Edit</a>

                                 <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" class="inline">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="text-white bg-red-400 rounded-[16px] px-2 py-1 text-sm cursor-pointer ml-2"
                                         onclick="return confirm('Are you sure, You want to delete this page?')">
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

@push('scripts')
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

	</script>
@endpush
