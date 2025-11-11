<!-- video player -->
<div class="w-full max-w-5xl mx-auto px-2 md:px-4">
    <div class="relative rounded-2xl overflow-hidden shadow-lg">
        <div id="player"></div>
    </div>
</div>

@section('scripts')
        <script type='module'>
        import Player from '{{asset("js/player.js")}}?time={{time()}}';

        function testEvent(event,data){
            console.log(event, data);
        }

        localStorage.setItem('abs_active_sound',90);

        const Media = Player({
            id:'player',
            src: "{{asset('videos/preview.mp4')}}?time={{time()}}",
            encrypt: false,
            api_key: 'c28zb2llcXVkZWFyb3I3N2xkZWlnNzBmdWFsMDZodDZj',
            background: 'darkblue',
            playback: {
                speed: [0.5, 1, 1.5, 2],
                default: 1,
                placement:{
                    content: "x",
                }
            },
            subtitle: [],
            logo: {
                url:"https://abdursoft.com/assets/images/logo/abdursoft-f.svg",
                position:{
                    position: "absolute",
                    width: '70px',
                    height: '65px',
                    top: "10px",
                    right:"30px",
                    zIndex:4,
                    borderRadius: "50%",
                    overflow: "hidden"
                }
            },
            iconHoverColor:"rgba(36, 107, 173, 0.88)",
            progress: {
                css:{
                    width: "98%",
                    height: "5px",
                    position: "absolute",
                    bottom: "50px",
                    background: "#f9f9f9",
                    left: '1%',
                    right: '1%',
                    zIndex: 5,
                    display:'none',
                    borderRadius: '4px',
                    cursor: "pointer",
                    overflow: 'hidden',
                    transition: "all 0.3s"
                },
                defaultHeight: "5px",
                extendHeight: "8px"
            },
            progressTimeline:{
                position: 'absolute',
                width: 0,
                height: '100%',
                top: 0,
                left: 0,
                background: 'red',
                cursor: 'pointer',
                display: 'block'
            },
            volumeContainer:{
                css: {
                    width: '110px',
                    display: 'flex',
                    alignItems: 'center',
                    position: 'absolute',
                    justifyContent: "center",
                    bottom: '118px',
                    right: '10px',
                    padding:'8px 10px',
                    zIndex: 5,
                    background: "rgba(0,0,0,0.5)",
                    transform: "rotate(-90deg)",
                    borderRadius: "5px"
                },
                type: 'vertical'
            },
            volumeSliderArea:{
                width: '100%',
                height: '15px',
                background: 'gray',
                cursor: 'pointer',
                transition: '0.5s',
                position: 'relative',
            },
            volumeSlider: {
                width: '0px',
                height: '15px',
                background: 'red',
                cursor: 'pointer',
                transition: '0.5s',
                position: 'absolute'
            },
            durationArea:{
                css: {
                    display: 'flex',
                    zIndex: 2,
                    alignItems: 'center',
                    gap: "5px",
                },
                divider: {
                    content: "/",
                    css: {
                        fontSize:"13px",
                        color: "#fff",
                        fontWeight: "bold",
                        marginBottom: "0px",
                        paddingBottom: "0px"
                    }
                },
            },
            controls: {
                left: ['playPauseControl','durationArea'],
                right: ['volumeControl','screenControl'],
                background: "rgba(0,0,0,0.3)"
            },
            loop:true,
            lang: "EN",
            tooltip: true,
            // listener: testEvent
        });

        //Media.play();
    </script>
@endsection
