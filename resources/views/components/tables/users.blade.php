
<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100">User List</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
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
