

//<script type="text/javascript" src="mce.js"></script>

  tinyMCE.init({
    // type de mode
    mode : "exact", 
    // id ou class, des textareas appelés
    elements : "messageb,messageb1,messagec", 
    // en mode avancé, cela permet de choisir les plugins
    theme : "advanced", 
    // langue
    language : "fr", 
    // liste des plugins
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sup,forecolor,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent,separator,cleanup,|,undo,redo,|,",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    height:"250px",
    width:"600px"
  });
