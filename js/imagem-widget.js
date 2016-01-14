/**
 * Created by josafafilho on 1/13/16.
 */

jQuery(document).ready(function ($) {
    var uploader;

    $('.pick_image_widget_button').click(function (e) {

        var target = $(this).prev();

        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (uploader) {
            uploader.open();
            return;
        }

        //Extend the wp.media object
        uploader = wp.media.frames.file_frame = wp.media({
            title: 'Escolha a imagem',
            button: {
                text: 'Escolha a imagem'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        uploader.on('select', function () {
            attachment = uploader.state().get('selection').first().toJSON();
            $(target).val(attachment.url);
        });

        //Open the uploader dialog
        uploader.open();

    });
});
