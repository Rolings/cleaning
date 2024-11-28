/*! Image Uploader - v1.0.0 - 15/07/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */
(function ($) {
    $.fn.imageUploader = function (options) {
        let defaults = {preloaded: [], imagesInputName: 'images', preloadedInputName: 'preloaded', label: ''};
        let plugin = this;
        plugin.settings = {};
        plugin.init = function () {
            plugin.settings = $.extend(plugin.settings, defaults, options);
            plugin.each(function (i, wrapper) {
                let $container = createContainer();
                $(wrapper).append($container);
                $container.on("dragover", fileDragHover.bind($container));
                $container.on("dragleave", fileDragHover.bind($container));
                $container.on("drop", fileSelectHandler.bind($container));
                if (plugin.settings.preloaded.length) {
                    $container.addClass('has-files');
                    let $uploadedContainer = $container.find('.uploaded');
                    for (let i = 0; i < plugin.settings.preloaded.length; i++) {
                        $uploadedContainer.append(createImg(plugin.settings.preloaded[i].src, plugin.settings.preloaded[i].id, !0))
                    }
                }
            })
        };
        let dataTransfer = new DataTransfer();
        let closeIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>';
        let uploadIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>';
        let createContainer = function () {
            let $container = $('<div>', {class: 'image-uploader'}),
                $input = $('<input>', {type: 'file', id: plugin.settings.imagesInputName + '-' + random(), name: plugin.settings.imagesInputName + '[]', multiple: ''}).appendTo($container),
                $uploadedContainer = $('<div>', {class: 'uploaded'}).appendTo($container), $textContainer = $('<div>', {class: 'upload-text'}).appendTo($container),
                //$i = $('<i>', {class: 'material-icons', text: 'cloud_upload'}).appendTo($textContainer), $span = $('<span>', {text: plugin.settings.label}).appendTo($textContainer);
                $i = $(uploadIcon).appendTo($textContainer), $span = $('<span>', {text: plugin.settings.label}).appendTo($textContainer);
            $container.on('click', function (e) {
                prevent(e);
                $input.trigger('click')
            });
            $input.on("click", function (e) {
                e.stopPropagation()
            });
            $input.on('change', fileSelectHandler.bind($container));
            return $container
        };
        let prevent = function (e) {
            e.preventDefault();
            e.stopPropagation()
        };
        let createImg = function (src, id) {
            let $container = $('<div>', {class: 'uploaded-image'}), $img = $('<img>', {src: src}).appendTo($container), $button = $('<button>', {class: 'delete-image'}).appendTo($container),
                //$i = $('<i>', {class: 'material-icons', text: 'clear'}).appendTo($button);
                $i = $(closeIcon).appendTo($button);
            $i = $i.appendTo($button)
            if (plugin.settings.preloaded.length) {
                $container.attr('data-preloaded', !0);
                let $preloaded = $('<input>', {type: 'hidden', name: plugin.settings.preloadedInputName + '[]', value: id}).appendTo($container)
            } else {
                $container.attr('data-index', id)
            }
            $container.on("click", function (e) {
                prevent(e)
            });
            $button.on("click", function (e) {
                prevent(e);
                if ($container.data('index')) {
                    let index = parseInt($container.data('index'));
                    $container.find('.uploaded-image[data-index]').each(function (i, cont) {
                        if (i > index) {
                            $(cont).attr('data-index', i - 1)
                        }
                    });
                    dataTransfer.items.remove(index);
                    let files = dataTransfer.files;
                    $input = $('input[type="file"]');
                    $input.prop('files', files);
                }
                $container.remove();
                if (!$container.find('.uploaded-image').length) {
                    $container.removeClass('has-files')
                }
            });
            return $container
        };
        let fileDragHover = function (e) {
            prevent(e);
            if (e.type === "dragover") {
                $(this).addClass('drag-over')
            } else {
                $(this).removeClass('drag-over')
            }
        };
        let fileSelectHandler = function (e) {
            prevent(e);
            let $container = $(this);
            $container.removeClass('drag-over');
            let files = e.target.files || e.originalEvent.dataTransfer.files;
            setPreview($container, files)
        };
        let setPreview = function ($container, files) {
            $container.addClass('has-files');
            let $uploadedContainer = $container.find('.uploaded'), $input = $container.find('input[type="file"]');
            $(files).each(function (i, file) {
                dataTransfer.items.add(file);
                $uploadedContainer.append(createImg(URL.createObjectURL(file), dataTransfer.items.length - 1))
            });
            $input.prop('files', dataTransfer.files)
        };
        let random = function () {
            return Date.now() + Math.floor((Math.random() * 100) + 1)
        };
        this.init();
        return this
    }
}(jQuery))
