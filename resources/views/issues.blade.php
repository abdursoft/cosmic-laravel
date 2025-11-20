@extends('layout.issue')

@section('title', 'Issue list')

@section('content')

    <div class="container min-h-screen">
        <div class="flex flex-col md:flex-row justify-center md:justify-between gap-3 w-full mt-3 mb-5">
            <div class="h3 text-2xl md:text-3xl text-white">
                {{ $magazine->title ?? '' }}
            </div>
            <div class="flex items-center justify-center md:justify-end gap-2">
                <button class="cursor-pointer bg-gray-600 text-white px-3 py-2 rounded-md btn btn-active"
                    onclick="toggleMagazine('activeMagazine',this)">Active</button>
                <button class="cursor-pointer bg-gray-600 text-white px-3 py-2 rounded-md btn"
                    onclick="toggleMagazine('inActiveMagazine',this)">Archive</button>
            </div>
        </div>

        <!-- active magazine -->
        <div class="mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine" style="display: flex;"
            id="activeMagazine">
            @foreach ($magazine->issues as $key => $issue)
                @if (!$issue->isArchive())
                    <div
                        class="flex flex-col relative h-70 md:h-85 lg:h-95 w-full md:1/3 lg:w-1/3 2xl:w-1/4 my-2 overflow-hidden p-3">
                        <a href="{{ route(auth()->user()->role == 'admin' ? 'admin.issues.read' : 'user.issue.read', $issue->id) }}"
                            class="w-full h-70 md:h-85 lg:h-95 rounded-[12px] overflow-hidden">
                            <div class="w-full h-full shadow-md text-gray-800 relative overflow-hidden" style="background: url('{{ Storage::url($issue->thumbnail) }}') no-repeat center;background-size:cover;">
                                <div
                                    class="w-full text-white bg-[rgba(0,0,0,0.7)] absolute z-2 bottom-0 flex items-center justify-between px-2 py-3">
                                    <h2 class="text-xl line-clamp-1">
                                        {{ substr($issue->title,0,23) . $issue->isArchive() }}
                                    </h2>
                                    <h2><span class="{{ $issue->isNew() ? 'text-green-600' : 'text-yellow-600' }}">Issue
                                            #{{ $issue->issue_index > 9 ? $issue->issue_index : '0' . $issue->issue_index }}</span>
                                    </h2>
                                </div>

                                <div
                                    class="absolute top-2 left-0 ml-[10px] rounded-md bg-green-500 {{ $issue->isNew() ? 'flex' : 'hidden' }} items-center justify-center px-2 py-1 text-white">
                                    New Arrival</div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- archive magazine -->
        <div class="flex mt-5 w-full flex-col md:flex-row justify-start flex-wrap mb-8 h-auto magazine"
            style="display: none" id="inActiveMagazine">
            @foreach ($magazine->issues as $key => $issue)
                @if ($issue->isArchive())
                    <a href="{{ route(auth()->user()->role == 'admin' ? 'admin.issues.read' : 'user.issue.read', $issue->id) }}"
                        class="flex flex-col p-5 w-full md:w-1/3">
                        <div class="w-full h-full shadow-md text-gray-800 relative overflow-hidden" style="background: url('{{ Storage::url($issue->thumbnail) }}') no-repeat center;background-size:cover;">
                            <div class="p-2 flex items-center justify-between flex-1 bg-gray-700">
                                <h2 class="text-xl line-clamp-1">{{ $issue->title }}</h2>
                                <h2 class="text-xl text-orange-600">#Issue
                                    {{ $issue->issue_index < 9 ? '0' . $issue->issue_index : $issue->issue_index + 1 }}</h2>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    <style>
        .btn-active {
            background: rgb(230, 39, 39);
            transition: ease-in-out 0.5s;
        }
    </style>


    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function toggleMagazine(id, button) {
            $(`.magazine`).css('display', 'none');
            $('.btn').removeClass('btn-active');
            $(button).addClass('btn-active');
            $(`#${id}`).css('display', 'flex');
        }
    </script>

@endsection
