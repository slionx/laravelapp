<div id="qm_con_body">
    <div id="mailContentContainer" class="qmbox qm_con_body_content qqmail_webmail_only" style="">


        <style type="text/css">
            @media screen and (max-width: 525px) {
                .qmbox table[class="responsive-table"] {
                    width: 100% !important;
                }

                .qmbox td[class="padding"] {
                    padding: 30px 8% 35px 8% !important;
                }

                .qmbox td[class="padding2"] {
                    padding: 30px 4% 10px 4% !important;
                    text-align: left;
                }
            }

            @media all and (-webkit-min-device-pixel-ratio: 1.5) {
                .qmbox body[yahoo] .zhwd-high-res-img-wrap {
                    background-size: contain;
                    background-position: center;
                    background-repeat: no-repeat;
                }

                .qmbox body[yahoo] .zhwd-high-res-img-wrap img {
                    display: none !important;
                }

                .qmbox body[yahoo] .zhwd-high-res-img-wrap.zhwd-zhihu-logo {
                    width: 71px;
                    height: 54px;
                    background-image: url(http://s1.zhimg.com/edm/s105/zhihu_@2x.png);
                }
            }
        </style>


        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
            <tr>
                <td bgcolor="#f7f9fa" align="center" style="padding:22px 0 20px 0" class="responsive-table">
                    <table border="0" cellpadding="0" cellspacing="0"
                           style="background-color:#00a5b5; border-radius:3px;border:1px solid #dedede;margin:0 auto; background-color:#ffffff"
                           width="552" class="responsive-table">
                        <tbody>
                        <tr>
                            <td bgcolor="#00a5b5" height="54" align="center"
                                style="border-top-left-radius:3px;border-top-right-radius:3px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                    <tr>
                                        <td align="center" class="zhwd-high-res-img-wrap zhwd-zhihu-logo"><a
                                                    href=""
                                                    target="_blank"><img src="http://s1.zhimg.com/edm/s105/zhihu.png"
                                                                         width="71" height="54"
                                                                         style="outline:none; display:block; border:none; font-size:14px; font-family:Hiragino Sans GB; color:#ffffff;"></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" align="center" style="padding: 0 15px 0px 15px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="480" class="responsive-table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <table cellpadding="0" cellspacing="0" border="0" align="left"
                                                               class="responsive-table">
                                                            <tbody>
                                                            <tr>
                                                                <td width="550" align="left" valign="top">
                                                                    <table width="100%" border="0" cellpadding="0"
                                                                           cellspacing="0">

                                                                        <tbody>
                                                                        <tr>
                                                                            <td bgcolor="#ffffff" align="left"
                                                                                style="background-color:#ffffff; font-size: 17px; color:#7b7b7b; padding:28px 0 0 0;line-height:25px;">
                                                                                <b>Slionx 博客帐户密码重置</b>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="border-bottom:1px #f1f4f6 solid; padding: 10px 0 35px 0;"
                                                                                align="center" class="padding">
                                                                                <table border="0" cellspacing="0"
                                                                                       cellpadding="0"
                                                                                       class="responsive-table">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td>
<span style="font-family:Hiragino Sans GB;font-size:17px;">
<a style="text-decoration:none;color:#ffffff;"
   href="{{ route('password.reset',['token'=>$token]) }}"
   target="_blank">
<div style="padding:10px 25px 10px 25px;border-radius:3px;text-align:center;text-decoration:none;background-color:#00a5b5;color:#ffffff;font-size:17px;margin:0;white-space:nowrap">重置密码
</div>
</a>
</span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" valign="top"
                                                                                style="font-size:15px; color:#7b7b7b; font-size:14px; line-height: 25px; font-family:Hiragino Sans GB; padding: 20px 0px 35px 0px">
                                                                                如果以上按钮无法打开，请把下面的链接复制到浏览器地址栏中打开：<a
                                                                                        href="{{ route('password.reset',['token'=>$token]) }}"
                                                                                        target="_blank">{{ route('password.reset',['token'=>$token]) }}</a>
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        {{--<table cellpadding="0" cellspacing="0" border="0" width="100%">
            <tbody>
            <tr>
                <td bgcolor="#f7f9fa" align="center">
                    <table width="552" border="0" cellpadding="0" cellspacing="0" align="center"
                           class="responsive-table">
                        <tbody>
                        <tr>
                            <td align="center" valign="top" bgcolor="#f7f9fa"
                                style="font-family:Hiragino Sans GB; font-size:12px; color:#b6c2cc; line-height:17px; padding:0 0 25px 0;">
                                这封邮件的收件地址是 <a href="mailto:787756466@qq.com" target="_blank">787756466@qq
                                    <wbr>
                                    .com</a> <br>
                                你可以通过<a href="http://tmail.zhihu.com/t?u=aHR0cDovL3d3dy56aGlodS5jb20vc2V0dGluZ3MvZW1haWw%2FdXRtX2NhbXBhaWduPWVtYWlsX3JlcXVlc3QmdXRtX3NvdXJjZT10cmlnZ2VyLWVtYWlsJnV0bV9tZWRpdW09ZW1haWw%3D&amp;i=206025784&amp;l=zhihu&amp;s=2&amp;c=aT0yMDYwMjU3ODQmbD16aGlodSZzPTI%3D"
                                        style="border:none;color:#8a939b;text-decoration:none;"
                                        target="_blank">&nbsp;设置 </a><span>管理其他来自知乎的邮件</span> <br>
                                © 2014 知乎
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>--}}

        <img src="http://tmail.zhihu.com/static/-1449140022/email.png">

        <style type="text/css">.qmbox style, .qmbox script, .qmbox head, .qmbox link, .qmbox meta {
                display: none !important;
            }</style>
    </div>
</div>
