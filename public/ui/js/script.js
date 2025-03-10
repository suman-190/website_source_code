// $(document).ready(function () {
//     const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

//     if (!isMobile) {
//         // Desktop view: Show the mega-menu on hover
//         $(".has-mega-menu").hover(function () {
//             $(this).find('.dropdown-menu').addClass('show'); // Show the mega-menu
//         }, function () {
//             $(this).find('.dropdown-menu').removeClass('show'); // Hide the mega-menu
//         });

//         // Show the submenu on hover (for items with submenus)
//         $(".tab-menu li").hover(function () {
//             $(this).find('.dropmenu-sub').css({
//                 'opacity': '1', 'visibility': 'visible'
//             }); // Show the submenu
//         }, function () {
//             $(this).find('.dropmenu-sub').css({
//                 'opacity': '0', 'visibility': 'hidden'
//             }); // Hide the submenu
//         });
//     } else {
//         // Mobile view: Hide dropdowns completely
//         $(".has-mega-menu > a").on("click", function (e) {
//             e.preventDefault();
//             // Don't show the mega-menu for mobile or tablet views
//             return false;
//         });

//         $(".tab-menu li > a").on("click", function (e) {
//             e.preventDefault();
//             // Don't show the submenu for mobile or tablet views
//             return false;
//         });
//     }
// });

// side-menu

$(document).ready(function () {
    $(".sknav").click(function () {
        $(".sticky-side-menu").toggle();
        $(".vis_toc").addClass("vis_toc_after");
    });
});

$(document).mouseup(function (e) {
    var container = $(".sticky-side-menu");

    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
        $(".vis_toc").removeClass("vis_toc_after");
    }
});

$(document).ready(function () {
    $(".closeThes").click(function () {
        $(".sticky-side-menu").hide();
        $(".vis_toc").removeClass("vis_toc_after");
    });
});

$(".pop-course-carousel").owlCarousel({
    lazyLoad: true,
    loop: true,
    margin: 20,
    nav: true,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        },
    },
});
$(".reco-course-carousel").owlCarousel({
    lazyLoad: true,
    loop: true,
    margin: 20,
    nav: true,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        },
    },
});
$(".upcoming-course-carousel").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 4,
        },
    },
});
$(".hero-carousel").owlCarousel({
    lazyLoad: true,
    loop: true,
    nav: true,
    autoplay: true,
    dots: true,
    items: 1,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});
$(".testimonial-home-carousel").owlCarousel({
    lazyLoad: true,
    loop: true,
    nav: true,
    dots: true,
    items: 1,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 1,
        },
    },
});
$(".success-stories-carousel").owlCarousel({
    lazyLoad: true,
    loop: true,
    margin: 20,
    nav: true,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

$(document).ready(function () {
    var sliderVideoSection = $(".owl-item.active").find("#add_video");
    var link = sliderVideoSection.attr("src");
    $(".owl-prev").click(function () {
        link += "?autoplay=0";
        sliderVideoSection.attr("src", link);
    });
    $(".owl-next").click(function () {
        link += "?autoplay=0";
        sliderVideoSection.attr("src", link);
    });
});

$(document).ready(function () {
    $(document).ready(function () {
        $("#courseOverviewSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#about-course").offset().top - 150,
                },
                1
            );
        });
        $("#courseBenefitsSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-benefits").offset().top - 150,
                },
                1
            );
        });
        $("#careerOptionsSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-career-options").offset().top - 150,
                },
                1
            );
        });
        $("#courseSyllabusSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-sya").offset().top - 150,
                },
                1
            );
        });
        $("#studentVoiceSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-sv").offset().top - 150,
                },
                1
            );
        });
        $("#successStoriesSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-ss").offset().top - 150,
                },
                1
            );
        });
        $("#careerSection").click(function () {
            $("html, body").animate(
                {
                    scrollTop: $("#course-career").offset().top - 180,
                },
                1
            );
        });
    });

    // Auto highlight sticky bar's section on scroll
    $(window).scroll(function () {
        var description = $(".course-description-load_more").offset().top;
        var courseSyllabus = $("#course-sya").offset().top;
        var courseSuccessStories = $("#course-ss").offset().top;
        var courseBenefits = $("#course-benefits").offset().top;
        var courseCareerOption = $("#course-career-options").offset().top;
        var courseTestimonial = $("#course-sv").offset().top;
        var descriptionInnerHeight = $(
            ".course-description-load_more"
        ).innerHeight();
        var descriptionTotalHeight = descriptionInnerHeight + description;
        var scrollHeight = $(window).scrollTop() + 200;
        var courseSyllabusInnerHeight = $("#course-sya").innerHeight();
        var courseSyllabusTotalHeight =
            courseSyllabusInnerHeight + courseSyllabus;
        var courseSuccessStoriesInnerHeight = $("#course-ss").innerHeight();
        var courseSuccessStoriesTotalHeight =
            courseSuccessStoriesInnerHeight + courseSuccessStories;
        var courseBenefits = $("#course-benefits").offset().top;
        var courseBenefitsInnerHeight = $("#course-benefits").innerHeight();
        var courseBenefitsTotalHeight =
            courseBenefitsInnerHeight + courseBenefits;
        var courseCareerOption = $("#course-career-options").offset().top;
        var courseCareerOptionInnerHeight = $(
            "#course-career-options"
        ).innerHeight();
        var courseCareerOptionTotalHeight =
            courseCareerOptionInnerHeight + courseCareerOption;
        var courseTestimonialInnerHeight = $("#course-sv").innerHeight();
        var courseTestimonialTotalHeight =
            courseTestimonialInnerHeight + courseTestimonial;

        if (
            descriptionTotalHeight > scrollHeight &&
            description < scrollHeight
        ) {
            $("#courseOverviewSection").css("color", "#2A6FDB");
        } else {
            $("#courseOverviewSection").css("color", "black");
        }

        if (
            courseSyllabusTotalHeight > scrollHeight &&
            courseSyllabus < scrollHeight
        ) {
            $("#courseSyllabusSection").css("color", "#2A6FDB");
        } else {
            $("#courseSyllabusSection").css("color", "black");
        }

        if (
            courseSuccessStoriesTotalHeight > scrollHeight &&
            courseSuccessStories < scrollHeight
        ) {
            $("#successStoriesSection").css("color", "#2A6FDB");
        } else {
            $("#successStoriesSection").css("color", "black");
        }

        if (
            courseBenefitsTotalHeight > scrollHeight &&
            courseBenefits < scrollHeight
        ) {
            $("#courseBenefitsSection").css("color", "#2A6FDB");
            $("#courseOverviewSection").css("color", "black");
        } else {
            $("#courseBenefitsSection").css("color", "black");
        }

        if (
            courseCareerOptionTotalHeight > scrollHeight &&
            courseCareerOption < scrollHeight
        ) {
            $("#careerOptionsSection").css("color", "#2A6FDB");
        } else {
            $("#careerOptionsSection").css("color", "black");
        }

        if (
            courseTestimonialTotalHeight > scrollHeight &&
            courseTestimonial < scrollHeight
        ) {
            $("#studentVoiceSection").css("color", "#2A6FDB");
        } else {
            $("#studentVoiceSection").css("color", "black");
        }
    });
});

$(function () {
    // (Optional) Active an item if it has the class "is-active"
    $(".course-accordion > .course-accordion-item.is-active")
        .children(".course-accordion-panel")
        .slideDown();

    $(".course-accordion-thumb").click(function () {
        $(this)
            .parent(".course-accordion-item")
            .toggleClass("is-active")
            .children(".course-accordion-panel")
            .slideToggle("ease-out");
        // Cancel the siblings
        // $(this).siblings(".course-accordion-item").removeClass("is-active").children(".course-accordion-panel")
        //     .slideUp();
        // Toggle the item
        // $(this).toggleClass("is-active").children(".course-accordion-panel").slideToggle("ease-out");
    });

    $(document).on("click", "#expand-collapse-all", function () {
        var $this = $(this);
        if ($this.data("target") == "expand") {
            $(".course-accordion > .course-accordion-item")
                .addClass("is-active")
                .children(".course-accordion-panel")
                .slideDown();
            // set data to collapse
            $this.addClass("expand");
            $this.removeClass("collapses");
            $this
                .data("target", "collapse")
                .html('Collapse All<i class="icon-arrow-chevrolet "></i>');
        } else {
            $(".course-accordion > .course-accordion-item")
                .removeClass("is-active")
                .children(".course-accordion-panel")
                .slideUp();
            // set data to expand
            $this.addClass("collapses");
            $this.removeClass("expand");
            $this
                .data("target", "expand")
                .html('Expand All<i class="icon-arrow-chevrolet"></i>');
        }
    });
});

$(document).ready(function () {
    /*============Course & Course Schedule Popup=============*/

    /* Magnific Popup for course list & course shedule */
    $(".open-course-popup-link, .open-class-schedule-popup-link").magnificPopup(
        {
            type: "inline",
            closeOnBgClick: false,
            midClick: true /* Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href. */,
        }
    );

    $(".class-schedule-list")
        .find(".checkbox")
        .change(function () {
            var class_schedule_list_ul = $(
                "#selected-class-schedule-wrapper"
            ).find("ul");
            class_schedule_list_ul.html("");
            var class_schedule_list_li_html = "";
            $(".class-schedule-list").each(function (i, e) {
                var checbox_input = $(this).find(".checkbox");
                if (checbox_input.is(":checked")) {
                    class_schedule_list_li_html =
                        class_schedule_list_li_html +
                        "<li>" +
                        $(this).attr("data-class-schedule-name");
                }
            });
            class_schedule_list_ul.html(class_schedule_list_li_html);
        });

    /* flag to handle search processing once */
    var processing = false;

    /* Show | Hide Courses in popup based on search */
    $("body").on("keyup", "#course_popup_filter_inp", function () {
        var search_txt = $(this).val().toLowerCase();
        if (!processing) {
            processing = true;
            $(".course-list").each(function (i, e) {
                var match_with = $(e).attr("data-course-name").toLowerCase();
                if (match_with.indexOf(search_txt) >= 0) {
                    $(e).show();
                } else {
                    $(e).hide();
                }
            });
            processing = false;
        }
    });

    /* List course name after checkbox checked in popup */
    var course_id = "";
    $(".class-schedule-list")
        .find(".checkbox")
        .on("change", function () {
            $("#course-popup").addClass("course-popup-channged");

            var name_list_ul = $("#selected-course-wrapper").find("ul");
            name_list_ul.html("");
            var li_html = "";
            var courseID = [];

            // For select multiple checked box
            $(".course-list").each(function (i, e) {
                var checbox_input = $(this).find(".checkbox");
                if (checbox_input.is(":checked")) {
                    li_html =
                        li_html +
                        "<li>" +
                        $(this).attr("data-course-name") +
                        "</li>";
                    courseID.push(checbox_input.attr("value"));
                }
                course_id = courseID;
            });
            name_list_ul.html(li_html);
        });
});
$(".studentTestimonial-slider").owlCarousel({
    lazyLoad: true,
    loop: false,
    margin: 20,
    nav: false,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 1,
        },
        1000: {
            items: 2,
        },
    },
});
$(".studentSuccess-slider").owlCarousel({
    lazyLoad: true,
    loop: false,
    margin: 10,
    nav: false,
    dots: true,
    responsive: {
        0: {
            items: 1,
        },
        600: {
            items: 2,
        },
        1000: {
            items: 3,
        },
    },
});

var oaFormData = {};
$(document).on("click", ".sw-btn-next", function () {
    var $this = $(this);
    var data = {};
    $.each($this.closest("form").serializeArray(), function () {
        data[this.name] = this.value;
    });
    /* selected academic level */
    data.selected_academic_level = $(
        'select[name="academic_level"] option:selected'
    ).text();

    /* selected course */
    // data.selected_course = $('select[name="course_id"] option:selected').text();
    data.selected_course = $(document)
        .find(".course-list")
        .find(".checkbox:checked")
        .data("name");

    /* selected payment option */
    data.selected_payment_through = $(document)
        .find(".payment-option-group")
        .find('input[type="radio"]:checked')
        .val();

    /* selected payment option value with out slug*/
    data.selected_payment_name = $(document)
        .find(".payment-option-group")
        .find('input[type="radio"]:checked')
        .attr("attr-display-name");

    /* Offer title */
    data.offerTitle = $(document).find(".offerTitleUpdates").html();

    /*Get amount payment online and payment-alternet*/
    if (
        data.selected_payment_through == "esewa" ||
        data.selected_payment_through == "khalti" ||
        data.selected_payment_through == "imepay" ||
        data.selected_payment_through == "connect_ips"
    ) {
        data.amount = $(document).find("#amount").val();
    } else {
        data.amount = $(document).find("#alternet_payment_amount").val();
    }
    /* profile image */
    /*if(profile_image_filepond.getFile() != null) {
        data.profile_image = profile_image_filepond.getFile().file;
    }*/

    selectPaymentOption();

    oaFormData = data;

    showSummary();
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all elements with the class 'has-sub-menu'
    var subMenuItems = document.querySelectorAll(".has-sub-menu");

    subMenuItems.forEach(function (item) {
        item.addEventListener("click", function () {
            // Find the sub-menu (ul element) within the clicked menu item
            var subMenu = this.querySelector(".sub-menu");

            // Toggle the visibility of the sub-menu
            if (subMenu) {
                subMenu.classList.toggle("visible");
            }
        });
    });
});

$(document).ready(function () {
    // Modal content update on card click
    $("#storyModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget); // The clicked card
        var cardContent = button.find(".card").clone(); // Clone the entire card

        // Clear any previous content in the modal and append the cloned card
        var modal = $(this);
        modal.find(".modal-card-content").html(cardContent);

        // Optionally, remove modal-specific elements like the modal title or close button if needed
        modal.find(".modal-title").hide(); // Hide the modal title if you want to use the card's content title
    });
});

$(document).ready(function () {
    $(".read-more-link").click(function () {
        var description = $(this).siblings(".description-text");
        if (description.css("-webkit-line-clamp") == "3") {
            description.css("-webkit-line-clamp", "none");
            $(this).text("Show Less");
        } else {
            description.css("-webkit-line-clamp", "3");
            $(this).text("Read More");
        }
    });
});
