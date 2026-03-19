<!--Container-->
<div class="w-full text-slate-800">
<h2 class="text-xl md:text-3xl my-3 px-2 text-gray-100">Contact List</h2>
    <!--Card-->
        <div id='recipients' class="w-full py-4 px-2 mt-6 lg:mt-0 rounded shadow">
        <table id="example" class="stripe hover w-full" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">SL. no</th>
                    <th data-priority="2">Name</th>
                    <th data-priority="3">Email</th>
                    <th data-priority="4">Subject</th>
                    <th data-priority="4">Message</th>
                    <th data-priority="4">Replied</th>
                    <th data-priority="6">Sent at</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $key=>$contact)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->is_replied == 0 ? 'N/A' : 'YES'}}</td>
                        <td>{{date('Y-m-d', strtotime($contact->created_at))}}</td>
                        <td><button class="bg-green-600 rounded-md p-2 text-center text-white" onclick="setUser('{{$contact->name}}','{{$contact->email}}','{{$contact->subject}}','{{$contact->id}}')">Replay</button></td>
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

        function setUser(name,email,subject,id){
            $('#id').val(id);
            $('#name').val(name);
            $('#email').val(email);
            $('#subject').val(subject);
        }

    </script>
@endpush