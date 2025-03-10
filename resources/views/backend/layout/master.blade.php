<!doctype html>
<html lang="en">

@include('backend.layout.head')

<body>

    <div class="dashboard-main-wrapper">

        <!-- Header -->

        @include('backend.layout.header')

        <!-- end Header -->

        <!-- sidebar -->

        @include('backend.layout.sidebar')

        <!-- end sidebar -->

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                @yield('main-content')
            </div>

            <!-- footer -->

            @include('backend.layout.footer')

            <!-- end footer -->

        </div>

    </div>

    <!-- end main wrapper  -->

    @include('backend.layout.foot')
</body>

</html>
