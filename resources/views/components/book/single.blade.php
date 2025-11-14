<!-- content body  -->
<div class="app">
    <div class="gate" id="gate">
        <h1 class="text-2xl md:text-3xl">Issue <?php echo $issue->issue_index; ?></h1>
        <p>Tap “Start” to enable sound. Swipe or use arrows to turn pages.</p><button class="btn"
            id="startBtn">Start</button>
        <p class="hint {{$demo == 1 ? 'hidden' : ''}}">Replace images in /pages and sounds in /audio &amp; /sfx.</p>
    </div>
    <div class="book" id="book">
        <div class="topbar">
            <div class="leftFlex" style="display:flex;align-items:center;gap:8px">
                <div class="pill">Audio ON</div>
            </div>
            <div class="ctrls"><label>Music <input id="musicVol" class="range" type="range" min="0"
                        max="1" step="0.01" value="0.6"></label><label>SFX <input id="sfxVol"
                        class="range" type="range" min="0" max="1" step="0.01"
                        value="0.8"></label><button id="muteAll" class="btn"
                    style="padding:8px 12px;font-weight:600">Mute</button><button id="toggleFullScreen" class="btn"
                    onclick="toggleFullScreen()"
                    style="padding:8px 12px;font-weight:600;background:rgba(255,255,255,.06)"></button></div>
        </div>
        <div class="page-wrap" id="viewport">
            <div class="index" id="idx"><span class="currentPage"></span> / <span class="totalPage"></span></div>
            <div class="relative" id="bookContainer">
                <div id="magazine">
                </div>
            </div>
        </div>
        <div class="bottombar">
            <div class="hint">Keyboard: ← / → • Touch: swipe • Click: arrows</div>
            <div class="nav">
                <button id="prevBtn" class="relative" aria-label="Previous">⟵</button>
                <button class="btn closeBtn relative" style="display:{{$demo == 1 ? 'none' : 'block'}}" onclick="closeBook()">
                    Close
                    book</button>
                <button id="nextBtn" aria-label="Next">⟶</button>
            </div>
            <div class="pill"><a href="javascript:void(0);" onclick="closeBook()" class="btn topClose"
                    style="text-decoration:none;background:rgba(255,255,255,.06);color:#fff;padding:8px;border-radius:14px;text-align:center;font-size:13px;font-weight:400;display:{{$demo == 1 ? 'none' : ''}}">Close
                    book</a>
                <div id="sceneLabel">Scene: default</div>
            </div>
        </div>
    </div>
</div>


<script>
    let maxPage = 6;
    let current = 0;
    let musicHowl = null;
    let pageTurnHowl = null;
    let bmgHowl=null;
    let sfxHowls = [];
    let gfxHowls = [];
    let musicMuted = false,
        sfxMuted = !1;
    let PAGES = [];
    let images = ["{{ asset('storage/issues/' . $path . '/cover.jpg') }}"];
    let pageFlip = undefined;
    let viewport = undefined;
    let dWidth = dHeight = 0;
    let isStart = false;
    let prevAction = false;
    let isClickable = true;
    let demo = `{{$demo ?? 0}}`;

    fetch("{{ route('issue.scan', ['id' => $issue->id, 'type' => 'pages','demo' => $demo ?? false]) }}").then((res) => res.json()).then((
        data) => {

        let magazine = '';

        let sortPage = data.sort((a, b) => a.page - b.page);

        sortPage.forEach((page, i) => {
            images.push(page.url);
            PAGES.push({
                img: page.url,
                scene: "",
                sfx: i === 0 ? ["wind.wav"] : [],
            })
            document.querySelector('.currentPage').textContent = 1;
            document.querySelector('.totalPage').textContent = images.length - 1;

            magazine += `<div class='cover'><img src='${page.url}' /></div>`;
        });
        document.getElementById('magazine').innerHTML = magazine;

        $('#magazine').turn({
            display: 'single',
            acceleration: true,
            gradients: !$.isTouch,
            elevation: 50,
            duration: 1000,
            when: {
                turning: function(e, page){
                    if((current + 1) >= maxPage && demo && prevAction){
                        message("Demo Simulation", "Max 6 pages allowed for trail");
                        $('#magazine').turn('disable',true);
                    }else{
                        $('#magazine').turn('disable',false);
                    }
                    e.preventDefault();
                    return false;
                },
                turned: function (e, page) {
                    current = page;
                    if (typeof isStart !== 'undefined' && isStart) {
                        console.log(`\n Current page ${current}`);
                        console.log(`\n Playing page `, PAGES[current - 1]);
                        setPageTurn();
                        playAudioByBMG(current);
                        playAudioByPage(current);
                        playSFXByPage(current);
                        playGFXByPage(current);
                        console.log(`Page ${current} end \n`);
                    }
                    document.querySelector('.currentPage').textContent = current;
                }
            }
        });


        $(window).bind('keydown', function(e) {
            if (e.keyCode == 37){
                $('#magazine').turn('previous');
                prevAction = false;
            }

            if (e.keyCode == 39){
                if(current >= maxPage && demo){
                    return false;
                }
                $('#magazine').turn('next');
                prevAction = true;
            }
        });
        // Get initial size of magazine (before fullscreen)
        let mag = document.getElementById("magazine");
        let dWidth = mag.offsetWidth;
        let dHeight = mag.offsetHeight;

        // Listen for fullscreen change
        document.addEventListener("fullscreenchange", () => {
            if (document.fullscreenElement) {
                // Fullscreen → fit to window
                let w = window.innerWidth;
                let h = window.innerHeight;
                $('#magazine').turn('size', w, h);
            } else {
                // Exit fullscreen → restore original size
                $('#magazine').turn('size', dWidth, dHeight);
            }
        });

        // Handle resizing inside fullscreen
        window.addEventListener("resize", () => {
            if (document.fullscreenElement) {
                let w = window.innerWidth;
                let h = window.innerHeight;
                $('#magazine').turn('size', w, h);
            }
        });


        PAGES.forEach((p) => {
            const link = document.createElement("link");
            link.rel = "preload";
            link.as = "image";
            link.href = p.img;
            document.head.appendChild(link)
        })
    }).catch((err) => console.error("Error fetching pages list:", err));
    const MUSIC_TRACKS = {
        default: null
    };
    const CONTINUOUS_MUSIC = !0;
    let audioList = sfxList = [];
    let gfxList = bmgList = [];
    fetch("{{ route('issue.scan', ['id' => $issue->id, 'type' => 'audio', 'demo' => $demo ?? false]) }}").then((res) => res.json()).then((
        data) => {
        audioList = data;
    }).catch((err) => console.error("Error fetching audio list:", err));
    fetch("{{ route('issue.scan', ['id' => $issue->id, 'type' => 'sfx', 'demo' => $demo ?? false]) }}").then((res) => res.json()).then((data) => {
        sfxList = data;
    });
    fetch("{{ route('issue.scan', ['id' => $issue->id, 'type' => 'gfx', 'demo' => $demo ?? false]) }}").then((res) => res.json()).then((data) => {
        gfxList = data;
    });
    fetch("{{ route('issue.scan', ['id' => $issue->id, 'type' => 'bmg', 'demo' => $demo ?? false]) }}").then((res) => res.json()).then((data) => {
        bmgList = data;
    });
    const gate = document.getElementById("gate");
    const startBtn = document.getElementById("startBtn");
    const book = document.getElementById("book");
    const idx = document.getElementById("idx");
    const sceneLabel = document.getElementById("sceneLabel");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const musicVol = document.getElementById("musicVol");
    const sfxVol = document.getElementById("sfxVol");
    const muteAll = document.getElementById("muteAll");
    let swiper = null;
    let swiperSlides = "";
    let currentAudioData = null;
    let currentSFXData = null;
    let currentGFXData = null;
    let currentBMGAudioData = null;
    let isFullScreen = !1;

    const icons = {
        fullScreen: `<svg viewBox="0 0 24 24" width="18px" height="18px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=stroke"> <g id="fullscreen"> <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M1.25 4C1.25 2.48122 2.48122 1.25 4 1.25H8C8.41421 1.25 8.75 1.58579 8.75 2C8.75 2.41421 8.41421 2.75 8 2.75H4C3.30964 2.75 2.75 3.30964 2.75 4V8C2.75 8.41421 2.41421 8.75 2 8.75C1.58579 8.75 1.25 8.41421 1.25 8V4Z" fill="#ffffff"></path> <path id="vector (Stroke)_2" fill-rule="evenodd" clip-rule="evenodd" d="M20 1.25C21.5188 1.25 22.75 2.48122 22.75 4L22.75 8C22.75 8.41421 22.4142 8.75 22 8.75C21.5858 8.75 21.25 8.41421 21.25 8L21.25 4C21.25 3.30964 20.6904 2.75 20 2.75L16 2.75C15.5858 2.75 15.25 2.41421 15.25 2C15.25 1.58579 15.5858 1.25 16 1.25L20 1.25Z" fill="#ffffff"></path> <path id="vector (Stroke)_3" fill-rule="evenodd" clip-rule="evenodd" d="M22.75 20C22.75 21.5188 21.5188 22.75 20 22.75L16 22.75C15.5858 22.75 15.25 22.4142 15.25 22C15.25 21.5858 15.5858 21.25 16 21.25L20 21.25C20.6904 21.25 21.25 20.6904 21.25 20L21.25 16C21.25 15.5858 21.5858 15.25 22 15.25C22.4142 15.25 22.75 15.5858 22.75 16L22.75 20Z" fill="#ffffff"></path> <path id="vector (Stroke)_4" fill-rule="evenodd" clip-rule="evenodd" d="M1.25 20C1.25 21.5188 2.48122 22.75 4 22.75L8 22.75C8.41421 22.75 8.75 22.4142 8.75 22C8.75 21.5858 8.41421 21.25 8 21.25L4 21.25C3.30964 21.25 2.75 20.6904 2.75 20L2.75 16C2.75 15.5858 2.41421 15.25 2 15.25C1.58579 15.25 1.25 15.5858 1.25 16L1.25 20Z" fill="#ffffff"></path> </g> </g> </g></svg>`,
        exitScreen: `<svg fill="#ffffff" width="18px" height="18px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M391 240.9c-.8-6.6-8.9-9.4-13.6-4.7l-43.7 43.7L200 146.3a8.03 8.03 0 0 0-11.3 0l-42.4 42.3a8.03 8.03 0 0 0 0 11.3L280 333.6l-43.9 43.9a8.01 8.01 0 0 0 4.7 13.6L401 410c5.1.6 9.5-3.7 8.9-8.9L391 240.9zm10.1 373.2L240.8 633c-6.6.8-9.4 8.9-4.7 13.6l43.9 43.9L146.3 824a8.03 8.03 0 0 0 0 11.3l42.4 42.3c3.1 3.1 8.2 3.1 11.3 0L333.7 744l43.7 43.7A8.01 8.01 0 0 0 391 783l18.9-160.1c.6-5.1-3.7-9.4-8.8-8.8zm221.8-204.2L783.2 391c6.6-.8 9.4-8.9 4.7-13.6L744 333.6 877.7 200c3.1-3.1 3.1-8.2 0-11.3l-42.4-42.3a8.03 8.03 0 0 0-11.3 0L690.3 279.9l-43.7-43.7a8.01 8.01 0 0 0-13.6 4.7L614.1 401c-.6 5.2 3.7 9.5 8.8 8.9zM744 690.4l43.9-43.9a8.01 8.01 0 0 0-4.7-13.6L623 614c-5.1-.6-9.5 3.7-8.9 8.9L633 783.1c.8 6.6 8.9 9.4 13.6 4.7l43.7-43.7L824 877.7c3.1 3.1 8.2 3.1 11.3 0l42.4-42.3c3.1-3.1 3.1-8.2 0-11.3L744 690.4z"></path> </g></svg>`
    };
    document.getElementById("toggleFullScreen").innerHTML = icons.fullScreen;
    startBtn.addEventListener("click", async () => {
        gate.style.display = "none";
        book.classList.add("ready");
        isStart = true;
        setPageTurn();
        playAudioByPage(1);
        attachControls()
    });

    nextBtn.addEventListener("click", () => {
        if(current >= maxPage && demo){
            message("Demo Simulation", "Max 6 pages allowed for trail");
            return false;
        }
        if(isClickable){
            $('#magazine').turn('next');
            isClickable = false;
            prevAction = true;
            setTimeout(() => {
                isClickable = true;
            }, 1100);
        }
    });
    prevBtn.addEventListener("click", () => {
        prevAction = false;
        $('#magazine').turn('previous');
    });

    function playAudioByBMG(page) {
        let audioData = bmgList.find(ad => {
            if (!Array.isArray(ad.pages)) return false;

            // First priority: check if array explicitly contains the page
            if (ad.pages.includes(page)) {
                return true;
            }else if (ad.pages.length == 2) {
                const [start, end] = ad.pages;
                return page >= start && page <= end;
            }
            return false;
        });

        if (!audioData) {
            if (bmgHowl instanceof Howl) {
                bmgHowl.stop();
            }
            return;
        }

        console.log('bmg',audioData)

        if (audioData && currentBMGAudioData && currentBMGAudioData.url == audioData?.url && bmgHowl && bmgHowl.playing()) {
            console.log("Audio already playing for this range, skipping restart.");
            return
        }
        if (bmgHowl instanceof Howl) {
            bmgHowl.stop();
        }

        bmgHowl = new Howl({
            src: audioData.url,
            loop: CONTINUOUS_MUSIC,
            volume: parseFloat(musicVol.value),
            html5: !0,
            mute: musicMuted
        });
        bmgHowl.play();
        currentBMGAudioData = audioData
    }

    function playAudioByPage(page) {
        let audioData = audioList.find(ad => {
            if (!Array.isArray(ad.pages)) return false;

            // First priority: check if array explicitly contains the page
            if (ad.pages.includes(page)) {
                return true;
            }else if (ad.pages.length == 2) {
                const [start, end] = ad.pages;
                return page >= start && page <= end;
            }
            return false;
        });

        if (!audioData) {
            audioData = {
                url: "{{ asset('storage/issues/' . $path . '/audio/default.mp3') }}",
                description: "",
                page: [0]
            }
        }

        console.log('bgm',audioData)

        if (audioData && currentAudioData && currentAudioData.url == audioData?.url && musicHowl && musicHowl.playing()) {
            console.log("Audio already playing for this range, skipping restart.");
            return
        }
        if (musicHowl instanceof Howl) {
            musicHowl.stop();
        }

        musicHowl = new Howl({
            src: audioData.url,
            loop: CONTINUOUS_MUSIC,
            volume: parseFloat(musicVol.value),
            html5: !0,
            mute: musicMuted
        });
        musicHowl.play();
        currentAudioData = audioData
    }

    function playSFXByPage(page) {
        let audioData = null;

        // First try to find exact page matches (including the 3rd number case)
        audioData = sfxList.find(ad => {
            if (!Array.isArray(ad.pages)) return false;

            // First priority: check if array explicitly contains the page
            if (ad.pages.includes(page)) {
                return true;
            }
            if (ad.pages.length == 2) {
                const [start, end] = ad.pages;
                return page >= start && page <= end;
            }
            return false;
        });

        console.log('sfx',audioData)

        if (!audioData) {
            if (sfxHowls instanceof Howl) {
                sfxHowls.stop();
                console.log('Sfx stop')
                return;
            }
        }


        if (audioData && currentSFXData && currentSFXData.url === audioData?.url && sfxHowls && sfxHowls.playing()) {
            console.log("SFX Audio already playing for this range, skipping restart.");
            return;
        }
        if (audioData) {
            if (sfxHowls instanceof Howl) {
                sfxHowls.stop()
            }
            sfxHowls = new Howl({
                src: audioData?.url,
                loop: CONTINUOUS_MUSIC,
                volume: parseFloat(musicVol.value),
                html5: !0,
                mute: musicMuted
            });
            sfxHowls.play();
            currentSFXData = audioData
        }
    }

    function playGFXByPage(page) {
        let audioData = null;

        // First try to find exact page matches (including the 3rd number case)
        audioData = gfxList.find(ad => {
            if (!Array.isArray(ad.pages)) return false;

            // First priority: check if array explicitly contains the page
            if (ad.pages.includes(page)) {
                return true;
            }

            if (ad.pages.length == 2) {
                const [start, end] = ad.pages;
                return page >= start && page <= end;
            }
            return false;
        });

        console.log('gfx',audioData)

        if (!audioData) {
            if (gfxHowls instanceof Howl) {
                gfxHowls.stop();
                console.log('Gfx stop')
                return;
            }
        }

        if (audioData && currentGFXData && currentGFXData.url === audioData?.url && gfxHowls && gfxHowls.playing()) {
            console.log("GFX Audio already playing for this range, skipping restart.");
            return;
        }
        if (audioData) {
            if (gfxHowls instanceof Howl) {
                gfxHowls.stop()
            }
            gfxHowls = new Howl({
                src: audioData?.url,
                loop: CONTINUOUS_MUSIC,
                volume: parseFloat(musicVol.value),
                html5: !0,
                mute: musicMuted
            });
            gfxHowls.play();
            currentGFXData = audioData
        }
    }

    function setPageTurn() {
        let pageTurnSrc = "{{ asset('storage/issues/' . $path . '/sfx/pageturn.mp3') }}";

        if (pageTurnSrc) {
            pageTurnHowl = new Howl({
                src: pageTurnSrc,
                volume: parseFloat(sfxVol.value),
                mute: musicMuted
            }).play()
        }
    }

    function getPageEvent(page) {
        return sfxList.find(sfx => sfx.page === page) || null
    };

    function clamp(n, min, max) {
        return Math.max(min, Math.min(max, n))
    }

    function updateNavState() {
        prevBtn.disabled = current <= 0;
        nextBtn.disabled = current >= PAGES.length - 1
    }

    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.getElementById('book').requestFullscreen();
            isFullScreen = !0;
            document.getElementById("toggleFullScreen").innerHTML = icons.exitScreen
        } else {
            document.exitFullscreen();
            isFullScreen = !1;
            document.getElementById("toggleFullScreen").innerHTML = icons.fullScreen
        }
    }

    function attachControls() {
        window.addEventListener("keydown", (e) => {
            if (e.key === "ArrowRight") {
                e.preventDefault();
                $('#magazine').turn('next');
            };
            if (e.key === "ArrowLeft") {
                e.preventDefault();
                $('#magazine').turn('previous');
            };
        });

        musicVol.addEventListener("input", () => {
            if (musicHowl) {
                musicHowl.volume(musicMuted ? 0 : parseFloat(musicVol.value))
            }
            if (gfxHowls instanceof Howl) gfxHowls.volume(musicMuted ? 0 : parseFloat(musicVol.value));
            if (bmgHowl instanceof Howl) bmgHowl.volume(musicMuted ? 0 : parseFloat(musicVol.value));
        });
        sfxVol.addEventListener("input", () => {
            const v = sfxMuted ? 0 : parseFloat(sfxVol.value);
            if (sfxHowls) {
                if (Array.isArray(sfxHowls)) {
                    sfxHowls.forEach((h) => h.volume(v))
                }else{
                    if (sfxHowls instanceof Howl) sfxHowls.volume(v);
                }
            }
            if (pageTurnHowl instanceof Howl) pageTurnHowl.volume(v);

        });
        muteAll.addEventListener("click", () => {
            musicMuted = !musicMuted;
            if (musicHowl instanceof Howl) musicHowl.mute(musicMuted);
            if (pageTurnHowl instanceof Howl) pageTurnHowl.mute(musicMuted);
            if (bmgHowl instanceof Howl) bmgHowl.mute(musicMuted);
            if (gfxHowls instanceof Howl) gfxHowls.mute(musicMuted);

            if (sfxHowls instanceof Howl)  sfxHowls.mute(musicMuted);
            muteAll.textContent = musicMuted ? "Unmute" : "Mute"
        })
    }

    function closeBook() {
        window.history.back();
    }

    function message(title,message){
        Swal.fire({
            title: title,
            text: message,
            icon: "error"
        });
    }
</script>
