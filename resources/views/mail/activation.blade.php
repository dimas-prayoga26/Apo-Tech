<!-- START HEAD -->
<head>
    
    <!-- CHARSET -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    
    <!-- MOBILE FIRST -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    
    <!-- RESPONSIVE CSS -->
    <style type="text/css">
        @media only screen and (max-width: 550px){
            .responsive_at_550{
                width: 90% !important;
                max-width: 90% !important;
            }
        }
    </style>

</head>
<!-- END HEAD -->

<!-- START BODY -->
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    
    <!-- START EMAIL CONTENT -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">        
        <tbody>
            
            <tr>
                
                <td align="center" bgcolor="#ffffff">
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td width="100%" align="center">
                                    
                                    <!-- START SPACING -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END SPACING -->
                                    
                                    <!-- START SPACING -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END SPACING -->
                                    
                                    <!-- START CONTENT -->
                                    <table width="500" border="0" cellpadding="0" cellspacing="0" align="center" style="padding-left:20px; padding-right:20px;" class="responsive_at_550">
                                        <tbody>
                                            <tr>
                                                <td align="center" bgcolor="#ffffff">
                                                    
                                                    <!-- START BORDER COLOR -->
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100%" height="7" align="center" border="0" bgcolor="#00B9D8"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END BORDER COLOR -->
                                                    
                                                    <!-- START SPACING -->
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END SPACING -->
                                                    
                                                    <!-- START HEADING -->
                                                    <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100%" align="center">
                                                                    <img width="200" src="{{ asset('assets-image/logo.png') }}" alt="Logo Apo-Tech" border="0" style="text-align: center;"/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END HEADING -->
                                                    
                                                    <!-- START PARAGRAPH -->
                                                    <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td width="100%" align="center">
                                                                    <p style="font-family:'Ubuntu', sans-serif; font-size:14px; color:#202020; padding-left:20px; padding-right:20px; text-align:justify;">
                                                                        Terimakasih <span style="font-family:'Ubuntu Mono', monospace; color:#354fe4;">{{ $user->username }}</span> telah mendaftar di web Virtual Technopark, langkah selanjutnya yang harus anda lakukan adalah memverifikasi akun anda demi keamanan sistem kami. Klik tombol di bawah ini untuk melakukan aktivasi akun anda.
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END PARAGRAPH -->
                                                    
                                                    <!-- START SPACING -->
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END SPACING -->
                                                    
                                                    <!-- START BUTTON -->
                                                    <table width="200" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" bgcolor="#00B9D8">
                                                                    <a style="font-family:'Ubuntu Mono', monospace; display:block; color:#ffffff; font-size:14px; font-weight:bold; text-decoration:none; padding-left:20px; padding-right:20px; padding-top:20px; padding-bottom:20px;" href="{{ route('activation', [$user->id, sha1(rand(24342, 999999))]) }}">Verify E-mail Address</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END BUTTON -->
                                                    
                                                    <!-- START SPACING -->
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- END SPACING -->
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END CONTENT -->
                                    
                                    <!-- START SPACING -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END SPACING -->
                                    
                                    <!-- START FOOTER -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td width="100%" align="center" style="padding-left:15px; padding-right:15px;">
                                                    <p style="font-family:'Ubuntu Mono', monospace; color:#000000; font-size:12px;">Apo-Tech &copy; 2023, All Rights Reserved</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END FOOTER -->
                                    
                                    <!-- START SPACING -->
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END SPACING -->
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </td>
                
            </tr>
            
        </tbody>        
    </table>
    <!-- END EMAIL CONTENT -->
    
</body>
<!-- END BODY -->