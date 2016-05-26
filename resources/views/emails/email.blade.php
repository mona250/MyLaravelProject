<p>
   این یک ایمیل خودکار است لطفا به آن پاسخ ندهید!!
</p>
<p>
   لینک زیر را برای ریست رمز عبور کلیک کنید!!
</p>

<p>
{{--<a   href="{{ url('password/reset/'.'token='.$token.'&email='.$email) }}" > لینک ریست </a>--}}
    {{ url('reset/password/'.$token.'/'.$email) }}
</p>
