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
        height: 27.9cm;
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

    .split-para {
        display: block;
        margin: 5px;
    }

    .split-para span {
        display: block;
        float: right;
        width: 50%;
        margin-left: 5px;
    }

    .right-column {
        flex: 1;
        padding-left: 50px;
        border-left: 1px solid black;
    }

    th,
    td {
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
        <p>EMAIL: </p>
    </div>


    <div>
        <h4>Consignment Note</h4>
        <p>REQUEST DATE: {{ $course->date }}</p>
        <p>NO. OF CONTAINER/S: {{ $course->container_no }}</p>
    </div>

    <div>
        <h4>DELIVERY TO: </h4>
        <p>DESTINATION PORT: </p>
        <p>{{ $course->destination }}</p>
    </div>

    <div>
        <h4>SHIPMENT PARTICULARS</h4>
        <p class="split-para">BILL TO: <span>TRAILER: {{ $course->trailer }}</p>
        <p class="split-para">STATUS: <span>FORWADING AGENT: {{ $course->agent }}</p>
        <p class="split-para">GROSS WEIGHT: {{ $course->size }} <span>VOYAGE NO./ETA: 22.09.2022</span></p>
        <p class="split-para">DEPOT: {{ $course->depot }} </p>
        <br>
        <p>COMPANY SIGNATURE/STAMP : </p>
        <button style = "width: 300px; height: 100px; color:white;"> </button>
        <br><br><br>

    </div>

    <br>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th> ATA</th>
                <th>SKP</th>
                <th>Expired</th>
                <th>C/N NO. </th>

                <th>KB(Date)</th>
                <th>Send Date</th>
                <th>ECO Depot</th>
                <th>Back Date</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>


                <td>{{ $course->ata }}</td>
                <td>{{ $course->skp }}</td>
                <td>{{ $course->expired }}</td>
                <td>{{ $course->cn }}</td>
                <td>{{ $course->kb_date }}</td>
                <td>{{ $course->send_date }}</td>
                <td>{{ $course->eco }}</td>
                <td>{{ $course->back_date }}</td>


            </tr>
        </tbody>
    </table>







</body>

</html>
