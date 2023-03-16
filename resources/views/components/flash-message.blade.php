@if (session()->has('success'))
    <div x-data="{success: true}" x-init="setTimeout(() => success = false, 3000)" x-show="success"
    class="rounded-md fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-400 text-white px-24 py-3 z-50">
        {{session('success')}}
    </div>
@endif

@if (session()->has('fail'))
    <div x-data="{fail: true}" x-init="setTimeout(() => fail = false, 5000)" x-show="fail"
    class="rounded-md fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-24 py-3 z-50">
        {{session('fail')}}
    </div>
@endif
