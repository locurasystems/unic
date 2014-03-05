<?php/**
 * Created by PhpStorm.
 * User: bhoo
 * Date: 1/13/14
 * Time: 2:49 PM
 */ ?>
<script type="text/javascript">
    $(function() {
        AntiBOT.init('.new_comment');

        CommentResponder.init();

        $('#comment_body').taby();
    });

    $.fn.raty.defaults.path = '../img';

    $(function() {
        $('#default').raty();

        $('#score').raty({ score: 3 });

        $('#score-callback').raty({
            score: function() {
                return $(this).attr('data-score');
            }
        });

        $('#scoreName').raty({ scoreName: 'entity[score]' });

        $('#number').raty({ number: 10 });

        $('#number-callback').raty({
            number: function() {
                return $(this).attr('data-number');
            }
        });

        $('#numberMax').raty({
            numberMax : 5,
            number    : 100
        });

        $('#readOnly').raty({ readOnly: true, score: 3 });

        $('#readOnly-callback').raty({
            readOnly: function() {
                return 'true becomes readOnly' == 'true becomes readOnly';
            }
        });

        $('#noRatedMsg').raty({
            readOnly   : true,
            noRatedMsg : "I'am readOnly and I haven't rated yet!"
        });

        $('#halfShow-true').raty({ score: 3.26 });

        $('#halfShow-false').raty({
            halfShow : false,
            score    : 3.26
        });

        $('#round').raty({
            round : { down: .26, full: .6, up: .76 },
            score : 3.26
        });

        $('#half').raty({ half: true });

        $('#starHalf').raty({
            half     : true,
            path     : null,
            starHalf : '../img/star-half-mono.png',
            starOff  : '../img/star-off.png',
            starOn   : '../img/star-on.png'
        });

        $('#click').raty({
            click: function(score, evt) {
                alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
            }
        });

        $('#hints').raty({ hints: ['a', null, '', undefined, '*_*']});

        $('#star-off-and-star-on').raty({
            path    : '../img',
            starOff : 'off.png',
            starOn  : 'on.png'
        });

        $('#cancel').raty({ cancel: true });

        $('#cancelHint').raty({
            cancel     : true,
            cancelHint : 'My cancel hint!'
        });

        $('#cancelPlace').raty({
            cancel      : true,
            cancelPlace : 'right'
        });

        $('#star-off-and-star-on').raty({
            path    : '../img',
            starOff : 'off.png',
            starOn  : 'on.png'
        });

        $('#cancel-off-and-cancel-on').raty({
            cancel    : true,
            cancelOff : '../img/cancel-custom-off.png',
            cancelOn  : '../img/cancel-custom-on.png',
            path      : null,
            starOff   : '../img/star-off.png',
            starOn    : '../img/star-on.png'
        });

        $('#iconRange').raty({
            path      : null,
            starOff   : '../img/star-off.png',
            iconRange : [
                { range: 1, on: '../img/1.png', off: '../img/0.png' },
                { range: 2, on: '../img/2.png', off: '../img/0.png' },
                { range: 3, on: '../img/3.png', off: '../img/0.png' },
                { range: 4, on: '../img/4.png', off: '../img/0.png' },
                { range: 5, on: '../img/5.png', off: '../img/0.png' }
            ]
        });

        $('#size').raty({
            path      : 'demo/images',
            cancel    : true,
            cancelOff : 'cancel-off-big.png',
            cancelOn  : 'cancel-on-big.png',
            half      : true,
            size      : 24,
            starHalf  : 'star-half-big.png',
            starOff   : 'star-off-big.png',
            starOn    : 'star-on-big.png'
        });

        $('#width').raty({ width: 150 });

        $('#target-div').raty({
            cancel : true,
            target : '#target-div-hint'
        });

        $('#target-text').raty({
            cancel : true,
            target : '#target-text-hint'
        });

        $('#target-textarea').raty({
            cancel : true,
            target : '#target-textarea-hint'
        });

        $('#target-select').raty({
            cancel : true,
            target : '#target-select-hint'
        });

        $('#targetType').raty({
            cancel     : true,
            target     : '#targetType-hint',
            targetType : 'score'
        });

        $('#targetKeep').raty({
            cancel     : true,
            target     : '#targetKeep-hint',
            targetKeep : true
        });

        $('#targetText').raty({
            target     : '#targetText-hint',
            targetText : '--'
        });

        $('#targetFormat').raty({
            target       : '#targetFormat-hint',
            targetFormat : 'Rating: {score}'
        });

        $('#mouseover').raty({
            mouseover: function(score, evt) {
                alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
            }
        });

        $('#mouseout').raty({
            mouseout: function(score, evt) {
                alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt.type);
            }
        });

    });
</script>