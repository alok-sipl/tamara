<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
            <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
            <meta name="viewport" content="width=device-width"/>
            <title>Registration Complete: Trip Planner</title>
            <style type="text/css">
                .MBemail a, a.MBemail, .grn {
                    color: #789A1D;
                    text-decoration:none;
                }
                .MBemail a:hover, a.MBemail:hover {
                    color: #789A1D;
                    text-decoration:underline;
                }
                @media only screen and (max-width: 900px) {
                    td[class=headerBG] {
                        width: 100%;
                    }
                }
                @media only screen and (max-width: 640px) {
                    body {
                        width: auto;
                    }
                    .BoxWrap, td[class=hero], img[class=heroImg] {
                        width: 440px!important;
                    }
                    div.h2-center, div.h3-center {
                        text-align: center;
                    }                    /* Show/Hide  */
                    .RespoHideMedium {
                        display: none;
                    }
                    .RespoShowMedium {
                        display: block;
                    }
                    .RespoCenterMedium {
                        text-align: center;
                    }
                    td[class=headerBG] {
                        width: 100%;
                    }
                    img[class=RespoImage_HalfW], img[class=RespoImage_Half] {
                        max-width: 440px!important;
                        height: 212px!important;
                    }
                    img[class=RespoImage_ThirdW], img[class=RespoImage_Third] {
                        max-width: 440px!important;
                        height: 335px!important;
                    }
                }
                @media only screen and (max-width: 479px) {
                    body {
                        width: auto;
                    }
                    .BoxWrap, td[class=hero], img[class=heroImg] {
                        max-width: 280px!important;
                        width:95%;
                    }                    /* Hide  */
                    .RespoHideSmall, .BoxHeadRight {
                        display: none;
                    }
                    .RespoCenterSmall {
                        text-align: center;
                    }
                    img[class=RespoImage_HalfW], img[class=RespoImage_Half] {
                        max-width: 280px!important;
                        height: 135px!important;
                    }
                    img[class=RespoImage_ThirdW], img[class=RespoImage_Third] {
                        max-width: 280px!important;
                        height: 213px!important;
                    }
                }
                @media only screen and (max-width: 319px) {
                    body {
                        width: auto;
                    }
                    .BoxWrap, td[class=hero], img[class=heroImg] {
                        max-width: 230px!important;
                    }
                    div#em-hd {
                        font-size: 28px;
                    }                    /* Hide  */
                    .RespoHideSmall, .BoxHeadRight {
                        display: none;
                    }
                    .RespoCenterSmall {
                        text-align: center;
                    }
                    img[class=RespoImage_HalfW], img[class=RespoImage_Half] {
                        max-width: 230px!important;
                        height: 135px!important;
                    }
                    img[class=RespoImage_ThirdW], img[class=RespoImage_Third] {
                        max-width: 230px!important;
                        height: 213px!important;
                    }
                }
            </style>
    </head>
    <body style="width: 100%;background-color: #ffffff;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;mso-margin-top-alt: 0px;mso-margin-bottom-alt: 0px;mso-padding-alt: 0px 0px 0px 0px;">
        <table width="100%" bgcolor="#e2e5e5" cellpadding="0" cellspacing="0" align="center">
            <tbody>
                <tr>
                    <td valign="top" bgcolor="#ffffff" style="-webkit-text-size-adjust: none;"><table class="BoxWrap" width="600" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td height="20" style="-webkit-text-size-adjust: none;"></td>
                            </tr>
                            <tr>
                                <td width="230" style="-webkit-text-size-adjust: none;"><a href="{{ url("/") }}" style="border: none;-webkit-text-size-adjust: none;text-decoration: none;color: #ffffff;"> <img mc:edit class="RespoLogo" width="260" height="58" src="{{ \config('app.image_path') }}/logo.gif"alt="" border="0" style="width: 260px;height: 58px;max-width: 260px;max-height: 58px;display: block;border: 0px;outline: none;text-decoration: none;"> </a></td>
                                <td valign="bottom" style="-webkit-text-size-adjust: none;"><h2 class="BoxHeadRight"  mc:edit style="text-align: right;font-size: 16px;margin: 10px 0 10px 0;color: #151516;font-weight: bold;line-height: 20px;text-decoration: none;font-family: Helvetica, Arial, sans-serif;"> @if(isset($heading) && !empty($heading)) <span style="color: #151516; text-decoration:none; -webkit-text-size-adjust: none;">{{ $heading }}</span> @endif </h2></td>
                            </tr>
                            <tr>
                                <td height="20" style="-webkit-text-size-adjust: none;"></td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td bgcolor="#000000"><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="clear:both;">
                            <tbody>
                                <tr>
                                    <td width="100%" valign="top" style="background-size: 100% auto;"><table class="BoxWrap" width="600" align="center" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="hero"> @if(isset($bannerImage) && !empty($bannerImage)) <img class="heroImg"  src="{{ \config('app.image_path') }}/{{ $bannerImage }}"></td>
                                                    @endif </tr>
                                            </tbody>
                                        </table></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
                <tr>
                    <td valign="top" style="-webkit-text-size-adjust: none;"> @yield('content') </td>
                </tr>
                <tr>
                    <td valign="top" style="-webkit-text-size-adjust: none;"><table class="BoxWrap" width="600" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="100%" height="20" style="-webkit-text-size-adjust: none;"></td>
                                </tr>
                                <tr>
                                    <td width="100%" height="1" bgcolor="#799a1d" style="-webkit-text-size-adjust: none;"></td>
                                </tr>
                                <tr>
                                    <td width="100%" height="20" style="-webkit-text-size-adjust: none;"></td>
                                </tr>
                                <tr>
                                    <td style="-webkit-text-size-adjust: none;"><h3 mc:edit="footer_txt01" style="font-size: 11px;margin: 5px 0 5px 0;color: #a19f9f;text-align: left;font-weight: normal;font-family: Helvetica, Arial, sans-serif;line-height: 14px;">You've received this email as part of your <strong>{{ \config('app.url') }}</strong> membership.<br />
                                            <br />
                                            If you want to chat just drop us a line using the contact form on the site.</h3></td>
                                </tr>
                                <tr>
                                    <td width="100%" height="20" style="-webkit-text-size-adjust: none;"></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>