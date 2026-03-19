
<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl px-2 text-gray-100 my-3">Gif Purchased</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="purchase" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Package</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Price</th>
                    <th data-priority="4">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gifs as $key=>$gif)
                    <tr>
                        <td>{{$gif->packs->title}}</td>
                        <td>{{$gif->users->name}}</td>
                        <td>${{$gif->packs->price}}</td>
                        <td><span class="rounded-xl px-2 py-2 text-sm shadow-md blur-20 bg-opacity-5 @if($gif->status == 'active') text-green-600 bg-green-400/20 @elseif($gif->status == 'canceled') text-red-600 bg-red-500/20 @else text-yellow-600 bg-yellow-400/20 @endif">{{ ucfirst($gif->status) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--/Card-->
</div>
<!--/container-->


@push('scripts')
	<!--Datatables -->
	<script>
		$(document).ready(function() {

			var table = $('#purchase').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

	</script>
@endpush
