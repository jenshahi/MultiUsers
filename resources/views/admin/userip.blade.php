
    @foreach($userip as $userip)
        <li><strong>{{$userip->name}}</strong> Logged in. IP Address <strong>{{$userip->ip}}</strong> logged in at <b>{{$userip->created_at}}</b> <a href="/usersreport/delete/{{$userip->id}}">clear</a></li>
    @endforeach