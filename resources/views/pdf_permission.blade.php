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
                                        
                                        <th > Name Role   </th>
                                      
                                       
                                        
                                    </tr>
                                
                                
                                    @foreach ($data as $key => $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                
                                           
                                    </tr>
                                @endforeach
                               
                            </table>
                       
   
  </body>
</html>