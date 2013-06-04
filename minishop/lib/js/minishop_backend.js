
/*    Filter
=======================================*/
function filter (phrase, _id) {
  var words = phrase.value.toLowerCase().split(" ");
  var table = document.getElementById(_id);
  var ele;
  for (var r = 0; r < table.rows.length; r++ ) {
    ele = table.rows[r].innerHTML.replace(/<[^>]+>/g,"");
    var displayStyle = 'none';
    for (var i = 0; i < words.length; i++) {
    if (ele.toLowerCase().indexOf(words[i])>=0) {
      displayStyle = '';
    } else {
      displayStyle = 'none'; break; }
    }
    table.rows[r].style.display = displayStyle;
  }
}




/*    Pagination
=======================================*/
function Pager(tableName, itemsPerPage) {
  this.tableName = tableName;
  this.itemsPerPage = itemsPerPage;
  this.currentPage = 1;
  this.pages = 0;
  this.inited = false;

  this.showRecords = function(from, to) {
    var rows = document.getElementById(tableName).rows;
    // i starts from 1 to skip table header row
    for (var i = 1; i < rows.length; i++) {
      if (i < from || i > to)
        rows[i].style.display = 'none';
      else
        rows[i].style.display = '';
    }
  };

  this.showPage = function(pageNumber) {
    if (! this.inited) {
      alert("not inited");
      return;
    }

    var oldPageAnchor = document.getElementById('pg'+this.currentPage);
    oldPageAnchor.className = 'pg-normal';

    this.currentPage = pageNumber;
    var newPageAnchor = document.getElementById('pg'+this.currentPage);
    newPageAnchor.className = 'pg-selected';

    var from = (pageNumber - 1) * itemsPerPage + 1;
    var to = from + itemsPerPage - 1;
    this.showRecords(from, to);
  };

  this.prev = function() {
    if (this.currentPage > 1)
      this.showPage(this.currentPage - 1);
  };

  this.next = function() {
    if (this.currentPage < this.pages) {
      this.showPage(this.currentPage + 1);
    }
  };

  this.init = function() {
    var rows = document.getElementById(tableName).rows;
    var records = (rows.length - 1);
    this.pages = Math.ceil(records / itemsPerPage);
    this.inited = true;
  };

  this.showPageNav = function(pagerName, positionId) {
    if (! this.inited) {
      alert("not inited");
      return;
    }
    var element = document.getElementById(positionId);
    var pagerHtml = '<div class="pagination"><ul><li><a onclick="' + pagerName + '.prev();" class="pg-normal">Prev</a></li>';
    for (var page = 1; page <= this.pages; page++)
      pagerHtml += '<li><a id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');"> ' + page + ' </a></li> ';
      pagerHtml += '<li><a onclick="'+pagerName+'.next();" class="pg-normal">Next</li></ul></div>';
      element.innerHTML = pagerHtml;
  };
}


  $(function(){
    $(".custom-input-file input:file").change(function(){
        $(this).parent().find(".archive").text($(this).val());
    }).css('border-width',function(){
        if(navigator.appName == "Microsoft Internet Explorer")
            return 0;
    });
  });


