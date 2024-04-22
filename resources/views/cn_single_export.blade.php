<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <style>
    @page {
      size: A4;
      margin: 10mm;
      width: 21.6cm;
      height:27.9cm;
    }

    table {
      border: 1px solid black;
      border-collapse: collapse;
      table-layout: fixed;
      width: 100%;
      font-size: 8px;
    }
    .left-column {
      flex: 1;
      padding-right: 10px;
    }
    .split-para      { display:block;margin:5px;margin-bottom: 16px;}
.split-para span { display:block;float:right;width:50%;margin-left:5px;}
    .right-column {
      flex: 1;
      padding-left: 50px;
      border-left: 1px solid black;
    }
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
      font-size: 12px;
    }
    p {
      font-size: 14px;
    }
    h4 {
      font-size: 16px;
    }
    th {
      background-color: #f2f2f2;
      font-size: 12px;
    }

  </style>

  <body>

  <div>
      <h2>ECO HAULAGE SDN. BHD. (1286128-V)</h2>
      <p>OFFICE: NO.1-01, LORONG LIMBUNGAN INDAH 2, TAMAN LIMBUNGAN INDAH, 12100 BUTTERWORTH, PULAU PINANG</p>
      <p> DEPOT: 715, SIMPANG AMPAT, BUKIT TENGAH, 14000 BUKIT MERTAJAM, PULAU PINANG

            <p>TEL: 012-4015454&nbsp;&nbsp;&nbsp;&nbsp;FAX: 04-3330108</p>

    </div>


    <div>
      <h4>Consignment Note</h4>
      <p>REQUEST DATE: {{ $item->date }}</p>
      <p>REGISTRATION DATE: {{ $item->req_date }}</p>
      <p>NO. OF CONTAINER/S: {{ $item->container }}</p>
      <p>BOOKING NO : {{ $item->booking }}</p>
      <p>DEPOT DATE: {{ $item->depot_date }}</p>
    </div>

    <div>
      <h4>DELIVERY TO: </h4>
      <p>DESTINATION PORT: </p>
      <p>{{ $item->destination }}</p>
    </div>

      <div>
        <h4>SHIPMENT PARTICULARS</h4>
        <p class="split-para">BILL TO: <span>VESSEL NAME/SCN:{{ $item->vessel_name }}</span></p>
        <p class="split-para">STATUS:   <span>SHIPPING AGENT: EVERGREEN</span></p>
        <p class="split-para">GROSS WEIGHT:{{ $item->size }} <span>VOYAGE NO./ETA: 22.09.2022</span></p>

        <p class="split-para">FORWARDING AGENT: {{ $item->agent }} <span>C/N NO: {{ $item->cn }}</p>
        <p class="split-para">DEPOT: {{ $item->depot }} <span>TRAILER : {{ $item->trailer }}</p>
<br>


  </div>

  <br>
    <table>
      <thead>
        <tr>

          <th> SCN</th>
            <th>CDA</th>
            <th>SEAL</th>
            <th>GATE OPEN</th>
          <th>C/N NO. </th>
           <th>CLOSSING</th>
           <th>Send Date</th>
              <th>Back Date</th>

        </tr>
      </thead>
      <tbody>
        <tr>
        <td>{{ $item->scn }}</td>
        <td>{{ $item->cda }}</td>
        <td>{{ $item->seal }}</td>
        <td>{{ $item->gate_open }}</td>
        <td>{{ $item->cn }}</td>
        <td>{{ $item->clossing }}</td>

          <td>{{$course->send_date}}</td>

               <td>{{$course->back_date}}</td>


        </tr>
      </tbody>
    </table><br>
    <p>COMPANY SIGNATURE/STAMP : </p>
 <button style = "width: 300px; height: 100px; color:white;" > </button>







  </body>
</html>
