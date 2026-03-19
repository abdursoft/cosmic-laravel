@extends('layout.issue')

@section('title', 'content list')

@section('content')

    <div class="container min-h-screen">
        <!-- contents -->
        <div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;"
            id="activeMagazine">
            @foreach ($magazines->contents ?? [] as $key => $content)
                <div
                    class="flex flex-col relative h-70 md:h-85 lg:h-95 w-full md:1/3 lg:w-1/3 2xl:w-1/4 my-2 overflow-hidden p-3">
                    <div
                        class="w-full h-70 relative md:h-85 lg:h-95 rounded-[12px]">
                        @if($type == 'giff')
                            <img class="w-full h-full  overflow-hidden hover:scale-[1.1] transition-all delay-100" src="{{Storage::url($content->path)}}">
                        @else 
                            <video class="w-full h-full  overflow-hidden hover:scale-[1.1] transition-all delay-100" playsinline muted preload src="{{Storage::url($content->path)}}" poster="{{asset('static/images/video.svg')}}"> </video>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function toggleMagazine(id, button) {
            $(`.magazine`).css('display', 'none');
            $('.btn').removeClass('btn-active');
            $(button).addClass('btn-active');
            $(`#${id}`).css('display', 'flex');
        }

        $("#enter").on('scroll', (e) => {
            e.preventDefault();
        })

        function toggleEnter(){
            $("#enter").css({display:'none'});
        }
    </script>

@endpush