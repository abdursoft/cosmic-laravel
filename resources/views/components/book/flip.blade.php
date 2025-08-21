<div id="book"></div>

<button id="prevBtn">⬅️ Back</button>
<button id="nextBtn">➡️ Next</button>

<script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/src/Style/stPageFlip.min.css">

<script>
  document.addEventListener("DOMContentLoaded", async () => {
    // ✅ Create the flipbook
    const pageFlip = new St.PageFlip(
      document.getElementById("book"),
      {
        width: 550,
        height: 733,
        size: "stretch",
        minWidth: 315,
        maxWidth: 1000,
        minHeight: 420,
        maxHeight: 1350,
        maxShadowOpacity: 0.5,
        showCover: true,
        mobileScrollSupport: false
      }
    );

    const pages = await fetch(`{{route('issue.scan',['id' => $issue->id,'type' => 'pages','return' => true])}}`).
    then()

    // ✅ Load pages
    pageFlip.loadFromImages([
      "http://fiverr.test/cosmic/issue1/pages/01.jpg",
      "http://fiverr.test/cosmic/issue1/pages/02.jpg",
      "http://fiverr.test/cosmic/issue1/pages/03.jpg",
      "http://fiverr.test/cosmic/issue1/pages/04.jpg",
    ]);

    // ✅ Wire up buttons
    document.getElementById("prevBtn").addEventListener("click", (e) => {
      e.preventDefault();
      pageFlip.flipPrev();
    });

    document.getElementById("nextBtn").addEventListener("click", (e) => {
      e.preventDefault();
      pageFlip.flipNext();
    });
  });
</script>
