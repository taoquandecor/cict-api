<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Dear Anh\Chị,</p>
<p>Thông tin tài khoản hệ thống của anh\chị như sau:</p>
<ul>
    <li>Username: <b><?php echo e($username); ?></b></li>
    <li>Password: <b><?php echo e($password); ?></b></li>
    <?php if(in_array(\App\General\Feature::ADMIN, explode(\App\General\Config::COMMA, $application))): ?>
        <li>Địa chỉ truy cập hệ thống <a href="<?php echo e(\App\General\Feature::ADMIN_URL); ?>"><?php echo e(\App\General\Feature::ADMIN_URL); ?></a></li>

    <?php endif; ?>
    <?php if(in_array(\App\General\Feature::PORTAL, explode(\App\General\Config::COMMA, $application))): ?>
        <li>Địa chỉ truy cập hệ thống <a href="<?php echo e(\App\General\Feature::PORTAL_URL); ?>"><?php echo e(\App\General\Feature::PORTAL_URL); ?></a></li>
    <?php endif; ?>
</ul>

<p style="text-decoration: underline"><b>Yêu cầu chú ý:</b></p>
<div style="color:red">
    <p>1.       Không reply hoặc forward thư này cho người khác.</p>
    <p>2.       Anh/chị hoàn toàn chịu trách nhiệm bảo mật thông tin tài khoản đã được cấp.</p>
    <p>3.       Thay đổi mật khẩu ngay sau khi nhận được thư này.</p>
</div>

<div style="color: #727272;font-weight: bold;">
    <p>Thanks and regards,</p>
</div>

</body>
</html>
<?php  ?>
