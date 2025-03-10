<!DOCTYPE html>
<html lang="en">
@include('frontend.layouts.meta')
@yield('styles')
<style>
    .popup-message {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    padding: 10px 20px;
    border-radius: 5px;
    opacity: 0.9;
    transition: opacity 0.5s ease-in-out;
}

.alert-success {
    background-color: #28a745;
    color: white;
}

.alert-danger {
    background-color: #dc3545;
    color: white;
}

</style>
<body>
<main>
    <div id="wrapper">
        @include('frontend.layouts.header')
        
        <!-- Display success or error messages as popups -->
        @if(session('success'))
            <div class="alert alert-success popup-message">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger popup-message">
                {{ session('error') }}
            </div>
        @endif

        @yield('main_content')
        
        @include('frontend.layouts.footer')
    </div>
</main>

<!-- Include the script -->
<script>
    // Hide the popup after 5 seconds
    window.addEventListener('DOMContentLoaded', (event) => {
        const popupMessage = document.querySelector('.popup-message');
        if (popupMessage) {
            setTimeout(() => {
                popupMessage.style.display = 'none';
            }, 5000); // Hide after 5 seconds
        }
    });
</script>

</body>
@include('frontend.layouts.script')
</html>
