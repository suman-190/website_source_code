$('.responsive').slick({
    dots: false,
    prevArrow: $('.prev'),
    nextArrow: $('.next'),
    infinite: true,
    autoplay: true,
    speed: 1000,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
});

$('.colleze').slick({
    dots: false,
    prevArrow: $('.prev-cl'),
    nextArrow: $('.next-cl'),
    infinite: true,
    autoplay: true,
    speed: 1000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
});

$('.courze').slick({
    dots: false,
    prevArrow: $('.prev-cz'),
    nextArrow: $('.next-cz'),
    infinite: true,
    autoplay: true,
    speed: 1000,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
});


$('.testimonial').slick({
    dots: false,
    prevArrow: $('.prev-tz'),
    nextArrow: $('.next-tz'),
    infinite: true,
    autoplay: true,
    speed: 1000,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
});


function openNav() {
    document.getElementById("mymagicnav").style.width = "70%";
    // document.getElementById("flipkart-navbar").style.width = "50%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mymagicnav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}


$(function() {
    var holdown = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        var links = this.el.find('.link');

        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    holdown.prototype.dropdown = function(e) {
        var $el = e.data.el;
        $this = $(this),
        $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.childmenu').not($next).slideUp().parent().removeClass('open');
        };
    }

    var holdown = new holdown($('#holdown'), false);
});

$('document').ready(function () {
    $(".hover-me1").mouseout(function () {
        $('#show-me1').hide();
    });

    $(".hover-me1").mouseover(function () {
        $('#show-me1').show();
    });
});

$('document').ready(function () {
    $(".hover-me2").mouseout(function () {
        $('#show-me2').hide();
    });

    $(".hover-me2").mouseover(function () {
        $('#show-me2').show();
    });
});

$('document').ready(function () {
    $(".hover-me3").mouseout(function () {
        $('#show-me3').hide();
    });

    $(".hover-me3").mouseover(function () {
        $('#show-me3').show();
    });
});
$('document').ready(function () {
    $(".hover-me4").mouseout(function () {
        $('#show-me4').hide();
    });

    $(".hover-me4").mouseover(function () {
        $('#show-me4').show();
    });
});


