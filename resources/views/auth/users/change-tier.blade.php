@extends('layout.user')

@section('title','Change subscription tier')

@section('content')

{{-- user subscription tier change  --}}

<div class="w-full mx-auto">
    <div class="container">
        <div class="w-full flex justify-between flex-col md:flex-row gap-2 relative">
            <div class="w-full md:w-1/3 lg:w-1/4 bg-slate-800 relative flex flex-col">
                <h2 class="text-base md:text-xl text-white p-2 h-[45px]">Manage your subscriptions</h2>
                <div class="w-full h-auto bg-gray-200 p-1 flex-1">
                    <h2 class="text-base">Current Package: <strong>{{$package->name}}</strong></h2>

                    <select onchange="fetchPackageData()" name="package" class="w-full py-2 bg-white rounded-md" id="package">
                        <option value="">Select a package</option>
                        @foreach(packages() as $pack)
                            <option value="{{$pack->id}}" {{selection($pack->id,$package->id)}}>{{$pack->name}}</option>
                        @endforeach
                    </select>
                    <div class="mt-2 w-full">
                        <p class="text-base text-sm my-2">Your current tier is shown in bold black.</p><p class="text-base text-sm my-2">To change it, select a new subscription tier. </p>
                        <p class="text-base text-sm my-2">Then choose the magazines you want.
When you're ready, click Pay Now to confirm the change. If you're upgrading, you'll be charged only the price difference. If downgrading (changing fee $1), the new price will take effect on the next billing cycle. </p>
                        <p class="text-base text-sm my-2">Your subscription will update immediately after payment.</p>
                    </div>
                </div>
                <div class="flex items-center justify-center w-full gap-2 py-1 px-1 h-[40px]">
                    <button class="bg-teal-600 text-white rounded-md cursor-pointer hover:bg-teal-800 delay-300 transition-all w-full max-w-92" onclick="changeTier('now')">Pay Now</button>
                    <button class="bg-green-600 text-white rounded-md cursor-pointer hover:bg-green-800 delay-300 transition-all w-1/2 hidden" onclick="changeTier('later')">Pay Later</button>
                </div>
            </div>
            <div class="w-full md:w-2/3 lg:w-3/4 p-2 bg-white relative min-h-[400px]">
                <div class="processing hidden items-center gap-2">
                    <p>Request processing</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><circle cx="4" cy="12" r="0" fill="currentColor"><animate fill="freeze" attributeName="r" begin="0;SVGUppsBdVN.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="0;3"/><animate fill="freeze" attributeName="cx" begin="SVGqCgsydxJ.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="4;12"/><animate fill="freeze" attributeName="cx" begin="SVG3PwDNd6F.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="12;20"/><animate id="SVG3V8yEdYE" fill="freeze" attributeName="r" begin="SVG6wCQhd9Q.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="3;0"/><animate id="SVGUppsBdVN" fill="freeze" attributeName="cx" begin="SVG3V8yEdYE.end" dur="0.001s" values="20;4"/></circle><circle cx="4" cy="12" r="3" fill="currentColor"><animate fill="freeze" attributeName="cx" begin="0;SVGUppsBdVN.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="4;12"/><animate fill="freeze" attributeName="cx" begin="SVGqCgsydxJ.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="12;20"/><animate id="SVG4PgJdbds" fill="freeze" attributeName="r" begin="SVG3PwDNd6F.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="3;0"/><animate id="SVG6wCQhd9Q" fill="freeze" attributeName="cx" begin="SVG4PgJdbds.end" dur="0.001s" values="20;4"/><animate fill="freeze" attributeName="r" begin="SVG6wCQhd9Q.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="0;3"/></circle><circle cx="12" cy="12" r="3" fill="currentColor"><animate fill="freeze" attributeName="cx" begin="0;SVGUppsBdVN.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="12;20"/><animate id="SVG38aCdcdI" fill="freeze" attributeName="r" begin="SVGqCgsydxJ.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="3;0"/><animate id="SVG3PwDNd6F" fill="freeze" attributeName="cx" begin="SVG38aCdcdI.end" dur="0.001s" values="20;4"/><animate fill="freeze" attributeName="r" begin="SVG3PwDNd6F.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="0;3"/><animate fill="freeze" attributeName="cx" begin="SVG6wCQhd9Q.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="4;12"/></circle><circle cx="20" cy="12" r="3" fill="currentColor"><animate id="SVGwaWzveSq" fill="freeze" attributeName="r" begin="0;SVGUppsBdVN.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="3;0"/><animate id="SVGqCgsydxJ" fill="freeze" attributeName="cx" begin="SVGwaWzveSq.end" dur="0.001s" values="20;4"/><animate fill="freeze" attributeName="r" begin="SVGqCgsydxJ.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="0;3"/><animate fill="freeze" attributeName="cx" begin="SVG3PwDNd6F.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="4;12"/><animate fill="freeze" attributeName="cx" begin="SVG6wCQhd9Q.end" calcMode="spline" dur="0.5s" keySplines=".36,.6,.31,1" values="12;20"/></circle></svg>

                </div>
                <div class="magazine-box relative w-full h-full"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(window).on('load',async function(){
        await fetchPackageData();
    });

    async function fetchPackageData(){
        const pack = $('#package').val();
        const res = await axios.post('{{route('user.package.tier')}}',{package:pack});
        $('.magazine-box').html(res.data);
    }

    async function changeTier(mode){
        $(".processing").removeClass('hidden');
        $(".processing").addClass('flex');
        const header = {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }

        let magazines = $("input[name='magazine[]']:checked").map(function() {
            return $(this).val();
        }).get();

        const data = {
            mode:mode,
            subscription: '{{$subscription->id}}',
            magazines: magazines,
            package: $("select[name='package']").val(),
            xPackage:'{{$package->id}}'
        }

        try {
            const res = await axios.post('{{route('user.process.tier')}}',data,header);

            if(mode == 'now'){
                window.location.href = res.data.payment_url;
                return;
            }
            Swal.fire({
                title:'Tier Created!',
                text: res.data?.message,
                icon: 'success'
            })
        } catch (error) {
            Swal.fire({
                title:'Tier Error!',
                text: error.response.data?.message,
                icon: 'error'
            })
        }

        $(".processing").removeClass('flex');
        $(".processing").addClass('hidden');
    }
</script>

@endsection
