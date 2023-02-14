import _ from 'lodash';
window._ = _;
import $ from 'jquery';
window.$ = $;

function tabs(el){
    let singInButton = $('#sing_in'),
        singUpButton = $('#sing_up'),
        singInForm = $('#sing_in_form'),
        singUpForm = $('#sing_up_form');

    if (el === 'sing_in'){
        $.ajax({
            url: 'login_form/',
            method: 'get',
            dataType: 'html',
            success: function(data){
                singInButton.addClass('button__white');
                singInButton.removeClass('button__grey');
                singUpButton.removeClass('button__white');
                singUpButton.addClass('button__grey');
                $('#ajaxForm').html(data)
            }
        });
    } else {
        $.ajax({
            url: 'register_form/',
            method: 'get',
            dataType: 'html',
            success: function(data){
                singInButton.removeClass('button__white');
                singInButton.addClass('button__grey');
                singUpButton.removeClass('button__grey');
                singUpButton.addClass('button__white');
                $('#ajaxForm').html(data)
            }
        });
    }

}
window.tabs = tabs;

import axios from 'axios';
window.axios = axios;

import 'magnific-popup';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';




