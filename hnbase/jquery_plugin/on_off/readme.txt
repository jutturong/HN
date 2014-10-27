1. HTML

<div class="switch">
    <label for="mycheckbox" class="switch-toggle" data-on="On" data-off="Off"></label>
    <input type="checkbox" id="mycheckbox" />
</div>

2. CSS

label.switch-toggle {
    background: url('switch.png') repeat-y;
    display: block !important;
    height: 12px;
    padding-left: 26px;
    cursor: pointer;
    display: none;
}
label.switch-toggle.on {
    background-position: 0px 12px;
}
label.switch-toggle.off {
    background-position: 0px 0px;
}
label.switch-toggle.hidden {
    display: none;
}

3. jQuery

$(document).ready( function(){
    $('.switch').each(function() {
        var checkbox = $(this).children('input[type=checkbox]');
        var toggle = $(this).children('label.switch-toggle');

        if (checkbox.length) {
            checkbox.addClass('hidden');
            toggle.removeClass('hidden');
            if (checkbox[0].checked) {
                toggle.addClass('on');
                toggle.removeClass('off');
                toggle.text(toggle.attr('data-on'));
            } else {
                toggle.addClass('off');
                toggle.removeClass('on');
                toggle.text(toggle.attr('data-off'));
            };
        }
    });

    $('.switch-toggle').click(function(){
        var checkbox = $(this).siblings('input[type=checkbox]')[0];
        var toggle = $(this);

        // We need to inverse the logic here, because at the time of processing,
        // the checked status has not been enabled yet.
        if (checkbox.checked) {
            toggle.addClass('off');
            toggle.removeClass('on');
            toggle.text(toggle.attr('data-off'));
        } else {
            toggle.addClass('on');
            toggle.removeClass('off');
            toggle.text(toggle.attr('data-on'));
        };
    });
});