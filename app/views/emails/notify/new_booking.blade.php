<body>
    Customer booked on tour: <b>{{ $reservation->tour->name }}</b>
    <ul style="padding-left: 15px;">
        <li>Customer's name: {{ $reservation->customer_name }} </li>  
        <li>Email: {{ $reservation->customer_email }} </li>  
        <li>Phone: {{ $reservation->customer_phone }} </li> 
        <li>Start date: {{ $reservation->start_date }} </li> 
    </ul>
    <a href="{{route('admin.reservation.index')}}" >Click here</a> to view on the website.
</body>