<div class="text-2xl font-bold">Absensiku</div>
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
       class="flex items-center gap-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
      <i class="mdi mdi-logout text-xl"></i>
      Log out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>