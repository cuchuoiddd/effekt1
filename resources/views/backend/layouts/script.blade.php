<!-- BEGIN VENDOR JS-->
<script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{asset('backend/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>


<!-- Alert -->
<script src="/backend/plugins/sweet-alert2/sweetalert2.min.js"></script>

<!-- Alert -->
<script src="/backend/plugins/alertify/alertify.min.js"></script>


<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<script src="{{ asset('js/format-number.js') }}"></script>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

{{--Validate--}}
<script src="/backend/plugins/validate/jquery.validate.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    } );
</script>


<!-- Select2 -->
<script src="/backend/plugins/select2/select2.min.js"></script>
<script>

    $(document).ready(function () {

        $.ajaxSetup({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token()}}');
            }
        });
    })
    $("#gridForm").submit(function (e, page) {
        showLoading();
        $.get($(this).attr('action'), $(this).serialize(), function (data) {
            $('.table-responsive').html(data);
        });
        hideLoading();
        return false;
    });

    alertify.defaults = {
        // dialogs defaults
        autoReset: true,
        basic: false,
        closable: true,
        closableByDimmer: true,
        invokeOnCloseOff: false,
        frameless: false,
        defaultFocusOff: false,
        maintainFocus: true, // <== global default not per instance, applies to all dialogs
        maximizable: true,
        modal: true,
        movable: true,
        moveBounded: false,
        overflow: true,
        padding: true,
        pinnable: true,
        pinned: true,
        preventBodyShift: false, // <== global default not per instance, applies to all dialogs
        resizable: true,
        startMaximized: false,
        transition: 'fade',
        transitionOff: false,
        tabbable: 'button:not(:disabled):not(.ajs-reset),[href]:not(:disabled):not(.ajs-reset),input:not(:disabled):not(.ajs-reset),select:not(:disabled):not(.ajs-reset),textarea:not(:disabled):not(.ajs-reset),[tabindex]:not([tabindex^="-"]):not(:disabled):not(.ajs-reset)',  // <== global default not per instance, applies to all dialogs

        // notifier defaults
        notifier: {
            // auto-dismiss wait time (in seconds)
            delay: 3,
            // default position
            position: 'bottom-right',
            // adds a close button to notifier messages
            closeButton: false,
            // provides the ability to rename notifier classes
            classes: {
                base: 'alertify-notifier',
                prefix: 'ajs-',
                message: 'ajs-message',
                top: 'ajs-top',
                right: 'ajs-right',
                bottom: 'ajs-bottom',
                left: 'ajs-left',
                center: 'ajs-center',
                visible: 'ajs-visible',
                hidden: 'ajs-hidden',
                close: 'ajs-close'
            }
        },

        // language resources
        glossary: {
            // dialogs default title
            title: 'AlertifyJS',
            // ok button text
            ok: 'OK',
            // cancel button text
            cancel: 'Cancel'
        },

        // theme settings
        theme: {
            // class name attached to prompt dialog input textbox.
            input: 'ajs-input',
            // class name attached to ok button
            ok: 'ajs-ok',
            // class name attached to cancel button
            cancel: 'ajs-cancel'
        },
        // global hooks
        hooks: {
            // invoked before initializing any dialog
            preinit: function (instance) { },
            // invoked after initializing any dialog
            postinit: function (instance) { },
        },
    };
    alertify.set('notifier','position', 'top-right');

    $('.number').on('keyup', function () {
        var val = $(this).val();
        val = replaceNumber(val);
        $(this).val(formatNumber(val));
    })

    $("body").on("click", ".delete", function () {
        var elt = $(this).parents('tr');
        var data_id = $(this).data('id');
        swal({
            title: 'Bạn có chắc chắn xóa mục này?',
            type: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            showCloseButton: true,
        }).then(function () {
            $.ajax({
                data: {id: data_id},
                url: window.location.href + '/' + data_id,
                method: 'delete',
                success: function (data) {
                    if (data && data.success === false) {
                        swal({
                            title: data.message ? data.message : '',
                            type: 'warning'
                        })
                    } else {
                        swal({
                            title: 'Đã xóa thành công!',
                            type: 'success'
                        })
                        elt.remove();
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }
                }
            });
        }, function (dismiss) {
        });
    });
    $(document).ready(function ($) {
        $('.select2').select2({
            placeholder: 'Chọn',
            width: '100%',
            allowClear: true,
            // placeholder: {
            //     id: '-1', // the value of the option
            //     text: 'Chọn'
            // }
        });
    });

    function showLoading() {
        $('.loading-custom').show();
    }

    function hideLoading() {
        $('.loading-custom').hide();
    }

    // custom message validate
    $.extend(jQuery.validator.messages, {
        required: "Trường không được bỏ trống !",
        remote: "Please fix this field.",
        email: "Email không hợp lệ !",
        url: "Đường dẫn không hợp lệ !",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Vui lòng nhập lại cùng một giá trị !",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Giá trị không quá {0} ký tự !"),
        minlength: jQuery.validator.format("Vui lòng nhập ít nhất {0} ký tự !"),
        rangelength: jQuery.validator.format("Vui lòng nhập một giá trị có độ dài từ {0} đến {1} ký tự !"),
        range: jQuery.validator.format("Vui lòng nhập giá trị từ {0} đến {1}."),
        max: jQuery.validator.format("Vui lòng nhập giá trị nhỏ hơn hoặc bằng {0}."),
        min: jQuery.validator.format("Vui lòng nhập giá trị lớn hơn hoặc bằng {0}.")
    });
</script>
