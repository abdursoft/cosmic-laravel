<!--Container-->
<div class="w-full text-slate-800">
    <h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100" data-aos="slide-right">Issues list</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">SL. no</th>
                    <th data-priority="2">Title</th>
                    <th data-priority="3">Sub title</th>
                    <th data-priority="3">Magazine</th>
                    <th data-priority="3">Created at</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $key=>$issue)
                    <tr>
                        <td>{{$issue->id}}</td>
                        <td>{{$issue->title}}</td>
                        <td>{{$issue->sub_title}}</td>
                        <td>{{ucfirst($issue->magazines->title ?? '')}}</td>
                        <td>{{date('Y-m-d', strtotime($issue->created_at))}}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.issues.edit',$issue->id) }}" class="rounded-[16px] shadow-md hover:shadow-lg px-2 py-1 text-sm bg-green-600 text-white">Edit</a>
                                <a href="{{ route('admin.issues.delete',$issue->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-red-600 text-white " onclick="return confirm('Are you sure, You want to delete this issue?')">Delete</a>
                                <a href="{{ route('admin.issues.read',$issue->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-gray-600 text-white">Read</a>
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
