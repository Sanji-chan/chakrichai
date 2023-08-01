<div class="flash_messages" style="width=100%;">
    
    @if (request()->session()->get('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @php
        request()->session()->forget('success');
      @endphp
  @endif
      
  @if (request()->session()->get('warning'))
      <div class="alert alert-warning">
          {{ session('warning') }}
      </div>
      @php
        request()->session()->forget('warning');
      @endphp
  @endif

  @if (request()->session()->get('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @php
        request()->session()->forget('error');
    @endphp
  @endif
</div>
