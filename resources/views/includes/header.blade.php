
<nav id="navbar_top" class="navbar navbar-expand-md navbar-light navbar-muted shadow-sm bg-warning">   
   <a class="navbar-brand" href="{{ url('/') }}">
      Victory Loves Preparation
   </a>
   <button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">     

      @auth
         <ul class="navbar-nav m-auto">            
            <li class="nav-item">
               <a href="{{ url('clear') }}" class="nav-link btn btn-sm btn-primary text-light">Cash clear</a>
            </li>
            <li class="nav-item">
               <a href="{{ url('seed') }}" class="nav-link btn btn-sm btn-success mx-2 text-light">Add seeder</a>
            </li>           
            <li class="nav-item pl-2" style="margin-top: -6.5px; display: ;">
               
               <small class="title">Refresh Status</small>         
               @php
                  $status = DB::table('refresh_status')->first();
               @endphp
               
               <!-- 1st style -->
              {{--  <a style="line-height: 18px; display: block;" href="{{ url('refreshStatus', 'status') }}"
                  class="btn btn-sm py-0 {{($status->status==true) ? 'btn-success':'btn-danger'}}" title="Click for {{($status->status==true) ? 'Off':'On'}}">{{($status->status==true) ? 'On':'Off'}}
               </a>  --}}

               <!-- 2nd style -->
               <div style="display: flex;" class="btn-group">
                  <a class="p-0 btn btn-sm btn-danger" href="{{ url('refreshStatus', 'decrease') }}" title="Click for {{($status->status==true) ? 'decrease[-]':''}}" {{($status->status==true) ? '':'hidden'}} {{($status->time==0) ? 'hidden':''}} {{$status->time}}>−</a>
                  <a class="p-0 btn btn-sm {{($status->status==true) ? 'btn-secondary':'btn-danger'}}" href="{{ url('refreshStatus', 'status') }}" title="Click for {{($status->status==true) ? 'Off':'On'}}" style="line-height: {{($status->status==true) ? 'normal':'18px'}};">{{($status->status==true) ? 'On ['.$status->time.'”]':'Off'}}</a>
                  <a class="p-0 btn btn-sm btn-success" href="{{ url('refreshStatus', 'increase') }}" title="Click for {{($status->status==true) ? 'increase[+]':''}}" {{($status->status==true) ? '':'hidden'}}>+</a>
               </div>
            </li>           
         </ul>

      @endauth

      <ul class="navbar-nav ml-auto">
         @guest
            <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
               <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
               </li>
            @endif
         @else
         <li class="nav-item userName dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
               @if(Auth::user()->photo !=null)
                  <img src="{{asset('UserPhoto')}}/{{Auth::user()->photo}}"  width="35">
               @endif
               {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
            </div>
         </li>

         @endguest
      </ul>
   </div>
</nav>
