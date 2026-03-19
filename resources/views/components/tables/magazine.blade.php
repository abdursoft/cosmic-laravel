<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3 text-gray-100 px-2">Magazine list</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">ID</th>
                    <th data-priority="2">Title</th>
                    <th data-priority="3">Archive access</th>
                    <th data-priority="3">Status</th>
                    <th data-priority="3">Issues</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($magazines as $key=>$magazine)
                    <tr>
                        <td>{{$magazine->id}}</td>
                        <td>{{$magazine->title}}</td>
                        <td>{{$magazine->archive_access == '0' ? 'No' : 'Yes'}}</td>
                        <td><span class="rounded-xl px-2 py-2 text-sm shadow-md blur-20 bg-opacity-5 @if($magazine->status == 'active') text-green-600 bg-green-400/20 @elseif($magazine->status == 'canceled') text-red-600 bg-red-500/20 @else text-yellow-600 bg-yellow-400/20 @endif">{{ ucfirst($magazine->status) }}</span></td>
                        <td>{{count($magazine->issues)}}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.magazine.edit',$magazine->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-green-600 text-white">Edit</a>
                                <a href="{{ route('admin.magazine.delete',$magazine->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-red-600 text-white" onclick="return confirm('Are you sure, You want to delete this magazine?')">Delete</a>
                                <a href="{{ route('issue.list',$magazine->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-gray-600 text-white ">Issues</a>
                                <a href="{{ route('upload.form', $magazine->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-teal-600 text-white" title="Giff or Videos">Contents</a>
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
