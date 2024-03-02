{{-- @if (session('status') == 'success')
    <div class="inner-box form-success" style="text-align: center;">
        <div class="text-box" style="position: relative;">
            <h5 class="alert alert-success">{{ session('message') }}</h5>
            @php
                session()->forget('status')
            @endphp
        </div>
    </div>
@elseif (session('status') == 'error')
    <div class="inner-box form-error" style="text-align: center;">
        <div class="text-box" style="position: relative;">
            <h5 class="alert alert-danger">{{ session('message') }}</h5>
            @php
                session()->forget('status')
            @endphp
        </div>
    </div>
@endif --}}
