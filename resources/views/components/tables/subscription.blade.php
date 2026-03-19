<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3">Subscriptions overview</h2>
    <!--Card-->
        <div id='recipients' class="w-full p-4 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="2">Package</th>
                    <th data-priority="3">Type</th>
                    <th data-priority="4">Status</th>
                    <th data-priority="6">Amount</th>
                    <th data-priority="6">Created at</th>
                    <th data-priority="7">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subscriptions as $key=>$subscription)
                    <tr>
                        <td>{{ $subscription->package->name }}</td>
                        <td>{{ ucfirst($subscription->package->type)}}</td>
                        <td>{{ $subscription->status }}</td>
                        <td>${{ $subscription->package->price }}</td>
                        <td>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{route('user.subscribe.cancel',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm @php echo $subscription->status !== 'canceled' ? '' : 'hidden' @endphp bg-red-600 text-white">
                                    Cancel
                                </a>
                                <a href="{{route('user.subscribe.tier',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm @php echo $subscription->status == 'active' ? '' : 'hidden' @endphp bg-teal-600 text-white">
                                    Manage
                                </a>
                                <a href="{{route('user.magazines',$subscription->id)}}" class="rounded-[16px] px-2 py-1 text-sm hidden bg-green-600 text-white">
                                    Magazines
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
