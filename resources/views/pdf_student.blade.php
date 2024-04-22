
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
 
<style >
    table, th , td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
   </style>
   
  <body>
  

 
  

                            <table style = "width:100%" >
                                
                                    <tr>
                                        <th>#</th>
                                        
                                        <th > Student name   </th>
                                        <th  >Email    </th>
                                      
                                       
                                        
                                    </tr>
                                
                                
                                    @foreach($data as $key => $item)
                                    <tr >
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                            
                                           
                                    </tr>
                                @endforeach
                               
                            </table>
                       
   
  </body>
</html>