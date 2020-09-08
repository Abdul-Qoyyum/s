<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice {{$invoice->invoice_id}}</title>

    <style type="text/css" media="all">
            .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #5D6975;
        text-decoration: underline;
        }

        body {
        position: relative;
        width: 21cm;  
        height: 29.7cm; 
        margin: 0 auto; 
        color: #001028;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
        }

        header {
        padding: 10px 0;
        margin-bottom: 30px;
        }

        #logo {
        text-align: center;
        margin-bottom: 10px;
        }

        #logo img {
        width: 90px;
        }

        h2 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: start;
        width: 100%;
        }

        #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
        }

        #project div,
        #company div {
        white-space: nowrap;        
        }

        table {
        width: 90%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
        background: #F5F5F5;
        }

        table th,
        table td {
        text-align: center;
        }

        table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
        }

        table .service,
        table .desc {
        text-align: left;
        }

        table td {
        padding: 20px;
        text-align: right;
        }

        table td.service,
        table td.desc {
        vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
        font-size: 1.2em;
        }

        table td.grand {
        border-top: 1px solid #5D6975;;
        }

        #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
        }

</style>
  </head>
  <body>
    <header>
      <div id="logo">

      </div>
      <h2>INVOICE {{$invoice->invoice_id}}</h2>

              <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0 party-header" width="48.5%" style="text-align: left;">
                        Seller
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0 party-header" style="text-align: left;">
                        Client
                    </th>
                </tr>
            </thead>
             <tbody>
                 <tr>
                     <td class="px-0" style="text-align: left;">
                        <div>{{$user->name}}</div>
                        <div><a href="mailto:{{$user->email}}">{{$user->email}}</a></div>
                     </td>
                     <td class="border-0"></td>
                     <td class="px-0" style="text-align: left;" id="project">
                        <div><span>Invoice for : </span> &nbsp; <strong>{{$task->name}}</strong></div>
                        <div><span>Scheduled On :</span> &nbsp; {{\Carbon\Carbon::parse("$task->start_date")->toFormattedDateString()}}</div>
                        <div><span>Name :</span>&nbsp; {{$client->firstname}} &nbsp; {{$client->lastname}}</div>
                        <div><span>EMAIL :</span>&nbsp; <a href="{{$client->email}}">{{$client->email}}</a></div>
                        <div><span>COUNTRY :</span>&nbsp; {{$client->country}}</div>
                        <div><span>DUE DATE :</span>&nbsp; {{\Carbon\Carbon::parse("$task->end_date")->toFormattedDateString()}}</div>
                     </td>
                 </tr>
            </tbody>
              </table>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Product / Package</th>
            <th class="desc">Description</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">{{$invoice->name}}</td>
            <td class="desc">{!! $invoice->description !!}</td>
            <td class="unit">${{$invoice->total}}</td>
            <td class="qty">{{$invoice->quantity}}</td>
            <td class="total">${{$invoice->total}}</td>
          </tr>
          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">${{$invoice->total}}</td>
          </tr>

          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">${{$invoice->total}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTES:</div>
        <div class="notice">{{$invoice->notes}}</div>
      </div>
    </main>
    <footer style="text-align: center;">
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>