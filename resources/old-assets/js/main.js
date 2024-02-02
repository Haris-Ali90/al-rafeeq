$(function () {
    
    // SELECTORs
    var SELECTOR = {
        header: '#header',
        form: 'form',
        formControl: '.form-control',
        submitButton: '.submitButton',
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
    
    // --------------------- Common - [Start]
    var COMMON = {
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
            $(SELECTOR.industrySlider).owlCarousel({
                loop:true,
                margin:10,
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
        },
        arrowDownClick: function(){
            $(SELECTOR.arrowDown).on('click', function(){
                $('html, body').animate({
                    scrollTop: $(this).closest('.section').offset().top - 20
                }, 500);
            })
            
        },
        // On page load
        init: function(){
            // Default initialization - [Start]
            COMMON.openMainNav();
            COMMON.updateActiveNav();
            COMMON.mainMenuMobile();

            COMMON.updateSubmitButton();
            COMMON.responsiveTable();
            
            COMMON.clientHamburger();
            COMMON.industry_slider();
            COMMON.arrowDownClick();
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

            $(".play-video").bind().click(function(){
                var src = $(".modal-video").attr('data-src'),
                    newSrc = src + '&autoplay=1&mute=0';
                $(".modal-video").attr('src', newSrc);
            });

            $('#demoJoeyApp').on('hidden.bs.modal', function (e) {
                $(".modal-video").attr('src', '');
            })
        }
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
    
    
    COMMON.init();
    PAGE_HOME.init();
});