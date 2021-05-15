
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Challan: {{$challan->name}} </title>
    <script src="/cdn-cgi/apps/head/zjNxYtf3r_YtJvjcbBHjq2WUVcQ.js"></script><style type="text/css">
    @media print {
        h1 { page-break-before: always; }
    }
    </style>
    </head>
    <body>
    <div align="center">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-left-width: 0px; border-right-width: 0px">
    <tr>
    <td align="center" height="30" bgcolor="#FFFFFF">
    <div align=center><table border="0" cellpadding="4" cellspacing="0" width="100%" id="table1">
    <tr><td style="border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2">
    <tr>
    <td><font face="Arial"><b><font size="5">{{ auth()->user()->company }}</font></b><font style="font-size: 8pt"><br>GSTIN:27CFFPB8711P1Z4&nbsp; |&nbsp; PAN:CFFPB8711P</font></font></td>
    </td></tr></table></td></tr>
    <tr><td align="left" height="20"><font face="Arial" style="font-size: 8pt">Regd Office: {{ auth()->user()->address }}. Tel: +91-9769342123. <br>Email: {{ auth()->user()->email }}</tr>
    </table></div>
    </td>
    </tr>
    <tr>
    <td valign="top" style="border: 1px solid #000000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
    <table border="0" cellpadding="2" width="100%">
    <tr>
    <td valign="top" width="80%"><p style="line-height: 80%">
    <font face="Arial" size="1">
    <b>M/s.:</b>
    {{ strtoupper($challan->master->name) }} -
    {{ strtoupper($challan->master->address) }}
    </font></td>
    <td valign="top" width="20%"><p style="line-height: 80%">
    <font face="Arial" size="1">
    Challan No.: </font>
    <font size="1" face="Arial">{{ $challan->name }}
    <br>
    </font>
    <font face="Arial" style="font-size: 8pt" size="1">
    Date: {{ date('d-M-Y',strtotime($challan->date)) }}</font>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    <tr>
    <td valign="top">
    <table border="0" cellpadding="3" width="100%" cellspacing="0">
    <tr>
    <td width="8%" valign="top" style="border-style: solid; border-width: 1px" bgcolor="#E6E6E6" align="center">
    <font face="Arial" size="1"><b>Sr. No.</b></font></td>
    <td width='64%' valign="top" style="border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#E6E6E6">
    <font size="1" face="Arial"><b>Description</b></font></td>
    <td width='8%' valign="top" align="right" style="border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#E6E6E6">
    <b><font size="1" face="Arial">Qty</font></b></td>
    <td width='10%' valign="top" align="right" style="border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#E6E6E6">
    <b><font size="1" face="Arial">Rate (INR)</font></b></td>
    <td width='10%' valign="top" align="right" style="border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" bgcolor="#E6E6E6">
    <font size="1" face="Arial"><b>Amount
    (INR)</b></font></td>
    </tr>
    <?php
        $srno = 1;
    ?>

    @if($challan->items && count($challan->items)>0)
        @foreach ($challan->items as $item)
            <tr>
                <td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top" align="center">
                <font face="Arial" size="1"><?php echo $srno; ?>.</td>
                <td style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
                <font face="Arial" size="1">
                {{ $item->name }}
                </td>
                <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
                <font face="Arial" size="1">{{ $item->quantity }}</td>
                <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
                <font face="Arial" size="1">{{ $item->price }}
                </td>
                <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
                <font face="Arial" size="1">
                {{ $item->amount }}</td>
            </tr>
            <?php $srno++; ?>
        @endforeach
    @endif
    @for($i=count($challan->items)+1; $i<=15; $i++)
        <tr>
            <td style="border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top" align="center">
            <font face="Arial" size="1">{{ $i }}.</font></td>
            <td style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
            &nbsp;</td>
            <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
            &nbsp;</td>
            <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
            &nbsp;</td>
            <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
            &nbsp;</td>
        </tr>
    @endfor
    <tr>
    <td colspan='4' align="right" style="border-left-style:solid; border-left-width:1px;border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
    <font size="1" face="Arial"><b>
    Total Amount
    (INR): </b></font></td>
    <td align="right" style="border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px" valign="top">
    <font size="1" face="Arial"><b>{{ $challan->amount }}</b></font></td>
    </tr>
    </table></td>
    </tr>
    </tbody>
    </table>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
    </html>
