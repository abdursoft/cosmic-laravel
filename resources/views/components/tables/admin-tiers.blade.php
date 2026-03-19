<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100">Subscriptions Tier overview</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
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
                        <td><span class="rounded-xl px-2 py-2 text-sm shadow-md blur-20 bg-opacity-5 @if($tier->status == 'active') text-green-600 bg-green-400/20 @elseif($tier->status == 'canceled') text-red-600 bg-red-500/20 @else text-yellow-600 bg-yellow-400/20 @endif">{{ ucfirst($tier->status) }}</span></td>
                        <td>{{ date('Y-m-d', strtotime($tier->created_at)) }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{route('admin.subscribe.tier.delete',$tier->id)}}" class="rounded-[16px] px-2 py-1 text-sm @php echo $tier->status != 'canceled' ? '' : 'hidden' @endphp bg-red-600 text-white" onclick="return confirm('Are you sure, You want to delete this tier?')">
                                    Delete
                                </a>
                                <a href="{{route('admin.subscribe.tier.approve',$tier->id)}}" class="rounded-[16px] px-2 py-1 text-sm @php echo $tier->status == 'pending' ? '' : 'hidden' @endphp bg-green-600 text-white">
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
