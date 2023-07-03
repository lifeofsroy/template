<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>
        Classical
    </title>
    <style type="text/css">
        a:hover {
            text-decoration: none !important;
        }

        .header h1 {
            color: #fff !important;
            font: normal 33px Georgia, serif;
            margin: 0;
            padding: 0;
            line-height: 33px;
        }

        .header p {
            color: #dfa575;
            font: normal 11px Georgia, serif;
            margin: 0;
            padding: 0;
            line-height: 11px;
            letter-spacing: 2px
        }

        .content h2 {
            color: #8598a3 !important;
            font-weight: normal;
            margin: 0;
            padding: 0;
            font-style: italic;
            line-height: 30px;
            font-size: 30px;
            font-family: Georgia, serif;
        }

        .content p {
            color: #767676;
            font-weight: normal;
            margin: 0;
            padding: 0;
            line-height: 20px;
            font-size: 12px;
            font-family: Georgia, serif;
        }

        .content a {
            color: #d18648;
            text-decoration: none;
        }

        .footer p {
            padding: 0;
            font-size: 11px;
            color: #fff;
            margin: 0;
            font-family: Georgia, serif;
        }

        .footer a {
            color: #f7a766;
            text-decoration: none;
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background: #bccdd9;">
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
        <tr>
            <td style="margin: 0; padding: 0; padding: 35px 0" align="center">

                <!-- header-->
                <table class="header" style="font-family: Georgia, serif;" cellpadding="0" cellspacing="0" border="0" align="center"
                    width="650">
                    <tr>
                        <td bgcolor="#698291" height="115" align="center">
                            <h1 style="color: #fff !important; font: normal 33px Georgia, serif; margin: 0; padding: 0; line-height: 33px;">
                                <singleline label="Title">Template Checkout</singleline>
                            </h1>
                            <p style="color: #dfa575; font: normal 20px Georgia, serif; margin: 0; padding:15px 0 0 0; line-height: 12px;">
                                <singleline label="Title"><a href="{{$url}}">Visit Template</a></singleline>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 1px; height: 5px; line-height: 1px;" height="5">&nbsp;</td>
                    </tr>
                </table>

                <!-- body -->
                <table style="font-family: Georgia, serif; background: #fff;" cellpadding="0" cellspacing="0" border="0" align="center"
                    width="650" bgcolor="#ffffff">
                    <tr>
                        <td style="font-size: 0px;" width="14" bgcolor="#ffffff">&nbsp;</td>
                        <td class="content" style="font-family: Georgia, serif; background: #fff; padding: 0 0 10px;" width="620" valign="top"
                            align="left" bgcolor="#ffffff">
                            <table style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" cellpadding="0" cellspacing="0"
                                border="0" width="620">
                                <repeater>
                                    <tr>
                                        <td style="padding: 0; margin: 0;" valign="top">
                                            <table style="color: #717171; font: normal 11px Georgia, serif; margin: 0; padding: 0;" cellpadding="0"
                                                cellspacing="0" border="0" width="620">
                                                <tr>
                                                    <td style="padding: 25px 0 0;" align="left">
                                                        <h2
                                                            style="color:#8598a3 !important; font-weight: normal; margin: 0; padding: 0; font-style: italic; line-height: 30px; font-size: 25px;font-family: Georgia, serif; ">
                                                            <singleline label="Title">{{$title}}</singleline>
                                                        </h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 15px 0 15px; border-bottom: 1px solid #d2b49b;" valign="top">
                                                        <img style="padding-bottom: 15px; padding-left: 15px;" width="300" align="right"
                                                            editable="true" label="Image" />
                                                        <p style="padding: 0 20px;">
                                                            <multiline style="font-size: 18px; line-height: 28px;" label="Description">
                                                                Name: {{$name}}
                                                                <br>
                                                                Email: {{$email}}
                                                                <br>
                                                                Phone: {{$phone}}
                                                                <br>
                                                                Whatsapp: {{$whatsapp}}
                                                                <br>
                                                                Description: <span style="font-size: 17px; line-height: 25px;"> {{$desc}}</span>
                                                            </multiline>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </repeater>
                            </table>
                        </td>
                        <td style="font-size: 0px; font-family: Georgia, serif; background: #fff;" width="16" bgcolor="#ffffff">&nbsp;</td>
                    </tr>
                </table>

                <!-- footer-->
                <table class="footer" style="font-family: Georgia, serif; line-height: 10px;" cellpadding="0" cellspacing="0" border="0"
                    align="center" width="650" bgcolor="#698291">
                    <tr>
                        <td style="padding: 15px 0 10px; font-size: 11px; color:#fff; margin: 0; line-height: 1.2;font-family: Georgia, serif;"
                            bgcolor="#698291" align="center" valign="top">

                            <p style="padding: 0; font-size: 11px; color:#fff; margin: 0 0 8px 0; font-family: Georgia, serif;">
                                Having trouble reading this? <webversion style="color: #f7a766; text-decoration: none;">
                                    View in browser</webversion>.
                                &ensp;
                                Not interested anymore? <unsubscribe style="color: #f7a766; text-decoration: none;">
                                    Unsubscribe</unsubscribe>.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
