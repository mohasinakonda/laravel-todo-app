<div>
 
@auth
<h2>{{ Auth::user()->name }}</h2>
@endauth
@guest
<h2>You are not authenticated</h2>

@endguest
      
</div>