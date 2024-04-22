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
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
      font-size: 8px;
    }
    
    th {
      background-color: #f2f2f2;
      font-size: 8px;
    }
    
  </style>
   
  <body>
    <table style="width:100%">
      <tr>
      <th>#</th>
      <th>Date</th>
        <th>CN</th>
        <th>Booking</th>
        <th>Container</th>
        <th>Seal</th>
        <th>Size</th>
        <th>Destination</th>
        <th>SCN</th>
        <th>CDA</th>
        <th>Vessel Name</th>
        <th>Req Date</th>
        <th>Gate Open</th>
        <th>Closing</th>
        <th>Agent</th>
        <th>Depot</th>
        <th>Depot Date</th>
        <th>Send Date</th>
        <th>Back Date</th>
        <th>Trailer</th>
      </tr>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->cn }}</td>
        <td>{{ $item->booking }}</td>
        <td>{{ $item->container }}</td>
        <td>{{ $item->seal }}</td>
        <td>{{ $item->size }}</td>
        <td>{{ $item->destination }}</td>
        <td>{{ $item->scn }}</td>
        <td>{{ $item->cda }}</td>
        <td>{{ $item->vessel_name }}</td>
        <td>{{ $item->req_date }}</td>
        <td>{{ $item->gate_open }}</td>
        <td>{{ $item->clossing }}</td>
        <td>{{ $item->agent }}</td>
        <td>{{ $item->depot }}</td>
        <td>{{ $item->depot_date }}</td>
        <td>{{ $item->send_date }}</td>
        <td>{{ $item->back_date }}</td>
        <td>{{ $item->trailer }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
