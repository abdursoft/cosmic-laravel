<!DOCTYPE html>
<html>

<head>

    <title>Upload Giff & Videos</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uppy/5.1.3/uppy.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uppy/5.1.3/uppy.min.js"></script>

    <style>
        .uppy-Dashboard-AddFiles-info {
            display: none !important;
        }
    </style>

</head>

<body style="padding:40px" class="flex items-center justify-center h-screen bg-slate-700">

    <div id="drag-drop-area"></div>

    <script>
        const uppy = new Uppy.Uppy({
            autoProceed: false
        })

        uppy.use(Uppy.Dashboard, {
            inline: true,
            target: '#drag-drop-area',
            showProgressDetails: true
        })

        uppy.on('file-added', (file) => {

            uppy.setFileMeta(file.id, {
                name: file.name
            })

        })

        uppy.use(Uppy.XHRUpload, {
            endpoint: "{{ route('chunk.store') }}",
            fieldName: 'file',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            successful:(res) => {
                console.log(res)
            }
        })

        /* 🔥 when upload finishes */
        uppy.on('complete', (result) => {

            result.successful.forEach(file => {
                console.log(file);

                fetch("{{ route('chunk.merge') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            file_name: file.name,
                            magazine: {{$id}},
                            extension: file?.extension,
                            total_chunks: file.progress.uploadComplete
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        console.log("Merged file:", data)
                    })

            })

        })
    </script>

</body>

</html>
