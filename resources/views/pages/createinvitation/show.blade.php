<!DOCTYPE html>
<html>
<body>

<h2>Plannr</h2>
<img src="{{ asset('images/product/'.$product->image) }}" alt="Trulli" width="500" height="333">
<h2>{{$createinvitions->type_events}}</h2>
<h2>{{$createinvitions->date}}</h2>
<h2>{{$createinvitions->time}}</h2>
<h2>{{$createinvitions->location}}</h2>
<h2>{{$createinvitions->hosted_by}}</h2>
<h2>{{$createinvitions->phone}}</h2>
</body>
</html>
