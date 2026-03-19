<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100">Subscription packages</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">SL. no</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Type</th>
                    <th data-priority="4">Status</th>
                    <th data-priority="6">Price</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($packages as $key=>$package)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{ ucfirst($package->type)}}</td>
                        <td><span class="rounded-xl px-2 py-2 text-sm shadow-md blur-20 bg-opacity-5 @if($package->status == 'active') text-green-600 bg-green-400/20 @elseif($package->status == 'canceled') text-red-600 bg-red-500/20 @else text-yellow-600 bg-yellow-400/20 @endif">{{ ucfirst($package->status) }}</span></td>
                        <td>${{$package->price}}</td>
                        <td>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.package.edit',$package->id) }}" class="rounded-[16px] px-2 py-1 text-sm  bg-green-600 text-white">Edit</a>
                                <a href="{{ route('admin.package.delete',$package->id) }}" class="rounded-[16px] px-2 py-1 text-sm bg-red-600 text-white" onclick="return confirm('Are you sure, You want to delete this package?')">Delete</a>
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
