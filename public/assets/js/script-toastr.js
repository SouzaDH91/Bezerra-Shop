/*
Template Name: Material Pro admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
/*$(function() {
    "use strict";
      $(".tst1").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'info',
            hideAfter: 3000,
            stack: 6
          });

     });

      $(".tst2").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
          });

     });
      $(".tst3").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
          });

     });

      $(".tst4").click(function(){
           $.toast({
            heading: 'Welcome to Material Pro admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3500

          });

     });
});*/

function ErroCep() {
     $.toast({
          heading: 'Erro',
          text: 'Por favor, informe o cep para calculo do frete.',
          position: 'top-right',
          loaderBg:'#ff6849',
          icon: 'error',
          hideAfter: 3500

     });
}

function ErroCpfCadastrado() {
     $.toast({
          heading: 'Erro',
          text: 'Este CPF já está cadastrado!.',
          position: 'top-right',
          loaderBg:'#ff6849',
          icon: 'error',
          hideAfter: 3500

     });
}

$(function(){
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
});
