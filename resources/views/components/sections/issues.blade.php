<!-- user magazine section  -->
<section class="w-full text-white px-1 md:px-5 min-h-screen h-auto">
        <div class="flex flex-col md:flex-row justify-center md:justify-between gap-3 w-full mt-3">
            <h2 class="text-xl md:text-2xl text-gray-600">{{$magazine->title ?? ''}}</h2>
            <div class="flex items-center justify-center md:justify-end gap-2">
                <button class="cursor-pointer bg-gray-600 text-white px-3 py-2 rounded-md btn btn-active" onclick="toggleIssues('activeIssues',this)">Active ({{count($active)}})</button>
                <button class="cursor-pointer bg-gray-600 text-white px-3 py-2 rounded-md btn" onclick="toggleIssues('inActiveIssues',this)">Archive ({{count($archive)}})</button>
            </div>
        </div>
    <div class="flex-row mt-5 w-full mb-8 h-auto gap-2 justify-center md:justify-start issues" style="display: flex" id="activeIssues">
        @if(count($active) > 0)
            <div class="flex flex-row mt-5 w-full mb-8 h-auto gap-2 justify-center md:justify-start flex-col md:flex-row">
                <!-- active issues -->
                @foreach($active as $issue)
                    @if(!$issue->isArchive())
                        <div
                            class="flex flex-col relative h-70 md:h-85 lg:h-95 w-full md:w-1/3 lg:w-1/4 my-2 overflow-hidden p-3">
                            <a href="{{ route('user.magazine.read', $issue->id) }}" class="w-full h-70 md:h-85 lg:h-95 rounded-[12px] overflow-hidden relative">
                                <!-- Left side ribbon -->
                                <div class="absolute top-0 left-0 w-16 h-16">
                                    <div class="absolute transform rotate-[-45deg] bg-green-600 text-center text-white font-medium py-1 right-[-75px] top-[32px] w-[190px]">
                                    New Release
                                    </div>
                                </div>
                                <div class="w-full h-full shadow-md text-gray-800 relative overflow-hidden">
                                    <img src="{{ Storage::url($issue->thumbnail) }}" loading="lazy" alt=""
                                        class="absolute w-full h-full">

                                    <div class="w-full text-white bg-[rgba(0,0,0,0.7)] absolute z-2 bottom-0 flex items-center justify-between px-2 py-3">
                                        <h2 class="text-xl line-clamp-1">
                                            {{ $issue->title. $issue->isArchive() }}
                                        </h2>
                                        <h2><span class="text-green-600">Issue #{{$issue->issue_index > 9 ? $issue->issue_index : '0'.$issue->issue_index}}</span></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center w-full text-xl md:text-2xl text-gray-400 h-[40vh] flex items-center justify-center">
                There are no active issues!
            </div>
        @endif
    </div>


    <div class="issues" style="display: none" id="inActiveIssues">
        @if(count($archive) > 0)
            <div class="flex flex-row mt-5 w-full mb-8 h-auto gap-2 justify-center md:justify-start flex-col md:flex-row">
                <!-- archive issues -->
                @foreach($archive as $issue)
                    @if($issue->isArchive())
                        <div
                            class="flex flex-col relative h-70 md:h-85 lg:h-95 w-full md:w-1/3 lg:w-1/4 my-2 overflow-hidden p-3">
                                <!-- Left side ribbon -->
                                <div class="absolute top-0 left-0 w-16 h-16">
                                    <div class="absolute transform rotate-[-45deg] bg-red-600 text-center text-white font-medium py-1 right-[-75px] top-[32px] w-[190px]">
                                    Archived
                                    </div>
                                </div>
                                <div class="w-full h-full shadow-md text-gray-800 rounded-[22px] relative overflow-hidden">
                                <img src="{{ Storage::url($issue->thumbnail) }}" loading="lazy" alt=""
                                    class="absolute w-full h-full">

                                <div class="w-full text-white bg-[rgba(0,0,0,0.7)] absolute z-2 top-0 text-center">
                                    <h2 class="text-xl md:text-2xl mt-4 mb-2 line-clamp-1">
                                        {{ $issue->title }}
                                    </h2>
                                </div>

                                <div class="w-full text-black absolute z-2 bottom-5 text-center">
                                    @if($magazines->archive_access == '1')
                                        <a href="{{ route('user.magazine.read', $issue->id) }}"
                                            class="text-center px-3 py-2 bg-[gold] text-black rounded-md w-[120px]">
                                            Read Issue #{{$issue->issue_index}}
                                        </a>
                                    @else
                                        <h2 class="text-xl md:text-2xl line-clamp-1 rounded-md px-3 py-1 bg-yellow-600 text-white">
                                        Locked!
                                    </h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center w-full text-xl md:text-2xl text-gray-400 h-[40vh] flex items-center justify-center">
                There are no archive issues!
            </div>
        @endif
    </div>

    </div>
</section>


<style>
    .btn-active{
        background: rgb(230, 39, 39);
        transition: ease-in-out 0.5s;
    }
</style>


<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    function toggleIssues(id,button){
        $(`.issues`).css('display','none');
        $('.btn').removeClass('btn-active');
        $(button).addClass('btn-active');
        $(`#${id}`).css('display','flex');
    }
</script>
