<!--Container-->
<div class="w-full">
<h2 class="text-xl md:text-3xl my-3 text-gray-200 px-2">User subscriptions</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Name</th>
                    <th data-priority="2">Package</th>
                    <th data-priority="3">Type</th>
                    <th data-priority="5">Expired at</th>
                    <th data-priority="4">Status</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $key=>$subscription)
                    <tr>
                        <td>{{ $subscription->user->name }}</td>
                        <td>{{ $subscription->package->name }}</td>
                        <td>{{ ucfirst($subscription->package->type)}}</td>
                        <td>{{ date('Y-m-d H:i:s', strtotime($subscription->created_at)) }}</td>
                        <td><span class="rounded-xl px-2 py-2 text-sm shadow-md blur-20 bg-opacity-5 @if($subscription->status == 'active') text-green-600 bg-green-400/20 @elseif($subscription->status == 'canceled') text-red-600 bg-red-500/20 @else text-yellow-600 bg-yellow-400/20 @endif">{{ ucfirst($subscription->status) }}</span></td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{route('admin.subscribe.cancel',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm bg-yellow-600 text-white hover:bg-yellow-800">
                                    Cancel
                                </a>
                                <a href="{{route('admin.subscribe.delete',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm bg-red-600 text-white hover:bg-red-800" onclick="return confirm('Are you sure, You want to delete this subscription?')">
                                    Delete
                                </a>
                                <a href="{{route('admin.subscribe.approve',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm bg-green-600 text-white hover:bg-green-800 @php echo $subscription->status == 'pending' ? '' : 'hidden' @endphp">
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
