$(function () {
    // SELECTORs
    var SELECTOR = {
        header: '#header',
        form: 'form',
        formControl: '.form-control',
        submitButton: '.submitButton',
        submitButtonAjax: '.submitButtonAjax',
        customUploadControl: '.custom-upload-control',
        menuHamburgerIcon: '.menu-hamburger-icon',
        menuCloseBtn: '.menu-close-btn',
        widgetTitle: '.widgetTitle',
        mainNav: '#main-nav',
        mainNavLink: '#main-nav a',
        subMenu: '.sub-menu',
        inputExpiryDate: '.input-expiry-date',
        inputSIN: '[name="sin"]',
        sinExpiryDate: '#sinExpiryDate',
        inputFile: 'input[type="file"]',
        inputCardNumber: '#card-number',
        ccExpirationDate: '#ccExpirationDate',
        documentForm: '#document-form',
        hearAboutUs: '.hearAboutUs',
        ssrValidation: '.ssr-validation',
        clientHeader: '#client-header',
        pageTrainingQuiz: '.page-training-quiz',
        quizQuestionList: '.quiz_question_list',
        quizQuestionBox: '.quiz_question_list .quiz_question',
        industrySlider: '.industry_slider',
        arrowDown: '.arrowDown',
    },
    SIN_TYPE = {
        TEMPORARY: 'temporary',
        PERMANENT: 'permanent'
    }

    var w_width = $(document).width();

    // --------------------- Common - [Start]
    var COMMON = {
        numberFormat: function(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        },
        validateForm: function(thisElement, e){
            COMMON.checkDocumentsRequired();
            COMMON.checkHearAboutUs();
            var form = thisElement.closest('form');
            if (form[0].checkValidity() === false) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.addClass('was-validated');
        },

        initSubmitButtonAjax: function() {
            var submitBtnAjax = $(SELECTOR.submitButtonAjax);
            submitBtnAjax.on('click', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                console.log('should submit');
                if (form[0].checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    console.log('Data invalid');
                } else {
                    var url = form.attr('action');
                    $(this).append(`
                        <div class="spinner_wrap flexbox flex-center jc-center">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>`
                    );
                    $.ajax({
                        /* the route pointing to the post function */
                        url: url,
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */

                        data: form.serialize(),
                        // dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */
                        beforeSend: function(){
                            
                        },
                        success: function (res) {
                            var selectedForm = $(`[action="${url}"]`)
                            selectedForm.append(`
                                <div class="form_message flexbox flex-center jc-center">
                                    <div class="form_message_inner align-center">
                                        <i class="icofont-check-circled"></i>
                                        <h3>Thank you for your request</h3>
                                        <p>We've received your request, our advisor will be in touch with you soon.</p>
                                        <p>Please check your email to proceed further.</p>
                                    </div>
                                </div>
                            `)
                        }
                    });
                }
                form.addClass('was-validated');
            })
        },

        clientHamburger: function(){
            $(SELECTOR.clientHeader + ' .hamburger').on('click', function(e){
                e.preventDefault();
                $('#client-nav').addClass('open');
            });
            $(SELECTOR.clientHeader + ' .close-btn').on('click', function(e){
                e.preventDefault();
                $('#client-nav').removeClass('open');
            });
        },

        // Handling hamburger menu
        closeMainNav: function(){
            $(SELECTOR.header).removeClass('menuOpened');
        },
        openMainNav: function(){
            $(SELECTOR.menuHamburgerIcon).on('click', function(){
                if($(SELECTOR.header).hasClass('menuOpened')){
                    COMMON.closeMainNav();
                } else {
                    $(SELECTOR.header).addClass('menuOpened');
                }
            })
        },
        checkDocumentsRequired: function() {
            $(SELECTOR.documentForm + ' input[type="file"]').each(function(){
                var fileVal = $(this).val(),
                    thisExpiryControl = $(this).closest('.custom-upload-control').find('.expiry-date');
                if(!fileVal){
                    // $(this).closest('.custom-upload-control').addClass('invalid');
                    thisExpiryControl.hide().find('.form-control').removeAttr('required');
                } else {
                    // $(this).closest('.custom-upload-control').removeClass('invalid');
                    thisExpiryControl.attr('data-test', 'show');
                    thisExpiryControl.show().find('.form-control').attr('required', 'required');
                }
            })
        },
        // Handling submit button for all forms
        updateSubmitButton: function(){
            $(SELECTOR.form).each(function(index){
                var thisForm = $(this),
                    isValid = thisForm[0].checkValidity();
                if(isValid){
                    thisForm.find('[type="submit"]').removeAttr('disabled');
                } else {
                    thisForm.find('[type="submit"]').attr('disabled');
                }
            })
        },
        readURL: function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        },

        updateActiveNav: function(){
            var page = $('#main').data('page');
            $('a[href="' + page + '.php"]').closest('li').addClass('active');
        },
        responsiveTable: function(){
            if($('.tbl-responsive').length > 0){
                $('.tbl-responsive thead th').each(function(index, element){
                    var getTHIndex = $(this).index();
                    var dataTH = $(this).html();

                    $(this).closest('.tbl-responsive').find('tbody td').each(function(index, element){
                        var getTDIndex = $(this).index();

                        if(getTDIndex == getTHIndex){
                            $(this).prepend('<span class="mb-label d-block d-sm-none">'+dataTH+'</span>');
                        }
                    });
                });
            }
        },
        mainMenuMobile: function(){
            $(SELECTOR.subMenu + ' li.active').closest(SELECTOR.subMenu).slideDown().closest('li').addClass('open-menu');
            $(SELECTOR.mainNavLink).on('click', function(e){
                var thisSubmenu = $(this).closest('li').find(SELECTOR.subMenu);
                if(thisSubmenu.length){
                    e.preventDefault();
                    $(this).closest('li').toggleClass('open-menu');
                    thisSubmenu.slideToggle();
                }
            })
        },
        markHearAboutUsRequired: function(){
            var checkedLength = $(SELECTOR.hearAboutUs + ' input:checked');
            othersVal = $(SELECTOR.hearAboutUs + ' #other').val();
            if(!checkedLength.length && !othersVal){
                $(SELECTOR.hearAboutUs + ' .form-check:first-child  [type="checkbox"]').attr('required', 'required');
            } else {
                $(SELECTOR.hearAboutUs + ' .form-check:first-child [type="checkbox"]').removeAttr('required');
            }
        },
        checkHearAboutUs: function() {
            $(SELECTOR.hearAboutUs + ' #other').on('keyup', function() {
                COMMON.markHearAboutUsRequired();
            })
            $(SELECTOR.hearAboutUs + ' input[type="checkbox"]').on('change', function() {
                COMMON.markHearAboutUsRequired();
            })
        },
        markInvalidFromServer: function() {
            var invalidFormControl = $(SELECTOR.ssrValidation + ' .invalid-feedback').closest('.form-group').find('.form-control');
            invalidFormControl.addClass('is-invalid');
            invalidFormControl.on('keyup', function() {
                invalidFormControl.removeClass('is-invalid');
            })
        },
        industry_slider: function() {
            if($(SELECTOR.industrySlider).length){
                $(SELECTOR.industrySlider).owlCarousel({
                    loop:false,
                    margin:10,
                    // startPosition:1,
                    nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        360: {
                            items:2
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
            }
        },
        arrowDownClick: function(){
            $(SELECTOR.arrowDown).on('click', function(){
                $('html, body').animate({
                    scrollTop: $(this).closest('.section').offset().top - 20
                }, 500);
            })

        },
        customSelectDropdown: function(){
            $('select').wrap('<div class="custom_dropdown"></div>');
        },
        trackOrderDropdown: function(){
            $('#top-nav > ul > li:not(.hamburger_menu) > a').on('click', function(e){
                e.preventDefault();
                if($(this).closest('li').hasClass('active')) {
                    $(this).closest('li').removeClass('active');
                } else {
                    $(this).closest('li').addClass('active');
                }
            })
        },
        hideTrackorderOnOutsideClick: function(){
            $(document).on("click", function(e) {
                if (!$(e.target).closest('.dropdown_wrap').length) {
                    $(".dropdown.track_order").closest('li').removeClass("active");
                }
            });
            
        },
        topNavCloseButton: function(){
            $('#top-nav .close_btn').on('click', function() {
                $(this).closest('li').removeClass('active');
            })
        },
        // On page load
        init: function(){
            // Default initialization - [Start]
            COMMON.openMainNav();
            COMMON.updateActiveNav();
            COMMON.mainMenuMobile();

            COMMON.updateSubmitButton();
            COMMON.initSubmitButtonAjax();
            COMMON.responsiveTable();

            COMMON.clientHamburger();
            COMMON.industry_slider();
            COMMON.arrowDownClick();
            COMMON.customSelectDropdown();

            
            COMMON.trackOrderDropdown();
            COMMON.hideTrackorderOnOutsideClick();
            COMMON.topNavCloseButton();
            // Default initialization - [/end]

            if($(SELECTOR.inputCardNumber).length){
                $(SELECTOR.inputCardNumber).numbermask({
                    mask:"####-####-####-####"
                });
            }


            $(SELECTOR.menuCloseBtn).on('click', function(){
                COMMON.closeMainNav();
            });

            // Validate Form on submit click
            $(SELECTOR.submitButton).on('click', function(e){
                COMMON.validateForm($(this), e);
            });

            $(SELECTOR.formControl).on('keyup change', function(thisElement){
                COMMON.updateSubmitButton($(this));
            })

            $('.upload-file-link').on('click', function(e){
                e.preventDefault()
                $(this).closest('.upload-box').find('[type="file"]').click();
            });
            $('[type="file"]').on('change', function(){
                var file = $(this).prop('files')[0];
                if (file) {
                    var imagen = URL.createObjectURL(file);
                    $(this).closest('.upload-box').find('.uploaded-file').removeClass('dp-none').attr('src', imagen);
                }
            });

            $('#attachfile').on('click', function () {
                $("#theFileInput").trigger('click'); // or triggerHandler or click()
            });

            if($('.section-signup.section').length){
                $(".signup-now").on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(".section-signup").offset().top
                    }, 500);
                });
            }

            $(".play_icon").on('click', function(){
                $('.play_overlay').fadeOut();
                $('#myVideo').get(0).play();
            });

            $('.modal').on('hidden.bs.modal', function (e) {
                $('.play_overlay').fadeIn();
                $('video').get(0).pause();
            })

            $('.moveToSection').on('click', function(e){
                e.preventDefault();
                var target = $(this).data('target'),
                    headerH = $('#client_header').innerHeight();
                $('html, body').animate({
                    scrollTop: $(target).offset().top - headerH
                }, 500);
                
            })
        },
    }
    // --------------------- Page Home - [Start]
    var PAGE_HOME = {
        init: function (){
            $(".play-video").bind().click(function(){
                var src = $(".modal-video").attr('data-src'),
                    newSrc = src + '&autoplay=1&mute=0';
                $(".modal-video").attr('src', newSrc);
            });

            $('#demoJoeyApp').on('hidden.bs.modal', function (e) {
                $(".modal-video").attr('src', '');
            })
        },
    }
    // --------------------- Page Home - [/end]

    // --------------------- Page TRACK ORDER - [start]
    var PAGE_TRACK_ORDER = {
        showHideMapHandler: function(){
            if($('#location_map').css('display') === 'block'){
                $('#location_map').slideUp();
                $('.hide_map_btn').html('Show <i class="icofont-simple-up"></i>');
            } else {
                $('.hide_map_btn').html('Hide <i class="icofont-simple-down"></i>');
                $('#location_map').slideDown();
            }
        },
        init: function(){
            $('.hide_map_btn').on('click', function(e){
                e.preventDefault();
                PAGE_TRACK_ORDER.showHideMapHandler()
            })
        },
    };
    // --------------------- Page TRACK ORDER - [/end]
    
    // --------------------- Page Micro hub - [Start]
    var PAGE_MICROHUB = {
        updateEarning: function(orders) {
            var perOrder = 5,
                earning = orders * perOrder,
                formattedNumber = COMMON.numberFormat(earning);
            $('#earningAmount').text(formattedNumber);
        },
        countOrder: function() {
            $(".order_range_slider").ionRangeSlider({
                grid: true,
                skin: "big",
                min: 200,
                max: 1800,
                from: 600,
                step: 10,
                prettify_enabled: true,
                prettify_separator: ",",
                postfix: ' orders',
                onStart: function (data) {
                    PAGE_MICROHUB.updateEarning(data.from);
                },
                onChange: function(data) {
                    PAGE_MICROHUB.updateEarning(data.from);
                }
            });
        },
        init: function() {
            if($('.order_range_slider').length){
                PAGE_MICROHUB.countOrder();
            }
        }
    }
    // --------------------- Page Micro hub - [/end]

    // --------------------- Mobile - [Start]
    var MOBILE = {
        init: function(){

        }
    };
    // --------------------- Mobile - [/end]

    COMMON.init();
    if(w_width <= 768){
        MOBILE.init();
    }
    PAGE_HOME.init();
    PAGE_TRACK_ORDER.init();
    PAGE_MICROHUB.init();
});
