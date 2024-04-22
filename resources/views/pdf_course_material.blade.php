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
                                        
                                        <th > Lesson   </th>
                                        
                                            
                                    </tr>
                                
                                
                                    @foreach ($course_material as $key => $course_material)
                            <tr>
                                <td>{{ $course_material->id }}</td>
                                <td>{{ $course_material->lesson }}</td>
                                       
                                    </tr>
                                @endforeach
                               
                            </table>
                       
   
  </body>
</html>