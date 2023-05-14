<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p{
            font-size: 18px;
        }
    </style>
</head>
<body>
<div style="margin: 0 auto;max-width:50%;">
    <div style="text-align: center">
        <img src="{{ getMailImage() }}" width="300px" height="300px" />
    </div>
    <h1>Welcome to our Family!</h1>
    <h1 style="direction: rtl">أهلا و سهلا بكم معنا و بعائلتنا!</h1>
    <div style="border: #D6A859 2px solid"></div>

    <p>First thing first. Please complete your account registration by confirming your email address through the following code:</p>

    <p>{{ $user->verify_token }}</p>


    <p>This message was sent to {{ $user->email }}</p>

    <p>For more information please contact us through our social media platforms or our website: www.writables.ae/contactus</p>
    <br><br>
    <div style="direction: rtl">
    <p>بدايةً. يرجى إكمال تسجيل حسابك من خلال تأكيد عنوان بريدك الإلكتروني من خلال الكود التالي:</p>

        <p>{{ $user->verify_token }}</p>

    <p>إذا لم تتمكن من النقر فوق الرابط أعلاه ، فيرجى نسخه ولصقه في متصفح الويب الخاص بك.</p>

    <p>تم إرسال هذه الرسالة إلى   {{ $user->email }}</p>

    <p>لمزيد من المعلومات ، يرجى الاتصال بنا من خلال منصات التواصل الاجتماعي الخاصة بنا أو عبر موقعنا: : www.writables.ae/contactus</p>
    </div>
    <div style="border: #D6A859 2px solid"></div>

</div>

</body>
</html>
