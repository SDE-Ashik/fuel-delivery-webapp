<div class="wrapper d-flex float-left">
    <div class="sidebar" style="position:relative;min-height:731px;height:100%;">

        @php
            $user = Auth::user();
        @endphp
        @if ($user->role == 1)
            <small class="text-muted pl-3">Admin Home</small>
            <ul>
                <li><a href="{{ route('dashBoard') }}"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="{{ route('pumpList') }}"><i class="far fa-credit-card"></i>Pump </a></li>
                <li><a href="{{ route('deliveryAgents') }}"><i class="fas fa-file-invoice"></i>Delivery Agent </a></li>
            </ul>
        @endif
        @if ($user->role == 2)
            <small class="text-muted px-3">Delivery Agent</small>
            <ul>
                <li><a href="{{ route('agentHome') }}"><i class="far fa-calendar-alt"></i>Current Orders</a></li>
                <li><a href="{{ route('newOrder') }}"><i class="fas fa-clock"></i>New Orders</a></li>
                <li><a href="{{ route('oldOrder') }}"><i class="fas fa-id-badge"></i>Old Orders</a></li>
            </ul>
        @endif
        <small class="text-muted px-3">System</small>
        <ul>

            @if ($user->role == 1)
                <li><a href="{{ route('getConfig') }}"><i class="fas fa-external-link-alt"></i>Config</a></li>
            @endif
            <li><a href="{{ route('logout') }}"><i class="fas fa-code"></i>Logout</a></li>
        </ul>
    </div>
</div>
