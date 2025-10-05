@extends('layout.app')

@section('title','Your cart list')

@section('content')

<div class="w-full h-full flex items-start justify-center min-h-[80vh] bg-white">
    <div class="container flex items-start justify-between flex-col md:flex-row">
        {{-- package and magazine list  --}}
        <div class="w-full md:w-2/3 lg:w-3/5">
            @foreach($carts as $packageId => $magazineIds)
                @php
                    $package = getModel('Package',$packageId); array_push($packages,[$package->name,$package->price,$package->id]);
                    $total += $package->price;
                @endphp
                <div class="w-full bg-gray-200 shadow-md my-5 p-3 package_{{$package->id}}_area">
                    <div class="flex items-center justify-between">
                        <p class="px-2"><strong>Package: </strong> {{ $package->name }} <small>({{ucfirst($package->type)}})</small></p>
                        <svg onclick="removePackage('{{$package->id}}')" title="remove" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12.012 2.004C6.492 2 2.013 6.474 2.01 11.994S6.48 21.993 12 21.996a9.996 9.996 0 0 0 10.002-9.99c.003-5.52-4.47-9.999-9.99-10.002m0 18.992A8.996 8.996 0 1 1 12 3.004a8.996 8.996 0 0 1 .012 17.992M12.707 12l3.182-3.182a.5.5 0 0 0-.707-.707L12 11.293L8.818 8.111a.5.5 0 0 0-.707.707L11.293 12l-3.182 3.182a.5.5 0 0 0 .707.707L12 12.707l3.182 3.182a.5.5 0 0 0 .707-.707z"/></svg>
                    </div>
                    <div class="w-full py-4 my-1 bg-white px-2">
                        @foreach($magazineIds as $magazineId)
                            @php $magazine = getModel('Magazine',$magazineId);  @endphp
                            <div class="flex items-start justify-start gap-2 flex-col md:flex-row my-3 mag_{{$magazine->id}}_remove">
                                <img class="max-w-[350px] h-[240px] w-full" src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}">
                                <div class="flex flex-col justify-start gap-5 h-[200px]">
                                    <div class="">
                                        <h2 class="text-xl md:text-2xl">{{$magazine->title}}</h2>
                                        <p>{{$magazine->sub_title}}</p>
                                        <p>Total issues: {{count($magazine->issues)}}</p>
                                    </div>
                                    <button onclick="removeCart('{{$package->id}}','{{$magazine->id}}')" class="rounded-md px-3 py-1 text-center text-white cursor-pointer bg-red-400">Remove</button>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="flex items-center justify-between">
                        <p>Allowed magazines(<span class="pk_{{$package->id}}_price">{{$package->allowed_magazine}}</span>)</p>
                        <h2 class="text-lg">Price ${{$package->price}}</h2>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- cart summary --}}
        <div class="w-full md:w-1/3 lg:w-2/5">
            <div class="w-full p-2 mt-3">
                <div class="w-full p-2 bg-gray-100">Magazine Summery</div>
                <div class="p-2 bg-white cart_body">
                    @foreach($packages as $pack)
                        <div class="flex items-center justify-between my-2">
                            <h4 class="text-base md:text-xl line-clamp-1">{{$pack[0]}}</h4>
                            <h4 class="text-base md:text-xl line-clamp-1">${{$pack[1]}}</h4>
                        </div>
                    @endforeach
                </div>
                <div class="w-full p-2 bg-gray-100 flex items-center justify-between">
                    <h4>Subtotal</h4> <h4 class="total_cart">${{number_format($total,2)}}</h4></div>
            </div>
            <div class="px-2">
                <div class="text-s">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum iusto harum totam saepe maiores quam quae fugit ad, rem quos.
                </div>
                <div class="flex items-center justify-between mt-4 group">
                    <label for="agree" class="flex items-center justify-start gap-1">
                        <input type="checkbox" name="agree" id="agree" />
                        <p class="text-sm text-orange-800">Agree with Terms & Condition</p>
                    </label>
                    <Button onclick="makePurchase()" class="bg-black text-white rounded-md px-3 py-1 cursor-pointer disabled:bg-gray-700 group-has-checked:bg-red-500" >Purchase Now</Button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    let packages = [];
    let total = Number({{$total}});
    let isLogin = Boolean({{auth()->check() ?: false}});

    async function sweetMessage(type,title,message,){
        Swal.fire({
            title: title,
            text: message,
            icon: type
        });
    }

    async function removeCart(package,magazine){
        try {
            const res = await axios.post('{{route('cart.remove')}}',{package:package,magazine:magazine});

            $(`.mag_${magazine}_remove`).remove();
            await sweetMessage('success',"Magazine remove",res.data.message)
        } catch (error) {
            await sweetMessage('error',"Magazine remove",error.response?.data.message)
        }
    }

    async function removePackage(package){
        try {
            const res = await axios.post('{{route('cart.remove.package')}}',{package:package});

            $(`.package_${package}_area`).remove();
            let newPackages = [];
            packages.map((pack,index) => {
                if(pack[2] != package){
                    newPackages.push(pack);
                }
            });
            renderSummery(newPackages);
            await sweetMessage('success',"Package remove",res.data.message)
        } catch (error) {
            await sweetMessage('error',"Package remove",error.response?.data.message)
        }
    }

    async function renderSummery(package){
        let cart = '';
        total = 0;
        packages = package;
        package.map(pack => {
            total += pack[1];
            cart += `<div class="flex items-center justify-between my-2">
                <h4 class="text-base md:text-xl line-clamp-1">${pack[0]}</h4>
                <h4 class="text-base md:text-xl line-clamp-1">$${pack[1]}</h4>
            </div>`;
        });
        $('.cart_body').html(cart);
        $('.total_cart').text(`$${total.toFixed(2)}`);
    }

    function makePurchase(){
        const agree = $('#agree');
        if (agree.is(':checked')) {
            if(isLogin){
                window.location.href= '{{route('user.purchase')}}';
                return;
            }
            $('.auth-modal').css({display:'flex'});
        } else {
            $('.auth-modal').css({display:'none'});
            sessionStorage.setItem('makePurchase','no');
            sweetMessage('error','Terms & Agree', 'You must agree with our terms and condition!')
        }
    }

    @foreach($packages as $pk){
        packages.push([
            '{{$pk[0]}}',
            Number({{$pk[1]}}),
            Number({{$pk[2]}})
        ])
    }
    @endforeach

    console.log(total)
</script>
@endsection
