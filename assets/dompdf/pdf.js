$('body').on('click',function(){
    //pop_print('printable');
      window.open(document.URL, 'printer');
  });
  
  function pop_print(id){
      w=window.open('', 'Print_Page', 'scrollbars=yes');
      var myStyle = '<link rel="stylesheet" href="https://codepen.io/dimaslanjaka/pen/mozZPX.css?ver='+window.btoa(Math.random())+'" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css" media="all" />';
      w.document.write(myStyle + $('#'+id).html());
      w.document.close();
      w.print();
      w.close();
  }