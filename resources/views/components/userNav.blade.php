<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="{{ route('profile') }}" target="">Profile</a>
        <a class="nav-link {{ Request::is('address') ? 'active' : '' }}" href="{{ route('address') }}" target="">Address</a>
        <a class="nav-link {{ Request::is('order') ? 'active' : '' }}" href="{{ route('user.order') }}" target="">Order History</a>
        <a class="nav-link {{ Request::is('password') ? 'active' : '' }}" href="{{ route('password') }}" target="">Change Password</a>
    </nav>
    <hr class="mt-0 mb-4">
    <!-- Content page navigation-->
</div>
