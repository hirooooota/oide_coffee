<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>決済ページ</title>
    <!-- Tailwind CSSのリンクを追加 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md">
        <p class="text-2xl mb-4">決済ページへリダイレクトします。</p>
        <div
            style="background-color: rgb(251, 255, 0); color: black; padding: 8px 16px; border-radius: 9999px; text-align: center; margin-bottom: 16px;">
            OIDE COFFEE
        </div>


        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const publicKey = '{{ $publicKey }}';
            const stripe = Stripe(publicKey);
            window.onload = function() {
                stripe.redirectToCheckout({
                    sessionId: '{{ $session->id }}'
                }).then(function(result) {
                    window.location.href = 'http://localhost/cart';
                });
            }
        </script>
    </div>
</body>

</html>
