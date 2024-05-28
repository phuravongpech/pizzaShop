<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}" target="__blank">Profile</a>
        <a class="nav-link {{ Request::is('address') ? 'active' : '' }}" href="{{ route('address') }}" target="__blank">Address</a>
        <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="{{ route('order') }}" target="__blank">Order History</a>
        <a class="nav-link {{ Request::is('password') ? 'active' : '' }}" href="{{ route('password') }}" target="__blank">Change Password</a>
    </nav>
    <hr class="mt-0 mb-4">
    <!-- Content page navigation-->
</div>
