@extends('layouts.app')

@section('content')
    <li class="nav-item logout px-2">
        <a class=" nav-link" title="se déconnecter" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            @csrf
        </form>
    </li>
    <div id="admin-page"></div>

@endsection
