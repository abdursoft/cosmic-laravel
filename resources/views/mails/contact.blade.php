{{-- contact mail template --}}
<div style="font-family: 'Courier New', Courier, monospace; padding:20px; background:#003300; border-radius:20px;">
    <h1 style="font-size: 25px; font-weight:bold; margin-bottom:20px;">Hi, I'm {{ $name }}</h1>
    <p style="font-size:16px;font-style:italic;">Email: {{ $email }}</p>
    <p style="font-size: 19px;font-weight:bold;">Subject: {{ $subject }}</p>
    <p style="font-size: 16px;font-weight:normal;line-break:auto;">
        Message: {{ htmlentities($content) }}
    </p>
</div>
