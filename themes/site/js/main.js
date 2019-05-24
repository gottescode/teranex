$(document).ready(function() {
    // File Upload Function
    $('input[type=file]').change(function() {
        var t = $(this).val();
        var labelText = t.substr(12, t.length);
        $(this).prev('label').text(labelText);
    });
    // Mobile Header Function
    $('.navbar-toggle').click(function() {
        $('body').addClass('m-active');
    });
    $('.mobile-menu-overlay').click(function() {
        $('body').removeClass('m-active');
    });
    // Mobile Search Function
    $('.MobileSearch').click(function() {
        $('.headerbar-search').addClass('active');
    });
    $('.header-Msearch-close').click(function() {
        $('.headerbar-search').removeClass('active');
    });

    // Form Clone Function 
    $('body').on('click', '.add-Time-study-form', function() {
        $('.Time-study-form-container').clone().appendTo('.Time-study-form-clone');
    });
    $('body').on('click', '.remove-Time-study-form', function() {
        $(this).parents('.Time-study-form-container').remove();
    });

    $('.add-attach-drawing').click(function() {
        $('.attach-drawing-card').clone().appendTo('.attach-drawing-clone');
    });
    $('body').on('click', '.part-information-action', function() {
        $(this).parents('.attach-drawing-card').remove();
    });
    // Why Choose Teranex Blocks collapse
    $('.why-choose-teranex-btn').click(function() {
        $('.why-choose-teranex-blocks').slideDown();
    });

    // Custom Select Box
    $('.home-page-container select').each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function() {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel').length);
            if ($(this).attr('rel')){
                location.href=$(this).attr('rel');
            }
            
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
});