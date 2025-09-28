<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Subscription Confirmation</title>
  <style>
    body { margin:0; padding:0; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; }
    table { border-spacing:0; }
    img { border:0; -ms-interpolation-mode: bicubic; display:block; }
    a { color:inherit; text-decoration:none; }
    @media screen and (max-width:600px){
      .container { width:100% !important; }
      .stack { display:block !important; width:100% !important; }
      .pad { padding:16px !important; }
      .hide-mobile { display:none !important; }
    }
  </style>
</head>
<body style="background-color:#f4f6f8; margin:0; padding:0; font-family:Arial, Helvetica, sans-serif;">

  <!-- Hidden preview -->
  <div style="display:none; max-height:0px; overflow:hidden; mso-hide:all;">
    Thanks for subscribing — your {{ $subscription->package->title }} plan is active.
  </div>

  <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
      <td align="center" style="padding:24px 12px;">

        <table class="container" width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff; border-radius:8px; overflow:hidden;">
          <!-- Header -->
          <tr>
            <td style="padding:20px; background:#0f1724; color:#ffffff;">
              <img src="{{ site()->logo }}" alt="{{ site()->name }} logo" width="140" style="display:block; max-width:140px;">
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="pad" style="padding:28px 32px; color:#111827;">
              <h1 style="margin:0 0 12px; font-size:22px; color:#0b1220;">
                Thanks for subscribing, {{ $subscription->user->name }} 👋
              </h1>
              <p style="margin:0 0 18px; font-size:15px; color:#374151;">
                Your <strong>{{ $subscription->package->title }}</strong> subscription is now active.
              </p>

              <!-- Subscription details -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin-top:18px; border:1px solid #e6e9ee; border-radius:6px;">
                <tr>
                  <td style="padding:14px 16px;">
                    <table width="100%" role="presentation">
                      <tr>
                        <td style="font-size:14px; color:#6b7280;">Plan</td>
                        <td style="font-size:14px; text-align:right;"><strong>{{ $subscription->package->title }}</strong></td>
                      </tr>
                      <tr>
                        <td style="font-size:14px; color:#6b7280;">Start date</td>
                        <td style="font-size:14px; text-align:right;">{{ $subscription->created_at->format('M d, Y') }}</td>
                      </tr>
                      <tr>
                        <td style="font-size:14px; color:#6b7280;">Next billing</td>
                        <td style="font-size:14px; text-align:right;">{{ $subscription->nextBill() }}</td>
                      </tr>
                      <tr>
                        <td style="font-size:14px; color:#6b7280;">Amount</td>
                        <td style="font-size:14px; text-align:right;"><strong>{{ $subscription->price }}</strong></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- Optional magazines -->
              @if($subscription->userMagazine->count())
                <h3 style="margin:20px 0 8px; font-size:16px; color:#111827;">Included Magazines:</h3>
                <ul>
                  @foreach($subscription->userMagazine as $mag)
                    <li>{{ $mag->magazine->title ?? 'Magazine' }}</li>
                  @endforeach
                </ul>
              @endif

              <!-- CTA -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin-top:20px;">
                <tr>
                  <td align="center">
                    <a href="{{ route('auth.dashboard') }}" target="_blank" style="display:inline-block; padding:12px 20px; border-radius:6px; background:#2563eb; color:#fff; font-weight:600; font-size:15px;">
                      Manage your subscription
                    </a>
                  </td>
                </tr>
              </table>

              <p style="margin:20px 0 0; font-size:14px; color:#6b7280;">
                Need help? Contact us at <a href="mailto:{{ site()->email }}" style="color:#2563eb;">{{ site()->email }}</a>.
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:18px 32px; background:#f8fafc; color:#6b7280; font-size:13px;">
              {{ site()->name }} • <span class="hide-mobile">{{ site()->address }}</span><br>
              &copy; {{ now()->year }} {{ site()->name }}. All rights reserved.
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
</body>
</html>
