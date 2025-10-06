@extends('layout.app')

@section('title','Select your magazine')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/sweet.css')}}">
@endsection

@section('content')

<!-- Magazine selection form -->
<div class="w-full flex items-center justify-center flex-col py-10">
    <div class="container min-h-screen">
        <div class="flex flex-col md:flex-row justify-center md:justify-between gap-3 w-full mt-3 px-0 md:px-5">
            <div class="h3 text-2xl md:text-3xl text-red-500 text-center md:text-start">
                You can select only {{$package->allowed_magazine}} magazine{{$package->allowed_magazine > 1 ? 's' : ''}}
            </div>
            <div class="flex items-center justify-center md:justify-end gap-2">
                    <a href="{{route('cart.list')}}" class="cursor-pointer bg-teal-600 text-white px-3 py-2 rounded-md">Confirm & Unlock</a>
            </div>
        </div>

            <!-- active magazine -->
            <div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;" id="activeMagazine">
                @foreach(magazines() as $key=>$magazine)
                    @php $active = isCart($package->id,$magazine->id); @endphp
                    @if($magazine->publish())
                        <div class="flex flex-col p-5 w-full md:w-1/3">
                            <div class="w-full h-full rounded-lg overflow-hidden shadow-2xl flex flex-col">
                                <img class="h-[460px]" src="{{Storage::url($magazine->thumbnail)}}" alt="{{$magazine->title}}" loading="lazy">
                                <div class="flex items-center justify-center flex-1 bg-gray-700 p-2 gap-3">
                                    <button type="button" onclick="addToCart('{{$magazine->id}}',this)" class="flex items-center justify-center gap-3 bg-orange-500 text-white rounded-md cursor-pointer w-full p-2 add-cart-{{$magazine->id}} {{$active == true ? 'hidden' : ''}}">

                                        Add To Cart
                                    </button>
                                    <button type="button" onclick="removeCart('{{$magazine->id}}',this)" class="flex items-center justify-center gap-3 bg-red-500 text-white rounded-md cursor-pointer w-full p-2 remove-cart-{{$magazine->id}} {{$active == true ? '' : 'hidden'}}">

                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
    </div>
</div>
<!-- Magazine selection form -->

@endsection


@section('scripts')
<script src="{{asset('js/axios.js')}}"></script>
<script src="{{asset('js/sweet.js')}}"></script>
<script>
    const package = '{{$package->id}}';


    async function sweetMessage(type,title,message,){
        Swal.fire({
            title: title,
            text: message,
            icon: type
        });
    }

    async function addToCart(id, el = null) {
        try {
            const res = await axios.post('{{ route('cart.add') }}', {
                package: package,
                magazine_id: id
            });


            if(res.data.code == 'CART_ADDED' || res.data.code == 'ALREADY_EXISTS'){
                $(`.remove-cart-${id}`).removeClass('hidden');
                if(el) $(el).addClass('hidden');
            }

            let status = 'success';
            let msg = 'Added to cart';

            if(res.data.code == 'ALREADY_EXISTS'){
                msg = 'Already Exists';
                status = 'error'
            }

            // await sweetMessage(status, msg, res.data.message);

        } catch (error) {
            await sweetMessage('error', "Already exists!", error.response?.data.message);
        }
    }

    
    async function removeCart(magazine,el=null){
        try {
            const res = await axios.post('{{route('cart.remove')}}',{package:package,magazine:magazine});

            if(res.data.code == 'CART_REMOVED'){
                $(`.add-cart-${magazine}`).removeClass('hidden');
                if(el) $(el).addClass('hidden');
            }

        } catch (error) {
            await sweetMessage('error',"Magazine remove",error.response?.data.message)
        }
    }
</script>

@endsection
