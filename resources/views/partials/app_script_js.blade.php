{{-- Company: Wreetu Helth. --}}
{{-- Author: Md Shadhin --}}
{{-- Developer: Md Shadhin --}}
{{-- Copywrite: 2024 --}}
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination paginate-area'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        ordering: true,
        processing: true,
        info: false,
        lengthChange: false,
        pageLength: 20,
        paging: false,
        'drawCallback': function(settings) {
            const pageData = $('#zero-config').data('page');
            console.log(pageData);
            if (pageData) {
                $('.paginate-area').html(pageData);
            }
        }
    });

    //session show in toastr for warning
    @if (session()->has('warning'))
        $(document).ready(function() {
            toastr.warning('{{ session()->get('warning') }}');
        })
    @endif


    // session show in toastr
    @if (session()->has('success'))
        $(document).ready(function() {
            toastr.success('{{ session()->get('success') }}');
        })
    @endif

    @if (session()->has('error'))
        $(document).ready(function() {
            toastr.error('{{ session()->get('error') }}');
        })
    @endif



    $(document).ready(function() {
        $(".trumbowyg").trumbowyg({
            svgPath: "undefined" != typeof env && env.editorIconUrl ? env.editorIconUrl :
                "img/ui/icons.svg",
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat']
            ]
        });

        $('.trumbowyg').on('tbwinit', function() {
                // console.log($(this).attr('rows'), $(this).attr('id'));
                const editor = $(this).closest('.formElement-editor')
                const rows = parseInt($(this).attr('rows'));
                const height = rows * 60; // Adjust for padding/margins
                editor.find('.trumbowyg-box').css('height', height + 'px'); // Set your desired height
                editor.find('.trumbowyg-box').css('min-height', height+ 60 + 'px'); // Set your desired height
                editor.find('.trumbowyg-editor').css('min-height', height + 'px'); // Adjust for padding/margins
            });
    });


    // Autometic open sidebar menus
    $(document).ready(function() {
        var sidebarMenus = $("#sidebar-menus");
        sidebarMenus.find(".dropdown-toggle").attr("aria-expanded", "false"); //all expanded close
        var activeMenu = sidebarMenus.find("li.active");
        activeMenu.closest("li.menu").addClass("active");
        activeMenu.closest(".submenu").addClass("show");
        activeMenu.closest(".sub-submenu").addClass("show");
        activeMenu.closest("li.menu").find(".dropdown-toggle").attr("aria-expanded", "true");
    });



    // delete confirm sweet alart
    $(document).ready(function() {
        console.log("delete confirm attatch");
        $(".delete-confirm").each(function() {
            const el = this;
            {{-- console.log(el); --}}
            $(el).click((e) => {
                e.preventDefault();
                const url = $(el).data("action");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        if ($("form.delete-form").length > 0) {
                            $("form.delete-form").attr("action", url).submit();
                        } else {
                            // not found delete form alart
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href="">Why do I have this issue?</a>',
                            })
                        }
                    }
                })
            });
        });
    });

   $(document).ready(function() {
                flatpickr('.flattime', {
                    enableTime: true,
                    noCalendar: true,
                    altInput: true,
                    altFormat: "h:i K",
                    dateFormat: "H:i",
                    time_24hr: false
                });

                flatpickr('.flatdate', {
                    altInput: true,
                    altFormat: "Y-m-d",
                    dateFormat: "Y-m-d",
                });

                flatpickr('.flatdaterange', {
                    mode: "range",
                    altInput: true,
                    altFormat: "Y-m-d",
                    dateFormat: "Y-m-d",
                })

                flatpickr('.flatyear', {
                    shorthand: true, 
                    dateFormat: "Y", 
                    altFormat: "Y", 
                    theme: "dark" 
                })
                flatpickr('.flatmonth', {
                    altInput: true,
                    altFormat: "Y-m",
                    dateFormat: "Y-m", // Format to display year and month
                    plugins: [
                        new monthSelectPlugin({
                            shorthand: true, //defaults to false
                            dateFormat: "Y-m", //defaults to "F Y"
                            altFormat: "Y F", //defaults to "F Y"
                            theme: "light" // defaults to "light"
                        })
                    ]
                });

   })

    //Initialize Datepicker
    // flatpickr($('.datepicker'));
    // var f2 = flatpickr($('.dateTimePicker'), {
    //     enableTime: true,
    //     dateFormat: "Y-m-d H:i:S",
    // });
    // var f3 = flatpickr($('.timePicker'), {
    //     enableTime: true,
    //     noCalendar: true,
    //     dateFormat: "H:i",
    // });

    //date range
    // var f4 = flatpickr($('.daterange'), {
    //     mode: "range",
    //     dateFormat: "Y-m-d",
    // });

    $(document).ready(function() {
        $(".numberOnly").keypress(function(e) {
            if ((e.which != 8 && e.which != 0 && e.which != 110 && e.which != 190 && (e.which < 48 || e
                    .which > 57) && e.which != 46 && e.which != 101)) {
                return false;
            }
        });
    });

    document.querySelectorAll('.tom-select').forEach((el) => {
        let settings = {};
        new TomSelect(el, settings);
    });



    // Custom Script for Scroll to Top Button
    $(document).ready(function() {
        // Show or hide the scroll-to-top button based on scroll position
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#scrollToTopBtn').fadeIn();
            } else {
                $('#scrollToTopBtn').fadeOut();
            }
        });

        // Scroll to top when the button is clicked
        $('#scrollToTopBtn').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
</script>

<script>
    function sub_opener(t) {
        t.preventDefault(),
            // $(this).parent().next("has-subchild").slideUp(),
            // $(this).parent().parent().children(".has-subchild").children("ul").slideUp(),
            // $(this).parent().parent().children(".has-subchild").removeClass("open"),
            // $(this).next().is(":visible") ? $(this).parent().removeClass("open") : $(this).parent().addClass("open"),
            // $(this).next().slideDown()
            $(this).parent().find("ul").slideToggle();
        $(this).parent().toggleClass("open");

    }
    $(document).ready(function() {
        $(".has-subchild").not(".open").find("ul").hide();
        $(".has-subchild > a").on("click", sub_opener);
    });


    function createToast2(t, i, o) {
        let n = "";
        console.log(i);
        const e = $(".notification-wrapper");
        "default" == t ? n =
            `\n      <div class="dm-notification-box notification-${t} notification-${toastCount}">\n        <div class="dm-notification-box__content">\n        <a href="#" class="dm-notification-box__close" data-toast="close">\n            <i class="uil uil-times"></i>\n        </a>\n            <div class="dm-notification-box__text">\n                <h6>Notification Title</h6>\n                <p>\n                    This is the content of the notification. This is the content of the notification. This is the content of the notification.\n                </p>\n            </div>\n        </div>\n      </div>\n      ` :
            "default" !== t && (n =
                `\n      <div class="dm-notification-box notification-${t} notification-${toastCount}">\n        <div class="dm-notification-box__content media">\n            <div class="dm-notification-box__icon">\n                <i class="uil uil-${i}"></i>\n            </div>\n            <div class="dm-notification-box__text media-body">\n                <h6>Notification Title</h6>\n                <p>\n                    This is the content of the notification. This is the content of the notification. This is the content of the notification.\n                </p>\n            </div>\n            <a href="#" class="dm-notification-box__close" data-toast="close">\n                <i class="uil uil-times"></i>\n            </a>\n        </div>\n    </div>\n    `
                ), o && (n =
                `\n        <div class="dm-notification-box notification-${t} notification-${toastCount}">\n            <div class="dm-notification-box__content">\n                <div class="dm-notification-box__text">\n                    <h6>Notification Title</h6>\n                    <p>\n                        This is the content of the notification. This is the content of the notification. This is the content of the notification.\n                    </p>\n                </div>\n                <div class="dm-notification-box__action d-flex justify-content-end">\n                    <button href="#" class="btn btn-xs btn-info custom-close" data-toast="close">Confirm</button>\n                </div>\n            </div>\n            <a href="#" class="dm-notification-box__close" data-toast="close">\n                <i class="uil uil-times"></i>\n            </a>\n        </div>\n        `
                ), e.append(n), toastCount++
    }


    function createNotification(type, icon, withButton, title, message, duration = Infinity) {
        let toastHtml = "";
        const notificationWrapper = $(".notification-wrapper");

        // Default notification without icon
        if (type === "default") {
            toastHtml = `
        <div class="dm-notification-box notification-${type} notification-${toastCount}">
            <div class="dm-notification-box__content">
                <a href="void(0)" class="dm-notification-box__close" data-toast="close">
                    <i class="uil uil-times"></i>
                </a>
                <div class="dm-notification-box__text">
                    <h6>${title}</h6>
                    <p>${message}</p>
                </div>
            </div>
        </div>
        `;
        }
        // Notification with icon
        else if (type !== "default") {
            toastHtml = `
        <div class="dm-notification-box notification-${type} notification-${toastCount}">
            <div class="dm-notification-box__content media">
                <div class="dm-notification-box__icon">
                    <i class="uil uil-${icon}"></i>
                </div>
                <div class="dm-notification-box__text media-body">
                    <h6>${title}</h6>
                    <p>${message}</p>
                </div>
                <a href="#" class="dm-notification-box__close" data-toast="close">
                    <i class="uil uil-times"></i>
                </a>
            </div>
        </div>
        `;
        }
        // Notification with button
        if (withButton) {
            toastHtml = `
        <div class="dm-notification-box notification-${type} notification-${toastCount}">
            <div class="dm-notification-box__content">
                <div class="dm-notification-box__text">
                    <h6>${title}</h6>
                    <p>${message}</p>
                </div>
                <div class="dm-notification-box__action d-flex justify-content-end">
                    <button href="#" class="btn btn-xs btn-info custom-close" data-toast="close">Confirm</button>
                </div>
            </div>
            <a href="#" class="dm-notification-box__close" data-toast="close">
                <i class="uil uil-times"></i>
            </a>
        </div>
        `;
        }

        // Append the toast to the wrapper
        notificationWrapper.append(toastHtml);
        toastCount++;

        // Automatically remove the toast after the specified duration (if not Infinity)
        if (duration !== Infinity) {
            setTimeout(function() {
                notificationWrapper.find(`.notification-${toastCount - 1}`).remove();
                toastCount--; // Decrement toastCount when a toast is removed
                console.log(`Toast removed automatically after ${duration}ms. Active toasts: ${toastCount}`);
            }, duration);
        }
    }

    $(document).ready(function() {
        const notificationWrapper = $(".notification-wrapper");
        // Add event listener for closing the toast
        notificationWrapper.on('click', '.dm-notification-box__close, .custom-close', function(event) {
            event.preventDefault();
            $(this).closest('.dm-notification-box').remove();
            toastCount--; // Decrement toastCount when a toast is removed
            console.log(`Toast removed manually. Active toasts: ${toastCount}`);
        });
    });
   
    async function getCountNotification() {
        const notificationCount = Number(sessionStorage.getItem('notificationCount')) || 0;
        const allNotifications = sessionStorage.getItem('allNotifications') ? JSON.parse(sessionStorage.getItem('allNotifications')) : [];
        const count = await $.get("{{ route('get-notification-count') }}");
        if(count != notificationCount) {
            const newCount = count - notificationCount;
            if(count == 0) {
                $('#notification-dropdown-icon').removeClass('nav-item-toggle icon-active')
            }else{
                $('#notification-dropdown-icon').addClass('nav-item-toggle icon-active')
            }
            //read all notifications
            if(newCount > 0) {
                const notifications = await $.get("{{ route('get-notifications') }}?limit=" + newCount);
                
                if(notifications.length > 0) {
                    notifications.forEach(notification => {
                        if(!allNotifications.find(item => item.id === notification.id)) {
                            createNotification("info", "info-circle", false, notification.title, notification.description, 5000);
                        }
                    });
                }
            }
            const notificationAll = await $.get("{{ route('get-notifications') }}?limit=" + count);
            sessionStorage.setItem('allNotifications', JSON.stringify(notificationAll));
            $('#notification-list-data').empty();
            if(notificationAll.length > 0) {
               
                notificationAll.forEach(notification => {
                    const actions = '{{route('notification.action', ':id')}}'.replace(':id', notification.id);
                    $('#notification-list-data').append(`
                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                        <div class="nav-notification__type nav-notification__type--primary">
                            <img src="{{ asset('assets/img/svg/inbox.svg') }}" alt="inbox" class="svg">
                        </div>
                        <div class="nav-notification__details">
                            <p>
                                <a href="${actions}" class="subject stretched-link text-truncate" style="max-width: 180px;">${notification.title}</a>
                                <span>${notification.description}</span>
                            </p>
                            <p>
                                <span class="time-posted">${moment(notification.created_at).fromNow()}</span>
                            </p>
                        </div>
                    </li>
                    `);
                });

            }
            sessionStorage.setItem('notificationCount', count);
            $('#notification-count').text(count);
        }
        setTimeout(getCountNotification, 2000);
    }
    
    // function getCountNotification() {
    //     window.location.reload();
    // }

        $(document).ready(function () {
            @if(!config('app.debug'))
                getCountNotification();
            @endif
            const notificationCount = Number(sessionStorage.getItem('notificationCount')) || 0;
            $('#notification-count').text(notificationCount);

            if(notificationCount == 0) {
                $('#notification-dropdown-icon').removeClass('nav-item-toggle icon-active')
            }else{
                $('#notification-dropdown-icon').addClass('nav-item-toggle icon-active')
            }

            //read all notifications

            const notificationAll = sessionStorage.getItem('allNotifications') ? JSON.parse(sessionStorage.getItem('allNotifications')) : [];
            if(notificationAll.length > 0) {
                $('#notification-list-data').empty();
                notificationAll.forEach(notification => {
                    const actions = '{{route('notification.action', ':id')}}'.replace(':id', notification.id);
                    $('#notification-list-data').append(`
                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                        <div class="nav-notification__type nav-notification__type--primary">
                            <img src="{{ asset('assets/img/svg/inbox.svg') }}" alt="inbox" class="svg">
                        </div>
                        <div class="nav-notification__details">
                            <p>
                                <a href="${actions}" class="subject stretched-link text-truncate" style="max-width: 180px;">${notification.title}</a>
                                <span>${notification.description}</span>
                            </p>
                            <p>
                                <span class="time-posted">${moment(notification.created_at).fromNow()}</span>
                            </p>
                        </div>
                    </li>
                    `);
                });
            }
        });
</script>

{{-- Additional scripts if needed for form validation --}}
@if ($errors->any())
    <script>
        //content loaded
        $(document).ready(function() {
            var errorsFieldName = '{!! json_encode($errors->keys()) !!}';
            var errorsFieldNameArray = JSON.parse(errorsFieldName);
            $('.tab-content .tab-pane').removeClass('show active');
            for (var i = 0; i < errorsFieldNameArray.length; i++) {
                // console.log();

                const errorFieldName = errorsFieldNameArray[i];
                if (errorFieldName.includes(".")) {
                    const arrayFileds = errorFieldName.split(".");
                    console.log(arrayFileds);
                    $($('input[name=\'' + arrayFileds[0] + '[]\']').get(arrayFileds[1])).addClass('is-invalid');
                    $($('select[name=\'' + arrayFileds[0] + '[]\']').get(arrayFileds[1])).addClass('is-invalid');
                    $($('textarea[name=\'' + arrayFileds[0] + '[]\']').get(arrayFileds[1])).addClass('is-invalid');
                } else {
                    $('input[name=' + errorFieldName + ']').addClass('is-invalid');
                    $('select[name=' + errorFieldName + ']').addClass('is-invalid');
                    $('textarea[name=' + errorFieldName + ']').addClass('is-invalid');

                  
                    $('input[name=' + errorFieldName + ']').closest(".tab-pane").addClass('show active');
                    $('select[name=' + errorFieldName + ']').closest(".tab-pane").addClass('show active');
                    $('textarea[name=' + errorFieldName + ']').closest(".tab-pane").addClass('show active');
                }


            }

            $('.tab-content .tab-pane.active').not(':first').removeClass('show active');
            const id = $('.tab-content .tab-pane.active').first().prop('id');
            $('.nav-tabs .nav-link').removeClass('active');
            $('.nav-tabs').find('a[href="#' + id + '"]').addClass('active');
        });
    </script>
@endif
