


(function ($) {

    $.widget('ui.bootstrap_panel', {
        options: {
            btns: {
                open:'<i class="glyphicon glyphicon-plus"></i>',
                close:'<i class="glyphicon glyphicon-minus"></i>'
            },
            hideOptions: {
                duration:600,
            },
            showOptions: {
                duration:600,
            },
            toggleSelector: '.panel-heading:first',
            toggleCursor: 'pointer',
        },
        _create: function () {
            var elem = this.element,
                o = this.options,
                btnToggle = $('<span class="panel-btn-toggle pull-right">').html(o.btns.open);
            elem.find('.panel-heading:first').append(btnToggle);
            if(elem.find('.panel-body:first').is(':visible'))
                elem.find('.panel-btn-toggle:first').html(o.btns.close);
            else
                elem.find('.panel-btn-toggle:first').html(o.btns.open);
            this._on(elem.find(o.toggleSelector),{
                click: this.toggle
            });
            if(o.toggleCursor)
                elem.find(o.toggleSelector).css('cursor',o.toggleCursor);
        },
        _destroy: function () {
        },
        _setOption: function (key, value) {
            var self = this,
                    prev = this.options[key],
                    fnMap = {
                        'open': function () {
                            open(value, self);
                        },
                        'close': function () {
                            close(value, self);
                        },
                    };

            // base
            this._super(key, value);

            if (key in fnMap) {
                fnMap[key]();
                // Fire event
                this._triggerOptionChanged(key, prev, value);
            }
        },
        toggle: function (event) {
            var elem = this.element;
//            console.log(this)
            if(elem.find('.panel-body:first').is(':visible')) {
                this.close();
                elem.find('.panel-btn-toggle:first').html(this.options.btns.open);
            } else {
                this.open();
                elem.find('.panel-btn-toggle:first').html(this.options.btns.close);
            }
        },
        open: function (event) {
            this.element.find('.panel-body:first').show(this.options.hideOptions);
            
        },
        close: function (event) {
            this.element.find('.panel-body:first').hide(this.options.showOptions);
        }
    });


})(jQuery);
