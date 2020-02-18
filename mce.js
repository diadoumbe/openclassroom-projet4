

//<script type="text/javascript" src="tinymce_3.5.12/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

  tinyMCE.init({
    // type de mode
    mode : "exact",
    content_style:".mce-content-body{font-size:15px;font-family:verdana,Arial,sans-serif;}",
    force_br_newlines:true,
    force_p_newlines:false,
    forced_root_block:"",
    //selector:"textarea",
    plugins:"autoresize",
    // id ou class, des textareas appelés
    elements : "messageb,messageb1", 
    // en mode avancé, cela permet de choisir les plugins
    theme : "advanced", 
    // langue
    language : "en", 
    // liste des plugins
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sup,forecolor,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
      + "bullist,numlist,outdent,indent,separator,fontsizeselect,cleanup,|,undo,redo,|,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    width:"100%",
    height:"auto"
  });  
  
//
  
/*  tinyMCE.init({
      style_formats : [
              {title : 'Line height 18px', selector : 'p,div,h1,h2,h3,h4,h5,h6', styles: {lineHeight: '18px'}},
              {title : 'Line height 24px', selector : 'p,div,h1,h2,h3,h4,h5,h6', styles: {lineHeight: '24px'}}
      ]
});
  */
 /* 
  tinymce.init({
      selector: "textarea",
      height: 400,
      elements : "messageb,messageb1",
      statusbar: false,
      menubar:false,
      toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | fontsizeselect"
   });
*/