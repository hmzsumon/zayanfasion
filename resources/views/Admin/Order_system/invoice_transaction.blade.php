<!DOCTYPE html>
<html>
<head>
  <title>Balance sheet</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>



  <div class="invoice border mt-4">
    <center>

            <span style="font-size: 14px; font-family:Nueva Std; ">
                    <img src="{{asset('public')}}/logo.png" class="img-fluid" style="height: 100px;"><br>

        House: 95, Road: 9/A, Dhanmondi, Dhaka.<br>
                                   E-Mail: Support@Buynfeel.Live<br>
                                   Phone: 09642887766<br>

            </span>
    </center>

<center><span style="padding:10px;border-bottom:2px dotted black">Invoice Transaction  Sheet </span></center>
    <table class="table table-bordered mt-4">




       <thead> 
       <tr>
            
                    <th>SL</th>
                    <th>Date</th>
                    <th>Invoice ID</th>
                    <th>Trans ID</th>
                    <th>Billing Name</th>
                    <th>Billing Phone</th>
                    <th>Billing Address</th>
                    <th>Payment</th>

       </tr>
      </thead> 

    

     <tbody>
         @php
         $total=0;
         @endphp
            @if($data)
            @foreach($data as $showdata)
            
            @php
            $sl=1;
            $total+=$showdata->payment;
            @endphp
                  <tr id="tr{{ $showdata->id }}">
               
                    <td>{{ $sl++ }}</td>
                    <td>{{ $showdata->date }}</td>
                    <td>{{ $showdata->invoice_id }}</td>
                    <td>{{ $showdata->trans_id }}</td>
                    <td>{{ $showdata->guest->first_name }}</td>
                    <td>{{ $showdata->guest->phone }}</td>
                    <td>{{ $showdata->guest->address }}</td>
                    <td>{{ $showdata->payment }}</td>
                  </tr>

           @endforeach 
           @endif  
           
           <tr>
               <th colspan="7" style="text-align:right">Total Payment</th>
               <th >{{number_format($total,2)}}</th>
           </tr>


      
   </tbody>



 </table>


<br><br>
 <center><a href="#" class="btn btn-info btn-sm print w-10" onclick="window.print();">Print</a></center>




</div>



<style type="text/css">
  body{
    font-family: 'Poppins', sans-serif;
    color: #414141;
  }
  .invoice{
    background: #f8f8f8;
    padding: 10px;
    margin: 0 auto;
  }
  .invoice img{
    height: 80px;
  }
  .invoice span{
    font-size: 13px;
  }

  thead{
    font-size: 13px;
  }

  tbody{
    font-size: 13px;
  }

  @media print
  {
   .print{
    display: none;
  }

</style>


</body>
</html>