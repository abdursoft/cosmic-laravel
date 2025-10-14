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
<h2 class="text-xl md:text-3xl my-3">Subscriptions Tier overview</h2>
    <!--Card-->
        <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow bg-white">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">User</th>
                    <th data-priority="6">Package</th>
                    <th data-priority="4">Status</th>
                    <th data-priority="6">Created at</th>
                    <th data-priority="7">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tiers as $key=>$tier)
                    <tr>
                        <td>{{ $tier->user->name }}</td>
                        <td>{{ $tier->package->name }}</td>
                        <td>{{ $tier->status }}</td>
                        <td>{{ date('Y-m-d', strtotime($tier->created_at)) }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{route('admin.subscribe.tier.delete',$tier->id)}}" class="py-2 px-3 rounded-md @php echo $tier->status != 'canceled' ? '' : 'hidden' @endphp bg-red-600 text-white">
                                    Delete
                                </a>
                                <a href="{{route('admin.subscribe.tier.approve',$tier->id)}}" class="py-2 px-3 rounded-md @php echo $tier->status == 'pending' ? '' : 'hidden' @endphp bg-green-600 text-white">
                                    Approve
                                </a>
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
