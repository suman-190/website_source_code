<!doctype html>
<html lang="en">

@include('exam.layouts.head')

<body>

    <div class="dashboard-main-wrapper">

        <!-- Header -->

        @include('exam.layouts.header')

        <!-- end Header -->

            <div class="dashboard-ecommerce">
                @yield('main-content')
            </div>

            <!-- footer -->

            @include('exam.layouts.footer')

            <!-- end footer -->


    </div>

    <!-- end main wrapper  -->

    @include('exam.layouts.foot')
</body>

</html>
