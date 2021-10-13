<style>
    div{
        font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
    }
</style>
<div style="background: #edf2f7;min-width: 800px;padding: 50px;text-align: center;">
    <img src="{{ asset('assets/remark/assets/images/logo@2x.png') }}" style="width: 50px;margin-bottom: 20px;margin-bottom: 20px;">
    <div style="background: #fff;border-radius: 5px;padding: 20px; width: 600px;margin: auto;">
        <h2 style="text-align: center;">Welcome</h2>
        <p style="text-align: left;">Hi, {{ $data['name'] }}</p>
        <p style="text-align: left;">Thank you for registering with RxDOZ web portal. Please keep this email for your records for future reference.</p>

        <table style="text-align: left;">
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $data['email'] }}</td>
            </tr>
            <tr>
                <th>Password</th>
                <td>:</td>
                <td>{{ $data['password'] }}</td>
            </tr>

        </table>

        <a href="{{ route('login') }}" rel="noopener" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';border-radius:4px;color:#fff;display:inline-block;overflow:hidden;text-decoration:none;background-color:#2d3748;border-bottom:8px solid #2d3748;border-left:18px solid #2d3748;border-right:18px solid #2d3748;border-top:8px solid #2d3748" target="_blank">Go to Profile</a>

        <p style="text-align: left;">Regards,<br>{{ Setting::get('site_title') }}</p>
    </div>
    <p>© {{ date('Y') }} {{ Setting::get('site_title') }}. All rights reserved.</p>
</div>

