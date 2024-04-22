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
        <th>Container No</th>
        <th>ATA</th>
        <th>SKP</th>
        <th>Expired</th>
        <th>Size</th>
        <th>Destination</th>
        <th>Agent</th>
        <th>Depot</th>
        <th>KB(Date)</th>
        <th>Send Date</th>
        <th>ECO Depot</th>
        <th>Back Date</th>
        <th>Trailer</th>
      </tr>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->date }}</td>
            <td>{{ $item->cn }}</td>
            <td>{{ $item->container_no }}</td>
            <td>{{ $item->ata }}</td>
            <td>{{ $item->skp }}</td>
            <td>{{ $item->expired }}</td>
            <td>{{ $item->size }}</td>
            <td>{{ $item->destination }}</td>
            <td>{{ $item->agent }}</td>
            <td>{{ $item->depot }}</td>
            <td>{{ $item->kb_date }}</td>
            <td>{{ $item->send_date }}</td>
            <td>{{ $item->eco }}</td>
            <td>{{ $item->back_date }}</td>
            <td>{{ $item->trailer }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
