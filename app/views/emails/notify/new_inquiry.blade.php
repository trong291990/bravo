<body>
    The system has received a new inquiry from customer.
    <div style="margin: 10px; padding: 0 10px; border: 2px solid #e5e5e5">
        <h4 style="border-bottom: 1px solid #e5e5e5;font-size: 18px;">Contact Info</h4>
        <ul style="padding-left: 15px;">
            <li>Name: {{ $inquiry->fullName() }} </li>  
            <li>Email: {{ $inquiry->email }} </li>  
            <li>Phone: {{ $inquiry->phone_number }} </li>  
        </ul>
        <h4 style="border-bottom: 1px solid #e5e5e5;font-size: 18px;">Trip Detail</h4>
        <ul style="padding-left: 15px;">
            <li>Number of participants: {{ $inquiry->number_of_participants }}</</li>
            <li>Total estimate budget: {{ $inquiry->estimate_budget }}</li>
            <li>Departure date: {{ $inquiry->departure_date }}</li>
            <li>Departure city: {{ $inquiry->departure_city }}</li>
            <li>Destinations: {{ $inquiry->destinations }}</li>
            <li>Length of trip: {{ $inquiry->length_of_trip }}</li>
        </ul>
        <h4 style="border-bottom: 1px solid #e5e5e5;font-size: 18px;">Additional Comment</h4>
        <p>{{ $inquiry->additional_comment }}</p>      
    </div>
    <a href="{{route('admin.inquiry.show', $inquiry->id)}}" >Click here</a> to view on the website.
</body>